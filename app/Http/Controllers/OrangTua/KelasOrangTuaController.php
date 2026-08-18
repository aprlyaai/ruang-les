<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StatusBacaNotifikasi;
use App\Models\Murid;
use App\Models\JadwalKelas;
use App\Models\Presensi;
use App\Models\CatatanPerkembangan;
use App\Models\Nilai;

class KelasOrangTuaController extends Controller
{
    private function resetBadge($keyPrefix)
    {
        $ortuId = Auth::id();
        $studentId = session('active_student_id');
        $oldLastReadAt = null;

        if ($studentId) {
            $record = StatusBacaNotifikasi::where('user_id', $ortuId)->where('kunci', $keyPrefix . '_' . $studentId)->first();
            if ($record) {
                $oldLastReadAt = $record->terakhir_dibaca;
            }

            StatusBacaNotifikasi::updateOrCreate(
                ['user_id' => $ortuId, 'kunci' => $keyPrefix . '_' . $studentId],
                ['terakhir_dibaca' => now()]
            );
        }
        return ['murid_id' => $studentId, 'last_seen' => $oldLastReadAt];
    }

    public function jadwal()
    {
        $badgeData = $this->resetBadge('ortu_jadwal_last_seen');
        $studentId = $badgeData['murid_id'];
        $lastSeen = $badgeData['last_seen'];

        $groupedSchedules = JadwalKelas::select('jadwal_kelas.*')
            ->join('program', 'jadwal_kelas.program_id', '=', 'program.program_id')
            ->whereHas('students', function($q) use ($studentId) {
                $q->where('murid.murid_id', $studentId);
            })
            ->with(['mentor.user', 'package'])
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

        return view('orang-tua.kelas.jadwal', compact('schedules', 'lastSeen'));
    }

    public function bukuAkademik()
    {
        $badgeData = $this->resetBadge('ortu_buku_akademik_last_seen');
        $studentId = $badgeData['murid_id'];

        $student = Murid::with(['parent.user'])
            ->where('orangtua_id', Auth::user()->orangtua_id)
            ->find($studentId);
        if (!$student) {
            return redirect()->route('dashboard')->with('error', 'Silakan pilih profil anak terlebih dahulu.');
        }

        // Fetch active schedules for this student to show in the profile header
        $schedules = JadwalKelas::whereHas('students', function($q) use ($studentId) {
                $q->where('murid.murid_id', $studentId);
            })
            ->with(['mentor.user', 'package'])
            ->where('status_jadwal', 'active')
            ->orderByRaw("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu')")
            ->get();

        // Fetch all attendances (Presensi)
        $attendances = Presensi::with(['schedule.package', 'schedule.mentor.user'])
            ->where('murid_id', $studentId)
            ->where('status_presensi', '!=', 'pending')
            ->orderBy('tanggal_presensi', 'desc')
            ->get();

        // Fetch Progress Notes (Catatan)
        $notes = CatatanPerkembangan::with(['schedule.package', 'mentor.user'])
            ->where('murid_id', $studentId)
            ->orderBy('tanggal_catatan', 'desc')
            ->get();

        // Fetch Scores (Nilai)
        $scores = Nilai::with(['schedule.package', 'schedule.mentor.user'])
            ->where('murid_id', $studentId)
            ->orderBy('tanggal_penilaian', 'desc')
            ->get();

        return view('orang-tua.kelas.buku-akademik', compact('student', 'schedules', 'attendances', 'notes', 'scores'));
    }
}
