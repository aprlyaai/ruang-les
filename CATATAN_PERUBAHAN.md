# Catatan Perubahan

## Penyelarasan Basis Data

- Nama tabel domain diselaraskan dengan rancangan, antara lain `mentor`, `orang_tua`, `murid`, `program`, `jadwal_kelas`, `jadwal_murid`, `pendaftaran`, `transaksi`, `presensi`, `catatan_perkembangan`, `nilai`, dan `materi_belajar`.
- Primary key dan foreign key domain diselaraskan, misalnya `mentor_id`, `orangtua_id`, `murid_id`, `program_id`, dan `jadwal_id`.
- Nama atribut utama diselaraskan, termasuk `nama_mapel`, `total_pembayaran`, `tanggal_presensi`, `tanggal_catatan`, dan `tanggal_penilaian`.
- Ditambahkan migrasi konversi yang mempertahankan data lama dan mengubah referensi akun menjadi referensi profil domain.
- Ditambahkan `max_murid` pada jadwal kelas dan pengisian nilai awal dari kapasitas program.

## Penyesuaian Aplikasi

- Model Eloquent menggunakan nama tabel dan primary key sesuai rancangan.
- Relasi model, controller, route, seeder, notifikasi, email, dan Blade disesuaikan dengan nama baru.
- Nama kelas dan berkas model domain diubah ke Bahasa Indonesia, misalnya `User` menjadi `Pengguna`, `Student` menjadi `Murid`, `Package` menjadi `Program`, dan `Attendance` menjadi `Presensi`.
- Nama kelas dan berkas controller domain diubah ke Bahasa Indonesia serta seluruh import dan pemanggilannya diperbarui.
- Folder dan berkas Blade domain diubah ke Bahasa Indonesia. Tampilan mentor dan orang tua yang semula berada langsung di folder utama juga dikelompokkan kembali berdasarkan fitur, seperti `dasbor`, `jadwal`, `presensi`, `nilai`, `layanan`, dan `profil`.
- Komponen Blade domain dan seluruh tag pemanggilannya diselaraskan ke Bahasa Indonesia.
- Ditambahkan trait kompatibilitas `MemilikiKunciUtamaRancangan` untuk akses ID model selama transisi.
- Pengecekan kepemilikan anak, rute mentor, jadwal, program, pengumuman, nilai, materi, transaksi, dan layanan diperbarui mengikuti relasi baru.

Nama direktori dan istilah standar Laravel, seperti `app`, `resources`, `views`, `Controllers`, `Models`, `components`, `layouts`, serta method resource controller (`index`, `store`, `show`, dan seterusnya), tetap dipertahankan agar mengikuti konvensi framework. Nama URI dan nama route lama juga dipertahankan untuk menjaga kompatibilitas tautan yang sudah digunakan aplikasi.

## Dokumentasi

- Dokumentasi ilmiah dilengkapi sampai BAB IV, daftar pustaka, dan lampiran data pelengkap.
- Subbab implementasi memuat cuplikan source code yang relevan beserta penjelasannya.
- Disediakan skenario Black Box dan formulir UAT tanpa mengarang hasil pengujian.
- Placeholder dipertahankan untuk identitas mahasiswa, diagram, screenshot, data hosting, dan bukti pengujian yang belum diberikan.

## Status Verifikasi

- Pemeriksaan statis konsistensi nama dan relasi telah dilakukan.
- Semua referensi view literal, include, komponen Blade, model, dan controller telah diperiksa terhadap berkas tujuan.
- Tidak ada lagi berkas Blade yang tercecer langsung di folder `admin`, `mentor`, atau `orang-tua`.
- Pemeriksaan whitespace dijalankan melalui `git diff --check`.
- Pengujian `php artisan test` dan migrasi aktual belum dapat dijalankan di lingkungan pengerjaan karena runtime PHP/MySQL tidak tersedia.
- Build aset perlu diulang setelah `npm install` pada sistem operasi tujuan karena dependensi native di paket awal berasal dari Windows.
