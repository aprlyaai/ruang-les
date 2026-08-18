<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Pengaturan;
use App\Models\Pengguna;
use App\Models\Pendaftaran;
use App\Models\Transaksi;
use App\Models\PesanLayanan;
use App\Models\StatusBacaNotifikasi;
use App\Models\Presensi;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        try {
            // Menyediakan variabel $settings secara global di seluruh views (diambil dari Cache)
            View::share('settings', \Illuminate\Support\Facades\Cache::remember('public.settings', 3600, function () {
                return Pengaturan::pluck('value', 'key');
            }));
        } catch (\Exception $e) {
            // Abaikan error saat database/tabel belum di-migrate (berguna untuk perintah artisan)
        }

        // Mendaftarkan Observers untuk Cache Invalidation
        Pengaturan::observe(\App\Observers\SettingObserver::class);
        \App\Models\Program::observe(\App\Observers\PackageObserver::class);
        \App\Models\Testimoni::observe(\App\Observers\TestimonialObserver::class);
        \App\Models\Faq::observe(\App\Observers\FaqObserver::class);
        \App\Models\Keunggulan::observe(\App\Observers\FeatureObserver::class);
        \App\Models\Galeri::observe(\App\Observers\GalleryObserver::class);

        // ─────────────────────────────────────────────────────────────
        // ADMIN BADGE NOTIFICATION — View Composer
        // ─────────────────────────────────────────────────────────────
        View::composer(['layouts.admin', 'components.admin.sidebar'], function ($view) {
            if (!auth()->check() || auth()->user()->role !== 'admin') {
                $view->with([
                    'badgeUsers'      => 0,
                    'badgeVerifikasi' => 0,
                    'badgePembayaran' => 0,
                    'badgeLayanan'    => 0,
                ]);
                return;
            }

            $adminId = auth()->id();

            // 1. Badge Kelola Pengguna
            $lastSeenUsers = StatusBacaNotifikasi::where('user_id', $adminId)->where('kunci', 'users_last_seen')->value('terakhir_dibaca');
            $badgeUsers = Pengguna::when($lastSeenUsers, fn($q) => $q->where('created_at', '>', $lastSeenUsers))
                ->unless($lastSeenUsers, fn($q) => $q)->count();

            // 2. Badge Verifikasi Pendaftaran
            $badgeVerifikasi = Pendaftaran::where('status_pendaftaran', 'pending')->count();



            // 4. Badge Pembayaran
            $badgePembayaran = Transaksi::where('status_transaksi', 'pending')->count();

            // 5. Badge Layanan (Inbox)
            $badgeLayanan = \App\Models\Layanan::where('status_layanan', 'Open')
                ->orWhereHas('replies', function($q) {
                    $q->where('dibaca_admin', false)
                      ->whereHas('user', function($q2) {
                          $q2->where('role', '!=', 'admin');
                      });
                })->count();

            $view->with(compact(
                'badgeUsers',
                'badgeVerifikasi',
                'badgePembayaran',
                'badgeLayanan'
            ));
        });

        // VIEW COMPOSER UNTUK MENTOR
        View::composer(['layouts.mentor', 'components.mentor.sidebar'], function ($view) {
            if (!auth()->check()) return;
            $mentorUserId = auth()->id();
            $mentorId = auth()->user()->mentor_id;

            // 1. Badge Jadwal Kelas (Tritunggal Teguran + Murid Baru)
            $lastSeenJadwal = StatusBacaNotifikasi::where('user_id', $mentorUserId)->where('kunci', 'mentor_jadwal_last_seen')->value('terakhir_dibaca');

            $badgeJadwal = 0;
            if ($lastSeenJadwal) {
                $badgeJadwal = \Illuminate\Support\Facades\DB::table('jadwal_murid')
                    ->join('jadwal_kelas', 'jadwal_murid.jadwal_id', '=', 'jadwal_kelas.jadwal_id')
                    ->where('jadwal_kelas.mentor_id', $mentorId)
                    ->where('jadwal_murid.created_at', '>', $lastSeenJadwal)
                    ->count();
            }

            // Peringatan Tritunggal (Presensi, Catatan, Nilai Bolong)
            $badgeTeguranTritunggal = Presensi::where('dibuat_oleh', $mentorUserId)
                ->where(function ($query) {
                    $query->where('status_presensi', 'pending') // Presensi kosong
                          ->orWhere(function ($q) {
                              // Catatan kosong
                              $q->where('status_presensi', 'hadir')
                                ->whereNotExists(function ($sub) {
                                    $sub->select(\Illuminate\Support\Facades\DB::raw(1))
                                        ->from('catatan_perkembangan')
                                        ->whereColumn('catatan_perkembangan.murid_id', 'presensi.murid_id')
                                        ->whereColumn('catatan_perkembangan.tanggal_catatan', 'presensi.tanggal_presensi');
                                });
                          })
                          ->orWhere(function ($q) {
                              // Nilai kosong
                              $q->where('status_presensi', 'hadir')
                                ->whereNotExists(function ($sub) {
                                    $sub->select(\Illuminate\Support\Facades\DB::raw(1))
                                        ->from('nilai')
                                        ->whereColumn('nilai.murid_id', 'presensi.murid_id')
                                        ->whereColumn('nilai.tanggal_penilaian', 'presensi.tanggal_presensi');
                                });
                          });
                })->count();

            $badgeJadwalTotal = $badgeJadwal + $badgeTeguranTritunggal;



            // 3. Badge Materi Belajar
            $lastSeenMateri = StatusBacaNotifikasi::where('user_id', $mentorUserId)->where('kunci', 'mentor_materi_last_seen')->value('terakhir_dibaca');
            $badgeMateriMentor = \App\Models\MateriBelajar::when($lastSeenMateri, fn($q) => $q->where('created_at', '>', $lastSeenMateri))->count();

            // 4. Badge Layanan (Inbox Mentor)
            $badgeLayananMentor = \App\Models\Layanan::where('user_id', $mentorUserId)
                ->whereHas('replies', function($q) use ($mentorUserId) {
                    $q->where('dibaca_pengguna', false)->where('user_id', '!=', $mentorUserId);
                })->count();

            $view->with(compact(
                'badgeJadwalTotal', 'badgeMateriMentor', 'badgeLayananMentor'
            ));
        });

        // VIEW COMPOSER UNTUK ORANG TUA
        View::composer(['layouts.orang-tua', 'components.orang-tua.bilah-samping'], function ($view) {
            if (!auth()->check()) return;
            $ortuUserId = auth()->id();
            $ortuId = auth()->user()->orangtua_id;
            $activeStudentId = session('active_student_id');

            $allStudentIds = \App\Models\Murid::where('orangtua_id', $ortuId)->pluck('murid_id')->toArray();

            $badgeJadwalOrtu = 0;
            $badgePresensiOrtu = 0;
            $badgeCatatanOrtu = 0;
            $badgeNilaiOrtu = 0;


            $badgeMateriOrtu = 0;
            $badgeLayananOrtu = 0;
            $badgeTagihanOrtu = 0;
            $badgeRiwayatOrtu = 0;

            $hasOtherChildNotifications = false;

            // Global: Tagihan, Riwayat Transaksi, Layanan, Materi
            $badgeTagihanOrtu = \App\Models\Transaksi::where('orangtua_id', $ortuId)->whereIn('status_transaksi', ['pending', 'rejected'])->count();

            $lastSeenRiwayat = \App\Models\StatusBacaNotifikasi::where('user_id', $ortuUserId)->where('kunci', 'ortu_riwayat_last_seen')->value('terakhir_dibaca');
            $badgeRiwayatOrtu = \App\Models\Transaksi::where('orangtua_id', $ortuId)->where('status_transaksi', 'verified')
                ->when($lastSeenRiwayat, fn($q) => $q->where('updated_at', '>', $lastSeenRiwayat))->count();

            $badgeLayananOrtu = \App\Models\Layanan::where('user_id', $ortuUserId)
                ->whereHas('replies', function($q) use ($ortuUserId) {
                    $q->where('dibaca_pengguna', false)->where('user_id', '!=', $ortuUserId);
                })->count();

            $lastSeenMateri = \App\Models\StatusBacaNotifikasi::where('user_id', $ortuUserId)->where('kunci', 'ortu_materi_last_seen')->value('terakhir_dibaca');
            $badgeMateriOrtu = \App\Models\MateriBelajar::when($lastSeenMateri, fn($q) => $q->where('created_at', '>', $lastSeenMateri))->count();

            // Kalkulasi per anak
            foreach ($allStudentIds as $studentId) {
                $lastSeenJadwal = \App\Models\StatusBacaNotifikasi::where('user_id', $ortuUserId)->where('kunci', 'ortu_jadwal_last_seen_' . $studentId)->value('terakhir_dibaca');
                $lastSeenPresensi = \App\Models\StatusBacaNotifikasi::where('user_id', $ortuUserId)->where('kunci', 'ortu_presensi_last_seen_' . $studentId)->value('terakhir_dibaca');
                $lastSeenCatatan = \App\Models\StatusBacaNotifikasi::where('user_id', $ortuUserId)->where('kunci', 'ortu_catatan_last_seen_' . $studentId)->value('terakhir_dibaca');
                $lastSeenNilai = \App\Models\StatusBacaNotifikasi::where('user_id', $ortuUserId)->where('kunci', 'ortu_nilai_last_seen_' . $studentId)->value('terakhir_dibaca');


                $jadwalCount = \Illuminate\Support\Facades\DB::table('jadwal_murid')
                    ->join('jadwal_kelas', 'jadwal_murid.jadwal_id', '=', 'jadwal_kelas.jadwal_id')
                    ->where('jadwal_murid.murid_id', $studentId)
                    ->when($lastSeenJadwal, fn($q) => $q->where('jadwal_kelas.updated_at', '>', $lastSeenJadwal))->count();

                $presensiCount = \App\Models\Presensi::where('murid_id', $studentId)->where('status_presensi', '!=', 'pending')
                    ->when($lastSeenPresensi, fn($q) => $q->where('updated_at', '>', $lastSeenPresensi))->count();

                $catatanCount = \App\Models\CatatanPerkembangan::where('murid_id', $studentId)
                    ->when($lastSeenCatatan, fn($q) => $q->where('updated_at', '>', $lastSeenCatatan))
                    ->count();

                $nilaiCount = \App\Models\Nilai::where('murid_id', $studentId)
                    ->when($lastSeenNilai, fn($q) => $q->where('updated_at', '>', $lastSeenNilai))
                    ->count();

                $totalNotif = $jadwalCount + $presensiCount + $catatanCount + $nilaiCount;

                if ($studentId == $activeStudentId) {
                    $badgeJadwalOrtu = $jadwalCount;
                    $badgePresensiOrtu = $presensiCount;
                    $badgeCatatanOrtu = $catatanCount;
                    $badgeNilaiOrtu = $nilaiCount;

                } else {
                    if ($totalNotif > 0) {
                        $hasOtherChildNotifications = true;
                    }
                }
            }

            $view->with(compact(
                'badgeJadwalOrtu', 'badgePresensiOrtu', 'badgeCatatanOrtu', 'badgeNilaiOrtu',
                'badgeTagihanOrtu', 'badgeRiwayatOrtu', 'badgeLayananOrtu', 'badgeMateriOrtu',
                'hasOtherChildNotifications', 'allStudentIds'
            ));
        });
    }
}
