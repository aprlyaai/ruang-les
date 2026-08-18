# Rancangan Antarmuka UI - Panel Mentor

Konsep Desain
Panel Mentor dirancang murni sebagai ruang kerja operasional (workspace) harian bagi para pengajar di Ruang Les. Mengingat tugas utama mentor adalah mengajar dan melaporkan perkembangan murid, antarmuka ini dibuat bebas dari kerumitan administratif. Desainnya sangat menonjolkan fitur pengingat (reminder) agar kewajiban pengisian data tidak tertunda. Tata letaknya mengadopsi model dasbor standar dengan bilah menu di sebelah kiri.

Berikut adalah rincian halaman dan menu yang tersedia di Panel Mentor, mencakup alasan ketersediaannya serta detail komponen dan isi di dalamnya:

1. Tata Letak Utama (Layout Dashboard)
Alasan: Memberikan batasan ruang kerja yang rapi dan konsisten, selaras dengan tata letak panel admin agar pengembangannya seragam dan pengguna mudah beradaptasi.
Komponen dan Isi:
- Header Atas (Topbar): Bilah memanjang di bagian atas yang menampilkan ikon lonceng notifikasi (berguna untuk pengingat jadwal satu jam sebelum kelas dimulai) dan ikon profil mentor.
- Menu Samping (Sidebar): Berisi daftar tautan menu utama yang secara eksklusif haknya dimiliki mentor (Beranda, Jadwal Kelas, Presensi, Catatan Perkembangan, Nilai, Evaluasi AI, dan Repositori).
- Area Konten Utama: Ruang luas di sebelah kanan yang isi tabel dan formulirnya berubah sesuai menu yang ditekan.

2. Halaman Dasbor Utama (Beranda Mentor)
Alasan: Bertindak sebagai alarm visual pertama kali mentor membuka aplikasi, mencegah adanya tumpukan tugas administratif yang dilupakan setelah kelas selesai.
Komponen dan Isi:
- Kotak Peringatan Tugas (Widget Tugas Tertunda): Sebuah blok warna mencolok (seperti kuning atau merah terang) yang tiba-tiba muncul di atas layar. Kotak ini mendeteksi dan memperingatkan mentor jika ada kelas yang sudah usai hari ini, namun presensi atau catatan perkembangannya belum diisi.
- Tabel Jadwal Hari Ini: Daftar ringkas yang mengurutkan kelas khusus untuk hari itu saja, lengkap dengan keterangan nama murid, jam pertemuan, dan letak kelas.

3. Halaman Jadwal Kelas
Alasan: Menjadi buku panduan utama agar mentor mengetahui siapa saja anak didik mereka dan kapan waktunya mengajar tanpa perlu menghubungi admin.
Komponen dan Isi:
- Tabel Daftar Kelas Aktif: Menampilkan nama-nama murid yang menjadi tanggung jawab mentor tersebut di semester ini.
- Tiga Tombol Cepat (Quick Actions): Terletak berjajar di ujung kanan setiap baris nama murid. Terdiri dari tombol "Isi Presensi", "Beri Catatan", dan "Input Nilai". Fitur ini memangkas waktu kerja mentor agar bisa langsung melompat ke lembar kerja terkait.

4. Halaman Presensi Murid
Alasan: Sangat penting karena keakuratan status kehadiran akan langsung mempengaruhi sistem pemotongan kuota pertemuan anak dan pergeseran tanggal tagihan pembayaran.
Komponen dan Isi:
- Tabel Daftar Hadir: Menampilkan nama murid, tanggal sesi, dan kolom status.
- Pilihan Status Kehadiran: Menggunakan menu tarik-turun (Dropdown) atau tombol bulat (Radio Button) yang mengunci hanya 3 status mutlak: "Hadir", "Tidak Hadir" (Izin/Sakit/Alpa), dan "Kelas Diliburkan" (Tanggal Merah).

5. Halaman Catatan Perkembangan
Alasan: Wadah untuk mengumpulkan data mentah (raw data) mengenai pemahaman anak. Data dari mentor inilah yang kelak akan disedot dan diproses oleh kecerdasan buatan (AI) Admin untuk menjadi Rapor Bulanan.
Komponen dan Isi:
- Kotak Topik Materi: Kotak isian teks singkat untuk mencatat judul bab yang baru saja diajarkan.
- Komponen Skor Pemahaman: Bisa berupa isian angka (1-100) atau deretan ikon bintang (Rating) untuk mengukur sejauh mana anak paham.
- Menu Status Fokus: Komponen Dropdown untuk melabeli kondisi psikologis anak hari itu (Contoh pilihan: Sangat Fokus, Sulit Konsentrasi, atau Mudah Mengantuk).
- Kotak Kendala Kelas: Kotak teks luas (Text Area) untuk mendeskripsikan masalah yang terjadi atau saran untuk pertemuan minggu depan.

6. Halaman Nilai dan Evaluasi AI
Alasan: Selain sebagai pengarsipan angka ujian, modul ini bertindak sebagai cermin evaluasi diri bagi mentor untuk memperbaiki cara mengajarnya bulan depan.
Komponen dan Isi:
- Tabel Input Nilai: Kotak isian kolom angka di sebelah nama anak untuk merekap skor ulangan atau latihan soal harian.
- Halaman Tinjauan AI (Hanya Baca): Tempat mendaratnya dokumen laporan evaluasi bulanan yang sudah diproduksi oleh Admin. Mentor hanya diberikan hak Lihat dan Baca (Read-Only) terhadap dokumen ini dan tidak bisa mengubah isinya.

7. Halaman Repository Pembelajaran
Alasan: Menjadi bank soal dan gudang bahan ajar, sehingga mentor selalu siap dengan materi sebelum masuk kelas dan tidak perlu memintanya secara manual ke admin pusat.
Komponen dan Isi:
- Komponen Filter Pencarian Cerdas: Deretan menu Dropdown di atas tabel untuk menyaring jutaan dokumen berdasarkan Jenjang/Kelas, Mata Pelajaran, dan Tipe Konten.
- Tabel Akses Terbuka (Full View): Berbeda dengan sistem di akun orang tua yang mengunci level kelas, tabel repositori mentor menampilkan file dari seluruh jenjang (Kelas 1 hingga 6 SD) karena mentor sewaktu-waktu bisa mengajar tingkatan yang berbeda.
- Pratinjau Dokumen (Live Preview): Sebuah tombol ikon mata di sebelah nama file. Jika ditekan, dokumen (PDF/Word) akan terbuka langsung di dalam kotak layar peramban (browser) tanpa harus diunduh (download). Sangat memanjakan mentor yang mengajar hanya menggunakan perangkat tablet.
