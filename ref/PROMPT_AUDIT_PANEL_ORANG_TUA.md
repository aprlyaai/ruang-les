Saya ingin Anda melakukan Audit Komprehensif terhadap "Panel Orang Tua" pada proyek Ruang Les. Proyek ini dibangun dengan standar UI/UX yang ketat, aturan integritas database, dan arsitektur yang sangat spesifik. 

Tugas Anda adalah memeriksa kode (Frontend & Backend) serta logika yang sudah diimplementasikan, lalu membandingkannya dengan blueprint proyek. Jangan langsung mengubah kode, berikan saya "Laporan Audit" yang merinci temuan Anda (Bug, Pelanggaran Standar, atau Inefisiensi) beserta solusi yang disarankan.

Silakan periksa dan audit sistem berdasarkan daftar periksa (checklist) di bawah ini:

# 1. AUDIT UI/UX & FRONTEND (KONSISTENSI & DRY COMPONENTS)
- Penggunaan Komponen (DRY): Apakah developer menulis ulang HTML mentah atau sudah menggunakan komponen Blade yang diwajibkan secara eksklusif? (Cek keberadaan `<x-admin.page-header>`, `<x-admin.stat-card>`, `<x-admin.empty-state>`, `<x-admin.avatar>`, `<x-admin.badge>`).
- Gaya Visual & Interaksi: Apakah efek Glassmorphism (backdrop-blur), bayangan dinamis saat hover, dan transisi halus (Micro-animations/Alpine.js) sudah diterapkan dengan benar?
- Tipografi & Spasi: Apakah layout teks sudah konsisten? Apakah teks panjang di tabel terpotong dengan rapi (truncate) dan memunculkan tooltip saat kursor diarahkan?
- Validasi Form: Apakah peringatan error pada input form sudah menggunakan Inline Errors (teks merah di bawah kolom input) alih-alih menggunakan Toast Notification yang mengganggu?

# 2. AUDIT BACKEND, INTEGRITAS DATA, & PERFORMA
- Keamanan Transaksi: Periksa Controller yang menangani penyimpanan multi-tabel (misal: pendaftaran anak baru atau unggah bukti bayar). Apakah sudah dibungkus dengan ketat menggunakan `DB::transaction`?
- Pembersihan Storage (Anti-Leak): Saat ada pembaruan atau penghapusan file (seperti unggah ulang bukti bayar), apakah sistem sudah menjalankan perintah `Storage::delete()` untuk menghapus file fisik lama di server?
- Integritas Relasi (Anti-Orphan Data): Apakah relasi antar tabel (Siswa, Orang Tua, Nilai, Presensi) sudah menggunakan Cascade Delete secara tepat, HANYA untuk data master? Pastikan tidak ada hard-delete pada data operasional historis (Nilai, Presensi, Keuangan).
- Perhitungan Usia Dinamis: Periksa View atau Controller Dashboard. Pastikan usia anak dihitung secara real-time (Tanggal Hari Ini - Tanggal Lahir) dan tidak mengambil data angka statis dari kolom database.

# 3. AUDIT FUNGSIONALITAS & LOGIKA ALUR (BLUEPRINT)
- Fitur Switch Student (Multi-Anak): Uji logika pergantian anak pada Dropdown Topbar. Saat anak yang dipilih berubah, apakah seluruh data di halaman bawahnya (Jadwal, Nilai, Sisa Kuota, Materi) otomatis berubah secara dinamis mengikuti ID anak yang baru tanpa perlu pindah akun?
- Logika Penguncian Dashboard (Akses): 
  - Jika anak belum didaftarkan, apakah Sidebar benar-benar terkunci dan muncul CTA "Isi Formulir Pendaftaran"?
  - Jika status pendaftaran/pembayaran masih "Pending", apakah fitur terkunci dengan banner peringatan verifikasi?
- Logika Sisa Kuota (Keuangan): Apakah sistem sudah mampu menangani dan menampilkan angka "Sisa Kuota" yang bernilai negatif (Tunggakan) sesuai hitungan dari Presensi Mentor?
- Hak Akses Repositori Pembelajaran: Periksa logika filter materi. Apakah anak kelas 3 hanya melihat materi kelas 3? Dan jika status masih "Pending", apakah file terlihat namun tombol Download/Preview terkunci?

# 4. AUDIT KEAMANAN (SECURITY) & ARSITEKTUR KODE
- Perlindungan Rute (Middleware): Periksa file `routes/web.php`. Apakah rute untuk Orang Tua terproteksi ketat sehingga ID anak atau pengguna lain tidak bisa ditembus melalui manipulasi parameter URL (misalnya mengakses `parent/student/999`)?
- Pemisahan Logika (Clean Architecture): Apakah file Blade/View bersih dari query database (`User::where(...)`)? Pastikan semua pengambilan dan filter data dilakukan secara rapi di Controller atau Service.
- Penamaan Standar: Apakah penamaan variabel, fungsi, dan tabel konsisten menggunakan bahasa Inggris (camelCase untuk variabel/PHP, snake_case untuk tabel/kolom Database)?

TUGAS ANDA SEKARANG:
1. Baca dan resapi seluruh metrik audit di atas.
2. Analisis baris kode (Controllers, Models, Views, Routes) yang relevan dengan Panel Orang Tua.
3. Buatlah "Laporan Audit" berformat Markdown yang berisi: 
   - Status (Aman/Peringatan/Kritis) untuk setiap bagian.
   - Temuan Masalah (Bug/Inefisiensi) beserta lokasi file-nya.
   - Rekomendasi Perbaikan (Kode) yang mengacu pada standar proyek ini.
Jangan eksekusi perbaikan kodenya sebelum Laporan Audit Anda saya setujui!
