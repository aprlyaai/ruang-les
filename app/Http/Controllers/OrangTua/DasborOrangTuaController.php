<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Murid;
use App\Models\Transaksi;
use App\Models\Pengumuman;

use Carbon\Carbon;

class DasborOrangTuaController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $ortuId = Auth::user()->orangtua_id;

        // 1. Ambil semua anak dan pendaftaran
        $students = Murid::where('orangtua_id', $ortuId)
            ->orderByRaw("CASE WHEN status_murid = 'active' THEN 0 ELSE 1 END")
            ->orderByDesc('murid_id')
            ->get();
        $transactions = Transaksi::with(['student', 'package', 'schedule1', 'schedule2'])
            ->where('orangtua_id', $ortuId)
            ->orderByDesc('transaksi_id')
            ->get();

        $pengumumans = Pengumuman::where('status_pengumuman', true)
            ->whereIn('target_audience', ['Semua', 'Orang Tua'])
            ->orderBy('diprioritaskan', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // State A: Jika belum ada pendaftaran atau belum ada siswa
        if ($students->isEmpty() || $transactions->isEmpty()) {
            // Cek apakah ada pendaftaran yang masih pending di tabel registrations
            $pendingRegistration = \App\Models\Pendaftaran::where('user_id', $userId)
                ->where('status_pendaftaran', 'pending')
                ->first();

            if ($pendingRegistration) {
                return view('orang-tua.dasbor.utama', [
                    'state' => 'B',
                    'students' => collect(),
                    'activeSiswa' => (object)['panggilan_murid' => $pendingRegistration->panggilan_murid],
                    'activePendaftaran' => null,
                    'kuota' => null,
                    'pengumumans' => $pengumumans
                ]);
            }

            return view('orang-tua.dasbor.utama', [
                'state' => 'A',
                'students' => collect(),
                'activeSiswa' => null,
                'activePendaftaran' => null,
                'kuota' => null,
                'pengumumans' => $pengumumans
            ]);
        }

        // 2. Tentukan Active Siswa ID
        $activeStudentId = session('active_student_id');

        // Gunakan murid aktif jika session masih menunjuk data lama/pending.
        $sessionStudent = $activeStudentId
            ? $students->firstWhere('murid_id', $activeStudentId)
            : null;

        if (!$sessionStudent || $sessionStudent->status_murid !== 'active') {
            $activeStudentId = $students->first()->murid_id;
            session(['active_student_id' => $activeStudentId]);
        }

        $activeStudent = $students->firstWhere('murid_id', $activeStudentId);
        $activeTransaction = $transactions->firstWhere('murid_id', $activeStudentId);

        if (!$activeTransaction) {
             return view('orang-tua.dasbor.utama', [
                'state' => 'A',
                'students' => $students,
                'activeSiswa' => $activeStudent,
                'activePendaftaran' => null,
                'kuota' => null,
                'pengumumans' => $pengumumans
            ]);
        }

        // State B: Jika pendaftaran ada tapi statusnya pending
        if ($activeTransaction->status_transaksi === 'pending') {
            return view('orang-tua.dasbor.utama', [
                'state' => 'B',
                'students' => $students,
                'activeSiswa' => $activeStudent,
                'activePendaftaran' => $activeTransaction,
                'kuota' => null,
                'pengumumans' => $pengumumans
            ]);
        }

        // State C: Aktif
        $sisaSesi = $activeStudent->kuota_belajar ?? 0;
        $estimasiHariH = $activeStudent->estimasi_hari_h;

        // Hitung total sesi dari paket
        $totalSesiPaket = $activeTransaction->package->pertemuan ?? 1; // hindari division by zero
        $terpakai = $totalSesiPaket - $sisaSesi;
        if ($terpakai < 0) $terpakai = 0;
        $progressSesi = ($terpakai / $totalSesiPaket) * 100;

        $kuota = (object)[
            'sisa_sesi' => $sisaSesi,
            'total_sesi' => $totalSesiPaket,
            'progress_persen' => min(100, $progressSesi), // Cap at 100% untuk UI
            'estimasi_day_of_week_h' => $estimasiHariH
        ];

        // Data Statistik Akademik
        $attendanceSummary = [
            'Hadir' => $activeStudent->attendances()->where('status_presensi', 'hadir')->count(),
            'Tidak Hadir' => $activeStudent->attendances()->where('status_presensi', 'tidak_hadir')->count(),
            'Libur' => $activeStudent->attendances()->where('status_presensi', 'libur')->count(),
        ];
        $totalAttendance = array_sum($attendanceSummary);

        $recentScores = $activeStudent->scores()->orderBy('created_at', 'desc')->take(5)->get();

        return view('orang-tua.dasbor.utama', [
            'state' => 'C',
            'students' => $students,
            'activeSiswa' => $activeStudent,
            'activePendaftaran' => $activeTransaction,
            'kuota' => $kuota,
            'pengumumans' => $pengumumans,
            'attendanceSummary' => $attendanceSummary,
            'totalAttendance' => $totalAttendance,
            'recentScores' => $recentScores
        ]);
    }
}
