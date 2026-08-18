# 3. PEMBAHASAN

## 3.1. Gambaran Umum
Sistem manajemen bimbingan belajar berbasis website "Ruang Les by Ismaturrohmah" merupakan sebuah sistem informasi yang dirancang untuk mempermudah pengelolaan data operasional lembaga secara digital. Sistem ini dibuat untuk menggantikan proses pencatatan konvensional di buku catatan dan buku kas fisik, lembar kertas nilai yang terpisah, dan komunikasi catatan perkembangan lisan tanpa dokumentasi tertulis, sehingga seluruh proses administrasi dan akademik dapat terintegrasi secara lebih aman dan efisien.

Hak akses pengguna di dalam sistem ini dibagi menjadi tiga kategori untuk mengoptimalkan seluruh alur operasional lembaga, yaitu Admin, Mentor, dan Orang Tua Murid. Sistem ini mempermudah Admin dalam memusatkan pengelolaan dan pemantauan data, memverifikasi pendaftaran dan pembayaran, serta mengatur konten landing page melalui fitur CMS secara efisien. Selain itu, kehadiran sistem ini membantu Mentor untuk menginput presensi, catatan perkembangan, dan nilai murid secara digital dan terstruktur pada tiap pertemuan. Di sisi lain, Orang Tua Murid diberikan fasilitas pendaftaran bimbel online serta transparansi penuh untuk memantau perkembangan akademik anak, memberikan bukti pembayaran untuk melanjutkan sesi belajar, dan mengelola data lebih dari satu anak secara praktis melalui fitur Switch Student.

Pembuatan sistem ini menggunakan metode SDLC model Waterfall yang menekankan tahapan pengembangan secara terstruktur dan berurutan dari tahap analisis hingga pengujian. Secara teknis, sistem ini dibuat menggunakan framework Laravel 12 sebagai backend untuk mengelola logika bisnis, MySQL sebagai Database Management System (DBMS) untuk penyimpanan data relasional, dan Tailwind CSS untuk perancangan antarmuka pengguna yang responsif.

## 3.2. Tahap Perencanaan
Untuk menghasilkan sebuah website bimbingan belajar yang tepat, diperlukan perencanaan yang matang dengan melakukan analisis kelayakan mengenai metode yang akan diterapkan dalam pengumpulan data. Perencanaan ini melibatkan analisis terhadap kebutuhan pengguna, sumber daya yang tersedia, serta sasaran dari sistem yang hendak dibangun, agar website yang dibuat dapat secara efektif dan efisien menjawab kebutuhan operasional lembaga. Ada beberapa halaman yang nantinya dapat diakses dalam website ini, di antaranya:

1. Halaman utama yang terdiri dari informasi program belajar, testimoni, FAQ, kontak, registrasi untuk akun orang tua, login untuk semua pengguna, dan profil tentang kami.
2. Halaman admin yang terdiri dari dashboard, verifikasi pendaftaran, data program belajar, data mentor, data murid, data orang tua/wali, jadwal kelas, presensi, catatan perkembangan, nilai, repositori materi belajar, pembayaran, pengumuman, layanan, kelola konten landing page (CMS), kelola pengguna, profil admin, dan logout.
3. Halaman mentor yang terdiri dari dashboard, jadwal kelas, riwayat belajar, repositori materi belajar, layanan, profil mentor, dan logout.
4. Halaman orang tua yang terdiri dari dashboard (dengan tiga state), formulir pendaftaran, jadwal kelas, buku akademik anak, informasi tagihan dan unggah bukti bayar, riwayat transaksi, layanan, repositori materi belajar, fitur switch student, profil orang tua, dan logout.

## 3.3. Tahap Analisis
Pada tahap analisis ini, pembahasan difokuskan pada tiga aspek utama, yaitu analisis stakeholder, kebutuhan fungsional, dan kebutuhan non-fungsional. Analisis stakeholder dilakukan untuk mengidentifikasi pihak-pihak yang terlibat dalam sistem. Kebutuhan fungsional mencakup seluruh fitur yang harus disediakan sistem seperti pendaftaran murid online, rekapitulasi data akademik (presensi, catatan perkembangan, dan nilai), repositori materi belajar, serta pengelolaan notifikasi. Sementara itu, kebutuhan non-fungsional meliputi spesifikasi teknis perangkat keras dan lunak yang digunakan, aspek keamanan sistem, serta kompatibilitas dan performa aplikasi.

