DATA MINIMAL SISTEM RUANG LES

1. Data Orang Tua minimal terdiri dari:

- Email (sebagai ID Login yang unik),
- Password,
- Nama Lengkap,
- Nomor WhatsApp,
- Alamat Lengkap Domisili.

2. Data Siswa minimal terdiri dari:

- ID Siswa (unik),
- Nama Lengkap dan Nama Panggilan,
- Tempat dan Tanggal Lahir,
- Jenis Kelamin dan Agama,
- Asal Sekolah dan Kelas,
- Nilai Rata-rata Rapor Terakhir,
- Karakteristik dan Kemampuan Anak,
- Sisa Kuota Belajar.

Perhitungan usia siswa menggunakan rumus dinamis:

Usia Anak = Tanggal Hari Ini - Tanggal Lahir (yang tersimpan di database)

3. Data Mentor minimal terdiri dari:

- Email (sebagai ID Login yang unik),
- Password,
- Nama Lengkap,
- Status Aktif Mengajar.

4. Data Paket Belajar minimal terdiri dari:

- ID Paket (unik),
- Nama Kategori (Privat, Semi Privat, atau Reguler),
- Batas Maksimal Siswa,
- Durasi Sesi (60 Menit),
- Jumlah Pertemuan (8 Kali),
- Harga Total.

5. Data Presensi dan Perkembangan minimal terdiri dari:

- ID Presensi (unik),
- Status Kehadiran,
- Materi yang Diajarkan,
- Skor Pemahaman,
- Catatan Fokus dan Kendala.

Ketentuan kuota belajar:

- Rentang kuota normal adalah 1 sampai 8.
- Kuota hanya berkurang 1 sesi jika status kehadiran Hadir.
- Status Tidak Hadir atau Kelas Diliburkan tidak mengurangi kuota, melainkan menggeser estimasi jadwal selesai (Hari-H) menjadi mundur.
- Kuota bisa bernilai negatif (kurang dari 0) jika siswa terus mengikuti kelas tanpa melakukan pembayaran ulang.
