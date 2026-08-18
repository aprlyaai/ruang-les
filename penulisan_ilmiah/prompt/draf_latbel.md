BAB 1


# 1.1. Latar Belakang

Perkembangan teknologi dalam dua dekade terakhir membuat banyak sektor harus beradaptasi agar proses kerja lebih efisien dan layanan lebih berkualitas, termasuk di bidang pendidikan. Sektor pendidikan, khususnya lembaga bimbingan belajar nonformal, turut menghadapi tuntutan yang sama. Data Badan Pusat Statistik (BPS) pada tahun 2025 menunjukkan Angka Partisipasi Sekolah (APS) kelompok usia Sekolah Dasar (7–12 tahun) telah mencapai 99,23%, di mana sebagian besar anak aktif mengikuti pendidikan baik melalui jalur formal maupun nonformal [1]. Hal ini mencerminkan tingginya kesadaran masyarakat terhadap pendidikan dan besarnya potensi kebutuhan akan layanan bimbingan belajar tambahan di luar sekolah formal untuk mendampingi proses belajar siswa. Di sisi lain, orang tua kini memiliki harapan lebih. Mereka ingin proses belajar anak terlihat jelas dan transparan. Kondisi ini menjadikan digitalisasi operasional lembaga bimbingan belajar bukan lagi sekadar pilihan, melainkan langkah yang wajib dipenuhi.

Sistem informasi manajemen merupakan salah satu instrumen teknologi yang banyak digunakan karena efektif dalam mengintegrasikan proses bisnis yang sebelumnya berjalan secara terpisah dan manual. Untuk sebuah lembaga bimbingan belajar, sistem semacam ini idealnya mampu menangani pengelolaan data murid, pencatatan kehadiran, manajemen keuangan, hingga pemantauan perkembangan akademik dalam satu platform. Laudon dan Laudon (2021) mendefinisikan sistem informasi sebagai sekumpulan komponen yang saling terhubung untuk mengumpulkan, memproses, menyimpan, dan mendistribusikan informasi guna mendukung pengambilan keputusan serta pengendalian dalam organisasi [2]. Ketika logika bisnis seperti perhitungan sisa sesi berdasarkan kehadiran riil diterapkan secara komputerisasi, sistem dapat memberikan informasi yang lebih akurat dan adaptif dibandingkan pencatatan konvensional. Konsep inilah yang menjadi dasar pembuatan sistem manajemen bimbingan belajar pada penelitian ini.

Pada kenyataannya, sebagian besar lembaga bimbingan belajar berskala kecil hingga menengah, seperti Ruang Les By Ismaturrohmah, masih menjalankan proses administrasi secara konvensional menggunakan buku catatan dan buku kas manual. Kondisi ini menciptakan sejumlah celah operasional. Pencatatan kehadiran yang dilakukan secara manual rentan terhadap kekeliruan dan kehilangan data, sehingga riwayat presensi sulit dicari ketika dibutuhkan. Tidak adanya sistem yang menghitung sisa sesi secara otomatis menyebabkan penagihan kepada orang tua kerap tidak tepat waktu, terutama apabila terdapat perubahan jadwal akibat ketidakhadiran murid atau libur mendadak yang tidak dicatat secara terstruktur. Selain itu, orang tua selaku pihak yang menanggung biaya pendidikan tidak memiliki akses langsung terhadap rekam jejak perkembangan akademik anak, sehingga keterlibatan mereka sepenuhnya bergantung pada komunikasi lisan yang tidak terstandar dan tidak terdokumentasi.

Berbagai penelitian terdahulu telah mengupayakan digitalisasi pada lembaga bimbingan belajar, umumnya dengan membangun sistem informasi berbasis web yang mencakup pendaftaran murid, pencatatan nilai, dan pengelolaan jadwal dasar [3]. Sistem-sistem tersebut terbukti mampu mengurangi beban administrasi dan meningkatkan keterbacaan data. Namun demikian, sebagian besar sistem yang telah dikembangkan belum dilengkapi kemampuan logika pengelolaan kuota sesi yang dinamis, yaitu kemampuan sistem untuk secara otomatis menyesuaikan estimasi tanggal penagihan berdasarkan data kehadiran nyata murid. Selain itu, fitur khusus agar orang tua bisa memantau perkembangan anak pun belum menjadi komponen standar dalam sistem-sistem tersebut. Kesenjangan inilah yang menjadi dasar pertimbangan dirancangnya sistem manajemen bimbingan belajar dengan pendekatan kalender dinamis dan sistem kuota sesi pada penelitian ini.

Apabila permasalahan tersebut dibiarkan tanpa penanganan sistematis, dampaknya tidak hanya bersifat administratif, tetapi juga berpotensi menurunkan kepercayaan orang tua terhadap lembaga. Kesalahan penagihan yang berulang dapat memicu konflik terkait pembayaran, sementara tidak adanya catatan perkembangan akademik membuat lembaga kehilangan daya saing di tengah tuntutan transparansi layanan pendidikan yang kian tinggi. Sebaliknya, penerapan sistem berbasis web yang dilengkapi logika kalender dinamis akan memungkinkan pengelola memantau sisa kuota sesi setiap murid secara tepat, sekaligus menggeser estimasi tanggal penagihan secara otomatis setiap kali murid tercatat tidak hadir. Fitur catatan perkembangan yang terintegrasi dengan akun orang tua turut memberikan manfaat besar, yaitu meningkatkan keterlibatan orang tua dalam proses belajar anak sekaligus membangun kepercayaan terhadap kualitas layanan lembaga secara keseluruhan.

