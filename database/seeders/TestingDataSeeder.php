<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Models\Pengguna;
use App\Models\OrangTua;
use App\Models\Murid;
use App\Models\Mentor;
use App\Models\Program;
use App\Models\JadwalKelas;
use App\Models\Pendaftaran;
use App\Models\Transaksi;
use App\Models\Presensi;
use App\Models\CatatanPerkembangan;
use App\Models\Nilai;
use App\Models\MateriBelajar;
use App\Models\Pengumuman;
use App\Models\Layanan;
use App\Models\PesanLayanan;
use Carbon\Carbon;

class TestingDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        // =========================================================
        // 1. CLEANUP OPERATIONAL DATA
        // =========================================================
        // Ambil ID pengguna orang tua yang lama untuk dibersihkan secara total
        $oldParentUserIds = Pengguna::where('role', 'orang_tua')->pluck('user_id');
        OrangTua::whereIn('user_id', $oldParentUserIds)->delete();
        Pengguna::whereIn('user_id', $oldParentUserIds)->forceDelete();

        // Bersihkan seluruh data operasional untuk pengetesan bersih
        DB::table('status_baca_notifikasi')->truncate();
        DB::table('pesan_layanan')->truncate();
        DB::table('layanan')->truncate();
        DB::table('nilai')->truncate();
        DB::table('catatan_perkembangan')->truncate();
        DB::table('presensi')->truncate();
        DB::table('transaksi')->truncate();
        DB::table('jadwal_murid')->truncate();
        DB::table('pendaftaran')->truncate();
        DB::table('materi_belajar')->truncate();
        DB::table('pengumuman')->truncate();
        
        // Murid dihapus langsung lewat query builder
        DB::table('murid')->delete();

        // Kembalikan counter kuota murid di jadwal_kelas ke 0
        DB::table('jadwal_kelas')->update(['jumlah_murid' => 0]);

        Schema::enableForeignKeyConstraints();

        // =========================================================
        // 2. MENTOR & ADMIN REFERENCES
        // =========================================================
        $admin = Pengguna::where('role', 'admin')->first();
        if (!$admin) {
            $admin = Pengguna::create([
                'name' => 'Admin Ruang Les',
                'email' => 'admin@ruangles.com',
                'password' => Hash::make('admin12345'),
                'role' => 'admin',
            ]);
        }

        $mentorIsma = Pengguna::where('email', 'ismaturrohmah02@gmail.com')->first();
        $mentorJuly = Pengguna::where('email', 'missjuly@ruangles.com')->first();
        $mentorRizky = Pengguna::where('email', 'muhrizkyramadhann7@gmail.com')->first();

        $ismaMentorId = $mentorIsma?->mentor_id;
        $julyMentorId = $mentorJuly?->mentor_id;
        $rizkyMentorId = $mentorRizky?->mentor_id;

        // =========================================================
        // 3. PROGRAM & SCHEDULE REFERENCES
        // =========================================================
        $pkgPrivat13RL = Program::where('nama_program', 'Ruang Privat')->where('kelas_program', 'Kelas 1-3 SD')->where('lokasi_belajar', 'Ruang Les')->value('program_id');
        $pkgPrivat46RM = Program::where('nama_program', 'Ruang Privat')->where('kelas_program', 'Kelas 4-6 SD')->where('lokasi_belajar', 'Rumah Murid')->value('program_id');
        $pkgSemiPrivat13 = Program::where('nama_program', 'Ruang Semi Privat')->where('kelas_program', 'Kelas 1-3 SD')->value('program_id');
        $pkgSemiPrivat46 = Program::where('nama_program', 'Ruang Semi Privat')->where('kelas_program', 'Kelas 4-6 SD')->value('program_id');
        $pkgReguler = Program::where('nama_program', 'Ruang Reguler')->value('program_id');

        // Mengambil jadwal kelas spesifik untuk relasi siswa
        $schedulePrivat13 = JadwalKelas::where('nama_kelas', 'P.3')->first(); // Jumat & Sabtu
        $schedulePrivat46 = JadwalKelas::where('nama_kelas', 'P.6')->first(); // Selasa & Kamis
        $scheduleSemi13 = JadwalKelas::where('nama_kelas', 'SP.1')->first();   // Kamis & Jumat
        $scheduleSemi46 = JadwalKelas::where('nama_kelas', 'SP.5')->first();   // Senin, Selasa, Rabu, Jumat
        $scheduleReguler = JadwalKelas::where('nama_kelas', 'R.6')->first();    // Senin & Kamis

        $now = Carbon::now();

        // =====================================================================
        // SKENARIO 1: ALUR SUKSES PENUH (ACTIVE & VERIFIED - BUDI SANTOSO)
        // =====================================================================
        $userBudi = Pengguna::create([
            'name' => 'Budi Santoso',
            'email' => 'wali.budi@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'orang_tua',
        ]);
        $profileBudi = OrangTua::create([
            'user_id' => $userBudi->user_id,
            'alamat_domisili' => 'Jl. Margonda Raya No. 100, Depok',
            'no_telepon_orangtua' => '081234567890',
            'status_hubungan' => 'Ayah',
        ]);

        $muridAditya = Murid::create([
            'orangtua_id' => $profileBudi->orangtua_id,
            'nama_murid' => 'Aditya Santoso',
            'panggilan_murid' => 'Adit',
            'tempat_lahir_murid' => 'Depok',
            'tanggal_lahir_murid' => '2016-04-12',
            'jenis_kelamin_murid' => 'Laki-laki',
            'agama' => 'Islam',
            'sekolah' => 'SDN Pondok Cina 1',
            'kelas' => '4',
            'nilai_rata_rata' => 85.5,
            'mapel_ditingkatkan' => 'Matematika',
            'mapel_sulit' => 'Matematika Soal Cerita',
            'karakteristik_anak' => 'Aktif, suka bertanya, butuh pengulangan pada konsep pembagian.',
            'kuota_belajar' => 5, // Awal 8 sesi, sudah terpakai 3 sesi
            'status_murid' => 'active',
        ]);

        // Hubungkan ke jadwal kelas Privat Kelas 4-6 SD (P.6)
        if ($schedulePrivat46) {
            DB::table('jadwal_murid')->insert([
                'jadwal_id' => $schedulePrivat46->jadwal_id,
                'murid_id' => $muridAditya->murid_id,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $schedulePrivat46->increment('jumlah_murid');
        }

        // Pendaftaran disetujui (Approved)
        Pendaftaran::create([
            'user_id' => $userBudi->user_id,
            'nama_murid' => 'Aditya Santoso',
            'panggilan_murid' => 'Adit',
            'tempat_lahir_murid' => 'Depok',
            'tanggal_lahir_murid' => '2016-04-12',
            'jenis_kelamin_murid' => 'Laki-laki',
            'agama' => 'Islam',
            'sekolah' => 'SDN Pondok Cina 1',
            'kelas' => '4',
            'nilai_rata_rata' => 85.5,
            'mapel_ditingkatkan' => 'Matematika',
            'mapel_sulit' => 'Matematika Soal Cerita',
            'karakteristik_anak' => 'Aktif, suka bertanya, butuh pengulangan pada konsep pembagian.',
            'nama_orangtua' => 'Budi Santoso',
            'status_hubungan' => 'Ayah',
            'no_telepon_orangtua' => '081234567890',
            'email_orangtua' => 'wali.budi@gmail.com',
            'alamat_domisili' => 'Jl. Margonda Raya No. 100, Depok',
            'program_id' => $pkgPrivat46RM,
            'jadwal_1_id' => $schedulePrivat46?->jadwal_id,
            'jadwal_2_id' => $schedulePrivat46?->jadwal_id,
            'bukti_bayar' => 'bukti_pendaftaran/bukti_budi.jpg',
            'status_pendaftaran' => 'approved',
            'created_at' => $now->copy()->subDays(12),
        ]);

        // Transaksi Lunas
        Transaksi::create([
            'no_invoice' => 'INV-RL/20260810/0001',
            'orangtua_id' => $profileBudi->orangtua_id,
            'murid_id' => $muridAditya->murid_id,
            'program_id' => $pkgPrivat46RM,
            'jadwal_1_id' => $schedulePrivat46?->jadwal_id,
            'total_pembayaran' => 800000,
            'bukti_pembayaran' => 'payment_proofs/bukti_budi_lunas.jpg',
            'status_transaksi' => 'verified',
            'diverifikasi_oleh' => $admin->user_id,
            'diverifikasi_pada' => $now->copy()->subDays(10),
            'created_at' => $now->copy()->subDays(10),
        ]);

        // Presensi (3 Sesi)
        $datesAditya = [
            $now->copy()->subDays(9)->format('Y-m-d'),
            $now->copy()->subDays(7)->format('Y-m-d'),
            $now->copy()->subDays(2)->format('Y-m-d'),
        ];
        
        foreach ($datesAditya as $idx => $date) {
            Presensi::create([
                'murid_id' => $muridAditya->murid_id,
                'jadwal_id' => $schedulePrivat46?->jadwal_id,
                'tanggal_presensi' => $date,
                'status_presensi' => 'hadir',
                'notes_presensi' => 'Hadir dan mengikuti kelas privat dengan baik.',
                'dibuat_oleh' => $mentorIsma?->user_id,
            ]);
        }

        // Catatan Perkembangan (3 Sesi)
        CatatanPerkembangan::create([
            'murid_id' => $muridAditya->murid_id,
            'jadwal_id' => $schedulePrivat46?->jadwal_id,
            'mentor_id' => $ismaMentorId,
            'tanggal_catatan' => $datesAditya[0],
            'materi' => 'Konsep Dasar Pecahan Desimal',
            'skor_pemahaman' => 80,
            'status_fokus' => 'sangat_fokus',
            'catatan_perkembangan' => 'Aditya sangat bersemangat pada sesi pertama ini. Memahami konsep desimal dasar dengan visualisasi gambar kue.',
        ]);

        CatatanPerkembangan::create([
            'murid_id' => $muridAditya->murid_id,
            'jadwal_id' => $schedulePrivat46?->jadwal_id,
            'mentor_id' => $ismaMentorId,
            'tanggal_catatan' => $datesAditya[1],
            'materi' => 'Perkalian Pecahan Desimal',
            'skor_pemahaman' => 85,
            'status_fokus' => 'fokus',
            'catatan_perkembangan' => 'Aditya sudah lancar melakukan perkalian angka desimal satu angka di belakang koma. Sedikit tersendat di perkalian dua digit.',
        ]);

        CatatanPerkembangan::create([
            'murid_id' => $muridAditya->murid_id,
            'jadwal_id' => $schedulePrivat46?->jadwal_id,
            'mentor_id' => $ismaMentorId,
            'tanggal_catatan' => $datesAditya[2],
            'materi' => 'Pecahan Campuran & Penyederhanaan',
            'skor_pemahaman' => 75,
            'status_fokus' => 'kurang_fokus',
            'catatan_perkembangan' => 'Aditya agak lelah pada sesi hari ini karena baru pulang sekolah sore. Butuh bimbingan berulang untuk menyederhanakan pecahan.',
        ]);

        // Nilai Akademik
        Nilai::create([
            'murid_id' => $muridAditya->murid_id,
            'jadwal_id' => $schedulePrivat46?->jadwal_id,
            'tanggal_penilaian' => $datesAditya[1],
            'tipe_nilai' => 'Tugas',
            'materi_nilai' => 'Latihan Perkalian Desimal',
            'skor_nilai' => 85,
            'notes_nilai' => 'Berhasil menjawab 8 dari 10 pertanyaan secara mandiri.',
        ]);

        Nilai::create([
            'murid_id' => $muridAditya->murid_id,
            'jadwal_id' => $schedulePrivat46?->jadwal_id,
            'tanggal_penilaian' => $datesAditya[2],
            'tipe_nilai' => 'Kuis',
            'materi_nilai' => 'Pecahan Campuran Dasar',
            'skor_nilai' => 78,
            'notes_nilai' => 'Perlu lebih teliti dalam menghitung hasil akhir penyederhanaan.',
        ]);

        // Tiket Bantuan (Closed)
        $ticketAdit = Layanan::create([
            'no_ticket' => 'TKT-RL/20260812/0001',
            'user_id' => $userBudi->user_id,
            'kategori_layanan' => 'Akademik',
            'subject_layanan' => 'Tanya Jadwal Pengganti Sesi Aditya',
            'status_layanan' => 'Closed',
        ]);
        PesanLayanan::create([
            'layanan_id' => $ticketAdit->layanan_id,
            'user_id' => $userBudi->user_id,
            'pesan' => 'Selamat pagi admin, apakah jadwal les Aditya hari Selasa depan bisa dimajukan ke jam 15:00 karena ada acara keluarga?',
            'dibaca_admin' => true,
            'dibaca_pengguna' => true,
            'created_at' => $now->copy()->subDays(8),
        ]);
        PesanLayanan::create([
            'layanan_id' => $ticketAdit->layanan_id,
            'user_id' => $admin->user_id,
            'pesan' => 'Selamat pagi Bapak Budi. Untuk perubahan jadwal privat, silakan berkoordinasi langsung dengan mentor Kak Ismaturrohmah terlebih dahulu. Jika disetujui, mentor akan merubah jadwalnya di sistem.',
            'dibaca_admin' => true,
            'dibaca_pengguna' => true,
            'created_at' => $now->copy()->subDays(8)->addHour(),
        ]);
        PesanLayanan::create([
            'layanan_id' => $ticketAdit->layanan_id,
            'user_id' => $userBudi->user_id,
            'pesan' => 'Baik admin, terima kasih banyak atas penjelasannya. Saya akan hubungi Kak Isma.',
            'dibaca_admin' => true,
            'dibaca_pengguna' => true,
            'created_at' => $now->copy()->subDays(7),
        ]);


        // =====================================================================
        // SKENARIO 2: ALUR KUOTA KRITIS & TAGIHAN BELUM DIBAYAR (DEWI LESTARI)
        // =====================================================================
        $userDewi = Pengguna::create([
            'name' => 'Dewi Lestari',
            'email' => 'wali.dewi@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'orang_tua',
        ]);
        $profileDewi = OrangTua::create([
            'user_id' => $userDewi->user_id,
            'alamat_domisili' => 'Perumahan Depok Indah Blok C No. 5, Depok',
            'no_telepon_orangtua' => '081298765432',
            'status_hubungan' => 'Ibu',
        ]);

        $muridRian = Murid::create([
            'orangtua_id' => $profileDewi->orangtua_id,
            'nama_murid' => 'Rian Hidayat',
            'panggilan_murid' => 'Rian',
            'tempat_lahir_murid' => 'Jakarta',
            'tanggal_lahir_murid' => '2015-09-18',
            'jenis_kelamin_murid' => 'Laki-laki',
            'agama' => 'Islam',
            'sekolah' => 'SDN Pondok Cina 3',
            'kelas' => '5',
            'nilai_rata_rata' => 72.0,
            'mapel_ditingkatkan' => 'IPA',
            'mapel_sulit' => 'Sistem Pencernaan & Tata Surya',
            'karakteristik_anak' => 'Pendiam, pemalu, butuh diajak bicara lebih aktif oleh mentor.',
            'kuota_belajar' => 0, // Kuota habis (0) - memicu notifikasi peringatan
            'status_murid' => 'active',
        ]);

        if ($scheduleSemi46) {
            DB::table('jadwal_murid')->insert([
                'jadwal_id' => $scheduleSemi46->jadwal_id,
                'murid_id' => $muridRian->murid_id,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $scheduleSemi46->increment('jumlah_murid');
        }

        // Pendaftaran disetujui (Approved)
        Pendaftaran::create([
            'user_id' => $userDewi->user_id,
            'nama_murid' => 'Rian Hidayat',
            'panggilan_murid' => 'Rian',
            'tempat_lahir_murid' => 'Jakarta',
            'tanggal_lahir_murid' => '2015-09-18',
            'jenis_kelamin_murid' => 'Laki-laki',
            'agama' => 'Islam',
            'sekolah' => 'SDN Pondok Cina 3',
            'kelas' => '5',
            'nilai_rata_rata' => 72.0,
            'mapel_ditingkatkan' => 'IPA',
            'mapel_sulit' => 'Sistem Pencernaan & Tata Surya',
            'karakteristik_anak' => 'Pendiam, pemalu, butuh diajak bicara lebih aktif oleh mentor.',
            'nama_orangtua' => 'Dewi Lestari',
            'status_hubungan' => 'Ibu',
            'no_telepon_orangtua' => '081298765432',
            'email_orangtua' => 'wali.dewi@gmail.com',
            'alamat_domisili' => 'Perumahan Depok Indah Blok C No. 5, Depok',
            'program_id' => $pkgSemiPrivat46,
            'jadwal_1_id' => $scheduleSemi46?->jadwal_id,
            'jadwal_2_id' => $scheduleSemi46?->jadwal_id,
            'bukti_bayar' => 'bukti_pendaftaran/bukti_dewi.jpg',
            'status_pendaftaran' => 'approved',
            'created_at' => $now->copy()->subDays(32),
        ]);

        // Transaksi 1 (Lunas Masa Lalu)
        Transaksi::create([
            'no_invoice' => 'INV-RL/20260720/0001',
            'orangtua_id' => $profileDewi->orangtua_id,
            'murid_id' => $muridRian->murid_id,
            'program_id' => $pkgSemiPrivat46,
            'jadwal_1_id' => $scheduleSemi46?->jadwal_id,
            'total_pembayaran' => 240000,
            'bukti_pembayaran' => 'payment_proofs/bukti_dewi_lunas.jpg',
            'status_transaksi' => 'verified',
            'diverifikasi_oleh' => $admin->user_id,
            'diverifikasi_pada' => $now->copy()->subDays(30),
            'created_at' => $now->copy()->subDays(30),
        ]);

        // Transaksi 2 (Tagihan Baru Pending - Belum Bayar/Upload Bukti)
        Transaksi::create([
            'no_invoice' => 'INV-RL/20260819/0001',
            'orangtua_id' => $profileDewi->orangtua_id,
            'murid_id' => $muridRian->murid_id,
            'program_id' => $pkgSemiPrivat46,
            'jadwal_1_id' => $scheduleSemi46?->jadwal_id,
            'total_pembayaran' => 240000,
            'bukti_pembayaran' => null,
            'status_transaksi' => 'pending',
            'created_at' => $now->copy()->subDays(1),
        ]);

        // Simulasikan 8 Kali Hadir sehingga Kuota Habis
        for ($i = 1; $i <= 8; $i++) {
            Presensi::create([
                'murid_id' => $muridRian->murid_id,
                'jadwal_id' => $scheduleSemi46?->jadwal_id,
                'tanggal_presensi' => $now->copy()->subDays(25 - ($i * 2))->format('Y-m-d'),
                'status_presensi' => 'hadir',
                'notes_presensi' => 'Rian hadir tepat waktu.',
                'dibuat_oleh' => $mentorIsma?->user_id,
            ]);
        }

        // Tiket Bantuan Aktif (Open)
        $ticketDewi = Layanan::create([
            'no_ticket' => 'TKT-RL/20260820/0001',
            'user_id' => $userDewi->user_id,
            'kategori_layanan' => 'Pembayaran',
            'subject_layanan' => 'Pertanyaan Metode Pembayaran GoPay/ShopeePay',
            'status_layanan' => 'Open',
        ]);
        PesanLayanan::create([
            'layanan_id' => $ticketDewi->layanan_id,
            'user_id' => $userDewi->user_id,
            'pesan' => 'Halo admin, saya baru saja mendapatkan tagihan perpanjangan les untuk Rian Hidayat. Apakah pembayarannya bisa melalui GoPay atau ShopeePay?',
            'dibaca_admin' => false,
            'dibaca_pengguna' => true,
            'created_at' => $now->copy()->subMinutes(30),
        ]);


        // =====================================================================
        // SKENARIO 3: ALUR MENUNGGU VERIFIKASI PEMBAYARAN (BAMBANG WIJAYA)
        // =====================================================================
        $userBambang = Pengguna::create([
            'name' => 'Bambang Wijaya',
            'email' => 'wali.bambang@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'orang_tua',
        ]);
        $profileBambang = OrangTua::create([
            'user_id' => $userBambang->user_id,
            'alamat_domisili' => 'Jl. Kartini No. 45, Depok',
            'no_telepon_orangtua' => '081345678901',
            'status_hubungan' => 'Ayah',
        ]);

        $muridSiti = Murid::create([
            'orangtua_id' => $profileBambang->orangtua_id,
            'nama_murid' => 'Siti Wijaya',
            'panggilan_murid' => 'Siti',
            'tempat_lahir_murid' => 'Depok',
            'tanggal_lahir_murid' => '2018-07-22',
            'jenis_kelamin_murid' => 'Perempuan',
            'agama' => 'Islam',
            'sekolah' => 'SDN Depok Baru 2',
            'kelas' => '2',
            'nilai_rata_rata' => 90.0,
            'mapel_ditingkatkan' => 'Calistung',
            'mapel_sulit' => 'Menulis sambung',
            'karakteristik_anak' => 'Cepat paham, ceria, senang menggambar setelah selesai menulis.',
            'kuota_belajar' => 1, // Kritis sisa 1 pertemuan
            'status_murid' => 'active',
        ]);

        if ($schedulePrivat13) {
            DB::table('jadwal_murid')->insert([
                'jadwal_id' => $schedulePrivat13->jadwal_id,
                'murid_id' => $muridSiti->murid_id,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $schedulePrivat13->increment('jumlah_murid');
        }

        // Pendaftaran disetujui (Approved)
        Pendaftaran::create([
            'user_id' => $userBambang->user_id,
            'nama_murid' => 'Siti Wijaya',
            'panggilan_murid' => 'Siti',
            'tempat_lahir_murid' => 'Depok',
            'tanggal_lahir_murid' => '2018-07-22',
            'jenis_kelamin_murid' => 'Perempuan',
            'agama' => 'Islam',
            'sekolah' => 'SDN Depok Baru 2',
            'kelas' => '2',
            'nilai_rata_rata' => 90.0,
            'mapel_ditingkatkan' => 'Calistung',
            'mapel_sulit' => 'Menulis sambung',
            'karakteristik_anak' => 'Cepat paham, ceria, senang menggambar setelah selesai menulis.',
            'nama_orangtua' => 'Bambang Wijaya',
            'status_hubungan' => 'Ayah',
            'no_telepon_orangtua' => '081345678901',
            'email_orangtua' => 'wali.bambang@gmail.com',
            'alamat_domisili' => 'Jl. Kartini No. 45, Depok',
            'program_id' => $pkgPrivat13RL,
            'jadwal_1_id' => $schedulePrivat13?->jadwal_id,
            'jadwal_2_id' => $schedulePrivat13?->jadwal_id,
            'bukti_bayar' => 'bukti_pendaftaran/bukti_bambang.jpg',
            'status_pendaftaran' => 'approved',
            'created_at' => $now->copy()->subDays(32),
        ]);

        // Transaksi Lunas Pertama
        Transaksi::create([
            'no_invoice' => 'INV-RL/20260715/0001',
            'orangtua_id' => $profileBambang->orangtua_id,
            'murid_id' => $muridSiti->murid_id,
            'program_id' => $pkgPrivat13RL,
            'jadwal_1_id' => $schedulePrivat13?->jadwal_id,
            'total_pembayaran' => 440000,
            'bukti_pembayaran' => 'payment_proofs/bukti_bambang_lunas.jpg',
            'status_transaksi' => 'verified',
            'diverifikasi_oleh' => $admin->user_id,
            'diverifikasi_pada' => $now->copy()->subDays(30),
            'created_at' => $now->copy()->subDays(30),
        ]);

        // Transaksi Kedua (Upload Bukti - Menunggu Verifikasi Admin)
        Transaksi::create([
            'no_invoice' => 'INV-RL/20260820/0002',
            'orangtua_id' => $profileBambang->orangtua_id,
            'murid_id' => $muridSiti->murid_id,
            'program_id' => $pkgPrivat13RL,
            'jadwal_1_id' => $schedulePrivat13?->jadwal_id,
            'total_pembayaran' => 440000,
            'bukti_pembayaran' => 'payment_proofs/bukti_bambang_pending.jpg',
            'status_transaksi' => 'pending', // Pending dengan bukti bayar terlampir
            'created_at' => $now->copy()->subHours(2),
        ]);

        // Simulasikan 7 Kali Pertemuan Hadir
        for ($i = 1; $i <= 7; $i++) {
            Presensi::create([
                'murid_id' => $muridSiti->murid_id,
                'jadwal_id' => $schedulePrivat13?->jadwal_id,
                'tanggal_presensi' => $now->copy()->subDays(28 - ($i * 3))->format('Y-m-d'),
                'status_presensi' => 'hadir',
                'notes_presensi' => 'Siti hadir tepat waktu.',
                'dibuat_oleh' => $mentorJuly?->user_id,
            ]);
        }


        // =====================================================================
        // SKENARIO 4: ALUR PENDAFTARAN BARU PENDING APPROVAL (FITRI HANDAYANI)
        // =====================================================================
        $userFitri = Pengguna::create([
            'name' => 'Fitri Handayani',
            'email' => 'wali.fitri@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'orang_tua',
        ]);

        Pendaftaran::create([
            'user_id' => $userFitri->user_id,
            'nama_murid' => 'Fajar Pratama',
            'panggilan_murid' => 'Fajar',
            'tempat_lahir_murid' => 'Depok',
            'tanggal_lahir_murid' => '2017-05-15',
            'jenis_kelamin_murid' => 'Laki-laki',
            'agama' => 'Islam',
            'sekolah' => 'SDIT Al-Hikmah',
            'kelas' => '3',
            'nilai_rata_rata' => 82.0,
            'mapel_ditingkatkan' => 'Matematika',
            'mapel_sulit' => 'Bahasa Inggris',
            'karakteristik_anak' => 'Sangat aktif bergerak, menyukai pembelajaran berbasis gambar atau permainan.',
            'nama_orangtua' => 'Fitri Handayani',
            'status_hubungan' => 'Ibu',
            'no_telepon_orangtua' => '081399887766',
            'email_orangtua' => 'wali.fitri@gmail.com',
            'alamat_domisili' => 'Jl. Nusantara No. 12, Depok',
            'program_id' => $pkgReguler,
            'jadwal_1_id' => $scheduleReguler?->jadwal_id,
            'jadwal_2_id' => $scheduleReguler?->jadwal_id,
            'bukti_bayar' => 'bukti_pendaftaran/bukti_fitri.jpg',
            'status_pendaftaran' => 'pending', // Menunggu persetujuan di admin
            'created_at' => $now->copy()->subHours(4),
        ]);


        // =====================================================================
        // SKENARIO 5: ALUR PENDAFTARAN DITOLAK (EKO PRASETYO)
        // =====================================================================
        $userEko = Pengguna::create([
            'name' => 'Eko Prasetyo',
            'email' => 'wali.eko@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'orang_tua',
        ]);

        Pendaftaran::create([
            'user_id' => $userEko->user_id,
            'nama_murid' => 'Bagas Pratama',
            'panggilan_murid' => 'Bagas',
            'tempat_lahir_murid' => 'Jakarta',
            'tanggal_lahir_murid' => '2015-08-20',
            'jenis_kelamin_murid' => 'Laki-laki',
            'agama' => 'Islam',
            'sekolah' => 'SDN Sawangan 1',
            'kelas' => '5',
            'nilai_rata_rata' => 70.0,
            'mapel_ditingkatkan' => 'IPA',
            'mapel_sulit' => 'Matematika',
            'karakteristik_anak' => 'Mudah bosan, butuh suasana belajar yang tenang.',
            'nama_orangtua' => 'Eko Prasetyo',
            'status_hubungan' => 'Ayah',
            'no_telepon_orangtua' => '085611223344',
            'email_orangtua' => 'wali.eko@gmail.com',
            'alamat_domisili' => 'Jl. Sawangan No. 8, Depok',
            'program_id' => $pkgSemiPrivat46,
            'jadwal_1_id' => $scheduleSemi46?->jadwal_id,
            'jadwal_2_id' => $scheduleSemi46?->jadwal_id,
            'bukti_bayar' => null,
            'status_pendaftaran' => 'rejected', // Pendaftaran ditolak
            'alasan_penolakan' => 'Mohon maaf, kelas Semi Privat untuk jadwal yang dipilih sudah penuh (overcapacity). Silakan mendaftar kembali dengan memilih jadwal lain atau program reguler.',
            'created_at' => $now->copy()->subDays(5),
        ]);


        // =====================================================================
        // SKENARIO 6: BUKTI TRANSAKSI DITOLAK (SANTI SUSANTI)
        // =====================================================================
        $userSanti = Pengguna::create([
            'name' => 'Santi Susanti',
            'email' => 'wali.santi@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'orang_tua',
        ]);
        $profileSanti = OrangTua::create([
            'user_id' => $userSanti->user_id,
            'alamat_domisili' => 'Jl. Beji No. 34, Depok',
            'no_telepon_orangtua' => '085755667788',
            'status_hubungan' => 'Ibu',
        ]);

        $muridDian = Murid::create([
            'orangtua_id' => $profileSanti->orangtua_id,
            'nama_murid' => 'Dian Saputra',
            'panggilan_murid' => 'Dian',
            'tempat_lahir_murid' => 'Depok',
            'tanggal_lahir_murid' => '2014-11-03',
            'jenis_kelamin_murid' => 'Laki-laki',
            'agama' => 'Islam',
            'sekolah' => 'SDN Beji 1',
            'kelas' => '6',
            'nilai_rata_rata' => 88.0,
            'mapel_ditingkatkan' => 'IPA',
            'mapel_sulit' => 'Fisika dasar & gaya gravitasi',
            'karakteristik_anak' => 'Suka berdiskusi, kritis, pintar bercerita tentang hobinya.',
            'kuota_belajar' => 2, // Sisa 2 pertemuan
            'status_murid' => 'active',
        ]);

        if ($scheduleReguler) {
            DB::table('jadwal_murid')->insert([
                'jadwal_id' => $scheduleReguler->jadwal_id,
                'murid_id' => $muridDian->murid_id,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $scheduleReguler->increment('jumlah_murid');
        }

        // Pendaftaran disetujui (Approved)
        Pendaftaran::create([
            'user_id' => $userSanti->user_id,
            'nama_murid' => 'Dian Saputra',
            'panggilan_murid' => 'Dian',
            'tempat_lahir_murid' => 'Depok',
            'tanggal_lahir_murid' => '2014-11-03',
            'jenis_kelamin_murid' => 'Laki-laki',
            'agama' => 'Islam',
            'sekolah' => 'SDN Beji 1',
            'kelas' => '6',
            'nilai_rata_rata' => 88.0,
            'mapel_ditingkatkan' => 'IPA',
            'mapel_sulit' => 'Fisika dasar & gaya gravitasi',
            'karakteristik_anak' => 'Suka berdiskusi, kritis, pintar bercerita tentang hobinya.',
            'nama_orangtua' => 'Santi Susanti',
            'status_hubungan' => 'Ibu',
            'no_telepon_orangtua' => '085755667788',
            'email_orangtua' => 'wali.santi@gmail.com',
            'alamat_domisili' => 'Jl. Beji No. 34, Depok',
            'program_id' => $pkgReguler,
            'jadwal_1_id' => $scheduleReguler?->jadwal_id,
            'jadwal_2_id' => $scheduleReguler?->jadwal_id,
            'bukti_bayar' => 'bukti_pendaftaran/bukti_santi.jpg',
            'status_pendaftaran' => 'approved',
            'created_at' => $now->copy()->subDays(27),
        ]);

        // Transaksi Lunas Awal
        Transaksi::create([
            'no_invoice' => 'INV-RL/20260718/0001',
            'orangtua_id' => $profileSanti->orangtua_id,
            'murid_id' => $muridDian->murid_id,
            'program_id' => $pkgReguler,
            'jadwal_1_id' => $scheduleReguler?->jadwal_id,
            'total_pembayaran' => 120000,
            'bukti_pembayaran' => 'payment_proofs/bukti_santi_lunas.jpg',
            'status_transaksi' => 'verified',
            'diverifikasi_oleh' => $admin->user_id,
            'diverifikasi_pada' => $now->copy()->subDays(25),
            'created_at' => $now->copy()->subDays(25),
        ]);

        // Transaksi Ditolak (Karena salah upload bukti transfer)
        Transaksi::create([
            'no_invoice' => 'INV-RL/20260818/0003',
            'orangtua_id' => $profileSanti->orangtua_id,
            'murid_id' => $muridDian->murid_id,
            'program_id' => $pkgReguler,
            'jadwal_1_id' => $scheduleReguler?->jadwal_id,
            'total_pembayaran' => 120000,
            'bukti_pembayaran' => null, // Bukti bayar otomatis dihapus di controller saat ditolak
            'status_transaksi' => 'rejected',
            'created_at' => $now->copy()->subDays(2),
        ]);

        // Simulasikan 6 Kali Pertemuan Hadir
        for ($i = 1; $i <= 6; $i++) {
            Presensi::create([
                'murid_id' => $muridDian->murid_id,
                'jadwal_id' => $scheduleReguler?->jadwal_id,
                'tanggal_presensi' => $now->copy()->subDays(24 - ($i * 3))->format('Y-m-d'),
                'status_presensi' => 'hadir',
                'notes_presensi' => 'Dian hadir tepat waktu.',
                'dibuat_oleh' => $mentorJuly?->user_id,
            ]);
        }


        // =====================================================================
        // SKENARIO 7: ALUR NEGATIF TUNGGAKAN (HENDRA WIJAYA)
        // =====================================================================
        $userHendra = Pengguna::create([
            'name' => 'Hendra Wijaya',
            'email' => 'wali.hendra@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'orang_tua',
        ]);
        $profileHendra = OrangTua::create([
            'user_id' => $userHendra->user_id,
            'alamat_domisili' => 'Jl. Citayam No. 15, Depok',
            'no_telepon_orangtua' => '081288990011',
            'status_hubungan' => 'Ayah',
        ]);

        $muridGita = Murid::create([
            'orangtua_id' => $profileHendra->orangtua_id,
            'nama_murid' => 'Gita Wijaya',
            'panggilan_murid' => 'Gita',
            'tempat_lahir_murid' => 'Depok',
            'tanggal_lahir_murid' => '2018-02-14',
            'jenis_kelamin_murid' => 'Perempuan',
            'agama' => 'Islam',
            'sekolah' => 'SDN Citayam 2',
            'kelas' => '3',
            'nilai_rata_rata' => 78.0,
            'mapel_ditingkatkan' => 'Bahasa Indonesia',
            'mapel_sulit' => 'Menyusun kalimat efektif',
            'karakteristik_anak' => 'Sangat teliti, pemalu, butuh waktu untuk beradaptasi dengan lingkungan baru.',
            'kuota_belajar' => -1, // Sesi minus 1 (Tunggakan kelas berjalan)
            'status_murid' => 'active',
        ]);

        if ($scheduleSemi13) {
            DB::table('jadwal_murid')->insert([
                'jadwal_id' => $scheduleSemi13->jadwal_id,
                'murid_id' => $muridGita->murid_id,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $scheduleSemi13->increment('jumlah_murid');
        }

        // Pendaftaran disetujui (Approved)
        Pendaftaran::create([
            'user_id' => $userHendra->user_id,
            'nama_murid' => 'Gita Wijaya',
            'panggilan_murid' => 'Gita',
            'tempat_lahir_murid' => 'Depok',
            'tanggal_lahir_murid' => '2018-02-14',
            'jenis_kelamin_murid' => 'Perempuan',
            'agama' => 'Islam',
            'sekolah' => 'SDN Citayam 2',
            'kelas' => '3',
            'nilai_rata_rata' => 78.0,
            'mapel_ditingkatkan' => 'Bahasa Indonesia',
            'mapel_sulit' => 'Menyusun kalimat efektif',
            'karakteristik_anak' => 'Sangat teliti, pemalu, butuh waktu untuk beradaptasi dengan lingkungan baru.',
            'nama_orangtua' => 'Hendra Wijaya',
            'status_hubungan' => 'Ayah',
            'no_telepon_orangtua' => '081288990011',
            'email_orangtua' => 'wali.hendra@gmail.com',
            'alamat_domisili' => 'Jl. Citayam No. 15, Depok',
            'program_id' => $pkgSemiPrivat13,
            'jadwal_1_id' => $scheduleSemi13?->jadwal_id,
            'jadwal_2_id' => $scheduleSemi13?->jadwal_id,
            'bukti_bayar' => 'bukti_pendaftaran/bukti_hendra.jpg',
            'status_pendaftaran' => 'approved',
            'created_at' => $now->copy()->subDays(32),
        ]);

        // Transaksi Lunas Pertama
        Transaksi::create([
            'no_invoice' => 'INV-RL/20260710/0002',
            'orangtua_id' => $profileHendra->orangtua_id,
            'murid_id' => $muridGita->murid_id,
            'program_id' => $pkgSemiPrivat13,
            'jadwal_1_id' => $scheduleSemi13?->jadwal_id,
            'total_pembayaran' => 200000,
            'bukti_pembayaran' => 'payment_proofs/bukti_hendra_lunas.jpg',
            'status_transaksi' => 'verified',
            'diverifikasi_oleh' => $admin->user_id,
            'diverifikasi_pada' => $now->copy()->subDays(30),
            'created_at' => $now->copy()->subDays(30),
        ]);

        // Simulasikan 9 Kali Presensi sehingga Kuota Menjadi -1 (8 kuota awal + 9 kehadiran)
        for ($i = 1; $i <= 9; $i++) {
            Presensi::create([
                'murid_id' => $muridGita->murid_id,
                'jadwal_id' => $scheduleSemi13?->jadwal_id,
                'tanggal_presensi' => $now->copy()->subDays(28 - ($i * 3))->format('Y-m-d'),
                'status_presensi' => 'hadir',
                'notes_presensi' => 'Gita hadir tepat waktu.',
                'dibuat_oleh' => $mentorIsma?->user_id,
            ]);
        }


        // =========================================================
        // 4. PENGUMUMAN DUMMY (ADMIN)
        // =========================================================
        Pengumuman::create([
            'judul_pengumuman' => 'Pengumuman Libur Semester Ganjil 2026',
            'isi_pengumuman' => 'Diberitahukan kepada seluruh siswa, orang tua murid, dan mentor bahwa kegiatan belajar mengajar Ruang Les akan diliburkan untuk libur semester ganjil mulai tanggal 23 Desember 2026 hingga 2 Januari 2027. Kelas akan aktif kembali secara normal pada tanggal 3 Januari 2027.',
            'target_audience' => 'Semua',
            'diprioritaskan' => true,
            'status_pengumuman' => true,
            'dibuat_oleh' => $admin->user_id,
            'created_at' => $now->copy()->subDays(3),
        ]);

        Pengumuman::create([
            'judul_pengumuman' => 'Peringatan Batas Waktu Pembayaran Kuota Sesi',
            'isi_pengumuman' => 'Diimbau kepada seluruh Wali Murid yang memiliki kuota belajar anak di bawah 2 pertemuan atau minus untuk segera menyelesaikan pembayaran tagihan perpanjangan. Hal ini penting guna memastikan jadwal bimbingan belajar anak tidak terputus di sistem.',
            'target_audience' => 'Orang Tua',
            'diprioritaskan' => false,
            'status_pengumuman' => true,
            'dibuat_oleh' => $admin->user_id,
            'created_at' => $now->copy()->subDays(1),
        ]);

        Pengumuman::create([
            'judul_pengumuman' => 'Kewajiban Penginputan Nilai dan Catatan Pembelajaran',
            'isi_pengumuman' => 'Diingatkan kembali kepada seluruh rekan Mentor/Tutor untuk menginput data presensi murid serta catatan perkembangan belajar murid secara real-time sesaat setelah kelas selesai, selambat-lambatnya 1x24 jam. Terima kasih atas kerja samanya.',
            'target_audience' => 'Mentor',
            'diprioritaskan' => true,
            'status_pengumuman' => true,
            'dibuat_oleh' => $admin->user_id,
            'created_at' => $now->copy()->subDays(2),
        ]);


        // =========================================================
        // 5. MATERI BELAJAR DUMMY (ADMIN / TUTOR)
        // =========================================================
        MateriBelajar::create([
            'nama_materi' => 'Rangkuman Matematika Kelas 4: Operasi Bilangan Pecahan',
            'kelas_materi' => '4',
            'nama_mapel' => 'Matematika',
            'topik_bab' => 'Bab 2 - Pecahan Desimal & Campuran',
            'tipe_materi' => 'Modul Teori',
            'sumber_tautan' => 'Google Drive',
            'url_tautan' => 'https://drive.google.com/file/d/dummy-pecahan-kelas4/view',
            'deskripsi_materi' => 'Modul rangkuman ringkas materi pecahan desimal, perkalian desimal, dan pecahan campuran beserta contoh soal cerita yang sering muncul.',
            'hak_akses' => 'Murid',
            'status_materi' => true,
            'diunggah_oleh' => $admin->user_id,
            'jumlah_klik' => 12,
            'created_at' => $now->copy()->subDays(15),
        ]);

        MateriBelajar::create([
            'nama_materi' => 'Silabus Lengkap Kurikulum Sekolah Dasar (SD) Kelas 1-6',
            'kelas_materi' => '6',
            'nama_mapel' => 'Kurikulum',
            'topik_bab' => 'Silabus Pembelajaran',
            'tipe_materi' => 'Latihan Soal',
            'sumber_tautan' => 'Lainnya',
            'url_tautan' => 'https://ruangles.com/kurikulum-sd-lengkap',
            'deskripsi_materi' => 'Akses informasi struktur mata pelajaran, topik bahasan utama, dan target kompetensi siswa Sekolah Dasar untuk menunjang penyusunan KBM.',
            'hak_akses' => 'Publik',
            'status_materi' => true,
            'diunggah_oleh' => $admin->user_id,
            'jumlah_klik' => 34,
            'created_at' => $now->copy()->subDays(20),
        ]);

        MateriBelajar::create([
            'nama_materi' => 'Modul Mentor: Metode Pembelajaran Gamifikasi di Kelas Les',
            'kelas_materi' => '1',
            'nama_mapel' => 'Pedagogik',
            'topik_bab' => 'Metode Pembelajaran',
            'tipe_materi' => 'Modul Teori',
            'sumber_tautan' => 'Google Drive',
            'url_tautan' => 'https://drive.google.com/file/d/dummy-pedagogik-tutor/view',
            'deskripsi_materi' => 'Panduan praktis bagi mentor dalam menerapkan game interaktif dan kuis berhadiah untuk menstimulasi fokus murid yang kurang aktif/pemalu.',
            'hak_akses' => 'Mentor',
            'status_materi' => true,
            'diunggah_oleh' => $admin->user_id,
            'jumlah_klik' => 8,
            'created_at' => $now->copy()->subDays(12),
        ]);
    }
}
