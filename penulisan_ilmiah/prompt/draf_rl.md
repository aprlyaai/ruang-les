3. PEMBAHASAN


3.1. Gambaran Umum

Sistem manajemen bimbingan belajar berbasis website “Ruang Les by Ismaturrohmah” merupakan sebuah sistem informasi yang dirancang untuk mempermudah pengelolaan data operasional lembaga secara digital. Sistem ini dibuat untuk menggantikan proses pencatatan konvensional di buku catatan dan buku kas fisik, lembar kertas nilai yang terpisah, dan komunikasi catatan perkembangan lisan tanpa dokumentasi tertulis, sehingga seluruh proses administrasi dan akademik dapat terintegrasi secara lebih aman dan efisien.

Hak akses pengguna di dalam sistem ini dibagi menjadi tiga kategori untuk mengoptimalkan seluruh alur operasional lembaga, yaitu Admin, Mentor, dan Orang Tua Murid. Sistem ini mempermudah Admin dalam memusatkan pengelolaan dan pemantauan data, memverifikasi pendaftaran dan pembayaran, serta mengatur konten landing page melalui fitur CMS secara efisien. Selain itu, kehadiran sistem ini membantu Mentor untuk menginput presensi, catatan perkembangan, dan nilai murid secara digital dan terstruktur pada tiap pertemuan. Di sisi lain, Orang Tua Murid diberikan fasilitas pendaftaran bimbel online serta transparansi penuh untuk memantau perkembangan akademik anak, memberikan bukti pembayaran untuk melanjutkan sesi belajar, dan mengelola data lebih dari satu anak secara praktis melalui fitur Switch Student.

Pembuatan sistem ini menggunakan metode SDLC model Waterfall yang menekankan tahapan pengembangan secara terstruktur dan berurutan dari tahap analisis hingga pengujian. Secara teknis, sistem ini dibuat menggunakan framework Laravel 12 sebagai backend untuk mengelola logika bisnis, MySQL sebagai Database Management System (DBMS) untuk penyimpanan data relasional, dan Tailwind CSS untuk perancangan antarmuka pengguna yang responsif.


3.2. Tahap Perencanaan

Untuk menghasilkan sebuah website bimbingan belajar yang tepat, diperlukan perencanaan yang matang dengan melakukan analisis kelayakan mengenai metode yang akan diterapkan dalam pengumpulan data. Perencanaan ini melibatkan analisis terhadap kebutuhan pengguna, sumber daya yang tersedia, serta sasaran dari sistem yang hendak dibangun, agar website yang dibuat dapat secara efektif dan efisien menjawab kebutuhan operasional lembaga. Ada beberapa halaman yang nantinya dapat diakses dalam website ini, di antaranya:

1. Halaman utama yang terdiri dari informasi program belajar, testimoni, FAQ, kontak, registrasi untuk akun orang tua, login untuk semua pengguna, dan profil tentang kami.
2. Halaman admin yang terdiri dari dashboard, verifikasi pendaftaran, data program belajar, data mentor, data murid, data orang tua/wali, jadwal kelas, presensi, catatan perkembangan, nilai, repositori materi belajar, pembayaran, pengumuman, layanan, kelola konten landing page (CMS), kelola pengguna, profil admin, dan logout.
3. Halaman mentor yang terdiri dari dashboard, jadwal kelas, riwayat belajar, repositori materi belajar, layanan, profil mentor, dan logout.
4. Halaman orang tua yang terdiri dari dashboard (dengan tiga state), formulir pendaftaran, jadwal kelas, buku akademik anak, informasi tagihan dan unggah bukti bayar, riwayat transaksi, layanan, repositori materi belajar, fitur switch student, profil orang tua, dan logout.


3.3. Tahap Analisis

Pada tahap analisis ini, pembahasan difokuskan pada tiga aspek utama, yaitu analisis stakeholder, kebutuhan fungsional, dan kebutuhan non-fungsional. Analisis stakeholder dilakukan untuk mengidentifikasi pihak-pihak yang terlibat dalam sistem. Kebutuhan fungsional mencakup seluruh fitur yang harus disediakan sistem seperti pendaftaran murid online, rekapitulasi data akademik (presensi, catatan perkembangan, dan nilai), repositori materi belajar, serta pengelolaan notifikasi. Sementara itu, kebutuhan non-fungsional meliputi spesifikasi teknis perangkat keras dan lunak yang digunakan, aspek keamanan sistem, serta kompatibilitas dan performa aplikasi.


3.3.1. Analisis Stakeholder

Analisis stakeholder penting dilakukan untuk mengidentifikasi seluruh pihak yang terlibat, baik secara langsung maupun tidak langsung, dalam penggunaan sistem manajemen bimbingan belajar “Ruang Les by Ismaturrohmah”. Setiap stakeholder mempunyai peran, kebutuhan, dan harapan yang berbeda, oleh karena itu sistem perlu dirancang untuk memenuhi kepentingan tersebut secara menyeluruh. Berikut ini adalah stakeholder utama yang terlibat:

1. Admin: Menginginkan platform yang memusatkan seluruh data operasional lembaga, dengan pemantauan data akademik yang otomatis terintegrasi dengan kalkulasi estimasi Hari-H berbasis kalender dinamis, serta proses verifikasi pendaftaran dan pembayaran yang langsung memperbarui sistem kuota sesi.
2. Mentor: Menginginkan sistem yang memudahkan proses menginput presensi, mencatat perkembangan belajar, dan memasukkan nilai, serta akses ke repositori materi ajar digital untuk semua jenjang kelas SD.
3. Orang Tua Murid: Menginginkan kemudahan mengakses informasi akademik anak secara transparan, mengonfirmasi bukti transfer pembayaran bimbingan belajar, serta berkomunikasi dengan lembaga melalui sistem.


3.3.2. Analisis Kebutuhan Fungsional

Berdasarkan analisis proses bisnis yang berjalan dan hasil identifikasi kebutuhan dari setiap stakeholder, kebutuhan fungsional pada website ini diuraikan sebagai berikut:

1. Kebutuhan Fungsional Admin
a. Memverifikasi pendaftaran murid baru.
b. Mengelola data program belajar, mentor, murid, orang tua/wali, pengguna, jadwal kelas, repositori materi belajar, pengumuman, dan konten landing page (CMS).
c. Melihat, mengubah, dan menghapus data presensi, catatan perkembangan, dan nilai.
d. Memantau status kuota sesi murid.
e. Mengirim pengingat tagihan pembayaran ke orang tua murid.
f. Memverifikasi bukti transfer pembayaran.
g. Melihat, membalas, dan menutup tiket layanan.
h. Mengelola profil admin.
i. Melakukan login dan logout.

2. Kebutuhan Fungsional Mentor
a. Melihat jadwal kelas.
b. Mengelola data presensi, catatan perkembangan, dan nilai.
c. Melihat dan mengunduh materi belajar.
d. Membuat, membalas, dan menutup tiket layanan.
e. Mengelola profil mentor.
f. Melakukan login dan logout.

3. Kebutuhan Fungsional Orang Tua Murid
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



3.3.3. Analisis Kebutuhan Non-Fungsional

Kebutuhan non-fungsional menjelaskan kriteria kualitas yang harus dipenuhi sistem di luar fungsi utamanya. Kebutuhan ini terbagi menjadi 3, yaitu perangkat keras, perangkat lunak, dan kinerja sistem. Berikut ini adalah analisis kebutuhan non-fungsional untuk website Ruang Les sebagai berikut:


3.3.3.1. Kebutuhan Perangkat Keras

Spesifikasi perangkat keras yang digunakan dalam pembuatan website ini adalah:

1. Processor : AMD Ryzen™ R7-7435HS @3.10 GHz
2. Graphics Card: NVIDIA® GeForce RTX™ 4060 Laptop GPU (8 GB)
3. Memori (RAM) : 32GB SO-DIMM DDR5-4800


3.3.3.2. Kebutuhan Perangkat Lunak

Spesifikasi perangkat lunak yang digunakan dalam pembuatan website ini adalah:

1. Sistem Operasi 	: Windows 11 Home 25H2
2. Bahasa Pemrograman 	: PHP versi 8.2, JavaScript, HTML, CSS
3. Runtime Environment	: Node.js versi 20 LTS
4. Framework & Library	: Laravel Framework versi 12, Tailwind CSS 3, Alpine.js
5. Database 		: MySQL versi 8.0
6. Local Server 		: Laragon versi 6
7. Text Editor 		: Visual Studio Code versi 1.9
8. Browser 		: Google Chrome, Brave
9. Visual Modeling Tools: Draw.io, Balsamiq, Figma


3.3.3.3. Kinerja Sistem

Kinerja sistem dianalisis berdasarkan empat aspek utama yang memengaruhi kualitas pengalaman pengguna.

Performa: Sistem diharapkan mampu memuat halaman utama dalam waktu kurang dari 3 detik pada koneksi internet standar. Proses pengiriman data formulir dan penyimpanan ke basis data diharapkan berjalan dalam waktu kurang dari 2 detik.

Keamanan: Sistem menggunakan mekanisme autentikasi berbasis sesi yang dikelola oleh Laravel. Setiap permintaan yang membutuhkan hak akses tertentu akan diverifikasi melalui middleware sebelum diproses. Kata sandi pengguna disimpan dalam bentuk hash menggunakan algoritma bcrypt. Sistem juga dilengkapi perlindungan terhadap serangan CSRF (Cross-Site Request Forgery) secara bawaan dari framework Laravel.

Kompatibilitas: Sistem dirancang untuk dapat diakses pada peramban web modern, meliputi Google Chrome versi 100 ke atas, Mozilla Firefox versi 100 ke atas, Microsoft Edge versi 100 ke atas, dan Safari versi 15 ke atas. Antarmuka pengguna bersifat responsif sehingga dapat digunakan pada layar komputer, laptop, maupun tablet.

Ketersediaan: Sistem diharapkan dapat diakses selama 24 jam sehari, 7 hari seminggu, setelah dipublikasikan ke server hosting. Ketersediaan ini bergantung pada layanan server hosting yang digunakan.


3.4. Tahap Perancangan

Tahap perancangan dilakukan untuk membuat rancangan awal sistem sebelum masuk ke proses penulisan kode program. Dalam pembuatan website Ruang Les, tahap perancangan ini dibagi menjadi beberapa aspek utama. Pertama, perancangan Unified Modeling Language (UML) untuk memodelkan sistem secara visual. Kedua, perancangan struktur tabel untuk mengatur penyimpanan data pada database. Ketiga, perancangan struktur navigasi untuk memetakan alur perpindahan antar halaman. Terakhir, perancangan antarmuka untuk memberikan gambaran desain tampilan website yang akan digunakan oleh pengguna.


3.4.1. Perancangan UML

Pemodelan Unified Modeling Language (UML) pada sistem ini difungsikan sebagai alat bantu visual.  Penggunaan UML bertujuan agar alur kerja dan rancangan sistem bisa tergambar dengan lebih jelas sebelum mulai melakukan pemrograman. Ada tiga jenis diagram UML yang dibuat dalam perancangan website Ruang Les, yaitu Use Case Diagram, Activity Diagram, dan Class Diagram. Ketiga diagram ini digunakan secara bersamaan untuk menjelaskan bagaimana interaksi pengguna dengan sistem, urutan proses yang berjalan, serta struktur kelas yang saling berhubungan di dalamnya.


3.4.1.1. Perancangan Use Case Diagram

Use Case Diagram pada sistem ini digunakan untuk menggambarkan relasi antara aktor dengan seluruh fungsi yang tersedia di dalam sistem. Terdapat tiga aktor utama yang berinteraksi dengan sistem, yaitu Admin, Mentor, dan Orang Tua. Karena cakupan fungsi setiap aktor berbeda, Use Case Diagram digambarkan secara terpisah untuk masing-masing aktor agar lebih mudah dibaca dan dipahami. Rancangan use case admin, guru, dan orang tua dapat dilihat pada gambar 3.1, 3.2, dan 3.3.

[TEMPAT GAMBAR ADMIN DI SINI]
Gambar 3.1. Rancangan Use Case Diagram Admin

Use case diagram pada Gambar 3.1 menjelaskan bahwa Admin memiliki hak akses penuh terhadap seluruh sistem, mulai dari login, mengakses dashboard, mengelola profil pribadinya, mengelola akun pengguna lain, hingga logout. Pengelolaan data master menjadi salah satu tanggung jawab utamanya yang mencakup empat entitas sekaligus melalui fungsi tambah, lihat, ubah, dan hapus (CRUD) pada Data Program Belajar, Data Mentor, Data Murid, dan Data Orang Tua. Di luar itu, Admin juga bertugas memverifikasi pendaftaran murid baru dan mengatur jadwal kelas.
Dari sisi pemantauan akademik, hak akses Admin cukup luas mengenai presensi, catatan perkembangan, dan nilai murid yang tidak hanya bisa dilihat, tetapi juga diubah atau dihapus bila terjadi kekeliruan penginputan oleh Mentor. Admin pun mengelola materi belajar serta memantau kuota sesi tiap murid, lengkap dengan opsi mengirim pengingat pembayaran.
Pada sisi keuangan, verifikasi pembayaran pun berada dalam tanggung jawab Admin, dengan opsi menambahkan data pembayaran secara manual pada transaksi tunai yang belum tercatat secara otomatis oleh sistem. Selain itu, Admin menangani komunikasi melalui pesan layanan, mengelola pengumuman, dan mengatur konten landing page. 

[TEMPAT GAMBAR MENTOR DI SINI]
Gambar 3.2. Rancangan Use Case Diagram Mentor

