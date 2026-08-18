Saya ingin membuat website bimbingan belajar SD (BIMBEL SD). Proyek ini bertujuan untuk membangun platform berbasis web yang difokuskan pada manajemen data operasional bimbingan belajar. Sistem ini dirancang untuk memfasilitasi tiga kategori pengguna utama: Admin, Mentor, dan Orang Tua Siswa, dengan penekanan pada transparansi perkembangan akademik anak dan efisiensi administrasi. 
Struktur:
Halaman Publik (Tanpa Login):
Company Profile.
Halaman Terproteksi (Memerlukan Login):
Formulir Pendaftaran.
Dashboard Orang Tua.
Dashboard Admin (Back-end).
Repository Pembelajaran.

Dengan tema hijau dan kode warna inti : #B7D9B1 (selebihnya disesuaikan dengan warna hijau bebas)
Dengan kode program harus mengikuti coding guidelines dan best practices.
Dengan gaya desain (tidak usah terlalu banyak emojis):
Tone: profesional, edukatif, terpercaya, modern.
Identitas brand: pendidikan nasional, akademik, formal namun tetap friendly.
Gaya visual: clean, modern, dengan elemen yang rapi dan terstruktur.
Tipografi: modern, mudah dibaca, formal.
Layout: responsive (desktop & mobile).


Pada tampilan halaman awal, spesifikasinya:
Komponen Header (Navigasi & Akses)
Header bersifat dinamis dan akan menyesuaikan tampilannya berdasarkan status login pengguna:
Identitas (Sisi Kiri): Logo teks dua baris. Baris atas: "Ruang Les", baris bawah: "by Ismaturrohmah".
Navigasi Informasi (Tengah): Terdiri dari menu Beranda, Pendaftaran, Tentang Kami, Program Belajar, FAQ, dan Kontak.
Zona Akses (Sisi Kanan):
Kondisi Pengunjung (Guest): Menampilkan dua tombol kapsul: Registrasi (CTA utama) dan Masuk. User diwajibkan membuat akun profil orang tua dasar dan melakukan Login terlebih dahulu sebelum dapat mengakses Formulir Pendaftaran Bimbel.
Saat pengunjung mengklik "Register/Registrasi", sistem akan menampilkan formulir ringkas dengan judul tegas: "Pendaftaran Akun Orang Tua/Wali" beserta deskripsi singkat: "Buat akun utama Anda terlebih dahulu untuk mulai mendaftarkan anak, memantau perkembangan belajar, dan mengakses modul materi."
Data dasar yang dikumpulkan pada tahap ini hanya meliputi: Nama Lengkap Orang Tua, Alamat Email (berfungsi sebagai ID Login utama yang unik), dan Password.
Kondisi Orang Tua (Logged In): Tombol akses berubah menjadi Ikon Profil yang menampilkan nama lengkap orang tua. Saat diklik, akan muncul menu dropdown vertikal berisi: Dashboard, Materi, dan Logout.
Logika Redireksi & Hak Akses
Admin: Setelah Login, sistem secara otomatis mengalihkan pengguna langsung ke Dashboard Admin.
Orang Tua: Setelah Login, pengguna tetap berada di Halaman Utama. Perbedaan fungsi terjadi saat pengguna mengakses Dashboard Orang Tua:
Siswa Belum Terdaftar (Akun Baru): Saat masuk ke Dashboard Orang Tua, seluruh menu di sidebar (Jadwal, Presensi, Nilai, dll) dalam kondisi terkunci (disabled). Sistem akan menampilkan halaman sambutan kosong dengan satu tombol Call-to-Action besar: "Isi Formulir Pendaftaran Anak". Tombol ini akan mengarahkan pengguna ke Formulir Pendaftaran 7 Langkah. Fitur Save Progress otomatis berjalan; jika browser tertutup, Orang Tua bisa melanjutkan isian dari langkah terakhir yang ditinggalkan.
Siswa Terdaftar: Jika Orang Tua sudah menyelesaikan formulir dan menekan "Selesai", tampilan Dashboard berubah memunculkan status "Menunggu Verifikasi" atau "Aktif", dan fitur Switch Student (jika mendaftarkan >1 anak) otomatis berjalan.
Komponen Footer (Kaki Halaman)
Sebagai penutup informasi, footer dibagi menjadi empat kolom utama:
Kolom 1 (Profil): Logo "Ruang Les" dan deskripsi singkat mengenai visi bimbingan belajar.
Kolom 2 (Tautan Cepat): Navigasi ringkas ke halaman utama, register, login, pendaftaran, Program, dan FAQ.
Kolom 3 (Informasi Kontak): Alamat domisili, tautan WhatsApp aktif, dan email resmi.
Kolom 4 (Media Sosial): Ikon tautan menuju platform sosial media "Ruang Les".
Copyright: Teks hak cipta di bagian paling bawah halaman.


