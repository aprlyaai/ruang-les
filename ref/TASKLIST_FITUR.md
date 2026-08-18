# Tasklist Fitur Sistem Ruang Les v2

Dokumen ini berisi daftar periksa (checklist) komprehensif untuk seluruh fitur, fungsi, komponen, dan halaman yang ada dalam sistem Ruang Les. Tasklist ini mencakup berbagai bagian dari halaman publik hingga panel khusus untuk masing-masing peran.

## 1. Halaman Publik & Pendaftaran (Guest)
- [x] **Landing Page Interaktif (Company Profile)**
  - [x] Header Halaman Publik: Logo + Nama Lembaga, Beranda, Pendaftaran, Tentang Kami, Program Belajar, FAQ, Kontak, Masuk, Registrasi.
  - [x] Halaman Publik Utama, berisi:
    - [x] Hero Section (default selalu di atas).
    - [x] Fitur.
    - [x] Program Belajar.
    - [x] Testimoni.
    - [x] FAQ.
  - [x] Tentang Kami (Halaman Publik Terpisah), berisi:
    - [x] Intro: Sejarah, Foto + Nama Founder.
    - [x] Visi & Misi.
    - [x] Galeri Dokumentasi.
  - [x] Footer Halaman Publik: tautan cepat, hubungi kami, ikuti kami.
- [] **Pendaftaran Akun (1 Pintu)**
  - [] Form Registrasi Akun Khusus Orang Tua.
- [] **Formulir Pendaftaran Murid (7 Langkah)**
  - [] *Wizard* dengan *Progress Bar*.
  - [] *Simpan Otomatis (Draft/Autosave)*.
  - [] Langkah 1: Identitas Anak (dengan fitur Usia Dinamis).
  - [] Langkah 2: Akademik.
  - [] Langkah 3: Informasi Orang Tua/Wali.
  - [] Langkah 4: Pilihan Paket Belajar.
  - [] Langkah 5: Preferensi Jadwal.
  - [] Langkah 6: Review Data.
  - [] Langkah 7: Konfirmasi & Pembayaran (Unggah bukti bayar).
  - [] Halaman Sukses Pendaftaran.

## 2. Autentikasi & Hak Akses
- [] **Sistem Otentikasi (Login & Logout)**.
- [] **Role-Based Access Control (RBAC)**
  - [] Akses Admin.
  - [] Akses Mentor.
  - [] Akses Orang Tua.
- [] **Sistem Switch Student (Multi-Anak)**
  - [] Satu akun Orang Tua untuk banyak anak (1-to-Many).
  - [] *Dropdown* pilihan anak di *Header*.
  - [] *Refresh* data dinamis berdasarkan ID anak yang dipilih.

## 3. Panel Admin (Backend Management)
- [] **Dashboard Admin**
- [] **Sistem Verifikasi Pendaftaran & Aktivasi**
  - [] Halaman daftar calon murid.
  - [] Verifikasi bukti bayar.
  - [] Aktivasi otomatis & perhitungan awal estimasi Hari-H.
  - [] estimasi hari H itu akan menampilkan Hari dan tanggal jatuh tempo.
- [] **Kelola Data Master (Full CRUD)**
  - [] Paket Program Belajar.
  - [] Data Mentor.
  - [] Data Murid.
  - [] Data Orang Tua/Wali.
- [] **Kelola Akademik**
  - [] Jadwal Kelas (Pemasangan Murid + Mentor + Waktu).
  - [] Presensi.
  - [] Catatan Perkembangan.
  - [] Nilai.
  - [x] Laporan Evaluasi (Berbasis AI) yang terjadi Per Bulan (Generate ringkasan otomatis berdasar catatan perkembangan, presensi, dan nilai).
  - [] Materi Belajar.
- [] **Keuangan & Manajemen Kuota Sesi**
  - [] Verifikasi Pembayaran Belajar (Top Up).
  - [] Manajemen logis kuota (Sisa kuota normal, Nol, atau Negatif).
  - [] Pemicu sistem teguran otomatis jika kuota negatif.
- [] **Layanan & Komunikasi**
  - [] Pengumuman (Publik/Privat, terjadwal).
  - [] Tiket Layanan (Respon interaktif dua arah).