Use case diagram pada Gambar 3.2 menjelaskan bahwa Mentor memiliki akses yang terbatas hanya pada fungsi yang berkaitan dengan kegiatan belajar mengajar. Mentor dapat melihat landing page, melakukan login, mengakses dashboard, mengelola profil, dan logout. Melalui menu jadwal kelas, mentor dapat terhubung langsung ke fungsi mengelola presensi, mengelola catatan perkembangan, dan mengelola nilai. Di luar aktivitas mengajar, Mentor dapat melihat riwayat belajar tiap murid yang diajar olehnya.
Dalam mendukung proses pengajaran, mentor dapat mengakses materi belajar yang dilengkapi dengan opsi pengunduhan materi. Pada sisi komunikasi, interaksi mentor difasilitasi melalui fitur layanan.

[TEMPAT GAMBAR ORANG TUA DI SINI]
Gambar 3.3. Rancangan Use Case Diagram Orang Tua

Use case diagram pada Gambar 3.3 menjelaskan bahwa Orang Tua Murid memiliki akses yang berfokus pada pemantauan akademik anak dan pengelolaan administrasi pembayaran. Orang Tua dapat melihat landing page, melakukan login, dan mengisi formulir pendaftaran. Bagi Orang Tua yang memiliki lebih dari satu anak terdaftar di Ruang Les, sistem menyediakan fungsi beralih profil anak untuk memudahkan pemantauan data masing-masing anak.
Pada sisi akademik, Orang Tua dapat memantau jadwal kelas anak. Selain itu, melalui menu buku akademik, orang tua dapat terhubung langsung ke data presensi, catatan perkembangan, dan nilai anak. Dalam mendukung belajar anaknya telah tersedia akses materi belajar yang dilengkapi opsi pengunduhan materi.
Dari sisi keuangan, Orang Tua dapat melihat riwayat transaksi dan mengakses menu tagihan yang menyediakan fungsi pengunggahan bukti pembayaran. Sementara itu, kebutuhan komunikasi pun telah terfasilitasi lewat pesan layanan.


3.4.1.2. Perancangan Activity Diagram

Activity Diagram menggambarkan alur aktivitas dari proses-proses utama dalam sistem, mulai dari proses autentikasi pengguna hingga proses-proses inti yang dilakukan oleh Admin, Mentor, maupun Orang Tua sesuai dengan perannya masing-masing. Setiap Activity Diagram merepresentasikan satu proses kerja yang benar-benar diimplementasikan pada sistem. Pada perancangan sistem Ruang Les ini, terdapat sebelas rancangan Activity Diagram yang dibuat.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.4. Rancangan Activity Diagram Proses Register oleh Orang Tua

Activity Diagram pada Gambar 3.4 menggambarkan alur proses pembuatan akun oleh calon pengguna dengan peran Orang Tua. Proses diawali ketika Orang Tua membuka halaman web Ruang Les by Ismaturrohmah, kemudian sistem menampilkan home page. Selanjutnya, Orang Tua memilih menu register, dan sistem menampilkan halaman register yang meminta Orang Tua mengisi formulir akun berupa nama, alamat email, kata sandi, dan konfirmasi kata sandi.
Setelah formulir diisi, sistem memeriksa kelengkapan dan kebenaran data yang dimasukkan, meliputi kesesuaian format email, keunikan alamat email agar tidak terdaftar ganda, serta kecocokan antara kata sandi dan konfirmasinya. Apabila data tidak valid, Orang Tua akan diarahkan kembali ke tahap pengisian formulir akun. Apabila data valid, sistem akan membuat akun baru dengan peran Orang Tua, menyimpan data akun tersebut ke dalam database, kemudian mengautentikasi akun secara otomatis tanpa memerlukan proses login maupun verifikasi email lebih lanjut, dan mengarahkan Orang Tua kembali ke home page.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.5. Rancangan Activity Diagram Proses Login oleh Admin dan Mentor

Activity Diagram pada Gambar 3.5 menggambarkan alur proses login yang dilakukan oleh Admin dan Mentor. Proses dimulai ketika pengguna membuka halaman web Ruang Les by Ismaturrohmah, kemudian sistem menampilkan landing page. Selanjutnya, pengguna memilih menu login dan sistem menampilkan halaman login yang meminta alamat email dan kata sandi.
Setelah pengguna mengisi alamat email dan kata sandi, sistem melakukan validasi terhadap alamat email dan kata sandi yang dimasukkan. Apabila alamat email dan kata sandi tidak sesuai dengan data yang tersimpan pada basis data, sistem akan menampilkan kembali halaman login agar pengguna dapat mengisi ulang kredensialnya. Sebaliknya, apabila alamat email dan kata sandi valid, sistem akan mengautentikasi pengguna dan langsung mengarahkan pengguna ke halaman dashboard sesuai dengan perannya, yaitu Dashboard Admin untuk Admin dan Dashboard Mentor untuk Mentor.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.6. Rancangan Activity Diagram Proses Login oleh Orang Tua

Activity Diagram pada Gambar 3.6 menggambarkan alur proses login khusus untuk Orang Tua, yang dipisahkan dari Admin dan Mentor karena memiliki alur pengarahan (redirect) setelah login yang berbeda, sekaligus dilanjutkan dengan proses penentuan tampilan (state) dashboard. Tahapan login diawali dengan cara yang sama seperti aktor lainnya, yaitu membuka halaman web Ruang Les by Ismaturrohmah, memilih menu login, kemudian mengisi alamat email dan kata sandi. Apabila alamat email dan kata sandi yang dimasukkan tidak valid, sistem akan menampilkan kembali halaman login. Apabila valid, sistem akan mengautentikasi Orang Tua dan mengarahkannya kembali ke landing page, bukan langsung ke halaman dashboard.
Untuk mengakses dashboard, Orang Tua perlu memilih menu dashboard yang tersedia pada dropdown profil di navigasi bar. Setelah itu, sistem akan menentukan tampilan dashboard berdasarkan status murid yang terhubung dengan akun Orang Tua tersebut. Pertama, sistem memeriksa apakah anak sudah terdaftar. Apabila belum terdaftar, sistem akan menampilkan Call to Action (CTA) untuk orang tua mendaftarkan anaknya dan semua menu yang masih terkunci. Apabila anak sudah terdaftar, sistem selanjutnya memeriksa apakah pendaftaran sudah diverifikasi oleh admin. Apabila belum diverifikasi, sistem akan menampilkan informasi bahwa pendaftaran sedang dalam proses verifikasi oleh admin dan semua menu masih terkunci. Apabila sudah diverifikasi, sistem akan menampilkan seluruh menu yang tersedia pada panel Orang Tua.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.7. Rancangan Activity Diagram Proses Pendaftaran dan Verifikasi Murid Baru

Activity Diagram pada Gambar 3.7 menggambarkan alur proses pendaftaran murid baru oleh Orang Tua hingga proses verifikasi oleh Admin. Proses diawali ketika Orang Tua mengakses halaman pendaftaran, kemudian sistem menampilkan formulir pendaftaran untuk diisi. Setelah formulir diisi dan dikirimkan, sistem memeriksa kelengkapan dan kebenaran data yang dimasukkan. Apabila data belum lengkap atau tidak valid, Orang Tua akan diarahkan kembali ke tahap pengisian formulir untuk melakukan perbaikan. Apabila data telah lengkap dan valid, sistem akan menyimpan data pendaftaran ke dalam database.
Setelah data pendaftaran tersimpan, Admin menerima notifikasi pendaftaran baru melalui sistem. Admin kemudian meninjau data pendaftaran tersebut sebelum menekan tombol verifikasi untuk menyetujui dan memproses pendaftaran tersebut. Sistem selanjutnya memperbarui data murid beserta status akun pada database, sehingga seluruh menu pada panel Orang Tua yang sebelumnya masih terkunci menjadi terbuka. Sebagai tahap akhir, Orang Tua menerima pemberitahuan melalui email bahwa proses pendaftaran telah berhasil dan akunnya telah aktif sepenuhnya.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.8. Rancangan Activity Diagram Proses Membuat Jadwal Kelas oleh Admin

Activity Diagram pada Gambar 3.8 menggambarkan alur proses pembuatan jadwal kelas oleh Admin. Proses diawali ketika Admin memilih menu jadwal kelas, kemudian sistem menampilkan daftar jadwal yang sudah ada. Selanjutnya, Admin memilih opsi tambah atau edit jadwal, dan sistem menampilkan halaman formulir yang harus diisi dengan data kelas, seperti nama kelas, mentor pengajar, paket program, hari, serta jam belajar.
Setelah Admin menginput data kelas, sistem memvalidasi data tersebut, baik dari segi kelengkapan pengisian maupun aturan bisnis yang berlaku, salah satunya memastikan tidak terjadi bentrok jadwal ketika mentor yang sama telah memiliki kelas lain pada hari dan jam yang sama. Apabila data tidak valid, sistem akan mengembalikan Admin ke tahap pengisian data kelas untuk melakukan perbaikan. Apabila data valid, sistem akan menyimpan data jadwal kelas tersebut ke dalam database.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.9. Rancangan Activity Diagram Proses Menambahkan Murid ke dalam Jadwal Kelas oleh Admin

Activity Diagram pada Gambar 3.9 menggambarkan alur proses pengelolaan murid pada suatu jadwal kelas oleh Admin. Proses diawali ketika Admin memilih menu jadwal kelas, kemudian sistem menampilkan daftar jadwal yang tersedia. Selanjutnya, Admin memilih detail jadwal tertentu, dan sistem menampilkan halaman detail kelas yang berisi informasi kelas dan daftar murid yang sudah terdaftar di kelas tersebut.
Pada halaman ini, Admin dapat menambahkan maupun mengeluarkan murid dari kelas. Ketika Admin menambahkan murid, sistem terlebih dahulu memvalidasi apakah kapasitas kelas masih tersedia serta memastikan murid yang dipilih belum terdaftar sebelumnya di kelas tersebut, sebelum akhirnya menyimpan perubahan data jumlah murid pada jadwal kelas ke dalam database.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.10. Rancangan Activity Diagram Proses Pengisian Presensi oleh Mentor

Activity Diagram pada Gambar 3.10 menggambarkan alur proses pengisian presensi murid oleh Mentor. Proses diawali ketika Mentor memilih menu jadwal kelas, kemudian sistem menampilkan daftar kelas yang diampu. Selanjutnya, Mentor memilih aksi "Presensi", lalu sistem menampilkan halaman presensi untuk murid tersebut. Mentor kemudian mengisi status kehadiran murid, dan sistem memeriksa kelengkapan data yang dimasukkan, termasuk memastikan presensi murid pada jadwal dan hari yang sama belum pernah diisi sebelumnya. Apabila data tidak valid, Mentor akan diarahkan kembali ke pengisian status kehadiran. Apabila data valid, sistem akan menyimpan data presensi ke dalam database.
Setelah data presensi tersimpan, sistem memeriksa status kehadiran murid. Apabila status yang dipilih adalah hadir, sistem akan mengurangi sisa kuota sesi murid sebanyak satu sesi, kemudian memeriksa apakah sisa kuota masih tersedia. Apabila sisa kuota sudah habis, sistem akan menyiapkan peringatan kuota habis untuk disampaikan kepada Orang Tua. Sebaliknya, apabila status yang dipilih bukan hadir, sistem tidak akan mengurangi kuota, melainkan menggeser estimasi hari-H mundur satu sesi sebagai bentuk penyesuaian kalender dinamis. Sebagai tahap akhir, sistem memperbarui data sisa kuota murid pada database.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.11. Rancangan Activity Diagram Proses Pengisian Catatan Perkembangan oleh Mentor

Activity Diagram pada Gambar 3.11 menggambarkan alur proses pengisian catatan perkembangan murid oleh Mentor. Proses diawali ketika Mentor memilih menu jadwal kelas, kemudian sistem menampilkan daftar kelas yang diampu. Selanjutnya, Mentor memilih sesi kelas dan aksi "Catatan", lalu sistem menampilkan halaman catatan perkembangan untuk murid tersebut. Mentor kemudian mengisi catatan perkembangan murid, dan sistem memeriksa kelengkapan data yang dimasukkan, termasuk memastikan catatan perkembangan murid pada jadwal dan hari yang sama belum pernah diisi sebelumnya. Apabila data tidak valid, Mentor akan diarahkan kembali ke pengisian catatan. Apabila data valid, sistem akan menyimpan catatan perkembangan tersebut ke dalam database.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.12. Rancangan Activity Diagram Proses Pengisian Nilai oleh Mentor

Activity Diagram pada Gambar 3.12 menggambarkan alur proses pengisian nilai murid oleh Mentor. Proses diawali ketika Mentor memilih menu jadwal kelas, kemudian sistem menampilkan daftar kelas yang diampu. Selanjutnya, Mentor memilih sesi kelas dan aksi "Nilai", lalu sistem menampilkan halaman penilaian untuk murid tersebut. Mentor kemudian mengisi data nilai murid, dan sistem memeriksa kelengkapan data yang dimasukkan. Apabila data tidak valid, Mentor akan diarahkan kembali ke tahap pengisian nilai. Apabila data valid, sistem akan menyimpan data nilai murid ke dalam database. Berbeda dengan proses presensi dan catatan perkembangan, Mentor dapat mengisi nilai murid lebih dari satu kali dalam hari yang sama, mengingat satu pertemuan dapat mencakup beberapa bentuk penilaian, seperti latihan soal, kuis, maupun tanya jawab.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.13. Rancangan Activity Diagram Proses Pengelolaan Materi Belajar

Activity Diagram pada Gambar 3.13 menggambarkan alur proses pengelolaan materi belajar oleh Admin hingga materi tersebut dapat diakses oleh Mentor dan Orang Tua. Proses diawali ketika Admin memilih menu materi belajar, kemudian sistem menampilkan daftar materi yang sudah ada. Selanjutnya, Admin memilih opsi tambah materi, dan sistem menampilkan form yang harus diisi dengan data materi, seperti judul, jenjang kelas, mata pelajaran, tipe materi, serta tautan sumber belajar.
Setelah Admin menginput data materi, sistem memeriksa kelengkapan dan kebenaran data yang dimasukkan. Apabila data tidak valid, Admin akan diarahkan kembali ke pengisian data materi. Apabila data valid, sistem akan menyimpan data materi tersebut ke dalam database. Materi yang baru disimpan kemudian ditandai sebagai materi baru bagi Mentor dan Orang Tua, yang akan muncul secara otomatis dalam bentuk penanda (badge) notifikasi ketika mereka membuka menu materi belajar pada panel masing-masing. Selanjutnya, Mentor maupun Orang Tua dapat mengakses dan mengunduh materi tersebut sesuai dengan kebutuhan pembelajaran.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.14. Rancangan Activity Diagram Proses Transaksi dan Verifikasi Pembayaran