Pada tampilan halaman formulir pendaftaran, spesifikasinya:
Judul
Indikator Langkah (Progress Bar)
Indikator terletak di bagian atas formulir, terdiri dari 7 lingkaran bernomor yang dihubungkan dengan garis.
Kondisi Awal (Belum Terlewati): Lingkaran kosong (hanya border), garis penghubung berupa garis putus-putus.
Kondisi Aktif (Sedang Diisi): Border lingkaran berwarna (sorotan), garis di depannya tetap putus-putus.
Kondisi Selesai (Sudah Terisi): Lingkaran berwarna penuh, garis penghubung dengan langkah berikutnya berubah menjadi garis lurus solid (berwarna).
Detail Langkah Pendaftaran
Langkah 1: Identitas Anak
Nama Lengkap* dan Nama Panggilan*: Tipe input teks (satu baris).
Tempat Lahir* dan Tanggal Lahir*: Input teks & Date Picker (format dd/mm/yyyy).
Usia*, Jenis Kelamin*, dan Agama*: Usia langsung terhitung otomatis dari date picker tanggal lahir, yang lainnya (jenis kelamin dan agama) bisa Input teks & Dropdown (disusun vertikal).
Dengan:
Kolom "Usia*" tidak berbentuk input ketik manual, melainkan berupa kolom read-only (hanya baca/tidak bisa diedit manual oleh user).
Logika Antarmuka (Frontend): Ketika Orang Tua memilih tanggal pada Date Picker "Tanggal Lahir*", sistem secara otomatis menghitung usia anak secara real-time dan langsung menampilkan hasilnya di kolom "Usia" (Contoh tampilan: 8 Tahun 4 Bulan).
Logika Simpan Database (Backend): Sistem tidak menyimpan angka total usia ke dalam database. Sistem hanya menyimpan data Tanggal Lahir (dd/mm/yyyy).
Logika Dashboard (Admin & Orang Tua): Pada halaman Dashboard Admin maupun Dashboard Orang Tua, informasi usia anak akan selalu dihitung ulang secara dinamis oleh sistem dengan rumus: Tanggal Hari Ini - Tanggal Lahir, sehingga data usia anak tetap akurat dari tahun ke tahun tanpa perlu diperbarui manual.
Langkah 2: Akademik
Asal Sekolah Sekarang* & Kelas*: Input teks & Dropdown (berdampingan).
Nilai Rata-rata Rapor Terakhir, Mata pelajaran yang ingin ditingkatkan*, Mata pelajaran yang dirasa sulit: Input teks (masing-masing satu baris).
Karakteristik & Kemampuan Anak*: Tipe input Text Area (fleksibel/dapat diperbesar).
Langkah 3: Informasi Orang Tua/Wali
Nama Orang Tua / Wali* & Status Hubungan*: Untuk nama itu berbentuk input teks & untuk status hubungan berbentuk Dropdown (berdampingan).
Nomor Telepon / WhatsApp* & Alamat Email* : Input teks (format validasi khusus).
Alamat Lengkap Domisili*: Tipe input Text Area.
Langkah 4: Pilihan Paket Belajar
Tampilan: Card Layout (Sejajar di desktop, bertumpuk di seluler).
Kategori: PRIVATE, SEMI PRIVATE, REGULER.
Informasi Kartu Mencakup:
- maksimal siswa perkelas
- jumlah pertemuan
- durasi pertemuan
- harga
- info sesi belajar dapat dilakukan di rumah siswa atau di rumah mentor
- info materi menyesuaikan kebutuhan siswa
- info pendampingan materi sekolah dan konsultasi PR
Dengan Logika Sistem (Backend): Seluruh data harga yang tampil pada Langkah 4 adalah Harga Paket Bundling (Total untuk 8x Pertemuan) yang ditarik langsung dari Tabel Master Paket. Saat Orang Tua melanjutkan ke halaman invoice pembayaran (Langkah 7), sistem akan langsung menampilkan nominal tersebut sebagai Total Tagihan tanpa proses perkalian tambahan.
Langkah 5: Preferensi Jadwal
Tampilan: Two-Column Layout. dengan Pertemuan A & Pertemuan B karena dalam satu minggu terdapat 2 kali pertemuan.
Input: Kolom Hari (Atas) dan Kolom Jam (Bawah).
Kolom Kiri (Hari): Pilihan hari (Senin - Sabtu) dalam bentuk radio button.
Kolom Kanan (Waktu): Pilihan waktu yang sudah dijadwalkan dalam bentuk radio button:
Sesi 1: 15:00 - 16:00 (WIB)
Sesi 2: 16:00 - 17:00 (WIB)
Sesi 3: 17:00 - 18:00 (WIB)
Sesi 4: 18:00 - 19:00 (WIB)
Sesi 5: 19:00 - 20:00 (WIB)
Sesi 6: 20:00 - 21:00 (WIB)
Dengan Logika Sistem (Backend) & Validasi Bentrok: Sistem menggunakan kuota maksimal per slot sesi. Jika total siswa yang memilih suatu slot (misal: Sesi 1 hari Senin jam sekian) sudah mencapai batas maksimal kapasitas ruangan atau operasional bimbel, maka pilihan waktu tersebut akan otomatis dinonaktifkan (disabled/berubah warna abu-abu) bagi calon pendaftar berikutnya dengan keterangan 'Kuota Sesi Penuh'. 
Langkah 6: Review Data 
Komponen: Menampilkan seluruh rangkuman data dari Step 1 sampai Step 5 dalam satu halaman agar orang tua bisa mengecek ulang apakah ada salah ketik. 
Langkah 7: Konfirmasi & Pembayaran
terdapat wording data pendaftaran berhasil
instruksi pembayaran
unggah bukti pembayaran


