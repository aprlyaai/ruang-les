<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Presensi;

use App\Models\Murid;
use App\Models\JadwalKelas;
use App\Models\Pengguna;
use Carbon\Carbon;

class PresensiController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil Parameter Filter
        $startDate = $request->input('start_date') ? Carbon::parse($request->input('start_date')) : Carbon::today()->subDays(7);
        $endDate = $request->input('end_date') ? Carbon::parse($request->input('end_date')) : Carbon::today();
        $classId = $request->input('jadwal_id');
        $studentId = $request->input('murid_id');
        $mentorId = $request->input('mentor_id');
        $packageId = $request->input('program_id');

        // 2. Query Builder Utama (Mengerucut / Drill-Down)
        $query = Presensi::with(['student', 'schedule.package', 'creator'])
            ->whereDate('tanggal_presensi', '>=', $startDate)
            ->whereDate('tanggal_presensi', '<=', $endDate);

        if ($classId) {
            $query->where('jadwal_id', $classId);
        }
        if ($studentId) {
            $query->where('murid_id', $studentId);
        }
        if ($mentorId) {
            $query->where('dibuat_oleh', $mentorId);
        }
        if ($packageId) {
            $query->whereHas('schedule', function($q) use ($packageId) {
                $q->where('program_id', $packageId);
            });
        }

        $attendances = $query->orderBy('tanggal_presensi', 'desc')->orderBy('created_at', 'desc')->paginate(50);

        // 3. Ambil data untuk Dropdown Opsi Filter
        $filterClasses = JadwalKelas::with('package')->orderByRaw("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu')")->orderBy('waktu_belajar', 'asc')->get()->map(function($class) {
            $class->dropdown_text = ($class->nama_kelas ?? 'Kelas Tanpa Nama') . ' - ' . $class->hari . ', ' . $class->waktu_belajar;
            return $class;
        });

        $filterStudents = Murid::orderBy('nama_murid')->get();
        $filterMentors = Pengguna::where('role', 'mentor')->orderBy('name')->get();
        $filterPackages = \App\Models\Program::orderBy('nama_program')->get();

        return view('admin.presensi.daftar', compact(
            'attendances',
            'filterClasses',
            'filterStudents',
            'filterMentors',
            'filterPackages',
            'startDate',
            'endDate',
            'classId',
            'studentId',
            'mentorId',
            'packageId'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:hadir,tidak_hadir,libur',
            'notes' => 'nullable|string|max:255'
        ]);

        $attendance = Presensi::findOrFail($id);
        $oldStatus = $attendance->status_presensi;
        $newStatus = $request->input('status');

        if ($oldStatus !== $newStatus) {
            $student = Murid::findOrFail($attendance->murid_id);

            // Logika Pemotongan/Pengembalian Kuota
            // Jika tadinya "hadir" (kuota sudah terpotong), lalu diubah jadi BUKAN "hadir", kembalikan kuota +1
            if ($oldStatus === 'hadir' && $newStatus !== 'hadir') {
                $student->increment('kuota_belajar');
            }
            // Jika tadinya BUKAN "hadir", lalu diubah jadi "hadir", potong kuota -1
            else if ($oldStatus !== 'hadir' && $newStatus === 'hadir') {
                $student = Murid::with('parent.user')->findOrFail($attendance->murid_id);
                $student->decrement('kuota_belajar');
                $student->refresh();

                if ($student->kuota_belajar <= 0 && $student->parent && $student->parent->user) {
                    $student->parent->user->notify(new \App\Notifications\TeguranKuotaNotification($student, true));
                }
            }

            $attendance->status_presensi = $newStatus;
        }

        $attendance->notes_presensi = $request->input('notes');
        $attendance->save();

        return redirect()->back()->with('success', 'Status presensi dan kuota siswa berhasil diperbarui!');
    }

    public function showStudent($id)
    {
        $student = Murid::with('user')->findOrFail($id);
        $attendances = Presensi::with(['schedule.package', 'creator'])
            ->where('murid_id', $id)
            ->orderBy('tanggal_presensi', 'desc')
            ->get();

        return view('admin.presensi.detail', compact('student', 'attendances'));
    }

    public function destroy($id)
    {
        $attendance = Presensi::findOrFail($id);

        // Logika Pengembalian Kuota (Refund)
        // Jika data yang dihapus berstatus 'hadir', kembalikan 1 kuota ke murid tersebut
        if ($attendance->status_presensi === 'hadir') {
            $student = Murid::findOrFail($attendance->murid_id);
            $student->increment('kuota_belajar');
        }

        $attendance->delete();

        return redirect()->back()->with('success', 'Data presensi berhasil dihapus permanen. Kuota murid telah disesuaikan jika diperlukan.');
    }
}