Activity Diagram pada Gambar 3.14 menggambarkan alur proses transaksi pembayaran oleh Orang Tua hingga proses verifikasi oleh Admin. Proses diawali ketika Orang Tua memilih menu tagihan dan pembayaran, kemudian sistem menampilkan halaman tagihan dan pembayaran, sehingga Orang Tua dapat melihat tagihan yang berlaku. Orang Tua kemudian memeriksa apakah terdapat tagihan pembayaran yang perlu diselesaikan. Apabila tidak ada tagihan, maka proses berakhir. Apabila terdapat tagihan, Orang Tua dapat mengunggah bukti bayar, dan sistem akan memeriksa kebenaran berkas bukti yang diunggah, baik dari segi format maupun ukuran berkas. Apabila bukti tidak valid, Orang Tua akan diarahkan kembali ke pengunggahan bukti bayar. Apabila bukti valid, sistem akan menyimpan bukti pembayaran tersebut ke dalam database.
Setelah bukti pembayaran tersimpan, Admin menerima notifikasi pembayaran masuk melalui sistem, kemudian meninjau dan memverifikasi bukti bayar yang diunggah untuk disetujui. Sistem selanjutnya memproses penambahan kuota belajar murid sesuai dengan paket yang dibayarkan, lalu memperbarui status transaksi beserta sisa kuota murid pada database. Perubahan status dan penambahan kuota ini kemudian ditandai sebagai pembaruan baru bagi Orang Tua, yang akan terlihat secara otomatis dalam bentuk penanda (badge) notifikasi beserta jumlah kuota sesi yang telah bertambah ketika mereka membuka menu riwayat transaksi pada panel Orang Tua.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.15. Rancangan Activity Diagram Proses Penanganan Pesan Layanan

Activity Diagram pada Gambar 3.15 menggambarkan alur proses penanganan pesan layanan antara Mentor atau Orang Tua dengan Admin. Proses diawali ketika Mentor atau Orang Tua memilih menu layanan, kemudian sistem menampilkan halaman layanan. Selanjutnya, Mentor atau Orang Tua mengisi formulir layanan, dan sistem memeriksa kelengkapan data layanan yang dimasukkan. Apabila data tidak valid, pengguna akan diarahkan kembali ke tahap pengisian formulir. Apabila data valid, sistem akan membuat nomor tiket layanan secara otomatis, kemudian menerima pesan awal dari pengguna dan menyimpannya ke dalam database.
Setelah pesan tersimpan, sistem mengirimkan notifikasi kepada Admin, dan Admin menerima notifikasi pesan layanan baru tersebut. Admin kemudian membuka ruang obrolan tiket dan memeriksa apakah tiket masih dalam status terbuka. Apabila tiket masih terbuka, Admin dapat mengetik dan mengirimkan balasan atas pesan tersebut. Apabila tiket sudah tidak terbuka atau ditutup, sistem akan memproses penutupan tiket layanan dan proses berakhir.
Balasan yang dikirimkan Admin kemudian disimpan ke dalam database, dan sistem mengirimkan notifikasi kepada Mentor atau Orang Tua terkait adanya balasan baru. Mentor atau Orang Tua yang menerima notifikasi tersebut dapat membuka kembali ruang obrolan untuk melihat balasan Admin, kemudian sistem memeriksa apakah tiket masih dalam status terbuka. Apabila tiket masih terbuka, Mentor atau Orang Tua dapat mengetik dan mengirimkan balasan lanjutan, sehingga proses percakapan berlanjut kembali ke tahap penerimaan pesan oleh sistem. Apabila tiket sudah tidak terbuka atau ditutup, sistem akan memproses penutupan tiket layanan dan proses berakhir.


3.4.1.3. Perancangan Class Diagram

Perancangan Class Diagram menggambarkan struktur dari sistem dalam bentuk kelas-kelas objek. Setiap kelas memuat atribut serta metode yang menentukan fungsi operasional sistem, dilengkapi dengan hubungan relasi dan pewarisan antar-kelas. Rancangan Class Diagram dapat dilihat pada Gambar 3.16.

[TEMPAT GAMBAR DIAGRAM DI SINI]
Gambar 3.16. Rancangan Class Diagram 

Class Diagram pada Gambar 3.16 menggambarkan bahwa sistem bimbingan belajar Ruang Les terdiri dari 15 kelas utama yang saling terhubung. Kelas User bertindak sebagai kelas induk (superclass) yang diturunkan (inheritance) ke kelas Mentor dan Orang Tua. Kelas Orang Tua memiliki relasi satu-ke-banyak (1 to 0..*) dengan kelas Murid untuk mendukung pengelolaan multi-anak (Switch Student). Sementara itu, kelas Pendaftaran dan Draft Pendaftaran mengelola alur registrasi siswa baru serta penyimpanan sementara formulir.Pada modul operasional, kelas Program menyimpan master paket belajar yang menentukan kapasitas murid pada Jadwal Kelas, serta terikat dengan Materi Belajar sebagai repositori pembelajaran. Monitoring pembelajaran dikelola oleh kelas Presensi, Catatan Perkembangan, dan Nilai. Seluruh transaksi pembayaran dikelola oleh kelas Transaksi, sedangkan komunikasi bantuan dan penyebaran informasi dikelola melalui kelas Layanan, Pesan Layanan, dan Pengumuman.


3.4.2. Perancangan Struktur Tabel Basis Data

Perancangan struktur tabel basis data dilakukan untuk menentukan spesifikasi fisik entitas mencakup atribut, tipe data, panjang field, constraint, serta relasi antar-tabel yang diturunkan dari Class Diagram untuk diimplementasikan pada basis data MySQL. Basis data sistem bimbingan belajar Ruang Les terdiri atas 21 tabel yang diuraikan sebagai berikut.

1. Tabel Users
Tabel users digunakan untuk menyimpan data akun seluruh pengguna sistem, mencakup data autentikasi dan peran (role) yang membedakan hak akses antara Admin, Mentor, dan Orang Tua. Tabel ini menjadi entitas utama yang menghubungkan akun pengguna dengan profil spesifik seperti mentor dan orang tua. Struktur tabel users dapat dilihat pada Tabel 3.1.

Tabel 3.1. Rancangan Struktur Tabel Users
[TEMPAT TABEL DI SINI]

2. Tabel Mentor
Tabel mentor digunakan untuk menyimpan data profil tambahan milik pengguna yang berperan sebagai mentor, seperti biodata pribadi, latar belakang pendidikan, spesialisasi pengajaran, dan rekening bank. Struktur tabel mentor dapat dilihat pada Tabel 3.2.

Tabel 3.2. Struktur Tabel Mentor
[TEMPAT TABEL DI SINI]

3. Tabel Orang Tua
Tabel orang_tua digunakan untuk menyimpan data profil tambahan milik pengguna yang berperan sebagai orang tua/wali murid. Struktur tabel orang_tua dapat dilihat pada Tabel 3.3.

Tabel 3.3. Struktur Tabel Orang Tua
[TEMPAT TABEL DI SINI]

4. Tabel Murid
Tabel murid digunakan untuk menyimpan data induk setiap murid aktif, termasuk data akademik dasar dan sisa kuota sesi belajar yang menjadi dasar perhitungan logika kalender dinamis. Struktur tabel murid dapat dilihat pada Tabel 3.4.

Tabel 3.4. Struktur Tabel Murid
[TEMPAT TABEL DI SINI]

5. Tabel Program
Tabel program digunakan untuk menyimpan data paket bimbingan belajar yang ditawarkan dalam website Ruang Les. Struktur tabel program dapat dilihat pada Tabel 3.5.

Tabel 3.5. Struktur Tabel Program
[TEMPAT TABEL DI SINI]

6. Tabel Jadwal Kelas
Tabel jadwal_kelas digunakan untuk menyimpan data jadwal kelas yang tersedia, termasuk hari, jam belajar, mentor, dan status ketersediaan kuota murid untuk setiap kelas bimbingan belajar. Struktur tabel jadwal_kelas dapat dilihat pada Tabel 3.6.

Tabel 3.6. Struktur Tabel Jadwal Kelas
[TEMPAT TABEL DI SINI]

7. Tabel Pendaftaran
Tabel pendaftaran digunakan untuk menyimpan data pendaftaran calon murid baru beserta status verifikasinya oleh Admin. Struktur tabel pendaftaran dapat dilihat pada Tabel 3.7.

Tabel 3.7. Struktur Tabel Pendaftaran
[TEMPAT TABEL DI SINI]

8. Tabel Draft Pendaftaran
Tabel draft_pendaftaran digunakan untuk menyimpan sementara data formulir pendaftaran yang belum diselesaikan, agar pengguna dapat melanjutkan pengisian pada tahap yang sama. Struktur tabel draft_pendaftaran dapat dilihat pada Tabel 3.8.

Tabel 3.8. Struktur Tabel Draft Pendaftaran
[TEMPAT TABEL DI SINI]

9. Tabel Transaksi
Tabel transaksi digunakan untuk menyimpan data transaksi pembayaran paket belajar beserta status verifikasinya oleh Admin. Bukti transfer menjadi penambahan kuota sesi belajar murid di Ruang Les. Struktur tabel transaksi dapat dilihat pada Tabel 3.9.

Tabel 3.9. Struktur Tabel Transaksi
[TEMPAT TABEL DI SINI]

10. Tabel Presensi
Tabel presensi digunakan untuk menyimpan data kehadiran murid pada setiap sesi pertemuan, yang menjadi dasar perhitungan sisa kuota belajar. Struktur tabel presensi dapat dilihat pada Tabel 3.10.

Tabel 3.10. Struktur Tabel Presensi
[TEMPAT TABEL DI SINI]

11. Tabel Catatan Perkembangan
Tabel catatan_perkembangan digunakan untuk menyimpan catatan perkembangan belajar murid pada setiap pertemuan, termasuk skor pemahaman terhadap materi dan tingkat konsentrasi murid. Struktur tabel catatan_perkembangan dapat dilihat pada Tabel 3.11.

Tabel 3.11. Struktur Tabel Catatan Perkembangan
[TEMPAT TABEL DI SINI]

12. Tabel Nilai
Tabel nilai digunakan untuk menyimpan data hasil penilaian murid dari berbagai jenis nilai, seperti kuis, latihan soal, atau tugas. Struktur tabel nilai dapat dilihat pada Tabel 3.12.

Tabel 3.12. Struktur Tabel Nilai
[TEMPAT TABEL DI SINI]

13. Tabel Materi Belajar
Tabel materi_belajar digunakan untuk menyimpan data materi pembelajaran yang dapat diakses sesuai hak akses pengguna, baik berupa dokumen maupun tautan video. Struktur tabel materi_belajar dapat dilihat pada Tabel 3.13.

Tabel 3.13. Struktur Tabel Materi Belajar
[TEMPAT TABEL DI SINI]

14. Tabel Pengumuman
Tabel pengumuman digunakan untuk menyimpan data informasi atau pengumuman yang dipublikasikan Admin kepada target audiens tertentu dalam website Ruang Les. Struktur tabel pengumuman dapat dilihat pada Tabel 3.14.

Tabel 3.14. Struktur Tabel Pengumuman
[TEMPAT TABEL DI SINI]

15. Tabel Layanan
Tabel layanan digunakan untuk menyimpan data tiket yang diajukan pengguna kepada Admin. Struktur tabel layanan dapat dilihat pada Tabel 3.15.

Tabel 3.15. Struktur Tabel Layanan
[TEMPAT TABEL DI SINI]

16. Tabel Pesan Layanan
Tabel pesan_layanan digunakan untuk menyimpan riwayat percakapan dalam ruang obrolan tiket layanan. Struktur tabel pesan_layanan dapat dilihat pada Tabel 3.16.

Tabel 3.16. Struktur Tabel Pesan Layanan
[TEMPAT TABEL DI SINI]

17. Tabel Settings
Tabel settings digunakan untuk menyimpan variabel pengaturan dan konfigurasi dinamis sistem Ruang Les yang dapat diatur secara dinamis oleh Admin. Struktur tabel settings dapat dilihat pada Tabel 3.17.

Tabel 3.17. Struktur Tabel Settings
[TEMPAT TABEL DI SINI]

18. Tabel Keunggulan
Tabel keunggulan digunakan untuk menyimpan daftar fitur keunggulan dan fasilitas bimbingan yang ditampilkan pada halaman utama website Ruang Les. Struktur tabel keunggulan dapat dilihat pada Tabel 3.18.

Tabel 3.18. Struktur Tabel Keunggulan
[TEMPAT TABEL DI SINI]

19. Tabel Testimoni
Tabel testimoni digunakan untuk menyimpan data ulasan, pengalaman, dan penilaian berbintang dari orang tua murid mengenai layanan dan kegiatan Ruang Les. Struktur tabel testimoni dapat dilihat pada Tabel 3.19.

Tabel 3.19. Struktur Tabel Testimoni
[TEMPAT TABEL DI SINI]

20. Tabel FAQ
Tabel FAQ digunakan untuk menyimpan daftar pertanyaan yang sering diajukan (Frequently Asked Questions) beserta jawabannya yang akan ditampilkan pada halaman publik website. Struktur tabel FAQ dapat dilihat pada Tabel 3.20.

Tabel 3.20. Struktur Tabel FAQ
[TEMPAT TABEL DI SINI]

