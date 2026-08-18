<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalKelas;
use App\Models\Transaksi;
use App\Models\Presensi;
use App\Models\CatatanPerkembangan;
use App\Models\Nilai;
use App\Models\Pengumuman;

use Carbon\Carbon;

class DasborMentorController extends Controller
{
    public function index()
    {
        $mentor = Auth::user();
        $hariIni = Carbon::now()->locale('id')->isoFormat('dddd'); // Senin, Selasa, etc.
        $tanggalHariIni = Carbon::today()->toDateString();

        // Cari jadwal mentor hari ini
        $jadwalHariIni = JadwalKelas::with(['students', 'package'])
            ->where('mentor_id', $mentor->mentor_id)
            ->where('hari', $hariIni)
            ->where('status_jadwal', 'active')
            ->orderBy('waktu_belajar')
            ->get();

        $tugasTertunda = 0;
        $detailTugas = [];

        foreach ($jadwalHariIni as $jadwal) {
            foreach ($jadwal->students as $student) {
                $attendance = Presensi::where('murid_id', $student->murid_id)
                    ->where('jadwal_id', $jadwal->jadwal_id)
                    ->whereDate('tanggal_presensi', $tanggalHariIni)
                    ->first();

                $progressNote = CatatanPerkembangan::where('murid_id', $student->murid_id)
                    ->where('jadwal_id', $jadwal->jadwal_id)
                    ->whereDate('tanggal_catatan', $tanggalHariIni)
                    ->first();

                $studentScore = Nilai::where('murid_id', $student->murid_id)
                    ->where('jadwal_id', $jadwal->jadwal_id)
                    ->whereDate('tanggal_penilaian', $tanggalHariIni)
                    ->first();

                $cekPresensi = $attendance ? true : false;
                $cekCatatan = $progressNote ? true : false;
                $cekNilai = $studentScore ? true : false;

                if (!$cekPresensi || !$cekCatatan || !$cekNilai) {
                    $tugasTertunda++;
                    $detailTugas[] = [
                        'siswa' => $student->nama_murid,
                        'jadwal' => $jadwal->hari . ' ' . $jadwal->formatted_time_range,
                        'belum_presensi' => !$cekPresensi,
                        'belum_catatan' => !$cekCatatan,
                        'belum_nilai' => !$cekNilai,
                    ];
                }
            }
        }

        // Total siswa ajar yang aktif mengikuti kelas mentor ini (operational E2E)
        $totalSiswa = \App\Models\Murid::where('status_murid', 'active')
            ->whereHas('classes', function ($query) use ($mentor) {
                $query->where('mentor_id', $mentor->mentor_id)
                      ->where('status_jadwal', 'active');
            })->count();

        // Total sesi diajar dalam sebulan ini (dari tabel presensi, dihitung per sesi kelas unik)
        $totalSesiBulanIni = Presensi::where('dibuat_oleh', $mentor->user_id)
            ->whereMonth('tanggal_presensi', Carbon::now()->month)
            ->whereYear('tanggal_presensi', Carbon::now()->year)
            ->groupBy('jadwal_id', 'tanggal_presensi')
            ->select('jadwal_id', 'tanggal_presensi')
            ->get()
            ->count();

        // Pengumuman
        $pengumumans = Pengumuman::where('status_pengumuman', true)
            ->whereIn('target_audience', ['Semua', 'Mentor'])
            ->orderBy('diprioritaskan', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mentor.dasbor.utama', compact('jadwalHariIni', 'tugasTertunda', 'detailTugas', 'totalSiswa', 'totalSesiBulanIni', 'pengumumans'));
    }
}