Berdasarkan permasalahan yang telah diuraikan, maka perlu dibuat sistem yang mampu menjawab kebutuhan operasional lembaga secara menyeluruh, mulai dari pencatatan kehadiran, pengelolaan keuangan berbasis kuota, hingga pemantauan perkembangan akademik murid secara terpadu. [Sebutkan apa saja dampak / manfaat jika sistem tersebut sudah diterapkan di lembaga tersebut]


# 1.2. Batasan Masalah

Agar pembahasan dalam penelitian ini lebih terfokus dan tidak terlalu luas, maka batasan masalah yang diterapkan adalah sebagai berikut:
1. Sistem yang dibangun berbasis website untuk diakses melalui peramban (browser) pada desktop dan laptop.
2. Pengguna sistem terdiri dari tiga peran, yaitu Admin (pengelola lembaga), Mentor (pengajar), dan Orang Tua Murid.
3. Program bimbingan belajar difokuskan pada jenjang Sekolah Dasar (SD).
4. Layanan program kelas dibatasi pada Private Class, Semi Private Class, dan Regular Class.
5. Fitur notifikasi yang diimplementasikan terbatas pada notifikasi berbasis antarmuka (in-app notification).
6. Sistem pengingat pembayaran tidak mencakup integrasi dengan gerbang pembayaran digital (payment gateway).
7. Sistem repositori pembelajaran hanya dapat diakses oleh murid yang telah terdaftar dan terverifikasi, dengan materi yang tersedia berupa dokumen digital (PDF, Docx) dan tautan video pembelajaran eksternal.


# 1.3. Tujuan Penelitian

Penelitian ini bertujuan untuk menghasilkan sebuah sistem informasi manajemen bimbingan belajar berbasis website pada lembaga Ruang Les by Ismaturrohmah yang memfasilitasi tiga peran pengguna utama yaitu Admin, Mentor, dan Orang Tua Murid. Secara khusus, sistem ini mengimplementasikan logika kalender dinamis dan sistem kuota sesi (per delapan pertemuan) yang mampu menyesuaikan estimasi tanggal penagihan secara otomatis berdasarkan data kehadiran riil murid, termasuk penanganan kondisi kuota bernilai negatif. Selain itu, sistem menyediakan fitur catatan perkembangan akademik yang terintegrasi dengan akun orang tua sehingga progres belajar murid dapat dipantau secara transparan dan terdokumentasi secara digital.


# 1.4. Metode Penelitian

Penelitian ini menggunakan metode System Development Life Cycle (SDLC) model Waterfall yang meliputi tahapan berikut:

1. Perencanaan
Pada tahap ini dilakukan identifikasi masalah operasional melalui observasi langsung terhadap proses pencatatan presensi, penagihan, dan pemantauan perkembangan akademik di Ruang Les By Ismaturrohmah yang masih berjalan secara manual. Hasil observasi digunakan sebagai dasar penetapan ruang lingkup sistem, peran pengguna, serta kebutuhan perangkat keras dan perangkat lunak pengembangan.

2. Analisis
Pada tahap ini, kebutuhan fungsional sistem diuraikan secara rinci agar sesuai dengan kebutuhan pengguna. Data dan informasi yang telah dikumpulkan pada tahap sebelumnya dievaluasi untuk dijadikan acuan utama dalam pengembangan sistem.

3. Desain
Tahap ini berfokus pada perancangan sistem menggunakan Unified Modeling Language (UML) yang meliputi Use Case Diagram, Activity Diagram, dan Class Diagram. Untuk melengkapi pemodelan tersebut, dirancang pula Struktur Tabel Basis Data, Struktur Navigasi, serta perancangan antarmuka pengguna dalam bentuk wireframe untuk tiga panel aplikasi.

4. Implementasi
Pada tahap ini, hasil perancangan direalisasikan menjadi perangkat lunak fungsional menggunakan framework Laravel (PHP) sebagai back-end, Tailwind CSS untuk antarmuka pengguna, dan MySQL sebagai sistem manajemen basis data.

5. Pengujian
Pada tahap ini dilakukan pengujian terhadap situs web yang telah dibuat menggunakan metode Black Box Testing untuk memastikan seluruh fungsionalitas sistem berjalan dengan baik dan sesuai kebutuhan dan metode User Acceptance Testing (UAT) untuk mengetahui bagaimana penerimaan pengguna.

6. Penerapan
Pada tahap ini, sistem diterapkan (deployment) ke lingkungan web hosting agar dapat diakses secara daring sebagai media demonstrasi fungsional.


# 1.5. Sistematika Penulisan

Sistematika penulisan ini disusun menjadi empat bab. Bab 1 Pendahuluan, menguraikan latar belakang masalah, batasan masalah, tujuan penelitian, metode penelitian, dan sistematika penulisan. Bab 2 Tinjauan Pustaka, menguraikan konsep dasar, teori, dan literatur yang mendukung dan menjadi landasan dalam pembuatan sistem. Bab 3 Pembahasan, merupakan inti penelitian yang memaparkan tahapan pembuatan situs web, mulai dari perancangan awal hingga sistem siap dioperasikan. Bab 4 Penutup, berisi kesimpulan dari hasil pembuatan dan pengujian sistem, serta saran-saran untuk pengembangan lebih lanjut.



---
CATATAN REFERENSI (untuk disusun ke Daftar Pustaka):

[1] Badan Pusat Statistik, Statistik Pendidikan Indonesia 2025, BPS, Jakarta, 2025, hal. 84.
    -> Terverifikasi: Data Angka Partisipasi Sekolah (APS) kelompok usia 7–12 tahun (99,23%).


[2] K. C. Laudon dan J. P. Laudon, Management Information Systems: Managing the Digital Firm, Global Edition, 17th ed., Pearson Education, London, 2021, hal. 46.
    -> Terverifikasi: Definisi sistem informasi pada bab 1 subbab "What Is an Information System?" (dimulai dari halaman 46).