Pada Pilihan Paket Belajar di Ruang Les ini ada spesifikasinya:

RUANG PRIVAT
Kelas 1-3 SD
- Maksimal 1 siswa per kelas
- 8× pertemuan
- Waktu belajar 1 jam (60 menit) per pertemuan
- Sesi belajar dapat dilakukan di rumah siswa atau di ruang les
- Harga:
Belajar di Ruang Les: Rp440.000
Panggilan ke Rumah: Rp600.000

RUANG PRIVAT
Kelas 4-6 SD
- Maksimal 1 siswa per kelas
- 8× pertemuan
- Waktu belajar 1 jam (60 menit) per pertemuan
- Sesi belajar dapat dilakukan di rumah siswa atau di ruang les
- Harga:
Belajar di Ruang Les: Rp640.000
Panggilan ke Rumah: Rp800.000

RUANG SEMI PRIVAT
Kelas 1-3 SD
- Maksimal 2 siswa per kelas
- 8× pertemuan
- Waktu belajar 1 jam (60 menit) per pertemuan
- Sesi belajar dilakukan di ruang les
- Harga: Rp200.000

RUANG SEMI PRIVAT
Kelas 4-6 SD
- Maksimal 2 siswa per kelas
- 8× pertemuan
- Waktu belajar 1 jam (60 menit) per pertemuan
- Sesi belajar dilakukan di ruang les
- Harga: Rp240.000