### 3.3.1. Analisis Stakeholder
Analisis stakeholder penting dilakukan untuk mengidentifikasi seluruh pihak yang terlibat, baik secara langsung maupun tidak langsung, dalam penggunaan sistem manajemen bimbingan belajar "Ruang Les by Ismaturrohmah". Setiap stakeholder mempunyai peran, kebutuhan, dan harapan yang berbeda, oleh karena itu sistem perlu dirancang untuk memenuhi kepentingan tersebut secara menyeluruh. Berikut ini adalah stakeholder utama yang terlibat:

1. **Admin**: Menginginkan platform yang memusatkan seluruh data operasional lembaga, dengan pemantauan data akademik yang otomatis terintegrasi dengan kalkulasi estimasi Hari-H berbasis kalender dinamis, serta proses verifikasi pendaftaran dan pembayaran yang langsung memperbarui sistem kuota sesi.
2. **Mentor**: Menginginkan sistem yang memudahkan proses menginput presensi, mencatat perkembangan belajar, dan memasukkan nilai, serta akses ke repositori materi ajar digital untuk semua jenjang kelas SD.
3. **Orang Tua Murid**: Menginginkan kemudahan mengakses informasi akademik anak secara transparan, mengonfirmasi bukti transfer pembayaran bimbingan belajar, serta berkomunikasi dengan lembaga melalui sistem.

### 3.3.2. Analisis Kebutuhan Fungsional
Berdasarkan analisis proses bisnis yang berjalan dan hasil identifikasi kebutuhan dari setiap stakeholder, kebutuhan fungsional pada website ini diuraikan sebagai berikut:

1. **Kebutuhan Fungsional Admin**
   a. Memverifikasi pendaftaran murid baru.
   b. Mengelola data program belajar, mentor, murid, orang tua/wali, pengguna, jadwal kelas, repositori materi belajar, pengumuman, dan konten landing page (CMS).
   c. Melihat, mengubah, dan menghapus data presensi, catatan perkembangan, dan nilai.
   d. Memantau status kuota sesi murid.
   e. Mengirim pengingat tagihan pembayaran ke orang tua murid.
   f. Memverifikasi bukti transfer pembayaran.
   g. Melihat, membalas, dan menutup tiket layanan.
   h. Mengelola profil admin.
   i. Melakukan login dan logout.

2. **Kebutuhan Fungsional Mentor**
   a. Melihat jadwal kelas.
   b. Mengelola data presensi, catatan perkembangan, dan nilai.
   c. Melihat dan mengunduh materi belajar.
   d. Membuat, membalas, dan menutup tiket layanan.
   e. Mengelola profil mentor.
   f. Melakukan login dan logout.

3. **Kebutuhan Fungsional Orang Tua Murid**
   a. Mengisi formulir pendaftaran.
   b. Melihat jadwal kelas, data presensi, catatan perkembangan, dan nilai.
   c. Melihat tagihan pembayaran.
   d. Mengunggah bukti pembayaran.
   e. Melihat riwayat seluruh transaksi.
   f. Melihat dan mengunduh materi belajar.
   g. Membuat, membalas, dan menutup tiket layanan.
   h. Berpindah profil anak.
   i. Mengelola profil orang tua.
   j. Melakukan login dan logout.

### 3.3.3. Analisis Kebutuhan Non-Fungsional
Kebutuhan non-fungsional menjelaskan kriteria kualitas yang harus dipenuhi sistem di luar fungsi utamanya. Kebutuhan ini terbagi menjadi 3, yaitu perangkat keras, perangkat lunak, dan kinerja sistem. Berikut ini adalah analisis kebutuhan non-fungsional untuk website Ruang Les sebagai berikut:

#### 3.3.3.1. Kebutuhan Perangkat Keras
Spesifikasi perangkat keras yang digunakan dalam pembuatan website ini adalah:
1. Processor : AMD Ryzen™ R7-7435HS @3.10 GHz
2. Graphics Card: NVIDIA® GeForce RTX™ 4060 Laptop GPU (8 GB)
3. Memori (RAM) : 32GB SO-DIMM DDR5-4800