21. Tabel Galeri
Tabel galeri digunakan untuk menyimpan koleksi foto dokumentasi kegiatan bimbingan belajar yang ditampilkan pada halaman publik website. Struktur tabel galeri dapat dilihat pada Tabel 3.21.

Tabel 3.21. Struktur Tabel Galeri
[TEMPAT TABEL DI SINI]


3.4.3. Perancangan Struktur Navigasi

Struktur navigasi digunakan untuk menggambarkan alur perpindahan antar halaman di dalam sebuah aplikasi web, sehingga setiap pengguna dapat memahami relasi antar menu serta cara berpindah dari satu halaman ke halaman lainnya secara sistematis. Pada perancangan website bimbingan belajar Ruang Les, struktur navigasi dibangun menggunakan struktur navigasi campuran (composite). Sistem Ruang Les membagi hak akses ke dalam empat portal navigasi utama untuk menjaga keamanan dan relevansi data, yaitu Navigasi Publik, Panel Admin, Panel Mentor, dan Panel Orang Tua. Penjelasan rancangan struktur navigasi dari masing-masing portal diuraikan pada bagian berikut.

3.4.3.1 Rancangan Struktur Navigasi Publik

Struktur navigasi publik dirancang menggunakan navigasi campuran (composite) dengan halaman Beranda sebagai titik masuk utama. Halaman beranda akan memberikan informasi lengkap kepada pengunjung umum atau calon wali murid tanpa memerlukan autentikasi terlebih dahulu. Pengguna dapat membaca informasi secara berurutan dengan menggulir layar, mulai dari hero section, fitur keunggulan, program belajar, testimoni, faq, dan kontak pada bagian footer. Selain itu, terdapat tautan ke halaman Tentang Kami yang menampilkan pengenalan singkat, visi misi, dan galeri ruang les.

Tersedia juga tautan menuju halaman Login, Registrasi, dan Pendaftaran. Login dan Registrasi berfungsi sebagai dua jalur masuk yang setara ke dalam sistem. Pengguna baru dapat membuat akun melalui Registrasi, sedangkan pengguna yang sudah memiliki akun dapat langsung masuk melalui Login. Adapun tautan Pendaftaran secara teknis mensyaratkan pengguna untuk sudah melakukan autentikasi terlebih dahulu. Apabila diakses oleh pengguna yang belum login, sistem akan mengarahkan pengguna ke halaman Login sebelum melanjutkan ke Pendaftaran.

Alur Pendaftaran sendiri dirancang dengan struktur navigasi linier, terdiri atas tujuh tahap, yaitu Step 1 sampai Step 7 yang harus diselesaikan secara berurutan. Terdapat kemungkinan bagi pengguna untuk kembali ke tahap sebelumnya sebelum data disimpan secara final, hingga akhirnya menuju halaman konfirmasi Sukses Pendaftaran. Rancangan struktur navigasi publik dapat dilihat pada Gambar 3.x.

(Sisipkan Gambar 3.x Rancangan Struktur Navigasi Publik)

3.4.3.2 Rancangan Struktur Navigasi Admin

Struktur navigasi Admin dirancang menggunakan navigasi hirarki, sehingga seluruh menu dapat diakses langsung dari Dashboard melalui sidebar yang selalu terlihat. Menu-menu tersebut dikelompokkan menjadi enam kategori utama. Kategori Verifikasi Pendaftaran digunakan untuk meninjau pendaftaran murid baru. Kategori Data Master terdiri atas menu Paket Program Belajar, Data Mentor, Data Murid, dan Data Orang Tua. Kategori Akademik terdiri atas menu Jadwal Kelas, Presensi, Catatan Perkembangan, Nilai, dan Materi Belajar, yang masing-masing dapat diakses secara independen tanpa harus melalui menu Jadwal Kelas terlebih dahulu. Kategori Keuangan berisi menu Pembayaran untuk pengelolaan transaksi dan kuota sesi. Kategori Layanan & Komunikasi terdiri atas menu Layanan dan Pengumuman. Terakhir, kategori Pengaturan Sistem terdapat menu Kelola Bimbel (CMS) dan Kelola Pengguna. Selain itu, Admin juga dapat mengakses menu Profil Saya dan Logout melalui dropdown menu di pojok kanan atas header.

(Sisipkan Gambar 3.x Rancangan Struktur Navigasi Admin)

3.4.3.3 Rancangan Struktur Navigasi Mentor

Struktur navigasi Mentor dirancang menggunakan navigasi hirarki. Dari Dashboard, menu dikelompokkan menjadi dua kategori. Kategori Akademik terdiri atas menu Jadwal Kelas, Buku Akademik, dan Materi Belajar. Menu Jadwal Kelas menjadi pintu akses menuju tiga aktivitas pencatatan pada tiap sesi pertemuan, yaitu Presensi, Catatan Perkembangan, dan Nilai, yang hanya dapat diisi pada jadwal yang telah ditentukan. Kategori Lainnya terdiri atas menu Layanan. Selain itu, Mentor dapat mengakses menu Profil Saya dan Logout melalui dropdown menu di pojok kanan atas header.

(Sisipkan Gambar 3.x Rancangan Struktur Navigasi Mentor)

3.4.3.4 Rancangan Struktur Navigasi Orang Tua

Struktur navigasi Orang Tua dirancang menggunakan navigasi hirarki dengan Dashboard sebagai halaman pertama yang juga menyediakan menu Ganti Profil Anak bagi Orang Tua yang memiliki lebih dari satu anak terdaftar. Menu pada sidebar dikelompokkan menjadi tiga kategori. Kategori Akademik terdiri atas menu Jadwal Kelas, Buku Akademik, dan Materi Belajar. Buku Akademik dirancang sebagai satu halaman yang dapat menampilkan tiga komponen sekaligus, yaitu Presensi, Catatan Perkembangan, dan Nilai sehingga Orang Tua dapat memantau seluruh perkembangan akademik anak dalam satu tampilan tanpa perlu berpindah ke halaman terpisah. Kategori Keuangan terdiri atas menu Tagihan & Pembayaran, yang dilengkapi fitur Upload Bukti Transfer, serta menu Riwayat Transaksi. Kategori Lainnya terdiri atas menu Layanan. Selain itu, Orang Tua dapat mengakses menu Profil Saya dan Logout melalui dropdown menu di pojok kanan atas header.

(Sisipkan Gambar 3.x Rancangan Struktur Navigasi Orang Tua)


3.4.4. Perancangan Tampilan

Perancangan tampilan menggambarkan proses penyusunan antarmuka pengguna (user interface) dalam bentuk wireframe yang berfokus pada tata letak (layout), hierarki elemen, dan alur interaksi pengguna tanpa melibatkan elemen visual akhir seperti warna maupun dekorasi grafis. Rancangan tampilan dikelompokkan menjadi lima bagian berdasarkan fungsi dan hak aksesnya, yaitu halaman publik, halaman autentikasi, panel admin, panel mentor, dan panel orang tua. 

3.4.4.1. Perancangan Tampilan untuk Halaman Publik
Halaman publik merupakan bagian sistem yang dapat diakses secara bebas oleh pengguna tanpa perlu melakukan autentikasi (login). Halaman publik pada website Ruang Les terdiri dari dua halaman utama, yaitu Beranda dan Tentang Kami. 

Halaman Beranda dirancang sebagai halaman satu gulir yang memuat seluruh informasi utama lembaga, mulai dari pengenalan program, keunggulan, testimoni, hingga FAQ dan kontak. Rancangan tampilan halaman Beranda dapat dilihat pada Gambar 3.21.

(Sisipkan Gambar 3.x Rancangan Tampilan Halaman Beranda)

Halaman Tentang Kami menampilkan profil singkat pendiri lembaga, visi dan misi, serta galeri dokumentasi kegiatan bimbingan belajar. Rancangan tampilan halaman Tentang Kami dapat dilihat pada Gambar 3.22.

(Sisipkan Gambar 3.x Rancangan Tampilan Halaman Tentang Kami)

3.4.4.2. Perancangan Tampilan untuk Halaman Autentikasi
Halaman autentikasi mencakup dua halaman utama, yaitu halaman Registrasi Akun dan halaman Login. Kedua halaman ini dirancang menggunakan tata letak terpusat (centered layout) tanpa sidebar maupun header navigasi penuh. Komponen halaman disusun secara ringkas, meliputi logo lembaga sebagai identitas di bagian atas, kartu formulir di tengah layar, serta tautan navigasi lintas halaman di bagian bawah formulir.

Rancangan tampilan halaman Registrasi Akun ditujukan khusus bagi calon pengguna baru dengan hak akses (role) sebagai Orang Tua atau Wali Murid. Formulir pendaftaran ini memuat empat bidang isian (input field), yaitu Nama Lengkap, Alamat Email, Kata Sandi, dan Konfirmasi Kata Sandi, serta diakhiri dengan tombol aksi Daftar Sekarang. Rancangan tampilan halaman Registrasi Akun dapat dilihat pada Gambar 3.23.

(Sisipkan Gambar 3.x Rancangan Tampilan Halaman Registrasi Akun)

Rancangan tampilan halaman Login dirancang untuk digunakan secara multi-role oleh seluruh aktor dalam sistem, yaitu Admin, Mentor, dan Orang Tua. Formulir ini memuat dua bidang isian utama, yaitu Alamat Email dan Kata Sandi, yang dilengkapi dengan opsi pengingat sesi (Remember Me) serta tombol aksi Masuk Portal. Rancangan tampilan halaman Login dapat dilihat pada Gambar 3.24.

(Sisipkan Gambar 3.x Rancangan Tampilan Halaman Login)

3.4.4.3. Perancangan Tampilan untuk Admin

Panel Admin dirancang menggunakan tata letak dua kolom yang terdiri dari sidebar navigasi di sisi kiri dan area konten utama di sisi kanan. Sidebar tersebut memuat seluruh menu navigasi yang dikelompokkan berdasarkan lima kategori utama, yaitu Data Master, Akademik, Keuangan, Layanan dan Komunikasi, serta Pengaturan Sistem. Struktur ini mempermudah Admin untuk berpindah antarmodul secara langsung tanpa harus kembali ke halaman awal. Pada bagian pojok kanan atas header, terdapat informasi akun pengguna yang sedang aktif beserta menu dropdown profil untuk mengakses halaman Profil Admin dan Logout. 
Secara keseluruhan, sebagian besar halaman pada Panel Admin menerapkan pola tata letak tabel secara seragam. Namun, terdapat beberapa pengecualian tampilan sesuai dengan fungsi spesifiknya, seperti halaman Jadwal Kelas yang menggunakan antarmuka berbasis kartu (card) yang dikelompokkan berdasarkan hari, halaman Pembayaran yang dibagi menjadi dua tab, serta halaman Kelola Bimbel (CMS) yang menggunakan formulir bertab untuk mempermudah pengaturan section konten pada home page.

1. Halaman Dashboard Admin merupakan tampilan utama yang muncul setelah Admin berhasil melakukan autentikasi (login). Halaman ini berfungsi sebagai pusat pemantauan (monitoring center) yang merangkum kondisi operasional terkini lembaga. Informasi disajikan dalam bentuk kartu ringkasan yang sekaligus berperan sebagai pintasan (shortcut) menuju modul terkait, seperti data pembayaran yang belum diverifikasi dan jadwal kelas harian sehingga Admin dapat menindaklanjuti tanpa harus membuka menu satu per satu. Rancangan tampilan Dashboard Admin dapat dilihat pada Gambar 3.25.

Gambar 3.25. Rancangan Tampilan Dashboard Admin

2. Halaman Verifikasi Pendaftaran digunakan oleh Admin untuk meninjau serta memproses antrean pendaftaran murid baru yang dikirimkan oleh Orang Tua melalui formulir pendaftaran. Seluruh data pengajuan ditampilkan dalam bentuk tabel sistematis yang dilengkapi dengan tombol aksi untuk memverifikasi (menyetujui) atau menolak pengajuan tersebut. Rancangan tampilan halaman Verifikasi Pendaftaran dapat dilihat pada Gambar 3.26.

Gambar 3.26. Rancangan Tampilan Halaman Verifikasi Pendaftaran

3. Halaman Paket Program Belajar digunakan oleh Admin untuk mengelola seluruh data program bimbingan belajar yang ditawarkan oleh Ruang Les. Seluruh data paket disajikan dalam bentuk tabel yang memuat informasi nama program, spesifikasi, harga, jumlah sesi, serta status ketersediaan. Selain itu, tabel ini dilengkapi dengan tombol aksi ubah (edit) dan hapus (delete) pada setiap baris data. Rancangan tampilan halaman Paket Program Belajar dapat dilihat pada Gambar 3.27.

Gambar 3.27. Rancangan Tampilan Halaman Paket Program Belajar

4. Halaman Data Mentor digunakan oleh Admin untuk mengelola seluruh data mentor aktif. Halaman ini dilengkapi dengan kolom pencarian (search bar) dan filter status untuk mempermudah pencarian serta penelusuran data mentor secara cepat. Rancangan tampilan halaman Data Mentor dapat dilihat pada Gambar 3.28.

Gambar 3.28. Rancangan Tampilan Halaman Data Mentor

5. Halaman Data Murid digunakan oleh Admin untuk melihat dan mengelola data seluruh murid yang terdaftar pada sistem. Tampilan ini menyajikan informasi rinci mengenai asal sekolah, tingkatan kelas, serta keterhubungan (relasi) dengan akun wali murid masing-masing, yang juga dilengkapi dengan kolom pencarian dan filter status. Rancangan tampilan halaman Data Murid dapat dilihat pada Gambar 3.29.

Gambar 3.29. Rancangan Tampilan Halaman Data Murid

6. Halaman Data Orang Tua digunakan oleh Admin untuk mengelola data seluruh akun orang tua atau wali murid yang terdaftar. Halaman ini memuat informasi kontak, hubungan keluarga dengan murid, serta jumlah anak yang terdaftar di bawah akun tersebut, lengkap dengan fitur pencarian dan filter status. Rancangan tampilan halaman Data Orang Tua dapat dilihat pada Gambar 3.30.

