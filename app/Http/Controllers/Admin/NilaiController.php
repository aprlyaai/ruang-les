<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Murid;
use App\Models\JadwalKelas;
use App\Models\Pengguna;
use App\Models\Program;
use Carbon\Carbon;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date') ? Carbon::parse($request->input('start_date')) : Carbon::today()->subDays(7);
        $endDate = $request->input('end_date') ? Carbon::parse($request->input('end_date')) : Carbon::today();
        $classId = $request->input('jadwal_id');
        $studentId = $request->input('murid_id');
        $packageId = $request->input('program_id');

        // Unlike CatatanPerkembangan, we don't have mentor_id directly on student_scores right now,
        // we can filter via schedule.mentor_id if needed, but for simplicity let's stick to these.

        $query = Nilai::with(['student', 'schedule.package', 'schedule.mentor'])
            ->whereDate('tanggal_penilaian', '>=', $startDate)
            ->whereDate('tanggal_penilaian', '<=', $endDate);

        if ($classId) {
            $query->where('jadwal_id', $classId);
        }
        if ($studentId) {
            $query->where('murid_id', $studentId);
        }
        if ($packageId) {
            $query->whereHas('schedule', function($q) use ($packageId) {
                $q->where('program_id', $packageId);
            });
        }

        $scores = $query->orderBy('tanggal_penilaian', 'desc')->orderBy('created_at', 'desc')->paginate(50);

        $filterClasses = JadwalKelas::with('package')->orderByRaw("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu')")->orderBy('waktu_belajar', 'asc')->get()->map(function($class) {
            $class->dropdown_text = ($class->nama_kelas ?? 'Kelas Tanpa Nama') . ' - ' . $class->hari . ', ' . $class->waktu_belajar;
            return $class;
        });

        $filterStudents = Murid::orderBy('nama_murid')->get();
        $filterPackages = Program::orderBy('nama_program')->get();
        $filterMentors = Pengguna::where('role', 'mentor')->orderBy('name')->get();

        return view('admin.nilai.daftar', compact(
            'scores',
            'filterClasses',
            'filterStudents',
            'filterPackages',
            'filterMentors'
        ));
    }

    public function show($studentId)
    {
        $student = Murid::findOrFail($studentId);
        $scores = Nilai::with(['schedule.package', 'schedule.mentor'])
            ->where('murid_id', $studentId)
            ->orderBy('tanggal_penilaian', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.nilai.detail', compact('student', 'scores'));
    }

    public function update(Request $request, $id)
    {
        $skor_nilai = Nilai::findOrFail($id);

        $validated = $request->validate([
            'tanggal_penilaian' => 'required|date',
            'tipe_nilai' => 'required|string|max:255',
            'materi_nilai' => 'required|string|max:255',
            'skor_nilai' => 'required|integer|min:0|max:100',
            'notes_nilai' => 'nullable|string',
        ]);

        $skor_nilai->update($validated);

        return redirect()->back()->with('success', 'Data Nilai berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $skor_nilai = Nilai::findOrFail($id);
        $skor_nilai->delete();

        return redirect()->back()->with('success', 'Data Nilai berhasil dihapus.');
    }
}