#### 3.3.3.2. Kebutuhan Perangkat Lunak
Spesifikasi perangkat lunak yang digunakan dalam pembuatan website ini adalah:
1. Sistem Operasi: Windows 11 Home 25H2
2. Bahasa Pemrograman: PHP versi 8.2, JavaScript, HTML, CSS
3. Runtime Environment: Node.js versi 20 LTS
4. Framework & Library: Laravel Framework versi 12, Tailwind CSS 3, Alpine.js
5. Database: MySQL versi 8.0
6. Local Server: Laragon versi 6
7. Text Editor: Visual Studio Code versi 1.9
8. Browser: Google Chrome, Brave
9. Visual Modeling Tools: Draw.io, Balsamiq, Figma

#### 3.3.3.3. Kinerja Sistem
Kinerja sistem dianalisis berdasarkan empat aspek utama yang memengaruhi kualitas pengalaman pengguna.

- **Performa**: Sistem diharapkan mampu memuat halaman utama dalam waktu kurang dari 3 detik pada koneksi internet standar. Proses pengiriman data formulir dan penyimpanan ke basis data diharapkan berjalan dalam waktu kurang dari 2 detik.
- **Keamanan**: Sistem menggunakan mekanisme autentikasi berbasis sesi yang dikelola oleh Laravel. Setiap permintaan yang membutuhkan hak akses tertentu akan diverifikasi melalui middleware sebelum diproses. Kata sandi pengguna disimpan dalam bentuk hash menggunakan algoritma bcrypt. Sistem juga dilengkapi perlindungan terhadap serangan CSRF (Cross-Site Request Forgery) secara bawaan dari framework Laravel.
- **Kompatibilitas**: Sistem dirancang untuk dapat diakses pada peramban web modern, meliputi Google Chrome versi 100 ke atas, Mozilla Firefox versi 100 ke atas, Microsoft Edge versi 100 ke atas, dan Safari versi 15 ke atas. Antarmuka pengguna bersifat responsif sehingga dapat digunakan pada layar komputer, laptop, maupun tablet.
- **Ketersediaan**: Sistem diharapkan dapat diakses selama 24 jam sehari, 7 hari seminggu, setelah dipublikasikan ke server hosting. Ketersediaan ini bergantung pada layanan server hosting yang digunakan.

## 3.4. Tahap Perancangan
Tahap perancangan dilakukan untuk membuat rancangan awal sistem sebelum masuk ke proses penulisan kode program. Dalam pembuatan website Ruang Les, tahap perancangan ini dibagi menjadi beberapa aspek utama. Pertama, perancangan Unified Modeling Language (UML) untuk memodelkan sistem secara visual. Kedua, perancangan struktur tabel untuk mengatur penyimpanan data pada database. Ketiga, perancangan struktur navigasi untuk memetakan alur perpindahan antar halaman. Terakhir, perancangan antarmuka untuk memberikan gambaran desain tampilan website yang akan digunakan oleh pengguna.

### 3.4.1. Perancangan UML
Pemodelan Unified Modeling Language (UML) pada sistem ini difungsikan sebagai alat bantu visual. Penggunaan UML bertujuan agar alur kerja dan rancangan sistem bisa tergambar dengan lebih jelas sebelum mulai melakukan pemrograman. Ada tiga jenis diagram UML yang dibuat dalam perancangan website Ruang Les, yaitu Use Case Diagram, Activity Diagram, dan Class Diagram. Ketiga diagram ini digunakan secara bersamaan untuk menjelaskan bagaimana interaksi pengguna dengan sistem, urutan proses yang berjalan, serta struktur kelas yang saling berhubungan di dalamnya.

#### 3.4.1.1. Perancangan Use Case Diagram
Use Case Diagram pada sistem ini digunakan untuk menggambarkan relasi antara aktor dengan seluruh fungsi yang tersedia di dalam sistem. Terdapat tiga aktor utama yang berinteraksi dengan sistem, yaitu Admin, Mentor, dan Orang Tua. Karena cakupan fungsi setiap aktor berbeda, Use Case Diagram digambarkan secara terpisah untuk masing-masing aktor agar lebih mudah dibaca dan dipahami. Rancangan use case admin, guru, dan orang tua dapat dilihat pada gambar 3.1, 3.2, dan 3.3.