Gambar 3.30. Rancangan Tampilan Halaman Data Orang Tua

7. Halaman Jadwal Kelas digunakan oleh Admin untuk melihat dan memantau seluruh jadwal kelas. Informasi disajikan dalam bentuk kartu (card) yang dikelompokkan berdasarkan hari. Setiap kartu memuat rincian informasi kelas, kapasitas beserta jumlah murid terdaftar, dan tombol aksi untuk mengelola kelas tersebut. Rancangan tampilan halaman Jadwal Kelas dapat dilihat pada Gambar 3.31.

Gambar 3.31. Rancangan Tampilan Halaman Jadwal Kelas

8. Halaman Presensi digunakan oleh Admin untuk memantau rekapitulasi data kehadiran murid secara menyeluruh di seluruh kelas. Halaman ini dilengkapi dengan filter pencarian yang membantu Admin menyaring data berdasarkan parameter rentang tanggal, paket program, jadwal kelas, nama murid, dan mentor. Rancangan tampilan halaman Presensi dapat dilihat pada Gambar 3.32.

Gambar 3.32. Rancangan Tampilan Halaman Presensi

9. Halaman Catatan Perkembangan digunakan oleh Admin untuk memantau seluruh catatan perkembangan belajar murid yang diinput oleh Mentor. Halaman ini dilengkapi filter pencarian dengan kriteria penyaringan data yang sama seperti pada halaman Presensi untuk mempermudah penelusuran data. Rancangan tampilan halaman Catatan Perkembangan dapat dilihat pada Gambar 3.33.

Gambar 3.33. Rancangan Tampilan Halaman Catatan Perkembangan

10. Halaman Nilai digunakan oleh Admin untuk memantau rekapitulasi data nilai murid secara menyeluruh di seluruh kelas. Halaman ini dilengkapi filter pencarian dengan kriteria penyaringan data yang sama seperti halaman Presensi dan Catatan Perkembangan guna mendukung pemantauan evaluasi akademik secara fleksibel. Rancangan tampilan halaman Nilai dapat dilihat pada Gambar 3.34.

Gambar 3.34. Rancangan Tampilan Halaman Nilai

11. Halaman Materi Belajar digunakan oleh Admin untuk mengelola seluruh repositori bahan ajar dan materi pembelajaran. Informasi yang dikelola mencakup judul materi, jenjang pendidikan, mata pelajaran, tautan sumber (link), pengaturan hak akses, serta status publikasi materi. Rancangan tampilan halaman Materi Belajar dapat dilihat pada Gambar 3.35.

Gambar 3.35. Rancangan Tampilan Halaman Materi Belajar

12. Halaman Pembayaran digunakan oleh Admin untuk mengelola seluruh urusan keuangan dalam satu tempat. Halaman ini terbagi menjadi dua tab, yaitu tab Pembayaran dan tab Pemantauan Kuota Murid. 

Tab Pembayaran menampilkan seluruh daftar transaksi masuk beserta status verifikasinya. Rancangan tampilan halaman Pembayaran pada Tab Pembayaran dapat dilihat pada Gambar 3.36.

Gambar 3.36. Rancangan Tampilan Halaman Pembayaran Tab Pembayaran

Tab Pemantauan Kuota Murid menyajikan rekapitulasi sisa kuota sesi belajar dari setiap murid yang aktif. Halaman ini dilengkapi dengan kartu ringkasan (summary card) pada bagian atas serta tabel rincian data pada bagian bawahnya. Rancangan tampilan halaman Pembayaran pada Tab Pemantauan Kuota Murid dapat dilihat pada Gambar 3.37.

Gambar 3.37. Rancangan Tampilan Halaman Pembayaran Tab Pemantauan Kuota

13. Halaman Layanan merupakan halaman yang digunakan Admin untuk memantau dan menangani seluruh tiket yang dikirimkan oleh Mentor maupun Orang Tua. Seluruh daftar tiket disajikan dalam bentuk tabel yang dapat dipilah berdasarkan empat tab status, yaitu Semua, Baru, Dalam Penanganan, dan Selesai. Rancangan tampilan halaman Layanan dapat dilihat pada Gambar 3.38.

Gambar 3.38. Rancangan Tampilan Halaman Layanan

Ketika Admin membuka salah satu tiket, halaman akan beralih ke ruang obrolan tiket yang menampilkan percakapan antara pengirim dan Admin secara bergantian, dilengkapi area teks balasan dan tombol Kirim Balasan di bagian bawah. Rancangan tampilan halaman Layanan dapat dilihat pada Gambar 3.39.

Gambar 3.39. Rancangan Tampilan Ruang Obrolan Halaman Layanan

14. Halaman Pengumuman digunakan oleh Admin untuk membuat, memublikasikan, dan mengelola informasi pengumuman yang ditujukan kepada pengguna tertentu. Halaman ini dilengkapi dengan kolom pencarian dan filter status untuk mempermudah penelusuran data pengumuman yang pernah dibuat. Rancangan tampilan halaman Pengumuman dapat dilihat pada Gambar 3.40.

Gambar 3.40. Rancangan Tampilan Halaman Pengumuman

15. Halaman Kelola Bimbel (Content Management System/CMS) merupakan halaman yang digunakan Admin untuk memperbarui seluruh konten home page tanpa harus menyentuh kode program. Pengaturan Konten dikelompokkan ke dalam beberapa tab sesuai section halaman, seperti Header dan Hero, Fitur Unggulan, Program Belajar, Testimoni, FAQ, Tentang Kami, Galeri, Footer, dan Pendaftaran. Rancangan tampilan halaman Kelola Bimbel dapat dilihat pada Gambar 3.41.

Gambar 3.41. Rancangan Tampilan Halaman Kelola Bimbel

16. Halaman Kelola Pengguna digunakan oleh Admin untuk memantau dan mengelola seluruh akun pengguna (user) dari berbagai hak akses (role) yang terdaftar dalam sistem. Halaman ini dilengkapi dengan kolom pencarian dan filter berdasarkan peran pengguna untuk mempermudah penelusuran data. Rancangan tampilan halaman Kelola Pengguna dapat dilihat pada Gambar 3.42.

Gambar 3.42. Rancangan Tampilan Halaman Kelola Pengguna

17. Halaman Profil Admin digunakan oleh Admin untuk memperbarui informasi akun pribadi, mencakup foto profil, nama lengkap, alamat email, dan kata sandi. Halaman ini dapat diakses secara langsung melalui menu dropdown profil yang terletak di pojok kanan atas header. Rancangan tampilan halaman Profil Admin dapat dilihat pada Gambar 3.43.

Gambar 3.43 Rancangan Tampilan Halaman Profil Admin

3.4.4.4. Perancangan Tampilan untuk Mentor
Panel Mentor dirancang menggunakan tata letak dua kolom serupa dengan Panel Admin, tetapi dengan cakupan menu yang lebih terfokus pada aktivitas pengajaran harian. Menu navigasi pada sidebar dikelompokkan menjadi dua kategori utama, yaitu kategori Akademik yang terdiri atas Jadwal Kelas, Buku Akademik, dan Materi Belajar, serta kategori Lainnya yang terdiri atas menu Layanan.
Secara keseluruhan, sebagian besar halaman pada Panel Mentor menerapkan antarmuka berbasis kartu (card) dibandingkan tabel, khususnya pada halaman Jadwal Kelas, Buku Akademik, dan Materi Belajar. Pola ini diterapkan untuk mendukung alur kerja harian Mentor yang menuntut akses data secara cepat dan operasional. Selain itu, halaman Jadwal Kelas pada Panel Mentor memiliki perbedaan signifikan dibandingkan Panel Admin karena setiap kartu kelas menyajikan daftar murid secara langsung yang dilengkapi dengan tombol aksi cepat untuk modul Presensi, Catatan Perkembangan, dan Nilai.

1. Halaman Dashboard Mentor merupakan tampilan utama yang muncul setelah Mentor berhasil melakukan autentikasi (login). Halaman ini menampilkan tiga kartu ringkasan informasi di bagian atas diikuti oleh dua tabel ringkasan yang berfungsi sebagai pintasan (shortcut) tugas harian, yaitu Tugas Input yang Belum Terselesaikan dan Jadwal Kelas Hari Ini. Pada bagian bawah, terdapat section Pengumuman untuk mendapatkan informasi terbaru dari Admin. Rancangan tampilan Dashboard Mentor dapat dilihat pada Gambar 3.44.

Gambar 3.44. Rancangan Tampilan Dashboard Mentor

2. Halaman Jadwal Kelas digunakan oleh Mentor untuk melihat seluruh kelas yang diampu dalam bentuk kartu (card) yang dikelompokkan berdasarkan hari. Berbeda dari tampilan pada Panel Admin, setiap kartu pada Panel Mentor menampilkan daftar murid beserta tiga tombol aksi cepat untuk masing-masing murid, yaitu Presensi, Catatan Perkembangan, dan Nilai. Rancangan tampilan halaman Jadwal Kelas dapat dilihat pada Gambar 3.45.

Gambar 3.45. Rancangan Tampilan Halaman Jadwal Kelas Mentor

3. Halaman Buku Akademik digunakan oleh Mentor untuk meninjau rekapitulasi data akademik seluruh murid yang diajar. Data ditampilkan dalam bentuk kartu yang dilengkapi dengan fitur pencarian dan filter status. Setiap kartu memuat informasi nama murid, nama orang tua/wali, serta jadwal kelas yang terhubung. Rancangan tampilan halaman Buku Akademik dapat dilihat pada Gambar 3.46.

Gambar 3.46. Rancangan Tampilan Halaman Buku Akademik Mentor

4. Halaman Materi Belajar digunakan oleh Mentor untuk mengakses repositori bahan ajar. Antarmuka disajikan dalam format kartu yang dilengkapi filter berdasarkan kata kunci, jenjang kelas, mata pelajaran, dan tipe materi. Materi yang baru ditambahkan oleh Admin ditandai dengan label khusus (badge) "Baru" pada kartunya. Rancangan tampilan halaman Materi Belajar dapat dilihat pada Gambar 3.47.

Gambar 3.47. Rancangan Tampilan Halaman Materi Belajar Mentor

5. Halaman Layanan digunakan oleh Mentor untuk berkomunikasi melalui tiket yang diajukan kepada Admin. Seluruh daftar tiket disajikan dalam bentuk tabel yang dapat dipilah berdasarkan empat tab status, yaitu Semua, Menunggu Balasan, Sedang Ditangani, dan Selesai. Rancangan tampilan halaman Layanan dapat dilihat pada Gambar 3.48.

Gambar 3.48. Rancangan Tampilan Halaman Layanan Mentor

6. Ketika Mentor membuka salah satu tiket, halaman akan beralih ke ruang obrolan tiket yang menampilkan percakapan antara Mentor dan Admin secara bergantian, dilengkapi area teks balasan dan tombol Kirim Balasan di bagian bawah. Rancangan tampilan halaman Layanan dapat dilihat pada Gambar 3.49.

Gambar 3.49. Rancangan Tampilan Ruang Obrolan Halaman Layanan Mentor

7. Halaman Profil Mentor digunakan oleh Mentor untuk mengelola serta memperbarui informasi akun dan data pribadi. Berbeda dari halaman profil Admin, tampilan ini terbagi menjadi tiga, yaitu Informasi Akun (mencakup foto profil, nama lengkap, alamat email, dan kata sandi), serta dua panel tambahan di bagian bawah, yaitu Biodata Diri dan Spesialisasi yang melengkapi profil kualifikasi Mentor sebagai tenaga pengajar. Halaman profil ini dapat diakses secara langsung melalui menu dropdown profil yang terletak di pojok kanan atas header. Rancangan tampilan halaman Profil Mentor dapat dilihat pada Gambar 3.50.

Gambar 3.50. Rancangan Tampilan Halaman Profil Mentor

3.4.4.5. Perancangan Tampilan untuk Orang Tua
Panel Orang Tua dirancang menggunakan tata letak dua kolom yang serupa dengan panel lainnya, tetapi dengan cakupan menu yang terfokus pada pemantauan perkembangan akademik anak serta pembayaran bimbel. Menu navigasi pada sidebar dikelompokkan ke dalam tiga kategori utama, yaitu kategori Akademik yang terdiri atas Jadwal Kelas, Buku Akademik, dan Materi Belajar, kategori Keuangan yang terdiri atas Tagihan dan Pembayaran serta Riwayat Transaksi, dan kategori Lainnya yang terdiri atas menu Layanan. Pada bagian pojok kanan atas header, terdapat komponen Switch Student yang dapat digunakan oleh Orang Tua dengan lebih dari satu anak terdaftar untuk berpindah profil pemantauan anak secara langsung, sehingga seluruh konten halaman akan menyesuaikan dengan data anak yang sedang dipilih.
Secara keseluruhan, sebagian besar halaman pada Panel Orang Tua menerapkan kombinasi antarmuka berbasis kartu (card) dan tabel yang disesuaikan dengan kebutuhan penyajian informasi pada setiap halaman. Halaman Dashboard memiliki karakteristik khusus karena dirancang dengan tiga kondisi tampilan yang berbeda menyesuaikan status pendaftaran anak. Sementara itu, halaman Buku Akademik dirancang sebagai pusat informasi terpadu yang menyajikan sisa kuota sesi belajar, estimasi waktu penyelesaian bimbingan, serta tiga modul data akademik secara bersamaan dalam satu tampilan antarmuka.

1. Halaman Dashboard Orang Tua merupakan tampilan utama yang muncul setelah Orang Tua berhasil melakukan autentikasi (login). Halaman ini dirancang secara dinamis dengan tiga kondisi tampilan yang menyesuaikan status pendaftaran anak.
Kondisi anak belum terdaftar menampilkan area utama berisi pesan pengantar beserta tombol Call to Action (CTA) untuk mengarahkan orang tua memulai proses pendaftaran murid baru. Rancangan tampilan pada kondisi ini dapat dilihat pada Gambar 3.51.

