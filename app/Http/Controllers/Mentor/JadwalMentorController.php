<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalKelas;

class JadwalMentorController extends Controller
{
    public function index()
    {
        $groupedSchedules = JadwalKelas::select('jadwal_kelas.*')
            ->join('program', 'jadwal_kelas.program_id', '=', 'program.program_id')
            ->with(['package', 'students'])
            ->where('jadwal_kelas.mentor_id', Auth::user()->mentor_id)
            ->where('jadwal_kelas.status_jadwal', 'active')
            ->orderBy('jadwal_kelas.waktu_belajar', 'asc')
            ->orderByRaw("FIELD(program.tipe_program, 'Privat', 'Semi Privat', 'Reguler')")
            ->orderBy('jadwal_kelas.nama_kelas', 'asc')
            ->get()
            ->groupBy('hari');

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $schedules = collect();
        foreach ($days as $day) {
            $schedules[$day] = $groupedSchedules->get($day, collect());
        }

        return view('mentor.jadwal.daftar', compact('schedules'));
    }
}