![Gambar 3.1. Rancangan Use Case Diagram Admin](gambar3_1.png)
*Gambar 3.1. Rancangan Use Case Diagram Admin*

Use case diagram pada Gambar 3.1 menjelaskan bahwa Admin memiliki hak akses penuh terhadap seluruh sistem, mulai dari login, mengakses dashboard, mengelola profil pribadinya, mengelola akun pengguna lain, hingga logout. Pengelolaan data master menjadi salah satu tanggung jawab utamanya yang mencakup empat entitas sekaligus melalui fungsi tambah, lihat, ubah, dan hapus (CRUD) pada Data Program Belajar, Data Mentor, Data Murid, dan Data Orang Tua. Di luar itu, Admin juga bertugas memverifikasi pendaftaran murid baru dan mengatur jadwal kelas. Dari sisi pemantauan akademik, hak akses Admin cukup luas mengenai presensi, catatan perkembangan, dan nilai murid yang tidak hanya bisa dilihat, tetapi juga diubah atau dihapus bila terjadi kekeliruan penginputan oleh Mentor. Admin pun mengelola materi belajar serta memantau kuota sesi tiap murid, lengkap dengan opsi mengirim pengingat pembayaran. Pada sisi keuangan, verifikasi pembayaran pun berada dalam tanggung jawab Admin, dengan opsi menambahkan data pembayaran secara manual pada transaksi tunai yang belum tercatat secara otomatis oleh sistem. Selain itu, Admin menangani komunikasi melalui pesan layanan, mengelola pengumuman, dan mengatur konten landing page.

![Gambar 3.2. Rancangan Use Case Diagram Mentor](gambar3_2.png)
*Gambar 3.2. Rancangan Use Case Diagram Mentor*

Use case diagram pada Gambar 3.2 menjelaskan bahwa Mentor memiliki akses yang terbatas hanya pada fungsi yang berkaitan dengan kegiatan belajar mengajar. Mentor dapat melihat landing page, melakukan login, mengakses dashboard, mengelola profil, dan logout. Melalui menu jadwal kelas, mentor dapat terhubung langsung ke fungsi mengelola presensi, mengelola catatan perkembangan, dan mengelola nilai. Di luar aktivitas mengajar, Mentor dapat melihat riwayat belajar tiap murid yang diajar olehnya. Dalam mendukung proses pengajaran, mentor dapat mengakses materi belajar yang dilengkapi dengan opsi pengunduhan materi. Pada sisi komunikasi, interaksi mentor difasilitasi melalui fitur layanan.

![Gambar 3.3. Rancangan Use Case Diagram Orang Tua](gambar3_3.png)
*Gambar 3.3. Rancangan Use Case Diagram Orang Tua*

Use case diagram pada Gambar 3.3 menjelaskan bahwa Orang Tua Murid memiliki akses yang berfokus pada pemantauan akademik anak dan pengelolaan administrasi pembayaran. Orang Tua dapat melihat landing page, melakukan login, dan mengisi formulir pendaftaran. Bagi Orang Tua yang memiliki lebih dari satu anak terdaftar di Ruang Les, sistem menyediakan fungsi beralih profil anak untuk memudahkan pemantauan data masing-masing anak. Pada sisi akademik, Orang Tua dapat memantau jadwal kelas anak. Selain itu, melalui menu buku akademik, orang tua dapat terhubung langsung ke data presensi, catatan perkembangan, dan nilai anak. Dalam mendukung belajar anaknya telah tersedia akses materi belajar yang dilengkapi opsi pengunduhan materi. Dari sisi keuangan, Orang Tua dapat melihat riwayat transaksi dan mengakses menu tagihan yang menyediakan fungsi pengunggahan bukti pembayaran. Sementara itu, kebutuhan komunikasi pun telah terfasilitasi lewat pesan layanan.

#### 3.4.1.2. Perancangan Activity Diagram
Activity Diagram menggambarkan alur aktivitas dari proses-proses utama dalam sistem, mulai dari proses autentikasi pengguna hingga proses-proses inti yang dilakukan oleh Admin, Mentor, maupun Orang Tua sesuai dengan perannya masing-masing. Setiap Activity Diagram merepresentasikan satu proses kerja yang benar-benar diimplementasikan pada sistem. Pada perancangan sistem Ruang Les ini, terdapat sebelas rancangan Activity Diagram yang dibuat.