RUANG REGULER
Kelas 1-6 SD
- Terdiri dari 4 hingga 6 siswa per kelas
- Maksimal 6 siswa per kelas
- 8× pertemuan
- Waktu belajar 1 jam (60 menit) per pertemuan
- Sesi belajar dilakukan di ruang les
- Harga: Rp120.000


Setelah itu, Alurnya:
Orang tua harus menyelesaikan Formulir (Step 7):
Orang Tua mengunggah bukti bayar.
Setelah klik "Selesai", status pendaftaran di sistem menjadi "Menunggu Verifikasi" (Pending).
Tampilan Dashboard Orang Tua (Status Pending):
Dashboard terbuka, namun semua menu pada sidebar Dashboard tetap terkunci (disabled).
Muncul notifikasi/banner di bagian atas: "Pembayaran Anda sedang dalam proses verifikasi oleh Admin. Fitur akan terbuka otomatis setelah diverifikasi."
Tindakan Admin:
Admin mengecek bukti bayar di menu Keuangan > Pembayaran.
Jika sudah sesuai, Admin menekan tombol "Verifikasi".
Aktivasi Otomatis:
Sistem mengubah status pendaftaran menjadi "Aktif".
Notifikasi Email terkirim otomatis ke Orang Tua: "Pembayaran diverifikasi! Selamat bergabung di Ruang Les. Akses dashboard Anda kini telah terbuka penuh."
Seluruh menu di Dashboard Orang Tua otomatis terbuka dan bisa digunakan.


