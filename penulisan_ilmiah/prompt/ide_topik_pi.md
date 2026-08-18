# Ide Topik Penulisan Ilmiah (PI) - Ruang Les

## Alternatif Topik/Judul PI

Alternatif 1: Fokus pada Logika Bisnis dan Otomatisasi
Judul: Rancang Bangun Sistem Manajemen Bimbingan Belajar "Ruang Les By Ismaturrohmah" Berbasis Web dengan Logika Kalender Dinamis dan Sistem Kuota Sesi
Nilai Jual: Membahas algoritma pergeseran jadwal otomatis dan toleransi operasional atau kuota negatif yang jarang dibahas di PI standar.

Alternatif 2: Fokus pada Hubungan Pelanggan dan Notifikasi
Judul: Implementasi Dual-Channel Notification System Berbasis Transaksi dan Status Kehadiran untuk Optimalisasi Administrasi Bimbingan Belajar
Nilai Jual: Menyoroti bagaimana notifikasi tidak statis berdasarkan tanggal kalender, melainkan dipicu secara dinamis oleh aksi kehadiran siswa dan status sisa kuota.

Alternatif 3: Fokus pada Distribusi Konten dan Hak Akses
Judul: Sistem Repositori Pembelajaran Tersinkronisasi Berdasarkan Pemetaan Hak Akses Jenjang Kelas dan Status Verifikasi Pembayaran Siswa
Nilai Jual: Membahas pembatasan hak akses yang kompleks, di mana file dikunci atau dibuka secara otomatis bergantung pada kondisi finansial dan profil akademik pengguna.

## Masalah Utama yang Diselesaikan

- Inakurasi Penagihan
Kesulitan melacak kapan siswa benar-benar mencapai pertemuan terakhir. Libur dadakan atau siswa absen sering membuat jadwal penagihan manual menjadi meleset, bisa terlalu cepat atau terlambat.

- Kebuntuan Operasional karena Administrasi
Pada sistem konvensional, anak tidak diizinkan belajar jika belum membayar. Hal ini sangat mengganggu ritme belajar anak dan operasional bimbingan belajar.

- Kurangnya Transparansi untuk Orang Tua
Orang tua rutin membayar biaya les tetapi tidak memiliki kemudahan akses untuk melihat progres harian anak, dan biasanya hanya menunggu nilai ujian akhir.

- Distribusi Modul yang Rentan dan Berantakan
Modul rahasia seperti panduan mengajar rentan bocor ke siswa, dan di sisi lain siswa sering kali menerima modul yang salah kelas atau jenjang.

## Solusi Konkret dan Terukur

- Algoritma Kalender Dinamis
Sistem secara otomatis menghitung dan menggeser tanggal penagihan mundur jika mentor menginput presensi Tidak Hadir atau Libur. Penagihan menjadi sangat akurat berdasarkan kehadiran riil siswa di kelas.

- Logika Kuota Negatif
Sistem mengizinkan kuota sesi menjadi minus agar anak tetap bisa belajar tanpa hambatan birokrasi, namun sistem mem-bypass penagihan normal dan langsung mengirimkan notifikasi peringatan otomatis ke orang tua.

- Catatan Perkembangan Terintegrasi
Mentor mengisi metrik harian secara digital per pertemuan, yang kemudian direkap menjadi laporan bulanan dan dapat dibaca langsung melalui dasbor orang tua.

- Smart Filter pada Repositori
Repositori pintar yang menyembunyikan otomatis materi yang tidak sesuai dengan kelas anak, serta secara otomatis mengunci tombol unduh materi jika pembayaran masih berstatus belum terverifikasi.