- [] **Pengaturan Sistem**
  - [] Kelola CMS (Content Management System) Landing Page
  - [] Kelola Pengguna


## 4. Panel Mentor
- [] **Dashboard Mentor**
- [] **Kelola Akademik**
  - [] Jadwal Kelas (Daftar kelas yang diajar & *Quick Actions*).
    - [] Input Presensi (*Hadir, Tidak Hadir, Libur*).
    - [] Input Catatan Perkembangan (Materi, kefokusan, pemahaman, catatan perkembangan baik itu positif maupun negatif).
    - [] Input Nilai Angka (0-100).
  - [] Halaman *Riwayat Belajar Murid* (Rekam jejak historis murid).
  - [x] Laporan Evaluasi (Berbasis AI) (Hanya lihat/Read-Only).
- [] **Repositori Pembelajaran**
  - [] Akses *Full View* (semua jenjang/kelas & mapel).
  - [] Fitur *Live Preview* dokumen.
  - [] Unduh file.

## 5. Panel Orang Tua
- [] **Dashboard Orang Tua**
  - [] State: *Belum Terdaftar* (Terkunci, hanya ada form pendaftaran).
  - [] State: *Pending* (Menunggu verifikasi admin, menu terkunci).
  - [] State: *Aktif* (Tampilan Sisa Kuota, Jadwal, Notifikasi, dll).
- [] **Akademik (Read-Only)**
  - [] Jadwal Kelas (Kalender).
  - [] Halaman *Buku Akademik* (Rekam jejak historis murid).
  - [x] Laporan Evaluasi (Berbasis AI) (Hanya lihat/Read-Only).
- [] **Keuangan**
  - [] Informasi Sisa Kuota (Widget besar & Estimasi Hari-H).
  - [] Pembayaran (Unggah bukti bayar Top-Up kuota).
  - [] Riwayat Transaksi.
- [] **Repositori Pembelajaran**
  - [] Akses terkunci jika status pembayaran belum terverifikasi.
  - [] Filter otomatis berdasarkan jenjang/kelas anak yang dipilih.
  - [] *Preview* & Download.
- [] **Lainnya**
  - [] Tiket Bantuan (Kirim *feedback*, request materi/jadwal).

## 6. Sistem Inti (Core Logic) & Background Tasks
- [] **Sistem Komponen DRY & UI/UX**
  - [] Penggunaan komponen standar anti DRY.
- [] **Perhitungan Usia Dinamis** (Tanpa simpan kolom umur secara statis di DB).
- [] **Kalender Dinamis & Pergeseran Hari-H**
  - [] Estimasi Hari-H bergeser otomatis bila presensi Murid "Tidak Hadir" atau "Kelas Diliburkan".
  - [] Estimasi Hari-H berformat Hari, Tanggal.
- [x] **Sistem Notifikasi Ganda (Dual-Channel)**
  - [x] *In-App Notification* (Lonceng/Toast, Sidebar).
  - [x] *Email Notification* (Pendaftaran, Aktif, Tagihan, Teguran Mentor).
- [] **Notifikasi Pengingat Terjadwal (Cron Job)**
  - [] Tagihan pembayaran (H-7, H-3, H-1, Hari H).
  - [] Jadwal sesi kelas (H-1 Jam sebelum mulai).
  - [] Notifikasi *Tunggakan* / Teguran instan saat presensi dimasukkan pada status kuota <= 0.
- [] **Pembersihan File (*Storage Delete & Cascade DB*)**
  - [] Hapus file usang otomatis di *Storage* saat pergantian foto profil, materi, atau bukti bayar.
  - [] Hapus berantai (*Cascade*) pada struktur Database namun menggunakan logika *Soft-Delete* (Arsip) untuk data historis/transaksional.
- [x] Notifikasi Toast
- [x] Notifikasi badge di sidebar (utama), di dukung di dalam halaman/tab lebih spesifik.
- [x] Deteksi Presensi Bolong (Pengingat Mentor)
- [x] Deteksi Catatan Perkembangan Bolong (Pengingat Mentor)
- [x] Deteksi Nilai Bolong (Pengingat Mentor)