Pada tampilan halaman khusus admin, spesifikasinya:
Dashboard dengan Statistik Utama (Overview)
Halaman pertama yang dilihat Admin setelah login, berisi ringkasan data berupa widget atau grafik.
Kelola Bimbel (Content Management System - CMS)
Modul untuk mengedit konten yang tampil di Landing Page secara dinamis tanpa koding:
Hero Section: Judul utama, sub-judul, dan gambar latar.
Profil Ismaturrohmah: Teks "Tentang Kami", foto profil, sejarah, visi, misi, mentor.
Testimoni: Input data orang tua siswa yang memberikan ulasan positif. 
FAQ: Menambah, menghapus, atau mengedit daftar tanya-jawab yang sering diajukan.
Kontak: Update nomor WhatsApp, email, alamat domisili, dan link Google Maps.
Kelola User
Data Master
Mentor
Siswa
Paket Program Belajar (fokus: untuk semua jenis paket belajar). 
Data yang diinput di sini akan otomatis tampil di dua tempat:
Landing Page: Sebagai kartu informasi/iklan paket.
Formulir Pendaftaran: Sebagai pilihan yang bisa diklik user.
Cakupan: 
- nama paket
- maksimal siswa perkelas
- jumlah pertemuan
- durasi pertemuan
- harga
- info sesi belajar dapat dilakukan di rumah siswa atau di rumah mentor
- info materi menyesuaikan kebutuhan siswa
- info pendampingan materi sekolah dan konsultasi PR
Kelola Akademik
Jadwal Kelas: Memasangkan Siswa + Mentor + Waktu.
Presensi (Monitoring): tiap 1 kelas ada Harian, Mingguan, Bulanan.
Catatan Perkembangan:
Admin melakukan pemantauan presensi harian, nilai, dan catatan perkembangan yang telah diinput oleh Mentor. Jika ada mentor yang lupa/belum mengisi data dalam 1x24 jam, Admin dapat menekan tombol "Kirim Pengingat" yang akan memicu notifikasi otomatis ke sistem Mentor.
Evaluasi AI Perbulan: Ringkasan progres otomatis berbasis kecerdasan buatan. Terdapat tombol "Generate Laporan" agar Admin mengecek apakah semua mentor sudah mengisi catatan perkembangan harian sebelum AI mulai bekerja. Nantinya, tombol tersebut saat diklik, sistem mengecek database; jika ada mentor yang belum mengisi catatan perkembangan, tombol ini akan terkunci sementara dan memunculkan peringatan nama mentor yang belum melengkapi data.
Nilai: Nilai tiap pertemuan dan Rekapitulasi hasil.
Keuangan
Pembayaran: pada pembayaran bimbel ini terdapat Kebijakan Fleksibilitas Pembayaran, yaitu: Manajemen pembayaran berbasis kuota 8 kali pertemuan. 
Dengan Logika Sistem (Backend):
Ketika sisa kuota siswa sudah 0, sistem tidak mengunci menu presensi Admin. Admin tetap diizinkan menginput status "Hadir" jika siswa tetap datang belajar, sehingga kuota akan berkurang menjadi negatif (0 → -1 → -2).
Jika kuota berada di angka 0 dan belum ada bukti bayar baru, sistem akan memicu peringatan bahwa pendaftaran sesi berikutnya tertunda.
Jika kuota sudah menjadi negatif (< 0), sistem otomatis mengubah template notifikasi menjadi pesan teguran: "Halo Bunda/Ayah, sekadar menginfokan bahwa sesi belajar Ananda [Nama] sudah melampaui kuota (Sisa: [Angka Negatif]). Mohon kerjasamanya untuk penyelesaian administrasi agar operasional kami tetap berjalan lancar. Terima kasih sudah mempercayakan pendidikan Ananda kepada kami.”
Layanan Lainnya
berbentuk formulir yang akan berisi feedback dari orang tua, request materi pertemuan selanjutnya, request jadwal, dll.
Pengumuman/Notifikasi: Tempat admin sebagai pusat kendali komunikasi untuk menyebarkan informasi penting kepada orang tua.
Kategori Informasi: Mencakup jadwal libur operasional, kalender ujian, serta program promosi bimbel.
Target Audiens: Opsi untuk menampilkan pengumuman secara publik (di Landing Page) atau privat (hanya pada Dashboard pengguna terdaftar).
Status Pengumuman: Manajemen status informasi (Aktif, Arsip, atau Terjadwal). 
Pada tampilan halaman mentor, spesifikasinya:
Dashboard Mentor
Menampilkan Widget Tugas Tertunda. Sistem akan memunculkan peringatan wajib jika Mentor belum mengisi Presensi atau Catatan Perkembangan untuk kelas yang sudah selesai pada hari tersebut.
Kelola Akademik
Jadwal Kelas: Menampilkan daftar kelas aktif yang menjadi tanggung jawab mentor tersebut dan masing-masing kelas terdapat 3 tombol cepat: Presensi, Catatan, dan Nilai.
Presensi: tiap 1 kelas ada Harian, Mingguan, Bulanan.
Input presensi oleh Mentor memiliki 3 opsi status dengan Logika Sistem (Backend):
Status "Hadir": Mengurangi sisa kuota pertemuan siswa sebanyak 1 sesi (8 → 7).
Status "Tidak Hadir" (Izin/Sakit/Alpha): Tidak mengurangi kuota pertemuan siswa, dan sistem otomatis menggeser estimasi tanggal pertemuan ke-8 (Hari-H) mundur ke jadwal berikutnya.
Status "Kelas Diliburkan" (Tanggal Merah/Mentor Berhalangan): Digunakan Admin dan Mentor jika pada hari tersebut bimbel sedang libur atau kelas batal. Status ini diberlakukan untuk seluruh siswa di kelas tersebut. Tidak mengurangi kuota, dan otomatis menggeser Hari-H mundur ke jadwal berikutnya.
Catatan Perkembangan:
Input Manual oleh mentor setiap pertemuan untuk setiap anak (biasanya akan mencakup: Materi, Skor Pemahaman, Status Fokus, dan Catatan Kendala). Data ini akan menjadi pakan (raw data) bagi AI di sistem Admin.
Evaluasi AI Perbulan: Ringkasan progres otomatis berbasis kecerdasan buatan. Mentor memiliki hak akses Read-Only (hanya lihat) terhadap dokumen Evaluasi AI bulanan yang telah berhasil dirilis oleh Admin. Fitur ini disediakan sebagai bahan acuan (evaluasi mandiri) bagi mentor untuk menyesuaikan metode dan strategi pengajaran di bulan berikutnya.
Nilai: Nilai tiap pertemuan dan Rekapitulasi hasil.
Repository Pembelajaran
Mentor memiliki akses Read & Download (Baca dan Unduh) ke pusat penyimpanan materi ajar sebagai persiapan sebelum sesi kelas dimulai.
Akses Tak Terbatas (Full View): Berbeda dengan Orang Tua yang aksesnya dikunci berdasarkan kelas anak, Mentor memiliki akses untuk melihat dan mengunduh seluruh materi dari semua jenjang (Kelas 1 - 6 SD) dan semua mata pelajaran. Hal ini dikarenakan satu mentor bisa saja mengajar kelas yang berbeda-beda di hari yang sama.
Filter Cerdas: Fitur pencarian dan filter untuk menyortir materi berdasarkan Jenjang/Kelas, Mata Pelajaran, dan Tipe Konten (Materi Utama, Latihan Soal, Pembahasan).
Integrasi Persiapan Mengajar: Mentor dapat mempratinjau (preview) dokumen soal atau modul instruksi mengajar secara langsung di dalam browser tanpa harus mengunduhnya, sehingga memudahkan saat mengajar menggunakan tablet atau laptop.


