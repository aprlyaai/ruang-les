<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalKelas;
use App\Models\Murid;

class RiwayatBelajarController extends Controller
{
    public function index(Request $request)
    {
        $mentor = Auth::user();
        $search = $request->input('search');

        // Fetch all schedules for this mentor
        $schedules = JadwalKelas::with(['package', 'students' => function($q) use ($search) {
            $q->with('parent');
            if ($search) {
                $q->where('nama_murid', 'like', "%{$search}%")
                  ->orWhere('murid_id', 'like', "%{$search}%");
            }
        }])
        ->where('mentor_id', $mentor->mentor_id)
        ->where('status_jadwal', 'active')
        ->get();

        $students = collect();
        foreach($schedules as $schedule) {
            foreach($schedule->students as $student) {
                if (!$students->has($student->murid_id)) {
                    $student->mentor_schedules = collect([$schedule]);
                    $students->put($student->murid_id, $student);
                } else {
                    $students[$student->murid_id]->mentor_schedules->push($schedule);
                }
            }
        }

        return view('mentor.riwayat-belajar.daftar', compact('students', 'search'));
    }

    public function show($murid_id)
    {
        $mentor = Auth::user();

        // Find mentor's active schedules
        $mentorSchedules = JadwalKelas::where('mentor_id', $mentor->mentorProfile->mentor_id)->pluck('jadwal_id');

        // Fetch student and ensure they belong to at least one of these schedules
        $student = Murid::whereHas('classes', function($q) use ($mentorSchedules) {
            $q->whereIn('jadwal_kelas.jadwal_id', $mentorSchedules);
        })->where('murid_id', $murid_id)->firstOrFail();

        // Get all schedules for this student that belong to this mentor
        $schedules = JadwalKelas::with('package')
            ->whereIn('jadwal_id', $mentorSchedules)
            ->whereHas('students', function($q) use ($murid_id) {
                $q->where('murid.murid_id', $murid_id);
            })
            ->get();

        $attendances = \App\Models\Presensi::with('schedule.package')
            ->where('murid_id', $student->murid_id)
            ->whereIn('jadwal_id', $mentorSchedules)
            ->orderBy('tanggal_presensi', 'desc')
            ->get();

        $notes = \App\Models\CatatanPerkembangan::with('schedule.package')
            ->where('murid_id', $student->murid_id)
            ->whereIn('jadwal_id', $mentorSchedules)
            ->orderBy('tanggal_catatan', 'desc')
            ->get();

        $scores = \App\Models\Nilai::with('schedule.package')
            ->where('murid_id', $student->murid_id)
            ->whereIn('jadwal_id', $mentorSchedules)
            ->orderBy('tanggal_penilaian', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mentor.riwayat-belajar.detail', compact('student', 'schedules', 'attendances', 'notes', 'scores'));
    }


}