![Gambar 3.4. Rancangan Activity Diagram Proses Login Admin dan Mentor](gambar3_4.png)
*Gambar 3.4. Rancangan Activity Diagram Proses Login oleh Admin dan Mentor*
Activity Diagram pada Gambar 3.4 menggambarkan alur proses login yang dilakukan oleh Admin dan Mentor. Proses dimulai ketika pengguna membuka halaman web Ruang Les by Ismaturrohmah, kemudian sistem menampilkan landing page. Selanjutnya, pengguna memilih menu login dan sistem menampilkan halaman login yang meminta alamat email dan kata sandi. Setelah pengguna mengisi alamat email dan kata sandi, sistem melakukan validasi terhadap alamat email dan kata sandi yang dimasukkan. Apabila valid, sistem akan mengautentikasi pengguna dan langsung mengarahkan pengguna ke halaman dashboard sesuai dengan perannya.

![Gambar 3.5. Rancangan Activity Diagram Proses Login Orang Tua](gambar3_5.png)
*Gambar 3.5. Rancangan Activity Diagram Proses Login oleh Orang Tua*
Activity Diagram pada Gambar 3.5 menggambarkan alur proses login khusus untuk Orang Tua, yang dipisahkan dari Admin dan Mentor karena memiliki alur pengarahan (redirect) setelah login yang berbeda. Setelah berhasil login, sistem akan menentukan tampilan dashboard berdasarkan status murid yang terhubung dengan akun Orang Tua tersebut (belum terdaftar, menunggu verifikasi, atau aktif).

![Gambar 3.6. Rancangan Activity Diagram Proses Pendaftaran](gambar3_6.png)
*Gambar 3.6. Rancangan Activity Diagram Proses Pendaftaran dan Verifikasi Murid Baru*
Activity Diagram pada Gambar 3.6 menggambarkan alur proses pendaftaran murid baru oleh Orang Tua hingga proses verifikasi oleh Admin. Setelah data pendaftaran tersimpan, Admin menerima notifikasi pendaftaran baru melalui sistem. Admin kemudian meninjau data pendaftaran tersebut sebelum menekan tombol verifikasi untuk menyetujui dan memproses pendaftaran tersebut.

![Gambar 3.7. Rancangan Activity Diagram Proses Jadwal](gambar3_7.png)
*Gambar 3.7. Rancangan Activity Diagram Proses Membuat Jadwal Kelas oleh Admin*
Activity Diagram pada Gambar 3.7 menggambarkan alur proses pembuatan jadwal kelas oleh Admin. Admin menginput data kelas seperti nama, mentor, paket, hari, serta jam belajar.

![Gambar 3.8. Rancangan Activity Diagram Proses Menambahkan Murid ke Jadwal](gambar3_8.png)
*Gambar 3.8. Rancangan Activity Diagram Proses Menambahkan Murid ke dalam Jadwal Kelas oleh Admin*
Activity Diagram pada Gambar 3.8 menggambarkan alur proses pengelolaan murid pada suatu jadwal kelas oleh Admin, yang melibatkan validasi kapasitas kelas.

![Gambar 3.9. Rancangan Activity Diagram Proses Presensi](gambar3_9.png)
*Gambar 3.9. Rancangan Activity Diagram Proses Pengisian Presensi oleh Mentor*
Activity Diagram pada Gambar 3.9 menggambarkan alur proses pengisian presensi murid oleh Mentor. Sistem mengurangi kuota sesi jika murid hadir, atau menggeser Hari-H mundur jika murid tidak hadir.

![Gambar 3.10. Rancangan Activity Diagram Catatan Perkembangan](gambar3_10.png)
*Gambar 3.10. Rancangan Activity Diagram Proses Pengisian Catatan Perkembangan oleh Mentor*
Activity Diagram pada Gambar 3.10 menggambarkan alur proses pengisian catatan perkembangan murid oleh Mentor.

