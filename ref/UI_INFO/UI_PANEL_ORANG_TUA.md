# Rancangan Antarmuka UI - Panel Orang Tua

Konsep Desain
Panel Orang Tua dirancang sebagai portal transparansi utama antara manajemen bimbel dengan para wali murid. Mengingat fungsinya sebagai portal pemantauan, antarmuka bagian akademik dibuat mutlak menggunakan konsep "Hanya Baca" (Read-Only), yang berarti orang tua tidak memiliki akses untuk mengubah nilai, presensi, maupun catatan harian anak. Secara tata letak, panel ini mengadopsi struktur dasbor standar dan sangat dioptimalkan untuk tampilan telepon genggam (mobile-friendly), karena sebagian besar orang tua akan mengaksesnya melalui gawai.

Berikut adalah rincian halaman dan menu yang tersedia di Panel Orang Tua, mencakup alasan ketersediaannya serta detail komponen dan isi di dalamnya:

1. Tata Letak Utama dan Fitur Pemilih Anak (Switch Student)
Alasan: Memberikan kerangka navigasi yang mapan sekaligus merangkul para orang tua yang mendaftarkan lebih dari satu anak menggunakan satu email yang sama.
Komponen dan Isi:
- Header Atas (Topbar): Bilah memanjang yang berisi ikon notifikasi dan ikon profil orang tua.
- Komponen Pemilih Anak (Dropdown): Komponen esensial berupa menu tarik-turun yang diletakkan menonjol di bagian atas halaman. Berisi daftar nama anak yang terdaftar. Saat orang tua mengubah pilihan nama anak, seluruh data di halaman bawahnya akan langsung merespons dan menyegarkan diri (refresh) menyesuaikan profil anak tersebut. Di dalam menu ini juga disematkan tautan "Daftarkan Anak Baru".
- Menu Samping (Sidebar): Kumpulan tautan navigasi utama (Beranda, Jadwal, Presensi, Catatan, Nilai, Keuangan, Repositori, dan Pusat Bantuan).

2. Halaman Dasbor Kondisional (Masa Tunggu)
Alasan: Bertindak sebagai pengarah visual yang sangat tegas agar orang tua yang baru mendaftar tahu persis instruksi apa yang harus mereka selesaikan sebelum fitur dasbor terbuka utuh.
Komponen dan Isi:
- Kondisi Akun Baru (Belum Terdaftar): Tampilan halaman kosong yang hanya berisi sapaan dan satu tombol besar bertuliskan "Isi Formulir Pendaftaran Anak". Seluruh menu di sidebar sengaja dimatikan (berwarna abu-abu/terkunci) dan tidak bisa ditekan.
- Kondisi Menunggu Verifikasi Pembayaran: Tampilan halaman tertutup spanduk (banner) peringatan berwarna kuning atau biru yang menyatakan, "Pembayaran Anda sedang dalam proses verifikasi oleh Admin". Menu sidebar tetap dalam kondisi terkunci hingga admin pusat menekan tombol verifikasi.

3. Halaman Kelas Anak (Akademik Read-Only)
Alasan: Menjadi wujud nyata komitmen transparansi bimbel. Orang tua disuguhkan pelaporan aktivitas riil anak secara berkala tanpa harus datang ke lokasi.
Komponen dan Isi:
- Halaman Jadwal Kelas: Tampilan kalender atau tabel ringkas yang menginformasikan hari, jam sesi belajar, dan nama mentor pengajar.
- Halaman Presensi: Tabel rekam jejak kehadiran anak (Hadir, Tidak Hadir, Libur) yang ditarik langsung dari data absensi mentor.
- Halaman Catatan Perkembangan dan Laporan AI: Tabel bacaan yang menampilkan rekapan evaluasi harian (materi, skor, tingkat fokus). Di halaman ini pula orang tua akan menerima dan membaca Laporan Evaluasi AI bulanan yang diunggah oleh manajemen.
- Halaman Rekap Nilai: Tabel sederhana yang mendata perolehan skor ulangan atau latihan soal per pertemuan.

4. Halaman Keuangan (Tagihan dan Riwayat)
Alasan: Memudahkan orang tua memantau hak sisa pertemuan anak dan memfasilitasi alur pengisian ulang kuota (top-up) secara mandiri dari rumah.
Komponen dan Isi:
- Kartu Informasi Kuota: Blok informasi berukuran besar dan jelas yang menginformasikan sisa kuota pertemuan anak (misal: "Sisa Pertemuan: 2 Sesi").
- Formulir Pembayaran Ulang: Komponen unggah file (Upload) spesifik yang digunakan untuk melampirkan foto bukti transfer pembayaran sesi bulan berikutnya.
- Tabel Riwayat Transaksi: Daftar menyeluruh bukti bayar masa lalu beserta status akhir tagihannya (Aktif atau Menunggu Verifikasi).

5. Halaman Repository Pembelajaran
Alasan: Menyediakan ruang perpustakaan digital mandiri agar anak bisa mengulang pelajaran atau mengerjakan latihan soal di rumah.
Komponen dan Isi:
- Filter Otomatis Tingkat Kelas: Fitur tak kasat mata yang akan langsung menyembunyikan folder materi kelas lain. Jika anak di kelas 3, sistem hanya akan memunculkan materi khusus kelas 3 saja agar tidak terjadi kebingungan.
- Tabel Daftar Modul: Menampilkan file dokumen dan video. Terdapat mekanisme pengunci ganda: Jika akun masih bersatus 'Pending', file bisa dilihat judulnya namun tombol unduhannya akan dimatikan (disabled).
- Tombol Aksi: Dua tombol berdampingan, yakni tombol Pratinjau (Preview) untuk membaca dokumen langsung di dalam aplikasi, dan tombol Unduh (Download) untuk mengambil file aslinya.

6. Layanan Lainnya (Pusat Bantuan Terpadu)
Alasan: Membuka jalur komunikasi dua arah secara tertulis dan formal antara wali murid dengan tim manajemen pusat.
Komponen dan Isi:
- Formulir Pengajuan (Request Form): Kotak teks pengisian tempat orang tua bisa mengetik keluhan pelayanan, memberi testimoni pujian, meminta materi tambahan, hingga mengajukan perubahan jadwal les anak.
- Daftar Riwayat Percakapan: Menampilkan riwayat keluhan yang pernah dikirim sebelumnya, lengkap dengan kolom balasan langsung dari pihak admin.
