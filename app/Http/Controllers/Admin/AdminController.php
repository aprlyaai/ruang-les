<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Transaksi;

class AdminController extends Controller
{
    public function dashboard()
    {
        // 1) Total Pendapatan Bulan Ini
        $totalPendapatan = \App\Models\Transaksi::whereIn('status_transaksi', ['verified', 'lunas', 'sukses'])
            ->whereMonth('created_at', now()->month)
            ->sum('total_pembayaran');

        // 2) Jumlah Pendaftaran Pending
        $pendingRegistrations = \App\Models\Pendaftaran::where('status_pendaftaran', 'pending')->count();

        // 3) Jumlah Kuota Kritis (<= 0)
        $criticalQuota = \App\Models\Murid::where('status_murid', 'active')
            ->where('kuota_belajar', '<=', 0)
            ->count();

        // 4) Jumlah Tiket Layanan Tertunda
        $pendingTickets = \App\Models\Layanan::whereIn('status_layanan', ['Open', 'Pending'])
            ->count();

        // 5) 5 Transaksi Pembayaran Pending terbaru
        $pendingTransactions = \App\Models\Transaksi::with(['user', 'student'])
            ->where('status_transaksi', 'pending')
            ->latest()
            ->take(5)
            ->get();

        // 6) Jadwal Kelas hari ini (Dikembalikan!)
        $todayName = \Carbon\Carbon::now()->translatedFormat('l'); // Senin, Selasa, dst
        $todayDate = now()->format('Y-m-d');

        $todaySchedules = \App\Models\JadwalKelas::with(['mentor', 'package'])
            ->where('hari', $todayName)
            ->get();

        // 7) Pemeriksaan Tritunggal Mentor (Presensi, Catatan, Nilai)
        $attendedScheduleIds = \App\Models\Presensi::whereDate('tanggal_presensi', $todayDate)
            ->pluck('jadwal_id')
            ->toArray();

        $progressNoteScheduleIds = \App\Models\CatatanPerkembangan::whereDate('tanggal_catatan', $todayDate)
            ->pluck('jadwal_id')
            ->toArray();

        $scoreScheduleIds = \App\Models\Nilai::whereDate('tanggal_penilaian', $todayDate)
            ->pluck('jadwal_id')
            ->toArray();

        // Cari jadwal hari ini yang SALAH SATU (atau semua) dari Tritunggal-nya belum diisi
        $incompleteTritunggal = $todaySchedules->filter(function($schedule) use ($attendedScheduleIds, $progressNoteScheduleIds, $scoreScheduleIds) {
            $missing = [];
            if (!in_array($schedule->jadwal_id, $attendedScheduleIds)) {
                $missing[] = 'Presensi';
            }
            if (!in_array($schedule->jadwal_id, $progressNoteScheduleIds)) {
                $missing[] = 'Catatan';
            }
            if (!in_array($schedule->jadwal_id, $scoreScheduleIds)) {
                $missing[] = 'Nilai';
            }

            if (!empty($missing)) {
                $schedule->missing_tasks = $missing;
                return true;
            }
            return false;
        })->take(5);

        // Mempertahankan Data Tren Pendaftaran (6 bulan terakhir)
        $trendData = [];
        $months = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = \Carbon\Carbon::now()->subMonths($i);
            $months[] = $month->translatedFormat('M');
            $count = \App\Models\Pendaftaran::whereYear('created_at', $month->year)
                                ->whereMonth('created_at', $month->month)
                                ->count();
            $trendData[] = $count;
        }

        return view('admin.dasbor.utama', compact(
            'totalPendapatan',
            'pendingRegistrations',
            'criticalQuota',
            'pendingTickets',
            'pendingTransactions',
            'todaySchedules',
            'incompleteTritunggal',
            'trendData',
            'months'
        ));
    }
}