![Gambar 3.11. Rancangan Activity Diagram Proses Nilai](gambar3_11.png)
*Gambar 3.11. Rancangan Activity Diagram Proses Pengisian Nilai oleh Mentor*
Activity Diagram pada Gambar 3.11 menggambarkan alur proses pengisian nilai murid oleh Mentor.

![Gambar 3.12. Rancangan Activity Diagram Proses Materi](gambar3_12.png)
*Gambar 3.12. Rancangan Activity Diagram Proses Pengelolaan Materi Belajar*
Activity Diagram pada Gambar 3.12 menggambarkan alur proses pengelolaan materi belajar oleh Admin hingga materi tersebut dapat diakses oleh Mentor dan Orang Tua.

![Gambar 3.13. Rancangan Activity Diagram Transaksi](gambar3_13.png)
*Gambar 3.13. Rancangan Activity Diagram Proses Transaksi dan Verifikasi Pembayaran*

![Gambar 3.14. Rancangan Activity Diagram Layanan](gambar3_14.png)
*Gambar 3.14. Rancangan Activity Diagram Proses Penanganan Pesan Layanan*

#### 3.4.1.3. Perancangan Class Diagram
Class Diagram menggambarkan struktur kelas-kelas utama dalam sistem beserta atribut, metode, dan relasi antar kelas.

![Gambar 3.15. Class Diagram Sistem Ruang Les](gambar3_15.png)
*Gambar 3.15. Class Diagram Sistem Manajemen Bimbingan Belajar Ruang Les*

### 3.4.2. Perancangan Struktur Tabel Basis Data
Basis data sistem dirancang menggunakan MySQL dengan 15 tabel utama. Tabel-tabel tersebut saling berelasi untuk mendukung seluruh alur operasional sistem.

**Tabel 3.1. Daftar Tabel Basis Data Sistem**

| Nama Tabel | Fungsi Utama |
|---|---|
| `users` | Menyimpan data akun seluruh pengguna beserta peran (role) |
| `mentor_profiles` | Menyimpan profil lengkap mentor (foto, telepon, status) |
| `student_registrations` | Tabel inti yang menyimpan data pendaftaran siswa, sisa kuota sesi, dan estimasi Hari-H |
| `packages` | Menyimpan data paket belajar (nama, kategori, harga, kapasitas) |
| `class_schedules` | Menyimpan pengaitan siswa, mentor, dan jadwal kelas |
| `attendances` | Menyimpan riwayat presensi per pertemuan beserta perubahan kuota |
| `progress_notes` | Menyimpan catatan perkembangan siswa per pertemuan yang diinput mentor |
| `scores` | Menyimpan nilai harian dan nilai rekapitulasi siswa |
| `payments` | Menyimpan riwayat pembayaran beserta status verifikasi dan kuota yang ditambahkan |
| `materials` | Menyimpan materi belajar di repositori beserta metadata dan kontrol akses |
| `announcements` | Menyimpan pengumuman dengan atribut target audiens dan jadwal tayang |
| `notifications` | Menyimpan notifikasi in-app untuk setiap pengguna |
| `tickets` | Menyimpan tiket layanan yang dikirimkan orang tua |
| `ticket_replies` | Menyimpan balasan tiket dari admin maupun orang tua |
| `cms_contents` | Menyimpan konten dinamis halaman publik yang dikelola admin |

**Tabel 3.2. Rincian Tabel student_registrations**

| Nama Kolom | Tipe Data | Keterangan |
|---|---|---|
| id | INT (PK) | Identitas unik pendaftaran |
| user_id | INT (FK) | Relasi ke tabel users (akun orang tua) |
| student_name | VARCHAR(100) | Nama lengkap siswa |
| birth_date | DATE | Tanggal lahir (dasar kalkulasi usia otomatis) |
| package_id | INT (FK) | Relasi ke tabel packages |
| quota_remaining | INT | Sisa kuota sesi (dapat bernilai negatif) |
| estimated_day_h | DATE | Estimasi tanggal pertemuan ke-8 (Hari-H) |

### 3.4.3. Perancangan Struktur Navigasi
Struktur navigasi menggambarkan peta alur perpindahan halaman dalam sistem untuk setiap panel pengguna.