Gambar 3.51. Rancangan Tampilan Dashboard Orang Tua Kondisi Anak Belum Terdaftar

Kondisi menunggu verifikasi menampilkan informasi bahwa formulir pendaftaran sedang dalam tahap verifikasi oleh Admin. Rancangan tampilan pada kondisi ini dapat dilihat pada Gambar 3.52.

Gambar 3.52. Rancangan Tampilan Dashboard Orang Tua Kondisi Menunggu Verifikasi Pendaftaran

Kondisi aktif menampilkan antarmuka dashboard secara penuh. Tampilan ini menyajikan tiga kartu ringkasan informasi di bagian atas, dilanjutkan dengan Pengumuman, Program Belajar yang diikuti oleh anak, Jadwal Kelas Anak, serta menyajikan Statistik Akademik dan Evaluasi pada bagian bawah. Rancangan tampilan pada kondisi ini dapat dilihat pada Gambar 3.53.

Gambar 3.53. Rancangan Tampilan Dashboard Orang Tua Kondisi Aktif

Selain itu, pada bagian pojok kanan atas header terdapat komponen profil anak (Switch Student) berbentuk dropdown. Fitur ini mempermudah Orang Tua yang memiliki lebih dari satu anak terdaftar untuk beralih tampilan data anak secara langsung dan fleksibel.

2. Halaman Formulir Pendaftaran Murid Baru merupakan halaman yang diakses oleh Orang Tua setelah menekan tombol Call to Action (CTA) pada Dashboard kondisi belum terdaftar. Halaman ini menerapkan struktur navigasi linier tujuh langkah yang divisualisasikan melalui progress bar pada bagian atas halaman, sehingga pengguna dapat memantau tahapan pengisian formulir yang sedang berjalan. Ketujuh langkah tersebut secara berurutan mencakup Identitas Anak, Akademik, Informasi Orang Tua atau Wali, Paket Belajar, Preferensi Jadwal, Preview Data, dan Pembayaran dan Konfirmasi. Setiap langkah menampilkan formulir yang disesuaikan dengan jenis data yang dibutuhkan. Salah satu langkah pada alur pendaftaran ini terdapat pada tahapan pertama yang bidang isian Usia Saat Ini akan terhitung dan terisi secara otomatis (auto-calculated) setelah Orang Tua memilih tanggal lahir anak. Rancangan tampilan Formulir Pendaftaran Siswa Baru dapat dilihat pada Gambar 3.54.

Gambar 3.54. Rancangan Tampilan Formulir Pendaftaran Murid Baru

3. Halaman Jadwal Kelas digunakan oleh Orang Tua untuk melihat jadwal belajar anak yang sedang aktif. Informasi jadwal ditampilkan dalam bentuk kartu (card) yang dikelompokkan berdasarkan hari dalam satu minggu, mulai dari Senin hingga Sabtu. Setiap kartu yang memiliki jadwal aktif menampilkan informasi kelas beserta nama Mentor pengampu. Hari yang tidak memiliki jadwal kelas ditampilkan dalam kondisi kosong. Rancangan tampilan halaman Jadwal Kelas dapat dilihat pada Gambar 3.55.

Gambar 3.55. Rancangan Tampilan Halaman Jadwal Kelas Anak

4. Halaman Buku Akademik digunakan oleh Orang Tua untuk memantau seluruh perkembangan akademik anak yang terintegrasi dalam satu tampilan. Bagian atas halaman menampilkan kartu identitas anak yang memuat informasi nama, ID belajar, sisa kuota pertemuan, dan estimasi waktu selesai bimbingan. Pada bagian bawahnya, terdapat tiga tab navigasi yang dapat dipilih, yaitu Presensi, Catatan Perkembangan, dan Nilai. Rancangan tampilan halaman Buku Akademik dapat dilihat pada Gambar 3.56.

Gambar 3.56. Rancangan Tampilan Halaman Buku Akademik Anak

5. Halaman Materi Belajar digunakan oleh Orang Tua untuk mengakses repositori bahan ajar. Antarmuka disajikan dalam format kartu yang dilengkapi filter berdasarkan kata kunci, jenjang kelas, mata pelajaran, dan tipe materi. Setiap materi yang baru diunggah ditandai dengan label (badge) "Baru" pada kartunya. Rancangan tampilan halaman Materi Belajar dapat dilihat pada Gambar 3.57.

Gambar 3.57. Rancangan Tampilan Halaman Materi Belajar Anak

6. Halaman Tagihan dan Pembayaran digunakan oleh Orang Tua untuk memantau sisa kuota belajar anak sekaligus melakukan konfirmasi pembayaran tagihan. Halaman ini dirancang menggunakan tata letak dua kolom (two-column layout). Kolom kiri menampilkan kartu sisa kuota sesi belajar beserta daftar tagihan yang sedang menunggu pembayaran (pending). Kolom kanan menampilkan panel Konfirmasi Pembayaran yang memuat informasi rekening tujuan transfer, pemilihan kode tagihan, serta area unggah (upload) bukti pembayaran. Rancangan tampilan halaman Tagihan dan Pembayaran dapat dilihat pada Gambar 3.58.

Gambar 3.58. Rancangan Tampilan Halaman Tagihan dan Pembayaran

7. Halaman Riwayat Transaksi digunakan oleh Orang Tua untuk melihat seluruh riwayat transaksi pembayaran yang telah dilakukan. Data disajikan dalam bentuk tabel yang memuat informasi kode transaksi, nama murid, paket program yang diambil, nominal pembayaran, status transaksi, serta tanggal pembaruan data. Rancangan tampilan halaman Riwayat Transaksi dapat dilihat pada Gambar 3.59.

Gambar 3.59. Rancangan Tampilan Halaman Riwayat Transaksi

8. Halaman Layanan digunakan oleh Orang Tua untuk berkomunikasi melalui tiket yang diajukan kepada Admin. Seluruh daftar tiket disajikan dalam bentuk tabel yang dapat dipilah berdasarkan empat tab status, yaitu Semua, Menunggu Balasan, Sedang Ditangani, dan Selesai. Rancangan tampilan halaman Layanan dapat dilihat pada Gambar 3.60.

Gambar 3.60. Rancangan Tampilan Halaman Layanan Orang Tua

Ketika Orang Tua membuka salah satu tiket, halaman akan beralih ke ruang obrolan tiket yang menampilkan percakapan antara Orang Tua dan Admin secara bergantian, dilengkapi area teks balasan dan tombol Kirim Balasan di bagian bawah. Rancangan tampilan halaman Layanan dapat dilihat pada Gambar 3.61.

Gambar 3.61. Rancangan Tampilan Ruang Obrolan Halaman Layanan Orang Tua

9. Halaman Profil Orang Tua digunakan oleh Orang Tua untuk mengelola serta memperbarui informasi akun dan data pribadi. Tampilan halaman ini terbagi menjadi dua bagian, yaitu bagian Informasi Akun yang terdiri atas foto profil, nama lengkap, alamat email, dan kata sandi, serta bagian Informasi Kontak dan Domisili pada bagian bawahnya. Halaman profil dapat diakses secara langsung melalui menu dropdown profil yang terletak di pojok kanan atas header. Rancangan tampilan halaman Profil Orang Tua dapat dilihat pada Gambar 3.62.

Gambar 3.62. Rancangan Tampilan Halaman Profil Orang Tua


3.5. Tahap Implementasi

Tahap implementasi merupakan tahap realisasi dari seluruh rancangan sistem yang telah disusun pada tahap sebelumnya. Pada tahap ini, rancangan basis data dan rancangan antarmuka pengguna (wireframe) diterjemahkan ke dalam bentuk perangkat lunak yang fungsional menggunakan bahasa pemrograman, framework, dan teknologi yang telah ditentukan. Implementasi pada sistem bimbingan belajar Ruang Les dibagi menjadi dua fokus utama, yaitu implementasi basis data dan implementasi halaman website.

3.5.1. Implementasi Database

Tahap implementasi basis data merupakan serangkaian proses mulai dari persiapan lingkungan *server*, konfigurasi konektivitas pada sistem, hingga penerjemahan rancangan logis dan fisik struktur tabel ke dalam sistem manajemen basis data yang sesungguhnya (MySQL). Pada sistem bimbingan belajar Ruang Les, proses ini dilakukan secara bertahap dan terstruktur untuk memastikan penyimpanan dan integritas data dapat berjalan dengan baik. Berikut adalah uraian tahapan implementasinya:

1. Persiapan *Server* Lokal dan Pembuatan Basis Data
Langkah pertama dalam implementasi adalah menyiapkan *local server environment* menggunakan aplikasi Laragon. Proses diawali dengan mengaktifkan modul Apache sebagai *web server* dan MySQL sebagai *database server* melalui panel kontrol Laragon. Setelah *server* berjalan, pengelolaan basis data dilakukan melalui antarmuka grafis phpMyAdmin. Pada tahap ini, sebuah basis data kosong baru bernama `ruang_les` dibuat sebagai wadah penyimpanan seluruh tabel yang dibutuhkan oleh sistem. Tampilan proses pembuatan basis data pada phpMyAdmin dapat dilihat pada Gambar 3.63.

[TEMPAT GAMBAR DI SINI]
**Gambar 3.63.** Pembuatan Basis Data `ruang_les` pada phpMyAdmin

