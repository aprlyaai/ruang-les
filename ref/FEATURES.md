# Daftar Fitur Ruang Les v2

Dokumen ini merangkum seluruh fitur utama yang ada dan direncanakan pada aplikasi manajemen bimbingan belajar Ruang Les v2.

## 1. Fitur Publik & Pengunjung (Guest)
- [x] Landing Page Interaktif: Beranda company profile yang menyajikan informasi keunggulan bimbel, fitur-fitur, program belajar, dan lainnya.
- [x] Pendaftaran Akun Cepat: Sistem registrasi awal khusus Orang Tua/Wali sebelum dapat mengakses formulir pendaftaran siswa (sistem 1 pintu).

## 2. Autentikasi & Hak Akses (Role-Based Access Control)
- [x] Otentikasi Aman: Login dan logout menggunakan standar keamanan Laravel.
- [x] Tiga Peran Pengguna Utama: Admin, Mentor, dan Orang Tua.
- [x] Sistem Multi-Anak (Switch Student): 1 akun Orang Tua dapat mengelola lebih dari 1 anak terdaftar tanpa perlu membuat banyak akun email. Perpindahan data anak dapat dilakukan langsung melalui dropdown di dasbor.

## 3. Sistem Pendaftaran Siswa (Formulir 7 Langkah)
- [x] Alur Pendaftaran Terstruktur (Wizard): Pengisian data dipecah menjadi 7 tahap lengkap dengan Progress Bar interaktif.
- [x] Simpan Otomatis (Draft/Autosave): Mencegah data hilang jika pengguna menutup browser di tengah pengisian formulir.
- [x] Perhitungan Usia Dinamis: Kolom usia otomatis terisi secara real-time berdasarkan input tanggal lahir.
- [x] Proteksi Kuota Jadwal (Anti-Bentrok): Pilihan slot jadwal akan secara otomatis terkunci (disabled) jika kuota kapasitas kelas sudah terisi penuh oleh siswa lain.
- [x] Unggah Dokumen Instan: Kolom unggah bukti bayar yang interaktif (drag-and-drop) dengan pratinjau (preview) visual instan sebelum dikirim.

## 4. Dasbor Panel Admin (Backend Management)
- [x] Statistik & Metrik: Widget ringkas di beranda admin yang memantau jumlah siswa, antrean pendaftaran pending, siswa aktif, dan total pendapatan secara instan.
- [ ] Penuh dengan CRUD.
- [x] Sistem Verifikasi Pendaftaran: Layar review 360 derajat yang memungkinkan admin mengecek seluruh data calon siswa beserta bukti bayar dalam satu tampilan sebelum menyetujuinya.
- [x] Otomatisasi Aktivasi Akun: Ketika admin menyetujui (Verifikasi) pendaftaran, sistem secara otomatis meresmikan status siswa dan membuka gembok layanan di portal orang tua.
- [x] Perhitungan Estimasi Hari-H Cerdas: Saat verifikasi, algoritma sistem akan mencari dan menetapkan tanggal pertemuan ke-8 (Hari-H) berdasarkan frekuensi jadwal rutin anak.

## 5. Portal Orang Tua (Parent Portal)
- [x] Dasbor Berbasis State Management: Memiliki 3 kondisi yaitu Belum Terdaftar, Pending, dan Aktif.
- [x] Widget Kuota Sesi Keuangan: Monitor angka sisa sesi belajar berukuran besar beserta estimasi Hari-H yang ditampilkan secara real-time.

## 6. Fitur Mendatang (On Development)
- [ ] Manajemen Kelas & Akademik: Modul pengisian presensi harian, pemberian nilai ujian, dan penginputan catatan perkembangan setiap selesai sesi kelas oleh Mentor dan Admin.
- [ ] Sistem Sisa Kuota Negatif: Fleksibilitas keuangan di mana jika sisa sesi anak sudah mencapai 0, anak tetap dapat hadir dan kuota akan otomatis menghitung ke nilai minus (-1, -2).
- [ ] Evaluasi AI Bulanan: Integrasi kecerdasan buatan (AI) yang merangkum catatan perkembangan harian menjadi satu laporan rapi untuk orang tua.
- [ ] Repositori Materi Terpadu: Pusat file download dengan filter cerdas dan akses berjenjang.
- [ ] Notifikasi Multi-Jalur (Dual-Channel): Sistem pengingat tagihan otomatis dan pengingat jadwal kelas melalui notifikasi lonceng di browser dan email.
- [ ] CMS Landing Page: Admin dapat mengganti konten beranda langsung dari panel tanpa harus memodifikasi kode.
