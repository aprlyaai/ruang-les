<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatatanPerkembangan;
use App\Models\Murid;
use App\Models\JadwalKelas;
use App\Models\Pengguna;
use App\Models\Program;
use Carbon\Carbon;

class CatatanPerkembanganController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date') ? Carbon::parse($request->input('start_date')) : Carbon::today()->subDays(7);
        $endDate = $request->input('end_date') ? Carbon::parse($request->input('end_date')) : Carbon::today();
        $classId = $request->input('jadwal_id');
        $studentId = $request->input('murid_id');
        $mentorId = $request->input('mentor_id');
        $packageId = $request->input('program_id');

        $query = CatatanPerkembangan::with(['student', 'schedule.package', 'schedule.mentor'])
            ->whereDate('tanggal_catatan', '>=', $startDate)
            ->whereDate('tanggal_catatan', '<=', $endDate);

        if ($classId) {
            $query->where('jadwal_id', $classId);
        }
        if ($studentId) {
            $query->where('murid_id', $studentId);
        }
        if ($mentorId) {
            $query->whereHas('schedule', function($q) use ($mentorId) {
                $q->where('mentor_id', Pengguna::find($mentorId)?->mentor_id);
            });
        }
        if ($packageId) {
            $query->whereHas('schedule', function($q) use ($packageId) {
                $q->where('program_id', $packageId);
            });
        }

        $notes = $query->orderBy('tanggal_catatan', 'desc')->orderBy('created_at', 'desc')->paginate(50);

        $filterClasses = JadwalKelas::with('package')->orderByRaw("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu')")->orderBy('waktu_belajar', 'asc')->get()->map(function($class) {
            $class->dropdown_text = ($class->nama_kelas ?? 'Kelas Tanpa Nama') . ' - ' . $class->hari . ', ' . $class->waktu_belajar;
            return $class;
        });

        $filterStudents = Murid::orderBy('nama_murid')->get();
        $filterMentors = Pengguna::where('role', 'mentor')->orderBy('name')->get();
        $filterPackages = Program::orderBy('nama_program')->get();

        return view('admin.catatan-perkembangan.daftar', compact(
            'notes',
            'filterClasses',
            'filterStudents',
            'filterMentors',
            'filterPackages'
        ));
    }

    public function show($studentId)
    {
        $student = Murid::findOrFail($studentId);
        $notes = CatatanPerkembangan::with(['schedule.package', 'schedule.mentor', 'mentor'])
            ->where('murid_id', $studentId)
            ->orderBy('tanggal_catatan', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.catatan-perkembangan.detail', compact('student', 'notes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'murid_id' => 'required|exists:murid,murid_id',
            'jadwal_id' => 'required|exists:jadwal_kelas,jadwal_id',
            'date' => 'required|date',
            'materi' => 'required|string|max:255',
            'skor_pemahaman' => 'nullable|integer|min:0|max:100',
            'status_fokus' => 'required|in:sangat_fokus,fokus,kurang_fokus,tidak_fokus',
            'catatan_perkembangan' => 'required|string',
        ]);

        $validated['tanggal_catatan'] = $validated['date'];
        unset($validated['date']);

        CatatanPerkembangan::create($validated);

        return redirect()->back()->with('success', 'Catatan Perkembangan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $note = CatatanPerkembangan::findOrFail($id);

        $validated = $request->validate([
            'date' => 'required|date',
            'materi' => 'required|string|max:255',
            'skor_pemahaman' => 'nullable|integer|min:0|max:100',
            'status_fokus' => 'required|in:sangat_fokus,fokus,kurang_fokus,tidak_fokus',
            'catatan_perkembangan' => 'required|string',
        ]);

        $validated['tanggal_catatan'] = $validated['date'];
        unset($validated['date']);
        $note->update($validated);

        return redirect()->back()->with('success', 'Catatan Perkembangan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $note = CatatanPerkembangan::findOrFail($id);
        $note->delete();

        return redirect()->back()->with('success', 'Catatan Perkembangan berhasil dihapus.');
    }


}