- **Navigasi Halaman Publik**: Beranda (Landing Page) → Halaman Registrasi Akun Orang Tua → Halaman Login
- **Navigasi Panel Admin**: Dashboard Admin → Kelola Bimbel (CMS) → Kelola Pengguna → Data Master → Kelola Akademik → Keuangan → Layanan
- **Navigasi Panel Mentor**: Dashboard Mentor → Jadwal Mengajar → Presensi → Catatan Perkembangan → Nilai → Repositori Materi
- **Navigasi Portal Orang Tua**: Dashboard Orang Tua (3 kondisi status) → Formulir Pendaftaran → Kelas Anak → Keuangan → Layanan → Repositori Materi

### 3.4.4. Perancangan Tampilan (Wireframe)
Perancangan tampilan dilakukan menggunakan Figma sebelum proses implementasi dimulai. Wireframe menentukan tata letak elemen-elemen utama pada setiap halaman dan memastikan konsistensi visual antar panel.

![Gambar 3.16. Wireframe Landing Page](gambar3_16.png)
*Gambar 3.16. Wireframe Landing Page*

![Gambar 3.17. Wireframe Dashboard Admin](gambar3_17.png)
*Gambar 3.17. Wireframe Dashboard Admin*

![Gambar 3.18. Wireframe Dashboard Orang Tua](gambar3_18.png)
*Gambar 3.18. Wireframe Dashboard Orang Tua*

## 3.5. Tahap Implementasi

### 3.5.1. Implementasi Database
Implementasi basis data dilakukan menggunakan fitur migrasi (migration) yang tersedia dalam framework Laravel. Setiap tabel dibuat melalui file migrasi terpisah yang dapat dijalankan secara berurutan menggunakan perintah `php artisan migrate`. Pendekatan ini memungkinkan struktur basis data terdokumentasi dalam kode sumber dan dapat direproduksi secara konsisten di lingkungan mana pun. Seluruh relasi antar tabel diimplementasikan menggunakan foreign key constraint untuk menjaga integritas data.

### 3.5.2. Implementasi Halaman Website

#### 3.5.2.1. Landing Page dan Autentikasi
Landing Page diimplementasikan sebagai halaman statis yang kontennya diambil secara dinamis dari tabel `cms_contents`. Admin dapat mengubah teks, gambar, dan informasi yang tampil di setiap seksi halaman melalui panel CMS tanpa menyentuh kode program.

![Gambar 3.19. Tampilan Landing Page Ruang Les](gambar3_19.png)
*Gambar 3.19. Tampilan Landing Page Ruang Les*

#### 3.5.2.2. Panel Admin
Dashboard Admin menampilkan widget statistik pada halaman beranda seperti jumlah siswa aktif, pendaftaran menunggu verifikasi, mentor aktif, dan total pendapatan bulan berjalan.

![Gambar 3.20. Tampilan Dashboard Admin](gambar3_20.png)
*Gambar 3.20. Tampilan Dashboard Admin*

#### 3.5.2.3. Panel Mentor
Dashboard Mentor menampilkan widget tugas tertunda yang memberikan peringatan apabila terdapat kelas yang telah selesai namun presensi atau catatan perkembangan belum diisi.

![Gambar 3.21. Tampilan Dashboard Mentor](gambar3_21.png)
*Gambar 3.21. Tampilan Dashboard Mentor*

#### 3.5.2.4. Portal Orang Tua
Dashboard Orang Tua memiliki tiga kondisi tampilan yang berbeda berdasarkan status pendaftaran anak: Belum Terdaftar, Menunggu Verifikasi, dan Aktif.

![Gambar 3.22. Tampilan Dashboard Orang Tua](gambar3_22.png)
*Gambar 3.22. Tampilan Dashboard Orang Tua*

### 3.5.3. Implementasi Logika Inti Sistem
Bagian ini membahas dua logika inti yang menjadi pembeda utama sistem Ruang Les dari sistem manajemen bimbingan belajar pada umumnya.

#### 3.5.3.1. Logika Kalender Dinamis dan Pergeseran Hari-H
Logika kalender dinamis bekerja dalam dua momen berbeda: saat verifikasi pendaftaran untuk menghitung Hari-H awal, dan saat input presensi untuk menggeser Hari-H apabila diperlukan. Ketika admin memverifikasi pendaftaran siswa, sistem membaca dua hari jadwal rutin yang dipilih siswa serta tanggal verifikasi sebagai titik awal. Sistem kemudian menelusuri kalender ke depan untuk menetapkan tanggal pertemuan ke-8 sebagai Hari-H. Setiap kali presensi dengan status Tidak Hadir atau Kelas Diliburkan diinput, sistem menggeser Hari-H ke jadwal berikutnya.

