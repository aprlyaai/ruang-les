# Struktur Folder - Ruang Les

Dokumen ini menjelaskan struktur folder dan file pada project Ruang Les.

Keterangan:
- [Frontend] : Menggunakan Blade template / CSS Tailwind
- [Backend]  : Menggunakan Controller, Request, Service, Job, Mail, Middleware Laravel (PHP)
- [Database] : Menggunakan Migration, Seeder, Factory, dan Model Laravel
- [Config]   : Berisi konfigurasi dan setup sistem
- [Penting]  : Komponen/file utama yang wajib diimplementasikan

```text
ruang-les/ - Root project Laravel
├── app/ - [Backend] — Logika utama aplikasi
│   ├── Http/ - [Backend]
│   │   ├── Controllers/ - [Backend]
│   │   │   ├── Auth/ - [Backend]
│   │   │   │   ├── LoginController.php - [Backend] [Penting] — Login Admin, Ortu, Mentor
│   │   │   │   └── RegisterController.php - [Backend] [Penting]
│   │   │   ├── Admin/ - [Backend]
│   │   │   │   ├── DashboardController.php - [Backend] [Penting]
│   │   │   │   ├── SiswaController.php - [Backend] [Penting]
│   │   │   │   ├── MentorController.php - [Backend] [Penting]
│   │   │   │   ├── PaketController.php - [Backend] [Penting]
│   │   │   │   ├── JadwalController.php - [Backend] [Penting]
│   │   │   │   ├── PresensiController.php - [Backend] [Penting]
│   │   │   │   ├── CatatanController.php - [Backend] [Penting]
│   │   │   │   ├── NilaiController.php - [Backend] [Penting]
│   │   │   │   ├── KeuanganController.php - [Backend] [Penting]
│   │   │   │   ├── RepositoriController.php - [Backend] [Penting]
│   │   │   │   ├── NotifikasiController.php - [Backend] [Penting]
│   │   │   │   ├── PengumumanController.php - [Backend] [Penting]
│   │   │   │   ├── CmsController.php - [Backend] [Penting] — Kelola konten landing page
│   │   │   │   ├── LayananController.php - [Backend] [Penting] — Feedback & request ortu
│   │   │   │   └── EvaluasiAiController.php - [Backend] [Penting] — Generate laporan AI
│   │   │   ├── Mentor/ - [Backend]
│   │   │   │   ├── DashboardMentorController.php - [Backend] [Penting]
│   │   │   │   ├── PresensiMentorController.php - [Backend] [Penting]
│   │   │   │   ├── CatatanMentorController.php - [Backend] [Penting]
│   │   │   │   ├── NilaiMentorController.php - [Backend] [Penting]
│   │   │   │   └── RepositoriMentorController.php - [Backend] [Penting] — Akses materi ajar all-level untuk mentor
│   │   │   ├── OrangTua/ - [Backend]
│   │   │   │   ├── DashboardOrangTuaController.php - [Backend] [Penting]
│   │   │   │   ├── PendaftaranController.php - [Backend] [Penting] — Form 7 langkah
│   │   │   │   ├── KeuanganOrangTuaController.php - [Backend] [Penting]
│   │   │   │   ├── RepositoriOrangTuaController.php - [Backend] [Penting]
│   │   │   │   ├── LayananOrangTuaController.php - [Backend] [Penting]
│   │   │   │   └── SwitchSiswaController.php - [Backend] [Penting] — Fitur multi-anak
│   │   │   └── PublicController.php - [Backend] [Penting] — Landing page & company profile
│   │   ├── Middleware/ - [Backend]
│   │   │   ├── RoleMiddleware.php - [Backend] [Penting] — Cek hak akses: admin/mentor/ortu
│   │   │   └── CheckPembayaranAktif.php - [Backend] [Penting] — Blokir jika pembayaran pending
│   │   └── Requests/ - [Backend]
│   │       ├── PendaftaranRequest.php - [Backend] [Penting] — Validasi form pendaftaran
│   │       ├── PresensiRequest.php - [Backend]
│   │       └── UploadBuktiRequest.php - [Backend]
│   ├── Models/ - [Database]
│   │   ├── User.php - [Database] [Penting] — Akun login (Admin, Mentor, Ortu)
│   │   ├── Siswa.php - [Database] [Penting] — Data anak (relasi 1 ortu → banyak anak)
│   │   ├── Mentor.php - [Database] [Penting]
│   │   ├── Paket.php - [Database] [Penting] — Master paket belajar
│   │   ├── Pendaftaran.php - [Database] [Penting] — Form 7 langkah
│   │   ├── Jadwal.php - [Database] [Penting] — Slot sesi belajar
│   │   ├── Presensi.php - [Database] [Penting]
│   │   ├── Catatan.php - [Database] [Penting] — Catatan perkembangan harian
│   │   ├── Nilai.php - [Database] [Penting]
│   │   ├── Pembayaran.php - [Database] [Penting] — Upload bukti bayar & verifikasi
│   │   ├── Kuota.php - [Database] [Penting] — Sisa sesi (bisa negatif)
│   │   ├── Materi.php - [Database] [Penting] — Repositori file pembelajaran
│   │   ├── Notifikasi.php - [Database] [Penting]
│   │   ├── Pengumuman.php - [Database] [Penting]
│   │   ├── Layanan.php - [Database] [Penting] — Feedback & request dari ortu
│   │   ├── EvaluasiAi.php - [Database] [Penting] — Hasil generate laporan AI
│   │   └── KontenLanding.php - [Database] [Penting] — CMS konten dinamis landing page
│   ├── Services/ - [Backend]
│   │   ├── NotifikasiService.php - [Backend] [Penting] — Kirim notif in-app & email
│   │   ├── KuotaService.php - [Backend] [Penting] — Hitung & update sisa sesi
│   │   ├── HariHService.php - [Backend] [Penting] — Estimasi & geser tanggal Hari-H
│   │   ├── EvaluasiAiService.php - [Backend] [Penting] — Integrasi API AI untuk laporan
│   │   └── PembayaranService.php - [Backend] [Penting]
│   ├── Jobs/ - [Backend]
│   │   ├── KirimPengingatTagihanJob.php - [Backend] [Penting] — H-7, H-3, H-1, Hari-H
│   │   └── KirimPengingatSesiJob.php - [Backend] — 1 jam sebelum sesi
│   ├── Mail/ - [Backend]
│   │   ├── PendaftaranBerhasilMail.php - [Backend]
│   │   ├── PembayaranVerifikasiMail.php - [Backend] [Penting]
│   │   ├── PengingatTagihanMail.php - [Backend] [Penting]
│   │   └── LaporanAiMail.php - [Backend]
│   └── Notifications/ - [Backend]
│       └── InAppNotification.php - [Backend]
├── database/ - [Database] — Semua keperluan database
│   ├── migrations/ - [Database] — Skema tabel MySQL
│   │   ├── 2024_01_01_create_users_table.php - [Database] [Penting]
│   │   ├── 2024_01_02_create_siswas_table.php - [Database] [Penting]
│   │   ├── 2024_01_03_create_mentors_table.php - [Database] [Penting]
│   │   ├── 2024_01_04_create_pakets_table.php - [Database] [Penting] — Master paket: privat, semi privat, reguler
│   │   ├── 2024_01_05_create_pendaftarans_table.php - [Database] [Penting]
│   │   ├── 2024_01_06_create_jadwals_table.php - [Database] [Penting] — Slot sesi + kuota per slot
│   │   ├── 2024_01_07_create_presensis_table.php - [Database] [Penting] — Status: hadir/alfa/libur
│   │   ├── 2024_01_08_create_catatans_table.php - [Database] [Penting]
│   │   ├── 2024_01_09_create_nilais_table.php - [Database] [Penting]
│   │   ├── 2024_01_10_create_pembayarans_table.php - [Database] [Penting]
│   │   ├── 2024_01_11_create_kuotas_table.php - [Database] [Penting] — Sisa sesi (bisa -1, -2, dst)
│   │   ├── 2024_01_12_create_materis_table.php - [Database] [Penting] — File repositori pembelajaran
│   │   ├── 2024_01_13_create_notifikasis_table.php - [Database] [Penting]
│   │   ├── 2024_01_14_create_pengumumans_table.php - [Database] [Penting]
│   │   ├── 2024_01_15_create_layanans_table.php - [Database] [Penting]
│   │   ├── 2024_01_16_create_evaluasi_ais_table.php - [Database] [Penting]
│   │   └── 2024_01_17_create_konten_landings_table.php - [Database] [Penting] — CMS dinamis landing page
│   ├── seeders/ - [Database]
│   │   ├── DatabaseSeeder.php - [Database]
│   │   ├── UserSeeder.php - [Database] [Penting] — Akun admin default
│   │   ├── PaketSeeder.php - [Database] [Penting] — Isi data paket awal (privat, dll)
│   │   └── KontenLandingSeeder.php - [Database] [Penting]
│   └── factories/ - [Database]
│       ├── SiswaFactory.php - [Database] — Data dummy untuk testing
│       └── UserFactory.php - [Database]
├── resources/ - [Frontend] — Semua file tampilan (Frontend)
│   ├── views/ - [Frontend] — File Blade template
│   │   ├── layouts/ - [Frontend]
│   │   │   ├── app.blade.php - [Frontend] [Penting] — Layout utama (header + footer)
│   │   │   ├── admin.blade.php - [Frontend] [Penting] — Layout dashboard admin
│   │   │   ├── mentor.blade.php - [Frontend] [Penting]
│   │   │   ├── ortu.blade.php - [Frontend] [Penting]
│   │   │   └── guest.blade.php - [Frontend] [Penting] — Layout tanpa login
│   │   ├── components/ - [Frontend]
│   │   │   ├── header.blade.php - [Frontend] [Penting] — Header dinamis (guest/login)
│   │   │   ├── footer.blade.php - [Frontend] [Penting] — Footer 4 kolom
│   │   │   ├── navbar-admin.blade.php - [Frontend] [Penting]
│   │   │   ├── sidebar-admin.blade.php - [Frontend] [Penting]
│   │   │   ├── sidebar-ortu.blade.php - [Frontend] [Penting]
│   │   │   ├── sidebar-mentor.blade.php - [Frontend] [Penting]
│   │   │   ├── notifikasi-bell.blade.php - [Frontend] [Penting] — Ikon lonceng notifikasi
│   │   │   ├── progress-bar.blade.php - [Frontend] [Penting] — Indikator 7 langkah pendaftaran
│   │   │   ├── switch-siswa.blade.php - [Frontend] [Penting] — Dropdown multi-anak (ortu)
│   │   │   ├── card-paket.blade.php - [Frontend] [Penting] — Kartu pilihan paket belajar
│   │   │   ├── modal.blade.php - [Frontend]
│   │   │   └── alert.blade.php - [Frontend]
│   │   ├── public/ - [Frontend] — Halaman tanpa login
│   │   │   ├── beranda.blade.php - [Frontend] [Penting] — Landing page utama
│   │   │   ├── tentang.blade.php - [Frontend]
│   │   │   ├── program.blade.php - [Frontend]
│   │   │   ├── faq.blade.php - [Frontend]
│   │   │   └── kontak.blade.php - [Frontend]
│   │   ├── auth/ - [Frontend]
│   │   │   ├── login.blade.php - [Frontend] [Penting]
│   │   │   └── register.blade.php - [Frontend] [Penting]
│   │   ├── pendaftaran/ - [Frontend]
│   │   │   ├── step1-identitas.blade.php - [Frontend] [Penting] — Identitas anak + hitung usia otomatis
│   │   │   ├── step2-akademik.blade.php - [Frontend] [Penting]
│   │   │   ├── step3-ortu.blade.php - [Frontend] [Penting]
│   │   │   ├── step4-paket.blade.php - [Frontend] [Penting] — Pilih paket (card layout)
│   │   │   ├── step5-jadwal.blade.php - [Frontend] [Penting] — Pilih slot sesi + validasi kuota
│   │   │   ├── step6-review.blade.php - [Frontend] [Penting] — Ringkasan semua data
│   │   │   └── step7-pembayaran.blade.php - [Frontend] [Penting] — Upload bukti bayar
│   │   ├── admin/ - [Frontend]
│   │   │   ├── dashboard.blade.php - [Frontend] [Penting]
│   │   │   ├── siswa/ - [Frontend]
│   │   │   │   ├── index.blade.php - [Frontend]
│   │   │   │   └── show.blade.php - [Frontend]
│   │   │   ├── mentor/ - [Frontend]
│   │   │   │   ├── index.blade.php - [Frontend]
│   │   │   │   └── form.blade.php - [Frontend]
│   │   │   ├── jadwal/ - [Frontend]
│   │   │   │   ├── index.blade.php - [Frontend] [Penting]
│   │   │   │   └── form.blade.php - [Frontend] [Penting]
│   │   │   ├── presensi/ - [Frontend]
│   │   │   │   └── index.blade.php - [Frontend] [Penting]
│   │   │   ├── catatan/ - [Frontend]
│   │   │   │   └── index.blade.php - [Frontend] [Penting]
│   │   │   ├── nilai/ - [Frontend]
│   │   │   │   ├── index.blade.php - [Frontend]
│   │   │   │   └── rekapitulasi.blade.php - [Frontend]
│   │   │   ├── keuangan/ - [Frontend]
│   │   │   │   ├── pembayaran.blade.php - [Frontend] [Penting] — Verifikasi bukti bayar
│   │   │   │   └── kuota.blade.php - [Frontend] [Penting]
│   │   │   ├── repositori/ - [Frontend]
│   │   │   │   ├── index.blade.php - [Frontend] [Penting]
│   │   │   │   └── upload.blade.php - [Frontend] [Penting] — Upload materi + kategorisasi
│   │   │   ├── notifikasi/ - [Frontend]
│   │   │   │   └── index.blade.php - [Frontend]
│   │   │   ├── pengumuman/ - [Frontend]
│   │   │   │   ├── index.blade.php - [Frontend]
│   │   │   │   └── form.blade.php - [Frontend]
│   │   │   ├── cms/ - [Frontend]
│   │   │   │   ├── landing.blade.php - [Frontend] [Penting] — Edit konten landing page (CMS)
│   │   │   │   ├── paket.blade.php - [Frontend] [Penting]
│   │   │   │   ├── faq.blade.php - [Frontend]
│   │   │   │   ├── testimoni.blade.php - [Frontend]
│   │   │   │   └── kontak.blade.php - [Frontend]
│   │   │   ├── layanan/ - [Frontend]
│   │   │   │   └── index.blade.php - [Frontend]
│   │   │   └── evaluasi-ai/ - [Frontend]
│   │   │       └── index.blade.php - [Frontend] [Penting] — Generate & lihat laporan AI
│   │   ├── mentor/ - [Frontend]
│   │   │   ├── dashboard.blade.php - [Frontend] [Penting]
│   │   │   ├── jadwal.blade.php - [Frontend]
│   │   │   ├── presensi.blade.php - [Frontend] [Penting]
│   │   │   ├── catatan.blade.php - [Frontend] [Penting]
│   │   │   ├── nilai.blade.php - [Frontend]
│   │   │   ├── evaluasi-ai.blade.php - [Frontend] — Lihat laporan (read-only)
│   │   │   └── repositori.blade.php - [Frontend] [Penting] — Akses materi ajar (full view & preview)
│   │   ├── ortu/ - [Frontend]
│   │   │   ├── dashboard.blade.php - [Frontend] [Penting]
│   │   │   ├── kelas/ - [Frontend]
│   │   │   │   ├── jadwal.blade.php - [Frontend]
│   │   │   │   ├── presensi.blade.php - [Frontend]
│   │   │   │   ├── catatan.blade.php - [Frontend]
│   │   │   │   ├── nilai.blade.php - [Frontend]
│   │   │   │   └── evaluasi-ai.blade.php - [Frontend] [Penting] — Lihat laporan perkembangan AI bulanan
│   │   │   ├── keuangan/ - [Frontend]
│   │   │   │   ├── tagihan.blade.php - [Frontend] [Penting] — Sisa kuota sesi
│   │   │   │   ├── pembayaran.blade.php - [Frontend] [Penting] — Upload bukti bayar (top-up)
│   │   │   │   └── riwayat.blade.php - [Frontend]
│   │   │   ├── repositori.blade.php - [Frontend] [Penting] — Akses materi (terkunci jika pending)
│   │   │   └── layanan.blade.php - [Frontend]
│   │   └── emails/ - [Frontend]
│   │       ├── pembayaran-verifikasi.blade.php - [Frontend] [Penting]
│   │       ├── pengingat-tagihan.blade.php - [Frontend] [Penting]
│   │       ├── laporan-ai.blade.php - [Frontend]
│   │       └── pendaftaran-berhasil.blade.php - [Frontend]
│   ├── css/ - [Frontend]
│   │   └── app.css - [Frontend] [Penting] — Entry Tailwind CSS (@tailwind directives)
│   └── js/ - [Frontend]
│       ├── app.js - [Frontend] [Penting] — Entry point JS (Alpine.js, dsb)
│       ├── pendaftaran.js - [Frontend] [Penting] — Logika 7 langkah + hitung usia real-time
│       └── jadwal-slot.js - [Frontend] [Penting] — Disable slot penuh (kuota)
├── routes/ - [Backend] — Definisi semua URL / endpoint
│   ├── web.php - [Backend] [Penting] — Route utama: publik, auth, admin, mentor, ortu
│   └── api.php - [Backend] [Penting] — Endpoint AJAX (cek slot, hitung usia, notif)
├── config/ - [Config]
│   ├── app.php - [Config] [Penting] — Nama app, timezone: Asia/Jakarta, locale: id
│   ├── database.php - [Config] [Penting] — Koneksi MySQL
│   ├── mail.php - [Config] [Penting] — Config SMTP untuk email notifikasi
│   ├── filesystems.php - [Config] [Penting] — Penyimpanan file materi & bukti bayar
│   └── queue.php - [Config] — Config queue untuk job pengingat
├── public/ - [Frontend] — File yang bisa diakses browser langsung
│   ├── index.php - [Backend] [Penting] — Entry point Laravel (jangan diubah)
│   ├── css/ - [Frontend]
│   │   └── app.css - [Frontend] — Output build Tailwind (auto-generate)
│   ├── js/ - [Frontend]
│   │   └── app.js - [Frontend] — Output build JS (auto-generate)
│   ├── images/ - [Frontend]
│   │   ├── logo-ruang-les.png - [Frontend] [Penting] — Logo teks 2 baris
│   │   ├── hero/ - [Frontend] — Gambar section hero landing page
│   │   └── profil/ - [Frontend]
│   └── storage/ - [Backend] — Symlink ke storage/app/public
├── storage/ - [Backend]
│   ├── app/ - [Backend]
│   │   └── public/ - [Backend]
│   │       ├── bukti-pembayaran/ - [Backend] [Penting] — File upload bukti bayar dari ortu
│   │       ├── materi/ - [Backend] [Penting] — File PDF, Docx, video repositori
│   │       └── foto-profil/ - [Backend]
│   └── logs/ - [Backend] — Log error Laravel
├── .env - [Config] [Penting] — Variabel rahasia: DB, SMTP, APP_KEY, AI API
├── .env.example - [Config] [Penting] — Template .env untuk tim
├── tailwind.config.js - [Config] [Penting] — Konfigurasi Tailwind + warna tema hijau #B7D9B1
├── vite.config.js - [Config] [Penting] — Build tool (Vite untuk Laravel + Tailwind)
├── package.json - [Config] [Penting] — Dependensi Node: Tailwind, Vite, Alpine.js
├── composer.json - [Config] [Penting] — Dependensi PHP: Laravel, Sanctum, dll
└── artisan - [Backend] [Penting] — CLI Laravel (migrate, serve, make:model, dll)
```

