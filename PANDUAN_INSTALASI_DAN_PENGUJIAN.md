# Panduan Instalasi dan Pengujian

Dokumen ini menjelaskan cara menjalankan hasil perapian Capstone Project Ruang Les pada komputer tujuan. Gunakan salinan basis data sebelum menjalankan migrasi pada data penting.

## Kebutuhan

- PHP 8.2 atau lebih baru
- Composer
- MySQL 8.x atau MariaDB yang kompatibel
- Node.js dan npm

## Instalasi

1. Salin `.env.example` menjadi `.env`, lalu isi konfigurasi aplikasi, basis data, dan email.
2. Jalankan `composer install`, kemudian `composer dump-autoload` agar autoload mengenali nama kelas model dan controller yang baru.
3. Jalankan `php artisan key:generate`.
4. Jika menggunakan basis data lama, impor `db_ruang_les_v2.sql` terlebih dahulu.
5. Jalankan `php artisan migrate`. Migrasi `2026_08_17_000000_selaraskan_basis_data_dengan_rancangan.php` akan menyelaraskan nama tabel, primary key, foreign key, dan atribut dengan rancangan.
6. Jalankan `php artisan storage:link`.
7. Jalankan `npm install`, lalu `npm run build`. Jangan menggunakan folder `node_modules` dari sistem operasi lain.
8. Jalankan `php artisan optimize:clear`.
9. Untuk pengembangan lokal, jalankan `php artisan serve`.

## Pengujian Wajib

Jalankan perintah berikut pada lingkungan yang memiliki PHP dan MySQL:

```bash
composer dump-autoload
php artisan optimize:clear
php artisan migrate:status
php artisan test
php artisan route:list
```

Setelah itu, periksa manual alur berikut pada basis data uji:

1. Login sebagai Admin, Mentor, dan Orang Tua.
2. Pendaftaran bertahap sampai unggah bukti pembayaran.
3. Verifikasi pendaftaran dan pembentukan profil, murid, transaksi, serta jadwal.
4. Penolakan penambahan murid ketika `max_murid` tercapai.
5. Presensi hadir, pengurangan kuota, dan notifikasi saat kuota negatif.
6. Pemilihan anak aktif serta penolakan akses terhadap anak milik akun lain.
7. Unggah dan verifikasi bukti pembayaran.
8. Penyaringan materi berdasarkan kelas dan hak akses.

Skenario rinci Black Box dan lembar UAT tersedia di `Dokumentasi_Capstone_Ruang_Les.docx`. Isi hasil aktual hanya setelah pengujian benar-benar dilakukan.

## Scheduler

Jika fitur pengingat otomatis digunakan, konfigurasi cron untuk menjalankan perintah berikut setiap menit:

```bash
php artisan schedule:run
```

## Catatan Data

- Tabel bawaan Laravel seperti `migrations`, `jobs`, `cache`, `sessions`, dan `notifications` tetap dipertahankan.
- Migrasi penyelarasan mengubah nama tabel domain ke Bahasa Indonesia dan menghubungkan relasi ke primary key profil yang sesuai.
- Selalu buat cadangan basis data sebelum migrasi dan uji lebih dahulu pada salinan data.