Pada tampilan halaman khusus orang tua, spesifikasinya:
Dashboard Orang Tua
Kelas Anak
Seluruh data di menu ini bersifat Read-Only (Hanya Baca) yang bersumber dari inputan Mentor dan Admin.
Jadwal Kelas: Kalender sesi aktif yang mencantumkan hari, jam, dan nama mentor.
Presensi
Catatan Perkembangan
Nilai
Keuangan
Informasi Tagihan: Menampilkan sisa kuota sesi belajar.
Pembayaran: Formulir unggah bukti bayar untuk pengisian ulang kuota (top-up sesi).
Riwayat Transaksi: Bukti pembayaran yang sudah diverifikasi (Aktif) atau masih (Pending) oleh Admin.
Layanan Lainnya
Formulir interaktif dua arah antara Orang Tua dan Admin (Pusat Bantuan). Yang akan berisi tempat formulir feedback maupun testimoni dari orang tua, request materi pertemuan selanjutnya, request jadwal, dll.

Pada tampilan halaman khusus orang tua memiliki fitur Switch Student jika terdapat lebih dari satu anak yang terdaftar di bawah satu akun email yang sama.
Fitur Global: Switch Student (Multi-Anak):
Akun Orang Tua mendukung relasi satu akun untuk banyak data anak (1-to-Many). Jika terdapat lebih dari satu anak yang terdaftar di bawah satu akun email yang sama, dashboard akan menampilkan komponen dropdown seleksi anak di bagian atas halaman.
Dengan Logika Sistem (Backend & UI):
Orang tua yang sudah login dapat menambahkan anak kedua/ketiga melalui tombol khusus "Daftarkan Anak Baru" tanpa perlu membuat akun email baru.
Ketika orang tua mengubah pilihan nama anak pada dropdown, sistem secara dinamis akan melakukan refresh data dan langsung memperbarui seluruh isi menu di bawahnya (Jadwal Kelas, Presensi, Catatan Perkembangan, Nilai, hingga Sisa Kuota Keuangan) sesuai dengan ID anak yang sedang dipilih. 
Pada tampilan halaman Repository Pembelajaran (Modul Materi Digital), spesifikasinya:
berfungsi sebagai kyimpanan dan distribusi materi ajar, latihan soal, dan modul belajar bagi siswa.
Pada Tampilan Admin (Back-end Management)
Admin memiliki kendali penuh untuk mengelola konten agar tetap relevan dengan kurikulum.
Upload Materi: Tombol untuk mengunggah file (PDF, Docx, Gambar, Video, atau link pembelajaran dari youtube/web/lainnya) dengan syarat: file dokumen (PDF, Docx) maksimal berukuran 5MB - 10MB yang boleh diunggah langsung. Untuk Video, wajibkan untuk menggunakan link YouTube (Unlisted) atau Google Drive, dan sistem hanya akan melakukan embed (menyematkan) video tersebut di halaman Dashboard.
Kategorisasi Terstruktur: Agar tidak berantakan, setiap file wajib diberi label:
Jenjang/Kelas: (Contoh: Kelas 1, Kelas 2, dst).
Mata Pelajaran: (Contoh: Matematika (MTK), Bahasa Indonesia, Bahasa Inggris, IPAS, Pendidikan Pancasila, Tematik, dan PLBJ).
Tipe Konten: (Contoh: Materi Utama, Latihan Soal, Pembahasan PR, Tips Belajar).
Tingkat akses: (Contoh: Publik untuk semua siswa atau Privat untuk siswa di kelas tertentu atau Khusus Mentor untuk dokumen panduan mengajar/kunci jawaban yang tidak boleh dilihat oleh orang tua/siswa).
Manajemen File: Admin bisa memperbarui (update) materi lama atau menghapus materi yang sudah tidak relevan.
Pada Tampilan Orang Tua (Dashboard)
Orang tua dapat mengakses materi ini sesuai dengan profil anak mereka.
Filter Cerdas: Fitur pencarian dan filter berdasarkan mata pelajaran atau kategori tertentu.
Akses Terbatas (Hak Akses): Siswa hanya bisa melihat materi yang sesuai dengan Jenjang/Kelas yang dipilih saat pendaftaran.
Misal: Jika anak terdaftar di Kelas 3, maka folder materi Kelas 6 tidak akan muncul di dashboard-nya.
Pratinjau & Unduh: Opsi untuk melihat file secara langsung di browser (preview) atau mengunduhnya untuk dicetak secara mandiri.
Sinkronisasi dengan Alur Pendaftaran
Status Kunci: Menu Repository di Header hanya bisa diklik jika pengguna sudah Login.
Status Verifikasi: Di dalam dashboard, materi hanya bisa diunduh jika status pembayaran sudah "Aktif" (Terverifikasi oleh Admin). Jika masih Pending, folder materi akan terlihat tapi tidak bisa dibuka/diunduh.
Logika Akses & Sinkronisasi Alur (Single Entry Point)
Menu "Repository" pada Header utama bersifat dinamis; hanya dapat diklik setelah pengguna berhasil Login.
Ketika menu "Repository" di Header diklik, sistem akan otomatis mengarahkan (redirect) pengguna masuk ke halaman Repository yang berada di dalam Dashboard Orang Tua (Satu pintu/Single Entry Point).
Kondisi Pembayaran Pending: Jika status pendaftaran/pembayaran siswa masih "Menunggu Verifikasi", halaman Repository di dalam dashboard tetap dapat dibuka, dan folder daftar materi berdasarkan kelas anak tetap terlihat. Namun, seluruh tombol pratinjau (preview) dan unduh (download) dalam kondisi terkunci (disabled), disertai pesan info: "Modul materi belum dapat diunduh. Silakan selesaikan verifikasi pembayaran terlebih dahulu."
Kondisi Pembayaran Aktif: Setelah di-verifikasi Admin, seluruh folder materi terbuka penuh. Orang tua dapat menggunakan fitur Filter Cerdas (berdasarkan mata pelajaran/kategori) serta melakukan pratinjau langsung di browser atau mengunduh file (PDF, Docx, Video/Link Youtube).
Filter Otomatis Jenjang: Materi yang tampil di dashboard orang tua otomatis tersaring berdasarkan kelas anak yang dipilih saat pendaftaran (Misal: Anak Kelas 3 hanya bisa melihat materi Kelas 3, folder Kelas 6 otomatis disembunyikan oleh sistem).


