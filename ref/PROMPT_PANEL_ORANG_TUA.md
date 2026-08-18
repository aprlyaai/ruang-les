Saya ingin Anda membangun "Panel Orang Tua" untuk proyek Ruang Les. Proyek ini sudah memiliki blueprint dan standar yang sangat kokoh dari Panel Admin, Landing Page, Register, Login, Formulir Pendaftaran, dan Panel Mentor sebelumnya. Anda WAJIB mematuhi seluruh standar tersebut tanpa terkecuali.

Sebelum menulis kode apa pun, baca dan patuhi instruksi komprehensif di bawah ini. Instruksi ini mencakup Frontend, Backend, UI/UX, Logika Database, hingga standar Audit dan Clean Code.

# 1. STANDAR UI/UX & FRONTEND (UI MAINTENANCE & DRY COMPONENTS)
- Blueprint Desain: Panel Orang Tua adalah pusat pemantauan akademik anak dan administrasi keuangan. Desainnya harus bersih, informatif, dan mengadopsi model Dasbor dengan Sidebar di kiri dan Header (Topbar) di atas.
- Warna, Font & Tema: Gunakan warna utama merek (misal: #B7D9B1 atau warna hijau/aksen yang sudah ditetapkan) dan font modern (Tailwind v4 standar, seperti Inter atau Roboto). Gaya visual harus profesional, edukatif, terpercaya, formal namun tetap friendly. Hindari penggunaan emoji yang berlebihan.
- Glassmorphism & Animasi: Terapkan elemen Glassmorphism (bg-white/80 backdrop-blur-md), gradien warna halus, bayangan jatuh dinamis (lifted shadow saat di-hover), dan animasi masuk bertingkat (staggered animations dengan Alpine.js).
- Micro-Spacing & Layout Teks: Perhatikan whitespace. Gunakan padding dan margin yang konsisten. Teks panjang pada tabel atau catatan harus di-truncate (dipotong dengan elipsis) dan memunculkan tooltip penuh saat di-hover.
- DRY Components (Wajib & Sangat Efisien): Dilarang menulis HTML manual secara berulang (anti kode spageti). Gunakan komponen Blade yang sudah ada secara eksklusif dan 100% identik secara visual: 
  - `<x-admin.page-header>` untuk judul halaman.
  - `<x-admin.stat-card>` untuk widget statistik/informasi.
  - `<x-admin.empty-state>` untuk tabel kosong/belum ada data.
  - `<x-admin.avatar>` untuk foto profil.
  - `<x-admin.badge>` untuk status (Aktif/Pending/Hadir/dll).

# 2. STANDAR BACKEND, LOGIKA, & DATABASE (DATA INTEGRITY)
- Keamanan Transaksi (DB::transaction): Segala transaksi modifikasi data (seperti unggah bukti bayar atau tambah anak) yang melibatkan lebih dari satu tabel wajib dibungkus dalam `DB::transaction`. Jika satu gagal, sistem harus otomatis melakukan rollback.
- Anti-Storage Leak (Pembersihan File): Saat ada pembaruan file (misal unggah ulang bukti pembayaran), Anda WAJIB menggunakan `Storage::delete()` untuk menghapus file fisik lama dari server sebelum menyimpan yang baru. Dilarang menimbun sampah digital!
- Anti-Orphan Data (Data Hantu) & Proteksi Data Historis: Jika ada fitur penghapusan (misal hapus akun), pastikan data yang berelasi dihapus secara cascade. Namun, HARAM melakukan hard-delete pada data operasional historis (Nilai, Catatan Perkembangan, Presensi, Keuangan).
- SweetAlert Global & Inline Errors: Gunakan script konfirmasi SweetAlert secara global (melalui class form). DILARANG menggunakan Toast untuk error validasi form dasar, gunakan Inline Errors (teks merah di bawah input) agar UX bersih dan tidak redundant.
- Perhitungan Usia Dinamis: Jangan pernah menyimpan usia sebagai angka statis di database. Sistem hanya menyimpan Tanggal Lahir, dan Dashboard Orang Tua harus selalu menghitung usia anak secara dinamis (Usia = Tanggal Hari Ini - Tanggal Lahir).

# 3. SPESIFIKASI FITUR PANEL ORANG TUA (SESUAI BLUEPRINT)
Kerjakan halaman-halaman berikut dengan tata letak dan logika yang ditentukan. Semua data akademik di sini bersifat Read-Only (Hanya Baca) bagi orang tua.

A. Tata Letak Utama, Topbar, & Switch Student (PENTING):
- Topbar memuat notifikasi lonceng (In-App notification) dan avatar profil.
- Fitur Switch Student (Multi-Anak): Di Topbar/Header harus ada Dropdown Pemilihan Anak. Jika orang tua mengubah pilihan nama anak pada dropdown, sistem WAJIB secara dinamis me-refresh data dan memperbarui seluruh isi menu di bawahnya (Jadwal, Akademik, Keuangan, dll) sesuai ID anak yang dipilih. Dilarang membuat akun terpisah untuk anak kedua/ketiga!
- Sidebar Menu: Dashboard, Akademik (Jadwal Kelas, Presensi, Catatan Perkembangan, Nilai), Keuangan (Informasi Tagihan & Pembayaran), Repository Pembelajaran, dan Layanan Lainnya.

B. Halaman Beranda (Dasbor Utama) & Logika Penguncian:
- Jika Anak Belum Terdaftar: Seluruh menu sidebar TERKUNCI (disabled). Muncul CTA besar "Isi Formulir Pendaftaran Anak".
- Jika Pembayaran Pending (Menunggu Verifikasi): Sidebar tetap terkunci. Tampilkan banner/notifikasi: "Pembayaran Anda sedang dalam proses verifikasi oleh Admin. Fitur akan terbuka otomatis setelah diverifikasi."
- Jika Aktif: Tampilkan ringkasan (Sisa Kuota, Jadwal Terdekat, Notifikasi Terbaru).

C. Halaman Akademik (Read-Only):
- Jadwal Kelas: Kalender sesi aktif yang mencantumkan hari, jam, dan nama mentor.
- Presensi, Catatan Perkembangan, dan Nilai: Tabel interaktif (bisa di-filter/search) yang mengambil data real-time hasil inputan Mentor & Admin.

D. Halaman Keuangan:
- Informasi Tagihan & Kuota: Menampilkan sisa kuota sesi belajar anak saat ini (Bisa bernilai Negatif jika menunggak, sesuaikan dengan blueprint logika kuota admin).
- Pembayaran (Top-Up): Formulir unggah bukti bayar untuk pengisian ulang kuota sesi.
- Riwayat Transaksi: Menampilkan status pembayaran (Aktif/Pending/Ditolak).

E. Halaman Repositori Pembelajaran (Akses Terbatas):
- Menampilkan modul, PDF, atau Video (Embed YouTube/Drive) yang bisa di-pratinjau atau di-download.
- Logika Filter Otomatis: Materi yang tampil WAJIB disaring otomatis berdasarkan Jenjang/Kelas anak yang sedang dipilih. (Jika anak kelas 3, folder kelas 6 tidak boleh muncul).
- Jika status pembayaran masih "Pending", menu ini bisa dibuka, folder terlihat, TAPI tombol preview & download Terkunci (Disabled) dengan pesan peringatan verifikasi pembayaran.

F. Halaman Layanan Lainnya:
- Formulir interaktif tiket dua-arah (Pusat Bantuan) untuk mengirim feedback, request materi, atau request jadwal ke Admin. Sistem harus mentolerir duplikasi tiket dengan `ticket_number` unik (Anti-Crash/Spam).

# 4. AUDIT, CODING GUIDELINES, & BEST PRACTICES
- Audit Keamanan URL (Middleware): Pastikan Middleware khusus Orang Tua (Parent/Customer) diterapkan ketat. Orang Tua tidak boleh bisa menembus URL Admin atau Mentor. Cegah akses lintas-data (ID anak orang lain tidak boleh bisa diakses via manipulasi parameter URL).
- Clean Architecture & Controller: Pisahkan logika agregasi data dari file Blade. Proses switch student, filter materi, dan perhitungan kuota harus ditangani rapi di Controller atau Action/Service class.
- Penamaan Variabel (Naming Conventions): Gunakan bahasa Inggris standar untuk tabel, kolom, variabel, dan fungsi (misal: `$remaining_quota`, `StudentController`). Gunakan camelCase untuk variabel PHP dan snake_case untuk tabel Database.

TUGAS ANDA SEKARANG:
1. Pahami seluruh aturan di atas secara saksama.
2. Analisis kebutuhan struktur folder (Controller, Model, View, Route) untuk seluruh fitur Panel Orang Tua ini.
3. Buat dan berikan kepada saya "Implementation Plan" (Rencana Implementasi) detail langkah demi langkah, file apa saja yang akan dibuat atau diubah, sebelum Anda menulis kode apa pun. Jangan eksekusi kodenya sebelum saya menyetujui plan tersebut.
