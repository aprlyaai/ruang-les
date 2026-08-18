Saya ingin Anda membangun "Panel Mentor" untuk proyek Ruang Les. Proyek ini sudah memiliki blueprint dan standar yang sangat kokoh dari Panel Admin, Landing Page, Register, Login, dan Formulir Pendaftaran sebelumnya. Anda WAJIB mematuhi seluruh standar tersebut tanpa terkecuali. 

Sebelum menulis kode apa pun, baca dan patuhi instruksi komprehensif di bawah ini. Instruksi ini mencakup Frontend, Backend, UI/UX, Logika Database, hingga standar Audit dan Clean Code.

# 1. STANDAR UI/UX & FRONTEND (UI MAINTENANCE & DRY COMPONENTS)
- Blueprint Desain: Panel Mentor adalah ruang kerja operasional harian. Desainnya harus bersih, bebas kerumitan administratif, dan mengadopsi model Dasbor dengan Sidebar di kiri dan Header (Topbar) di atas.
- Warna & Font: Gunakan warna utama merek (misal: #B7D9B1 atau warna hijau/aksen yang sudah ditetapkan di project Tailwind) dan font modern (Tailwind v4 standar, seperti Inter atau Roboto).
- Glassmorphism & Animasi: Terapkan elemen Glassmorphism (bg-white/80 backdrop-blur-md), gradien warna halus, bayangan jatuh dinamis (lifted shadow saat di-hover), dan animasi masuk bertingkat (staggered animations dengan Alpine.js).
- Micro-Spacing & Layout Teks: Perhatikan whitespace. Gunakan padding dan margin yang konsisten. Teks panjang pada tabel harus di-truncate (dipotong dengan elipsis) dan memunculkan tooltip penuh saat di-hover.
- DRY Components (Wajib): Dilarang menulis HTML manual berulang. Gunakan komponen Blade yang sudah ada secara eksklusif: 
  - `<x-admin.page-header>` untuk judul.
  - `<x-admin.stat-card>` untuk widget statistik.
  - `<x-admin.empty-state>` untuk tabel kosong.
  - `<x-admin.avatar>` untuk foto profil.
  - `<x-admin.delete-form>` (opsional, jika mentor diizinkan menghapus data tertentu).
  - `<x-admin.toggle-switch>` untuk status.

# 2. STANDAR BACKEND, LOGIKA, & DATABASE (DATA INTEGRITY)
- Keamanan Transaksi (DB::transaction): Segala transaksi modifikasi data (Create, Update, Delete) yang melibatkan lebih dari satu tabel wajib dibungkus dalam `DB::transaction`. Jika satu gagal, sistem harus otomatis melakukan rollback.
- Anti-Storage Leak (Pembersihan File): Saat ada pembaruan atau penghapusan file gambar/dokumen (misalnya di fitur Repositori Pembelajaran), Anda WAJIB menggunakan `Storage::delete()` untuk menghapus file fisik lama dari server sebelum menyimpan yang baru. Dilarang menimbun sampah digital.
- Anti-Orphan Data (Data Hantu) & Proteksi Penghapusan: Jika ada fitur penghapusan, pastikan data yang berelasi dihapus secara cascade. Namun, HARAM melakukan hard-delete pada data operasional historis (seperti Nilai atau Presensi). Gunakan Soft Delete atau status Nonaktif.
- SweetAlert Global: Gunakan script konfirmasi SweetAlert secara global (tambahkan class khusus pada form). Dilarang menyalin script konfirmasi manual ke setiap file blade.

# 3. SPESIFIKASI FITUR PANEL MENTOR (SESUAI BLUEPRINT)
Kerjakan halaman-halaman berikut dengan tata letak dan logika yang ditentukan:

A. Tata Letak Utama & Topbar:
- Topbar memuat notifikasi lonceng (pengingat kelas H-1 jam) dan avatar profil mentor.
- Sidebar eksklusif memuat menu: Dashboard, Akademik: Jadwal Kelas, Presensi, Catatan Perkembangan, Nilai, Evaluasi AI, Riwayat Belajar, Lainnya: Materi Belajar, Layanan. Sidebar memiliki efek gradasi merambat saat di-hover dan active state yang sinkron dengan URL.

B. Halaman Beranda (Dasbor Utama):
- Harus ada "Widget Tugas Tertunda" (kotak peringatan warna mencolok) jika ada kelas hari ini yang presensi atau jurnalnya belum diisi.
- Tampilkan Tabel Jadwal Hari Ini saja (nama murid, jam, letak kelas).

C. Halaman Jadwal Kelas:
- Tabel berisi daftar murid aktif semester ini.
- Baris nama memiliki 3 "Quick Actions": Tombol Isi Presensi, Beri Catatan, dan Input Nilai.

D. Halaman Presensi Murid:
- Tampilkan nama, tanggal, dan Dropdown/Radio Button Status (Hadir, Tidak Hadir, Diliburkan).
- Logika Backend Trigger: Status kehadiran di sini WAJIB memicu pemotongan "sisa kuota pertemuan" pada tabel murid.

E. Halaman Catatan Perkembangan (Jurnal):
- Input: Topik Materi, Skor Pemahaman (bintang/angka), Status Fokus (Sangat Fokus, dll), dan Kendala Kelas (Textarea).

F. Halaman Nilai & Evaluasi AI:
- Tabel Input Nilai Angka untuk harian/ulangan. Validasi mutlak rentang nilai 0-100 (tidak boleh lebih).
- Sediakan "Halaman Tinjauan AI" yang hanya bersifat Read-Only bagi Mentor.

G. Halaman Repositori Pembelajaran:
- Tampilkan tabel dokumen dengan Filter Cerdas (Jenjang, Mapel).
- Tampilkan file dari SELURUH jenjang (akses penuh tanpa kunci kelas).
- Sediakan fitur Pratinjau Dokumen (Live Preview di dalam browser) tanpa harus di-download.

# 4. AUDIT, CODING GUIDELINES, & BEST PRACTICES
- Audit Keamanan URL: Pastikan Middleware khusus Mentor diterapkan di seluruh route. Mentor tidak boleh bisa mengakses route Admin dengan cara menebak URL.
- Clean Architecture: Pisahkan logika agregasi data dari file blade. Lakukan agregasi di Controller (atau Service/Action class). Jangan menaruh query SQL atau Eloquent yang rumit di dalam file View.
- Penamaan Variabel (Naming Conventions): Gunakan bahasa Inggris untuk nama tabel, kolom, variabel, dan fungsi (misal: `SchedulesController`, `$attendance_status`). Gunakan camelCase untuk variabel/fungsi dan snake_case untuk database.

TUGAS ANDA SEKARANG:
1. Pahami seluruh aturan di atas secara saksama.
2. Analisis kebutuhan struktur folder (Controller, Model, View, Route) untuk seluruh fitur Panel Mentor ini.
3. Buat dan berikan kepada saya "Implementation Plan" (Rencana Implementasi) detail langkah demi langkah, file apa saja yang akan dibuat atau diubah, sebelum Anda menulis kode apa pun. Jangan eksekusi kodenya sebelum saya menyetujui plan tersebut.