2. Konfigurasi Konektivitas Basis Data
Setelah basis data berhasil dibuat, langkah selanjutnya adalah menghubungkan sistem aplikasi (Laravel) dengan basis data MySQL. Konfigurasi ini dilakukan dengan mendefinisikan parameter koneksi pada berkas lingkungan variabel (`.env`) yang terletak di direktori utama (*root*) proyek sistem. Beberapa parameter yang dikonfigurasi meliputi `DB_CONNECTION` yang diisi dengan `mysql`, `DB_HOST` dengan alamat `127.0.0.1`, `DB_PORT` dengan `3306`, `DB_DATABASE` dengan nama basis data `ruang_les`, serta nama pengguna `DB_USERNAME` yaitu `root` dengan kata sandi `DB_PASSWORD` yang dibiarkan kosong sesuai pengaturan bawaan Laragon. Potongan kode konfigurasi koneksi tersebut adalah sebagai berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ruang_les
DB_USERNAME=root
DB_PASSWORD=
```

3. Eksekusi Migrasi Basis Data
Pada sistem ini, pembentukan tabel tidak dilakukan satu per satu secara manual melalui phpMyAdmin, melainkan diimplementasikan secara terprogram menggunakan mekanisme migrasi (*migration*) bawaan dari *framework* Laravel. Pendekatan ini memastikan seluruh skema basis data beserta batasan relasionalnya (*foreign key constraints*) terdokumentasi dengan baik di dalam kode sumber. Proses pembentukan keseluruhan dua puluh satu tabel dieksekusi melalui *Command Line Interface* (CLI) menggunakan perintah `php artisan migrate`. Melalui perintah tersebut, sistem secara otomatis menerjemahkan seluruh berkas definisi migrasi menjadi tabel-tabel fisik secara berurutan. Bukti eksekusi proses migrasi pada terminal dapat dilihat pada Gambar 3.64.

[TEMPAT GAMBAR DI SINI]
**Gambar 3.64.** Eksekusi Proses Migrasi Basis Data melalui Terminal

4. Hasil Pembentukan Struktur Tabel
Setelah proses migrasi berhasil dijalankan tanpa galat (*error*), tabel-tabel operasional pembentuk sistem telah terwujud secara utuh. Sebagai representasi implementasi atribut kolom dan tipe data, Gambar 3.65 memperlihatkan struktur fisik dari tabel `users` yang merupakan entitas utama untuk pengelolaan akun pengguna. Tabel ini memuat berbagai struktur secara spesifik, mencakup pendefinisian panjang tipe data *string* hingga konstrain keamanan *unique* pada kolom *email*. 

[TEMPAT GAMBAR DI SINI]
**Gambar 3.65.** Tampilan Detail Struktur Tabel `users` pada phpMyAdmin

Secara keseluruhan, sistem bimbingan belajar Ruang Les memiliki 21 tabel yang saling berelasi guna menjalankan logika dan aturan bisnis lembaga. Hasil implementasi keseluruhan tabel—mulai dari data pengguna, rekam akademik, hingga pengelolaan operasional lainnya—dapat dipantau dan dikelola langsung melalui antarmuka phpMyAdmin. Hasil implementasi keseluruhan 21 tabel tersebut dapat dilihat pada Gambar 3.66.

[TEMPAT GAMBAR DI SINI]
**Gambar 3.66.** Tampilan Keseluruhan Tabel Basis Data `ruang_les` pada phpMyAdmin


3.5.2. Implementasi Halaman Website

3.5.2.1. Implementasi Halaman Publik

3.5.2.2. Implementasi Halaman Autentikasi

3.5.2.3. Implementasi Halaman Admin

3.5.2.4. Implementasi Halaman Mentor

3.5.2.5. Implementasi Halaman Orang Tua

[Gambar 3.21. Tampilan Modul Kelola Data Master]

Modul Verifikasi Pendaftaran menampilkan antrean pendaftaran berstatus pending. Halaman detail menampilkan seluruh data siswa dan bukti pembayaran dalam satu layar dengan tombol Verifikasi dan Tolak.

[Gambar 3.22. Tampilan Modul Verifikasi Pendaftaran]

Modul Jadwal Kelas memungkinkan admin menghubungkan data siswa, mentor, hari, dan sesi waktu menjadi satu jadwal kelas aktif.

[Gambar 3.23. Tampilan Modul Jadwal Kelas]

Modul Presensi menampilkan rekap kehadiran dalam tiga tampilan: harian, mingguan, dan bulanan. Admin memiliki kewenangan untuk menginput status Hadir meskipun sisa kuota siswa sudah mencapai nol.

[Gambar 3.24. Tampilan Modul Presensi Admin]

Modul Catatan Perkembangan menampilkan rekap catatan harian yang diinput mentor. Admin dapat mengirim notifikasi pengingat kepada mentor yang belum mengisi data dalam 1 kali 24 jam.

[Gambar 3.25. Tampilan Modul Catatan Perkembangan Admin]

Modul Keuangan menampilkan daftar pembayaran masuk beserta detail dan bukti bayar. Admin memverifikasi atau menolak pembayaran, dan sistem memperbarui kuota siswa secara otomatis setelah verifikasi.

[Gambar 3.27. Tampilan Modul Keuangan Admin]

Modul Layanan menampilkan daftar tiket bantuan dari orang tua. Setiap tiket memiliki nomor unik yang digenerate otomatis. Admin dan orang tua sama-sama berhak menutup tiket secara mandiri.

[Gambar 3.28. Tampilan Modul Layanan Admin]

Modul Pengumuman memungkinkan admin membuat dan menjadwalkan pengumuman dengan pilihan target: publik, orang tua, atau mentor.

[Gambar 3.29. Tampilan Modul Pengumuman Admin]

Modul Kelola Bimbel (CMS) memungkinkan admin mengubah seluruh konten landing page melalui formulir teks tanpa modifikasi kode.

[Gambar 3.30. Tampilan Modul CMS Admin]

Modul Repositori Materi memungkinkan admin mengunggah file dokumen atau tautan video eksternal dengan label jenjang kelas, mata pelajaran, tipe konten, dan tingkat akses.

[Gambar 3.31. Tampilan Modul Repositori Materi Admin]


3.5.2.3. Panel Mentor

Dashboard Mentor menampilkan widget tugas tertunda yang memberikan peringatan apabila terdapat kelas yang telah selesai namun presensi atau catatan perkembangan belum diisi.

[Gambar 3.32. Tampilan Dashboard Mentor]

Modul Jadwal Mengajar menampilkan daftar kelas aktif dalam tampilan kartu dengan tiga tombol aksi cepat di setiap kartu: Presensi, Catatan Perkembangan, dan Nilai.

[Gambar 3.33. Tampilan Modul Jadwal Mengajar Mentor]

Modul Input Presensi menampilkan daftar siswa dalam kelas yang dipilih beserta pilihan status kehadiran (Hadir, Tidak Hadir, atau Kelas Diliburkan).

[Gambar 3.34. Tampilan Modul Input Presensi Mentor]

Modul Input Catatan Perkembangan menampilkan formulir dengan kolom materi yang diajarkan, skor pemahaman (skala 1–10), status fokus, dan catatan kendala belajar untuk setiap siswa yang hadir.

[Gambar 3.35. Tampilan Modul Input Catatan Perkembangan Mentor]

Modul Input Nilai memungkinkan mentor mengisi nilai harian per pertemuan dan rekapitulasi nilai siswa.

[Gambar 3.36. Tampilan Modul Input Nilai Mentor]

Modul Repositori Materi memberikan akses penuh untuk melihat, memfilter, mempratinjau langsung di browser, dan mengunduh seluruh materi belajar dari semua jenjang kelas.

[Gambar 3.38. Tampilan Repositori Materi Mentor]


3.5.2.4. Portal Orang Tua

Dashboard Orang Tua memiliki tiga kondisi tampilan yang berbeda berdasarkan status pendaftaran anak. Kondisi Belum Terdaftar menampilkan satu tombol besar untuk memulai formulir pendaftaran dengan seluruh menu sidebar terkunci. Kondisi Menunggu Verifikasi menampilkan banner informasi bahwa pembayaran sedang diverifikasi dengan menu sidebar masih terkunci. Kondisi Aktif membuka seluruh menu dan menampilkan widget sisa kuota serta estimasi Hari-H secara prominan.

[Gambar 3.39. Tampilan Dashboard Orang Tua — Tiga Kondisi]

Fitur Switch Student menampilkan dropdown pemilihan anak di bagian atas dashboard apabila orang tua memiliki lebih dari satu anak terdaftar. Perubahan pilihan anak memperbarui seluruh isi halaman secara dinamis tanpa perlu reload penuh.

[Gambar 3.40. Tampilan Fitur Switch Student]

Formulir Pendaftaran 7 Langkah menampilkan progress bar interaktif di bagian atas. Sistem menyimpan data secara otomatis setiap kali pengguna berpindah langkah. Kolom usia pada Langkah 1 terisi secara otomatis dan real-time berdasarkan tanggal lahir yang dipilih, dan hanya tanggal lahir yang disimpan ke basis data. Slot jadwal pada Langkah 5 yang telah penuh ditampilkan dalam kondisi disabled dengan keterangan kuota penuh. Langkah 7 menyediakan kolom unggah bukti bayar dengan fitur drag-and-drop dan pratinjau gambar instan.

[Gambar 3.41. Tampilan Formulir Pendaftaran — Langkah 1 (Usia Otomatis)]

[Gambar 3.42. Tampilan Formulir Pendaftaran — Langkah 5 (Slot Jadwal)]

[Gambar 3.43. Tampilan Formulir Pendaftaran — Langkah 7 (Unggah Bukti Bayar)]

Modul Kelas Anak menampilkan empat submodul dalam mode baca saja: Jadwal Kelas, Presensi, Catatan Perkembangan, dan Nilai.

[Gambar 3.44. Tampilan Modul Kelas Anak]

Modul Keuangan menampilkan sisa kuota sesi dalam angka besar beserta estimasi Hari-H, formulir unggah bukti bayar, dan riwayat transaksi beserta statusnya.

[Gambar 3.45. Tampilan Modul Keuangan Orang Tua]

Modul Layanan memungkinkan orang tua mengirim tiket bantuan dengan nomor unik yang dibuat otomatis oleh sistem. Orang tua dapat memantau percakapan dan menutup tiket secara mandiri.

[Gambar 3.46. Tampilan Modul Layanan Orang Tua]

Modul Repositori Materi menampilkan materi yang difilter otomatis sesuai jenjang kelas anak. Seluruh fungsi unduh hanya aktif apabila status pembayaran berstatus Aktif.

[Gambar 3.47. Tampilan Repositori Materi Orang Tua]

Modul Notifikasi In-App menampilkan panel notifikasi melalui ikon lonceng pada header. Badge angka menunjukkan jumlah notifikasi belum terbaca. Klik pada notifikasi menandai notifikasi sebagai sudah dibaca dan mengarahkan pengguna ke halaman yang relevan.

[Gambar 3.48. Tampilan Panel Notifikasi In-App]

Tabel 3.6. Jenis dan Penerima Notifikasi In-App

Jenis Notifikasi                                 | Penerima          | Pemicu
-------------------------------------------------|-------------------|----------------------------------------
Pendaftaran akun berhasil                        | Orang Tua         | Setelah registrasi akun selesai
Pendaftaran siswa baru masuk                     | Admin             | Setelah formulir langkah 7 diselesaikan
Status pendaftaran diverifikasi                  | Orang Tua         | Setelah admin menekan tombol Verifikasi
Pengingat catatan atau presensi belum lengkap    | Mentor            | Dipicu oleh admin via tombol Kirim Pengingat
Presensi siswa telah diinput                     | Orang Tua         | Setelah mentor menyimpan data presensi
Catatan perkembangan baru tersedia               | Orang Tua         | Setelah mentor menyimpan catatan perkembangan
Pembayaran baru diterima                         | Admin             | Setelah orang tua mengunggah bukti bayar
Pembayaran telah diverifikasi                    | Orang Tua         | Setelah admin memverifikasi pembayaran
Kuota sesi habis (sama dengan 0)                 | Orang Tua         | Dipicu otomatis saat kuota mencapai nol
Kuota sesi negatif (teguran tunggakan)           | Orang Tua         | Dipicu setiap kali presensi Hadir diinput saat kuota di bawah 0
Tiket bantuan dijawab                            | Orang Tua         | Setelah admin membalas tiket
Tiket bantuan diterima                           | Admin             | Setelah orang tua mengirimkan tiket
Pengumuman baru                                  | Sesuai Target     | Setelah admin menerbitkan pengumuman


3.5.3. Implementasi Logika Inti Sistem

Bagian ini membahas dua logika inti yang menjadi pembeda utama sistem Ruang Les dari sistem manajemen bimbingan belajar pada umumnya. Kedua logika ini diimplementasikan sebagai lapisan bisnis (business logic) di dalam controller dan model Laravel.


3.5.3.1. Logika Kalender Dinamis dan Pergeseran Hari-H

Logika kalender dinamis bekerja dalam dua momen berbeda: saat verifikasi pendaftaran untuk menghitung Hari-H awal, dan saat input presensi untuk menggeser Hari-H apabila diperlukan.

Perhitungan Hari-H Awal: Ketika admin memverifikasi pendaftaran siswa, sistem membaca dua hari jadwal rutin yang dipilih siswa (misalnya Senin dan Kamis) serta tanggal verifikasi sebagai titik awal. Sistem kemudian menelusuri kalender ke depan secara berurutan, menghitung setiap hari yang sesuai dengan jadwal rutin hingga mencapai pertemuan ke-8, dan menetapkan tanggal pertemuan ke-8 tersebut sebagai Hari-H.

Contoh perhitungan: Siswa dengan jadwal rutin Senin dan Kamis, diverifikasi pada 1 September 2025.

Tabel 3.7. Contoh Perhitungan Estimasi Hari-H

Pertemuan | Hari   | Tanggal
----------|--------|------------------
1         | Senin  | 1 September 2025
2         | Kamis  | 4 September 2025
3         | Senin  | 8 September 2025
4         | Kamis  | 11 September 2025
5         | Senin  | 15 September 2025
6         | Kamis  | 18 September 2025
7         | Senin  | 22 September 2025
8         | Kamis  | 25 September 2025 (Hari-H awal)

Pergeseran Hari-H: Setiap kali presensi dengan status Tidak Hadir atau Kelas Diliburkan diinput untuk siswa tersebut, sistem menggeser Hari-H ke jadwal berikutnya. Mengacu pada contoh di atas, apabila pada pertemuan ke-3 (Senin, 8 September) siswa tercatat tidak hadir, maka Hari-H bergeser dari Kamis 25 September menjadi Senin 29 September 2025. Setiap tambahan ketidakhadiran menggeser Hari-H lebih jauh ke depan secara kumulatif.

Logika ini memastikan estimasi tanggal penagihan selalu mencerminkan realisasi kehadiran aktual, bukan sekadar perhitungan kalender statis yang mengabaikan absensi.


3.5.3.2. Logika Sistem Kuota Sesi

Setiap siswa memiliki kolom quota_remaining pada tabel student_registrations yang diinisialisasi dengan nilai 8 pada saat pendaftaran diverifikasi. Logika kuota berjalan mengikuti empat kondisi berikut.

Tabel 3.8. Kondisi Logika Sistem Kuota Sesi

Kondisi | Pemicu                                       | Aksi Sistem
--------|----------------------------------------------|---------------------------------------------
A       | Status presensi = Hadir                      | quota_remaining dikurangi 1
B       | Status presensi = Tidak Hadir / Diliburkan   | quota_remaining tidak berubah
C       | quota_remaining mencapai 0                   | Peringatan muncul di dashboard admin dan orang tua; presensi masih dapat diinput
D       | quota_remaining sudah negatif dan presensi Hadir kembali diinput | Notifikasi teguran tunggakan dikirim otomatis ke orang tua; quota_remaining terus berkurang

Sistem tidak memblokir input presensi ketika saldo kuota mencapai nol. Kebijakan ini memberikan fleksibilitas operasional kepada lembaga tanpa harus memutus proses belajar siswa di tengah jalan. Pengelola tetap dapat mencatat kehadiran, dan sistem secara otomatis menangani komunikasi penagihan melalui notifikasi teguran setiap kali kuota bertambah minus.

Pemulihan kuota terjadi setiap kali orang tua mengunggah bukti pembayaran dan admin memverifikasinya. Saat verifikasi berhasil, sistem menambahkan 8 sesi ke kolom quota_remaining dan menghitung ulang estimasi Hari-H berdasarkan kuota baru tersebut.


3.6. Publikasi Website


3.6.1. Proses Hosting

Setelah seluruh tahap pengembangan dan pengujian selesai, sistem dipublikasikan ke lingkungan web hosting agar dapat diakses secara daring sebagai media demonstrasi fungsional. Proses hosting meliputi beberapa langkah berikut.

Pertama, kode sumber sistem diunggah ke server hosting melalui protokol FTP atau menggunakan fitur deployment berbasis Git. Kedua, basis data MySQL dibuat pada server dan diisi dengan struktur tabel melalui migrasi Laravel menggunakan perintah php artisan migrate. Ketiga, file konfigurasi lingkungan (.env) disesuaikan dengan kredensial basis data dan pengaturan server produksi. Keempat, aset front-end dikompilasi untuk lingkungan produksi menggunakan perintah npm run build yang menghasilkan file CSS dan JavaScript yang telah dioptimalkan. Kelima, sistem dapat diakses melalui nama domain yang telah dikonfigurasi.

[Gambar 3.49. Tampilan Sistem yang Sudah Dipublikasikan]


3.7. Tahap Uji Coba


3.7.1. Uji Coba Black Box

Uji coba Black Box dilakukan untuk memverifikasi bahwa seluruh fungsionalitas sistem berjalan sesuai dengan kebutuhan yang telah diidentifikasi. Pengujian berfokus pada perilaku output sistem berdasarkan input yang diberikan tanpa memperhatikan struktur kode di dalamnya.

Tabel 3.9. Hasil Uji Coba Black Box — Autentikasi dan Registrasi

No | Komponen Uji                         | Data Input                                     | Hasil yang Diharapkan                                              | Hasil
---|--------------------------------------|------------------------------------------------|--------------------------------------------------------------------|-------
1  | Registrasi akun dengan data valid    | Nama, email baru, password valid               | Akun berhasil dibuat, pengguna diarahkan ke halaman utama          | Sesuai
2  | Registrasi dengan email terdaftar    | Email yang sudah digunakan                     | Sistem menampilkan pesan error email sudah terdaftar               | Sesuai
3  | Registrasi tanpa mengisi email       | Email dikosongkan                              | Sistem menampilkan pesan error validasi kolom wajib                | Sesuai
4  | Login data valid sebagai Admin       | Email dan password Admin yang benar            | Berhasil login, diarahkan ke Dashboard Admin                       | Sesuai
5  | Login data valid sebagai Mentor      | Email dan password Mentor yang benar           | Berhasil login, diarahkan ke Dashboard Mentor                      | Sesuai
6  | Login data valid sebagai Orang Tua   | Email dan password Orang Tua yang benar        | Berhasil login, diarahkan ke Halaman Utama                         | Sesuai
7  | Login dengan password salah          | Email benar, password salah                    | Sistem menampilkan pesan error kredensial tidak cocok              | Sesuai
8  | Logout dari sistem                   | Pengguna dalam kondisi sudah login             | Sesi berakhir, pengguna diarahkan ke halaman login                 | Sesuai

Tabel 3.10. Hasil Uji Coba Black Box — Formulir Pendaftaran Siswa

No | Komponen Uji                             | Data Input                                     | Hasil yang Diharapkan                                               | Hasil
---|------------------------------------------|------------------------------------------------|---------------------------------------------------------------------|-------
9  | Kalkulasi usia otomatis                  | Tanggal lahir dipilih dari date picker         | Kolom usia terisi otomatis dalam format X Tahun Y Bulan             | Sesuai
10 | Simpan otomatis antar langkah            | Isi langkah 1, tutup browser, buka kembali     | Data langkah 1 tersimpan, formulir kembali ke langkah terakhir     | Sesuai
11 | Slot jadwal penuh dinonaktifkan          | Pilih slot yang kapasitasnya sudah penuh       | Slot tampil disabled dengan keterangan Kuota Sesi Penuh             | Sesuai
12 | Unggah bukti bayar drag-and-drop         | Seret file JPG ke area unggah                  | File terunggah dengan pratinjau gambar muncul instan               | Sesuai
13 | Selesaikan formulir 7 langkah            | Semua langkah diisi lengkap dan benar          | Status berubah Menunggu Verifikasi, admin menerima notifikasi       | Sesuai
14 | Formulir dengan kolom wajib kosong       | Langkah 1 tanpa nama siswa                     | Sistem menampilkan pesan error di bawah kolom, tidak bisa lanjut   | Sesuai

Tabel 3.11. Hasil Uji Coba Black Box — Logika Kuota dan Presensi

No | Komponen Uji                                     | Data Input                                  | Hasil yang Diharapkan                                                         | Hasil
---|--------------------------------------------------|---------------------------------------------|-------------------------------------------------------------------------------|-------
15 | Input presensi Hadir saat kuota 5                | Status Hadir, kuota awal 5                  | Kuota berkurang menjadi 4, Hari-H tidak bergeser                              | Sesuai
16 | Input presensi Tidak Hadir saat kuota 3          | Status Tidak Hadir, kuota awal 3            | Kuota tetap 3, Hari-H bergeser mundur satu jadwal                             | Sesuai
17 | Input presensi Kelas Diliburkan                  | Status Kelas Diliburkan                     | Kuota semua siswa tidak berubah, Hari-H semua siswa bergeser                  | Sesuai
18 | Input presensi Hadir saat kuota sama dengan 0    | Status Hadir, kuota awal 0                  | Kuota menjadi -1, peringatan tunggakan muncul, notifikasi teguran terkirim    | Sesuai
19 | Input presensi Hadir saat kuota -1               | Status Hadir, kuota awal -1                 | Kuota menjadi -2, notifikasi teguran kembali terkirim ke orang tua            | Sesuai
20 | Peringatan kuota 0 di dashboard orang tua        | Sisa kuota siswa mencapai nol               | Dashboard orang tua menampilkan peringatan kuota habis                        | Sesuai

Tabel 3.12. Hasil Uji Coba Black Box — Verifikasi Pendaftaran dan Pembayaran

No | Komponen Uji                               | Data Input                                    | Hasil yang Diharapkan                                                    | Hasil
---|--------------------------------------------|-----------------------------------------------|--------------------------------------------------------------------------|-------
21 | Admin verifikasi pendaftaran               | Admin klik Verifikasi pada data pending       | Status aktif, Hari-H dihitung, dashboard orang tua terbuka penuh         | Sesuai
22 | Akses dashboard setelah verifikasi         | Orang tua login setelah diverifikasi          | Semua menu terbuka, kuota sesi menampilkan angka 8                       | Sesuai
23 | Admin verifikasi bukti bayar top-up        | Admin klik Verifikasi pada pembayaran pending | Kuota bertambah 8, Hari-H dihitung ulang, notifikasi terkirim            | Sesuai
24 | Admin tolak pembayaran dengan keterangan   | Admin klik Tolak dengan alasan penolakan      | Status pembayaran Ditolak, orang tua menerima notifikasi beserta alasan  | Sesuai

Tabel 3.13. Hasil Uji Coba Black Box — Fitur Lainnya

No | Komponen Uji                               | Data Input                                      | Hasil yang Diharapkan                                                         | Hasil
---|--------------------------------------------|------------------------------------------------|-------------------------------------------------------------------------------|-------
25 | Switch student dengan dua anak terdaftar   | Orang tua ganti pilihan anak pada dropdown      | Seluruh data halaman berubah sesuai anak yang dipilih                         | Sesuai
26 | Akses repositori saat status pending       | Orang tua dengan status pending buka repositori | Materi terlihat tapi tombol unduh disabled dengan pesan informasi             | Sesuai
27 | Akses repositori saat status aktif         | Orang tua dengan status aktif buka repositori   | Materi dapat diunduh dan dipratinjau sesuai kelas anak                       | Sesuai
28 | Mentor buka repositori                     | Mentor login dan buka repositori                | Seluruh materi semua kelas dapat diakses tanpa batasan                        | Sesuai
29 | Kirim tiket bantuan oleh orang tua         | Orang tua isi formulir tiket dan kirim          | Tiket tersimpan dengan nomor unik, admin menerima notifikasi                  | Sesuai
30 | Tutup tiket oleh orang tua                 | Orang tua klik Tutup Tiket pada tiket aktif     | Status tiket berubah menjadi Selesai                                          | Sesuai
31 | Tutup tiket oleh admin                     | Admin klik Tutup Tiket pada tiket aktif         | Status tiket berubah menjadi Selesai                                          | Sesuai
32 | Notifikasi in-app terbaca                  | Pengguna klik ikon lonceng lalu klik notifikasi | Badge berkurang, notifikasi ditandai sudah dibaca, diarahkan ke halaman terkait | Sesuai


3.7.2. Uji Coba Kompatibilitas Browser

Uji coba kompatibilitas browser dilakukan untuk memastikan sistem dapat berjalan dengan baik pada berbagai peramban web yang umum digunakan. Pengujian dilakukan terhadap empat peramban utama dengan menjalankan seluruh fitur utama sistem pada masing-masing peramban.

Tabel 3.14. Hasil Uji Coba Kompatibilitas Browser

No | Fitur yang Diuji                    | Chrome | Firefox | Edge   | Safari
---|-------------------------------------|--------|---------|--------|-------
1  | Tampilan Landing Page               | Sesuai | Sesuai  | Sesuai | Sesuai
2  | Proses Login dan Logout             | Sesuai | Sesuai  | Sesuai | Sesuai
3  | Formulir Pendaftaran 7 Langkah      | Sesuai | Sesuai  | Sesuai | Sesuai
4  | Kalkulasi Usia Otomatis             | Sesuai | Sesuai  | Sesuai | Sesuai
5  | Unggah File Drag-and-Drop           | Sesuai | Sesuai  | Sesuai | Sesuai
6  | Tampilan Dashboard Admin            | Sesuai | Sesuai  | Sesuai | Sesuai
7  | Input Presensi dan Logika Kuota     | Sesuai | Sesuai  | Sesuai | Sesuai
8  | Tampilan Diagram Mermaid            | Sesuai | Sesuai  | Sesuai | Sesuai
9  | Panel Notifikasi In-App             | Sesuai | Sesuai  | Sesuai | Sesuai
10 | Tampilan Responsif pada Tablet      | Sesuai | Sesuai  | Sesuai | Sesuai

Versi peramban yang digunakan dalam pengujian: Google Chrome 130, Mozilla Firefox 131, Microsoft Edge 130, dan Safari 17.


3.7.3. Uji Coba UAT

User Acceptance Testing (UAT) dilakukan untuk mengukur tingkat penerimaan dan kemudahan penggunaan sistem dari sudut pandang pengguna akhir. Pengujian melibatkan tiga kelompok responden yang merepresentasikan tiga peran utama dalam sistem: Admin, Mentor, dan Orang Tua Murid.

Responden diminta menjalankan sistem secara langsung berdasarkan skenario tugas yang telah disiapkan, kemudian mengisi kuesioner penilaian menggunakan skala Likert 1 sampai 5, di mana 1 = Sangat Tidak Setuju dan 5 = Sangat Setuju.

Tabel 3.15. Skenario Tugas UAT per Peran

Peran      | No | Skenario Tugas
-----------|----|------------------------------------------------------------------
Admin      | 1  | Login sebagai admin dan verifikasi satu pendaftaran siswa yang sedang menunggu
Admin      | 2  | Tambahkan satu data mentor baru melalui modul data master
Admin      | 3  | Input presensi Hadir untuk satu siswa dengan sisa kuota sama dengan 1
Admin      | 4  | Buat pengumuman baru dan atur agar hanya tampil untuk orang tua terdaftar
Admin      | 5  | Balas satu tiket layanan yang dikirimkan orang tua dan tutup tiket tersebut
Mentor     | 6  | Login sebagai mentor dan isi presensi untuk kelas yang ditugaskan hari ini
Mentor     | 7  | Isi catatan perkembangan untuk satu siswa yang hadir pada pertemuan hari ini
Mentor     | 8  | Buka repositori materi dan cari materi Matematika untuk Kelas 3
Orang Tua  | 9  | Daftar akun baru, lalu isi formulir pendaftaran siswa hingga selesai
Orang Tua  | 10 | Login dan pantau jadwal, presensi, dan catatan perkembangan anak
Orang Tua  | 11 | Unggah bukti pembayaran melalui modul keuangan
Orang Tua  | 12 | Kirim tiket bantuan kepada admin dan pantau balasannya

Tabel 3.16. Kuesioner UAT

No | Pernyataan                                                                         | 1 | 2 | 3 | 4 | 5
---|------------------------------------------------------------------------------------|---|---|---|---|---
1  | Tampilan antarmuka sistem mudah dipahami                                           |   |   |   |   |
2  | Navigasi menu dalam sistem mudah ditemukan dan digunakan                           |   |   |   |   |
3  | Sistem memberikan informasi yang jelas ketika terjadi kesalahan input              |   |   |   |   |
4  | Proses yang saya lakukan terasa cepat dan tidak membuang waktu                    |   |   |   |   |
5  | Informasi yang ditampilkan sistem sudah lengkap dan sesuai kebutuhan saya         |   |   |   |   |
6  | Saya dapat menyelesaikan seluruh tugas yang diberikan tanpa kesulitan berarti     |   |   |   |   |
7  | Sistem ini membantu pekerjaan saya menjadi lebih teratur dan efisien              |   |   |   |   |
8  | Saya merasa nyaman menggunakan sistem ini secara rutin                            |   |   |   |   |
9  | Saya akan merekomendasikan sistem ini kepada pihak lain yang membutuhkan          |   |   |   |   |
10 | Secara keseluruhan, saya puas dengan performa dan fitur sistem ini                |   |   |   |   |

Keterangan skala: 1 = Sangat Tidak Setuju, 2 = Tidak Setuju, 3 = Cukup Setuju, 4 = Setuju, 5 = Sangat Setuju

Tabel 3.17. Rekap Hasil UAT

No | Pernyataan                                                                         | Admin | Mentor | Orang Tua | Rata-Rata
---|------------------------------------------------------------------------------------|-------|--------|-----------|----------
1  | Tampilan antarmuka sistem mudah dipahami                                           |       |        |           |
2  | Navigasi menu dalam sistem mudah ditemukan dan digunakan                           |       |        |           |
3  | Sistem memberikan informasi yang jelas ketika terjadi kesalahan input              |       |        |           |
4  | Proses yang saya lakukan terasa cepat dan tidak membuang waktu                    |       |        |           |
5  | Informasi yang ditampilkan sistem sudah lengkap dan sesuai kebutuhan saya         |       |        |           |
6  | Saya dapat menyelesaikan seluruh tugas yang diberikan tanpa kesulitan berarti     |       |        |           |
7  | Sistem ini membantu pekerjaan saya menjadi lebih teratur dan efisien              |       |        |           |
8  | Saya merasa nyaman menggunakan sistem ini secara rutin                            |       |        |           |
9  | Saya akan merekomendasikan sistem ini kepada pihak lain yang membutuhkan          |       |        |           |
10 | Secara keseluruhan, saya puas dengan performa dan fitur sistem ini                |       |        |           |
   | Rata-Rata Keseluruhan                                                              |       |        |           |

Catatan: Kolom skor pada Tabel 3.17 diisi setelah pengujian UAT dilakukan bersama responden nyata. Nilai rata-rata keseluruhan diinterpretasikan berdasarkan skala berikut: 1,00–1,79 = Sangat Tidak Memuaskan, 1,80–2,59 = Tidak Memuaskan, 2,60–3,39 = Cukup Memuaskan, 3,40–4,19 = Memuaskan, 4,20–5,00 = Sangat Memuaskan.