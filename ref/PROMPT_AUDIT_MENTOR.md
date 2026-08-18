Saya ingin Anda melakukan Audit Kode (Code Review) menyeluruh terhadap "Panel Mentor" pada proyek Ruang Les ini. Proyek ini sangat mengedepankan kualitas arsitektur (Clean Code), keamanan data (Data Integrity), dan konsistensi antarmuka (UI Maintenance).

Tugas Anda adalah memeriksa file-file terkait (Controllers, Views, Models, Routes) dan memastikan semuanya mematuhi standar yang telah ditetapkan. Jangan ubah kode secara langsung, melainkan buatkan laporan audit yang menunjukkan temuan kesalahan (jika ada) dan berikan rekomendasi perbaikannya.

Fokuskan audit Anda pada 4 aspek krusial berikut:

# 1. AUDIT FRONTEND & UI/UX (DRY COMPONENTS)
Periksa file `.blade.php` di dalam folder `resources/views/mentor/`:
- DRY Components: Pastikan tidak ada penulisan elemen UI kasar yang berulang. Apakah kode sudah menggunakan komponen `<x-admin.page-header>`, `<x-admin.stat-card>`, `<x-admin.empty-state>`, dan `<x-admin.avatar>`?
- Estetika & Micro-Interactions: Apakah efek *Glassmorphism* (`bg-white/80 backdrop-blur-md`) dan *Hover States* (seperti `hover:-translate-y-1`, `shadow-md`) sudah diterapkan pada card dan tombol?
- SweetAlert Global: Pastikan TIDAK ADA script SweetAlert manual (`<script>Swal.fire...</script>`) yang ditulis langsung di dalam file Blade (kecuali memang sangat spesifik). Konfirmasi hapus harus menggunakan class form global (seperti `<x-admin.delete-form>`).

# 2. AUDIT BACKEND & INTEGRITAS DATABASE
Periksa file Controllers di `app/Http/Controllers/Mentor/`:
- Keamanan Transaksi Data: Apakah setiap proses `store`, `update`, atau `destroy` yang melibatkan lebih dari satu tabel (contoh: memotong kuota siswa saat presensi hadir) sudah dibungkus dalam blok `DB::transaction`?
- Anti-Storage Leak: Jika ada fitur unggah gambar/file, pastikan ada pemanggilan `Storage::delete()` untuk menghapus file fisik lama sebelum menimpa database dengan nama file baru.
- Anti-Orphan Data (Proteksi Hapus): Pastikan tidak ada `forceDelete()` pada data yang memiliki relasi historis (seperti menghapus Jadwal yang sudah ada presensinya). Pastikan pengkondisian *Soft Delete* atau *Ubah Status* digunakan dengan benar.

# 3. AUDIT LOGIKA BISNIS MENTOR
- Presensi & Kuota: Periksa logika pada `PresensiMentorController`. Apakah sisa kuota (`study_quota`) murid benar-benar terpotong ketika status presensi diinput sebagai 'Hadir'?
- Validasi Input: Apakah nilai ulangan/ujian di `NilaiMentorController` memiliki batasan absolut `min:0` dan `max:100`? 

# 4. AUDIT KEAMANAN & CLEAN ARCHITECTURE
- Keamanan Route: Periksa `routes/web.php`. Apakah seluruh rute untuk Panel Mentor sudah dilindungi oleh middleware khusus mentor (tidak tercampur dengan middleware admin)?
- Pemisahan Logika (Fat Controller, Thin View): Pastikan file `.blade.php` bersih dari query database (seperti `Model::where(...)`). Seluruh penarikan data wajib dilakukan di dalam Controller.

TUGAS ANDA:
1. Pahami parameter audit di atas.
2. Minta saya untuk memberikan cuplikan kode atau sebutkan nama file spesifik yang ingin Anda audit pertama kali (misalnya: `CatatanMentorController.php` atau `mentor/jadwal.blade.php`).
3. Berikan laporan audit Anda dengan format: [Nama File] - [Status: Lulus / Gagal] - [Detail Temuan & Solusi Kode].