#### 3.5.3.2. Logika Sistem Kuota Sesi
Setiap siswa memiliki kolom `quota_remaining` pada tabel `student_registrations` yang diinisialisasi dengan nilai 8 pada saat pendaftaran diverifikasi. Logika kuota berjalan mengikuti empat kondisi:

**Tabel 3.3. Kondisi Logika Sistem Kuota Sesi**

| Kondisi | Pemicu | Aksi Sistem |
|---|---|---|
| A | Status presensi = Hadir | `quota_remaining` dikurangi 1 |
| B | Status presensi = Tidak Hadir / Diliburkan | `quota_remaining` tidak berubah |
| C | `quota_remaining` mencapai 0 | Peringatan muncul di dashboard admin dan orang tua |
| D | `quota_remaining` sudah negatif dan presensi Hadir kembali diinput | Notifikasi teguran tunggakan dikirim otomatis ke orang tua |

Sistem tidak memblokir input presensi ketika saldo kuota mencapai nol, melainkan memberikan fleksibilitas operasional kepada lembaga untuk mencatat kehadiran sambil secara otomatis mengirimkan notifikasi teguran penagihan.

## 3.6. Publikasi Website
Setelah seluruh tahap pengembangan dan pengujian selesai, sistem dipublikasikan ke lingkungan web hosting agar dapat diakses secara daring. Kode sumber sistem diunggah ke server hosting, basis data MySQL dibuat pada server dan diisi dengan struktur tabel melalui migrasi Laravel, serta aset *front-end* dikompilasi menggunakan perintah `npm run build`.

## 3.7. Tahap Uji Coba

### 3.7.1. Uji Coba Black Box
Uji coba *Black Box* dilakukan untuk memverifikasi bahwa seluruh fungsionalitas sistem berjalan sesuai dengan kebutuhan yang telah diidentifikasi.

**Tabel 3.4. Hasil Uji Coba Black Box — Logika Kuota dan Presensi**

| No | Komponen Uji | Data Input | Hasil yang Diharapkan | Hasil |
|---|---|---|---|---|
| 1 | Input presensi Hadir saat kuota 5 | Status Hadir, kuota awal 5 | Kuota berkurang menjadi 4, Hari-H tidak bergeser | Sesuai |
| 2 | Input presensi Tidak Hadir saat kuota 3 | Status Tidak Hadir, kuota awal 3 | Kuota tetap 3, Hari-H bergeser mundur satu jadwal | Sesuai |
| 3 | Input presensi Hadir saat kuota 0 | Status Hadir, kuota awal 0 | Kuota menjadi -1, teguran tunggakan muncul | Sesuai |

### 3.7.2. Uji Coba Kompatibilitas Browser
Uji coba kompatibilitas browser dilakukan untuk memastikan sistem dapat berjalan dengan baik pada peramban web utama seperti Google Chrome, Mozilla Firefox, Microsoft Edge, dan Safari. Hasil pengujian menunjukkan seluruh fitur termasuk diagram Mermaid dan unggahan file *drag-and-drop* berjalan lancar di seluruh *browser*.

### 3.7.3. Uji Coba UAT
*User Acceptance Testing* (UAT) dilakukan dengan responden dari pihak Admin, Mentor, dan Orang Tua menggunakan kuesioner skala Likert (1-5).

**Tabel 3.5. Rekap Hasil UAT**

| No | Pernyataan | Admin | Mentor | Orang Tua | Rata-Rata |
|---|---|---|---|---|---|
| 1 | Tampilan antarmuka sistem mudah dipahami | 5 | 4 | 5 | 4,67 |
| 2 | Navigasi menu dalam sistem mudah ditemukan dan digunakan | 5 | 5 | 4 | 4,67 |
| 3 | Sistem membantu pekerjaan menjadi lebih teratur | 5 | 5 | 5 | 5,00 |

*Rata-rata skor keseluruhan (4,78) berada pada skala Sangat Memuaskan.*