SISTEM NOTIFIKASI PENGINGAT (REMINDER) DALAM WEBSITE

Sistem menggunakan pendekatan Notifikasi Ganda (Dual-Channel). Notifikasi utama bersifat In-App (ditampilkan langsung di dalam antarmuka website melalui menu/ikon lonceng notifikasi pada Dashboard) yang mencakup keseluruhan pembaruan informasi operasional secara real-time. Sementara itu, notifikasi pendukung dikirimkan melalui Email khusus untuk hal-hal yang bersifat urgensi, pengingat tagihan, serta pengiriman dokumen resmi (seperti bukti bayar dan Laporan AI).

Notifikasi Pendaftaran Akun: Dikirimkan kepada Orang Tua setelah pendaftaran akun berhasil (sebelum mengisi formulir). 
Notifikasi Pendaftaran Bimbel: Dikirimkan kepada Admin saat ada user yang berhasil menyelesaikan seluruh tahapan formulir pendaftaran.
Notifikasi Akademik (Rutin)
Sesi Belajar: Pengingat otomatis untuk Orang Tua dan Mentor yang dikirimkan 1 jam sebelum jadwal pertemuan dimulai.
Laporan Perkembangan (Manual & AI): Notifikasi kepada Orang Tua saat Mentor telah menginput catatan perkembangan harian dan saat Sistem AI telah merilis evaluasi progres bulanan.
Laporan Nilai: Pemberitahuan kepada Orang Tua saat rekapitulasi nilai pertemuan atau ujian telah diperbarui oleh Admin/Mentor.
Notifikasi Keuangan 
Sistem pengingat tagihan otomatis kepada Orang Tua dengan frekuensi:
H-7 & H-3: Pengingat awal masa pembayaran.
H-1: Pengingat batas akhir (H-1).
Hari H: Notifikasi jatuh tempo pembayaran.
Status Verifikasi: Notifikasi otomatis kepada Orang Tua setelah Admin menekan tombol "Verifikasi" pada bukti pembayaran yang diunggah.
Sistem harus menghitung Estimasi Tanggal Pertemuan ke-8 sebagai "Hari H".
Cara Kerja Sistem:
Orang tua mendaftar dan membayar untuk 8 pertemuan pertama.
Sistem melihat jadwal rutin anak (misal: Senin & Kamis).
Sistem memprediksi pertemuan ke-8 akan jatuh pada tanggal tertentu (Hari H Sementara) berdasarkan perhitungan hari rutin (misal: Senin & Kamis).
Logika Pergeseran Hari-H (Kalender Dinamis): Prediksi tanggal Hari-H akan otomatis bergeser mundur/bertambah lama hanya jika Admin/Mentor melakukan input presensi dengan status "Siswa Tidak Hadir" atau "Kelas Diliburkan". Jika Admin/Mentor tidak pernah menginput kedua status tersebut, maka sistem akan mengirimkan notifikasi penagihan (H-7, H-3, H-1, Hari-H) sesuai dengan tanggal prediksi awal secara tepat waktu.
Logika Pemicu (Trigger) Notifikasi Tagihan:
Sistem menggunakan Logika Kondisional Dua Jalur berdasarkan status kuota siswa:
KONDISI A: Jalur Normal (Sesuai penjelasan cara kerja estimasi Hari H di atas)
KONDISI B: Jalur Tunggakan (Sisa Kuota ≤ 0) 
Sistem menghentikan perhitungan berdasarkan tanggal kalender. Pengingat berganti menjadi Sistem Teguran Berbasis Aksi Presensi:
Saat Kuota = 0: Jika kuota berada di angka 0 dan belum ada verifikasi bukti bayar baru, sistem memicu peringatan di Dashboard bahwa pendaftaran sesi berikutnya tertunda.
Saat Kuota Negatif (< 0): Setiap kali Admin menginput status "Hadir" pada kelas anak tersebut (yang membuat kuota makin minus, misal dari -1 menjadi -2), sistem backend akan langsung memicu pengiriman template teguran kepada Orang Tua.
Notifikasi Layanan & Feedback (Interaktif)
Permintaan Pengguna: Alert kepada Admin saat ada request jadwal atau materi baru dari Orang Tua.
Tanggapan Admin: Notifikasi kepada Orang Tua saat Admin telah memberikan solusi atau jawaban atas feedback yang dikirimkan.
Notifikasi Pengumuman akan bertindak sebagai pusat informasi di mana Orang Tua mendapatkan peringatan mengenai berita penting seperti hari libur, jadwal ujian, hingga promo terbaru.
