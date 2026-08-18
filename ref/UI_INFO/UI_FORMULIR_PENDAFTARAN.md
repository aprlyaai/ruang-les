# Rancangan Antarmuka UI - Formulir Pendaftaran 7 Langkah

> [!IMPORTANT]
> **STATUS EKSEKUSI (SELESAI 100%)**
> Formulir Pendaftaran 7 Langkah Publik telah sukses dieksekusi menggunakan Alpine.js. Fitur progress bar, kalkulasi usia otomatis (read-only), serta manajemen state untuk navigasi langkah demi langkah telah berjalan sempurna dengan antarmuka yang ramah pengguna.

---

### Filosofi Desain Formulir Pendaftaran

Halaman Formulir Pendaftaran mengusung tata letak yang Terisolasi (Standalone) dan Bebas Gangguan (Distraction-Free). Halaman ini baru bisa diakses setelah orang tua berhasil masuk (login) ke dalam portal. Desainnya difokuskan sepenuhnya pada kejelasan kolom dan kemudahan pengisian, membuang seluruh rute pelarian navigasi yang bisa membuyarkan konsentrasi pengguna. Proses yang kompleks ini sengaja dipecah menjadi 7 tahapan runut agar pengguna tidak merasa terintimidasi oleh panjangnya antrean data.

### Rincian Anatomi Formulir 7 Langkah

Berikut adalah bedah arsitektur visual dan komponen logika dari atas hingga bawah halaman pendaftaran:

1. Header Minimalis (Bebas Gangguan)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Mencegah pengguna keluar dari jalur pendaftaran secara tidak sengaja akibat mengeklik menu navigasi utama, sehingga rasio penyelesaian formulir (conversion rate) tetap maksimal.
- Tata Letak & Posisi: Berada di posisi paling atas layar, memanjang dari ujung kiri ke ujung kanan (full width).
- Rincian Teks & Elemen Visual: Di sudut kiri atas, terdapat gambar Logo Ruang Les tanpa embel-embel teks. Di sudut kanan atas, terdapat tombol berupa ikon silang (X) abu-abu, didampingi teks kecil bertuliskan "Simpan & Keluar".
- Interaksi Visual: Saat teks "Simpan & Keluar" atau ikon silang disorot (hover), warnanya berubah dari abu-abu menjadi merah pudar.
- Logika Sistem & Sinkronisasi Data (Backend): Logo di kiri tidak memiliki tautan (dimatikan fungsinya). Sementara itu, tombol "Simpan & Keluar" di kanan memiliki logika pintar: jika ditekan, sistem backend (session) akan menyimpan draft data (sementara) yang sudah diketik, lalu menerbangkan pengguna keluar menuju Halaman Dasbor Utama Orang Tua.

2. Tajuk Instruksi (Heading Utama)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menanamkan konfirmasi visual instan kepada orang tua bahwa mereka berada di jalur pendaftaran yang tepat dan resmi.
- Tata Letak & Posisi: Berada tepat di bawah Header Minimalis, rata tengah (center alignment).
- Rincian Teks & Elemen Visual: Tersusun dari teks judul berukuran besar, tebal, dan tegas (font Montserrat) bertuliskan "Formulir Pendaftaran Siswa Baru". Tepat di bawahnya, terdapat teks sub-judul berukuran lebih kecil, berwarna abu-abu redup (font Inter) bertuliskan "Ruang Les by Ismaturrohmah — Bimbingan Belajar Tingkat SD".
- Interaksi Visual: Murni sebagai elemen teks statis tanpa efek interaksi atau hover, menjaga layar tetap bersih dari distraksi.
- Logika Sistem & Sinkronisasi Data (Backend): Teks ini bersifat statis (hardcoded) karena merupakan tajuk permanen untuk modul pendaftaran.

3. Navigator Progres (Progress Indicator)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyuguhkan orientasi visual (peta perjalanan) kepada pengguna, mencegah rasa frustrasi akibat tidak tahu seberapa panjang lagi sisa formulir yang harus diisi.
- Tata Letak & Posisi: Membentang horizontal di bawah tajuk utama, lebar maksimal dibatasi (max-w-3xl) agar titik-titiknya tidak terlalu berjauhan di layar lebar.
- Rincian Teks & Elemen Visual: Terdiri dari 7 ikon lingkaran yang diikat oleh garis lurus penghubung di tengah-tengahnya. Di bawah setiap lingkaran, terdapat teks label pendek berukuran kecil (contoh: "Identitas", "Akademik", "Kontak", "Paket", "Jadwal", "Tinjauan", "Selesai").
- Interaksi Visual: 
  - Masa Depan (Belum Dilewati): Lingkaran berongga (hanya garis luar abu-abu), garis penghubungnya putus-putus, teks label abu-abu redup.
  - Masa Kini (Sedang Diisi): Lingkaran membesar sedikit dengan efek pantul lambat (bounce-slow), menyala hijau solid, teks label berwarna hijau tebal.
  - Masa Lalu (Sudah Dilewati): Lingkaran terisi hijau solid yang di dalamnya memunculkan ikon siluet "Centang Putih", garis penghubungnya menjadi hijau menyala (solid), teks label hijau gelap. Perubahan ini diatur instan oleh state Alpine.js setiap kali tombol 'Lanjut' ditekan.
- Logika Sistem & Sinkronisasi Data (Backend): Navigator ini tidak bisa diklik (klik dinonaktifkan) untuk mencegah pengguna melompat ke Langkah 5 jika belum mengisi Langkah 1. Perpindahan mutlak dikendalikan oleh fungsi validasi Alpine.js di tombol navigasi form.

4. Langkah 1: Profil Identitas Anak
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menghimpun data cetak biru (biodata) siswa yang krusial untuk pencatatan database akademik, administrasi, dan pembuatan rapor di kemudian hari.
- Tata Letak & Posisi: Semua kotak input dibungkus di dalam sebuah kartu putih berbayangan lembut (shadow-sm) yang berada tepat di bawah Navigator Progres. Disusun menjadi dua kolom bersisian pada desktop, namun bertumpuk vertikal pada layar HP.
- Rincian Teks & Elemen Visual: 
  - Kolom Teks Biasa: Kotak "Nama Lengkap" dan "Nama Panggilan" (dilengkapi teks placeholder pudar).
  - Kolom Pilihan: Kotak "Tempat Lahir". Kotak "Tanggal Lahir" dilengkapi ikon kalender kecil di sisi kanan. 
  - Dropdown: "Jenis Kelamin" (Laki-laki/Perempuan) dan "Agama" (Islam/Kristen/Katolik/Hindu/Buddha/Konghucu) ditandai dengan ikon panah ke bawah di pojok kanannya.
  - Kolom Kunci: Kotak "Usia Otomatis" yang berlatar belakang abu-abu pudar menandakan tidak bisa diketik manual (Read-Only).
- Interaksi Visual: Saat input teks diklik, tepi kotak menyala hijau muda (ring). Saat ikon kalender diklik, modul penanggalan (Date Picker) muncul halus dari bawah (smooth fade-in).
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Semua opsi Dropdown bersifat statis. 
  - Sensor Usia Pintar (Alpine.js/JavaScript): Segera setelah pengguna memilih tahun dan bulan pada kotak "Tanggal Lahir", mesin skrip di balik layar seketika menghitung selisih waktu dengan hari ini, lalu menembakkan otomatis angka usianya (misal "10 Tahun 3 Bulan") ke dalam kotak "Usia Otomatis".
  - Logika Lanjut: Saat tombol 'Selanjutnya' ditekan, validasi Alpine.js memastikan tidak ada kotak yang kosong. Jika lolos, layar berganti ke Langkah 2.

5. Langkah 2: Rekam Jejak Akademik
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menggali rekam jejak dan kondisi riil anak agar manajemen dan mentor kelak dapat meracik strategi pengajaran yang dipersonalisasi dan tepat sasaran.
- Tata Letak & Posisi: Semua form input dibungkus dalam kartu putih bersudut melengkung (rounded-xl) dengan bayangan halus (shadow-sm). Pada tampilan desktop, kotak "Nama Asal Sekolah" dan "Tingkat Kelas" berdampingan (2 kolom), sedangkan input nilai dan teks area meluas penuh ke bawah (1 kolom).
- Rincian Teks & Elemen Visual: 
  - Input Teks Pendek: Kotak "Nama Asal Sekolah" (teks placeholder pudar: "Contoh: SDN 1 Malang").
  - Dropdown Pilihan: Kotak "Tingkat Kelas" dengan ikon panah bawah, memuat daftar teks pilihan statis dari "Kelas 1 SD" hingga "Kelas 6 SD".
  - Analisis Nilai: Kotak "Nilai Rata-rata Rapor Terakhir" (input khusus angka), kotak "Mata Pelajaran yang Disukai", dan "Mata Pelajaran yang Dirasa Sulit".
  - Ruang Teks Lebar (Text Area): Kotak "Karakteristik & Gaya Belajar Anak" (tinggi minimal 4 baris teks) agar orang tua leluasa bercerita secara naratif.
- Interaksi Visual: Saat kotak isian diklik, bingkai kotak seketika menyala hijau solid (focus ring). Sudut kanan bawah kotak Text Area memiliki tuas bergaris miring kecil yang bisa ditarik ke bawah oleh kursor mouse untuk memperbesar ukuran tuang teks.
- Logika Sistem & Sinkronisasi Data (Backend): Input pada bagian ini 100% mandiri (tidak ditarik dari database), melainkan berfungsi untuk diisi (user input). Jika tombol aksi "Selanjutnya" diklik, validasi Alpine.js menginspeksi apakah kotak wajib (seperti Asal Sekolah dan Kelas) sudah terisi. Jika kosong, border menyala merah. Jika lolos, halaman berganti mulus ke Langkah 3.

6. Langkah 3: Rincian Kontak Orang Tua/Wali
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Merangkai jembatan komunikasi utama antara bimbel dan keluarga untuk laporan perkembangan belajar, penanganan kondisi darurat, serta pengiriman informasi finansial (tagihan).
- Tata Letak & Posisi: Berada di dalam kartu putih berbayangan halus (shadow-sm). Komponen disusun menjadi 2 kolom bersisian di desktop (kiri-kanan) dan menumpuk ke bawah (1 kolom) di layar HP. Baris terbawah (Alamat) dibiarkan merentang penuh (full width).
- Rincian Teks & Elemen Visual: 
  - Input Identitas: Kotak isian "Nama Lengkap Orang Tua/Wali". Di sebelahnya terdapat kotak dropdown "Status Hubungan" dengan pilihan teks statis (Ayah / Ibu / Wali Lainnya).
  - Input Komunikasi: Kotak "Nomor WhatsApp Aktif" ditemani ikon telepon kecil abu-abu di sisi kirinya. Kotak "Alamat Email" ditemani ikon amplop surat.
  - Teks Area Domisili: Kotak teks lebar (Text Area) bertuliskan "Alamat Lengkap Tempat Tinggal" yang memberikan ruang luas untuk mengetik nama jalan, RT/RW, dan kode pos.
- Interaksi Visual: Saat pengguna mulai mengetik di dalam kotak, bingkai kotak tersebut memancarkan pendaran cincin (ring) hijau muda terang. Komponen dropdown membuka daftar pilihan ke bawah secara mulus (smooth transition) saat diklik.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Otomatisasi Penghemat Waktu (Auto-Fill): Karena pendaftar wajib login terlebih dahulu sebelum masuk ke formulir ini, kotak "Nama Lengkap Orang Tua/Wali" dan "Alamat Email" secara magis sudah terisi otomatis oleh sistem (data ditarik dari sesi login tabel `users`). Pengguna tidak perlu mengetik ulang, namun masih diizinkan menghapusnya jika ingin mendaftarkan email alternatif.
  - Validasi Cerdas (Alpine.js): Kotak "Nomor WhatsApp" dilengkapi sensor yang hanya menerima masukan angka (menolak huruf). Kotak email wajib memuat karakter validasi standar (`@` dan titik domain). Jika syarat Alpine.js ini terpenuhi tanpa cela, tombol "Selanjutnya" akan mengeksekusi perpindahan mulus menuju Langkah 4.

7. Langkah 4: Pemilihan Paket Bimbingan
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyuguhkan etalase program belajar secara interaktif sekaligus memberikan transparansi total biaya sejak titik awal, sehingga orang tua bisa memilih sesuai anggaran secara mandiri.
- Tata Letak & Posisi: Pilihan paket disajikan dalam bentuk rentetan kartu (cards) bersudut melengkung yang disusun berjejer menggunakan grid. Di layar desktop, kartu berbaris menyamping (3 kolom sejajar), sementara di layar HP menumpuk berurut dari atas ke bawah.
- Rincian Teks & Elemen Visual: 
  - Tajuk Kartu: Memuat label teks nama paket di bagian paling atas (contoh teks: Ruang Reguler).
  - Label Harga: Memuat angka tagihan berukuran besar dan tebal tepat di bawah tajuk (contoh teks: Rp 500.000 / Bulan).
  - Poin Fasilitas: Daftar rincian menyusun ke bawah, ditemani ikon centang kecil abu-abu. Memuat teks rincian batas siswa, durasi menit, total pertemuan, dan lokasi.
- Interaksi Visual: Saat kursor melayang menyentuh kartu (hover), kartu memancarkan efek bayangan yang meluas ke luar. Saat sebuah kartu diklik, bingkai luar kartu seketika menebal menjadi warna hijau pekat (solid ring), dan muncul lencana kecil berbunyi "Dipilih" di sudutnya.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Data Dinamis: Seluruh teks di dalam kartu (nama, nominal, rincian) ditarik otomatis dari tabel database paket milik Admin, dan memfilter hanya paket berstatus "Aktif".
  - Konektor Halaman Depan: Jika orang tua sebelumnya menekan tombol Pilih Paket dari Halaman Landing Page, URL akan membawa ID paket tersebut. Logika formulir ini akan membacanya dan seketika langsung mencentang kartu paket yang dimaksud tanpa menuntut pengguna mengekliknya ulang.
  - Perekam Harga: Saat satu paket disorot, sistem ingatan formulir (Alpine.js) akan menyalin besaran harga paket tersebut secara sembunyi-sembunyi, untuk diserahkan ke sistem kalkulasi akhir pada Langkah 7.

8. Langkah 5: Pencocokan Jadwal Belajar
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Mengakomodasi waktu luang siswa yang dikawinkan dengan ketersediaan jam operasional bimbel, demi menyusun rutinitas belajar yang teratur tanpa memberatkan anak.
- Tata Letak & Posisi: Berada di dalam kartu putih berbayangan. Antarmuka dibagi menjadi dua blok identik menyusun dari atas ke bawah (Blok Pertemuan 1 dan Blok Pertemuan 2). Di dalam setiap blok, kolom Hari dan kolom Jam Sesi saling bersisian membelah layar menjadi dua ruang imbang (layout 2 kolom).
- Rincian Teks & Elemen Visual: 
  - Sub-judul Blok: Teks berukuran tebal bertuliskan Pilih Pertemuan Pertama dan Pilih Pertemuan Kedua.
  - Opsi Hari: Rentetan kotak kecil memuat teks nama hari (Senin, Selasa, dan seterusnya) dilengkapi ikon lingkaran kosong di sisi kiri (radio button).
  - Opsi Jam: Rentetan kotak kecil memuat teks rentang waktu (contoh teks: 15.00 - 16.30 WIB).
  - Lencana Kuota Penuh: Sebuah label kapsul super kecil berwarna abu-abu redup dengan tulisan kecil berbunyi Penuh.
- Interaksi Visual: Saat sebuah nama hari diklik pengguna, ikon lingkaran seketika terisi warna hijau pekat di tengahnya. Opsi jam yang berada di sebelahnya, yang awalnya tertutup rapat (tidak terlihat), akan merambat muncul secara mulus (smooth fade-in) memberikan pertanda bahwa ia kini siap dipilih.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Penarikan Data: Opsi Hari dan Jam tidak diketik mati, melainkan ditarik murni dari tabel Jadwal milik Admin. 
  - Pencegah Tabrakan Waktu (Alpine.js): Sistem secara ketat hanya mengizinkan pengguna memilih satu waktu (single-choice). Jika mereka mencoba mengeklik hari Selasa, maka centang di hari Senin akan otomatis lepas.
  - Sensor Kuota Server (Real-Time Check): Sistem berinteraksi dengan database untuk memeriksa ketersediaan sisa bangku. Jika sebuah jadwal (misalnya Senin Jam 15.00) terdeteksi terisi maksimal, kotak opsi tersebut otomatis lumpuh (disabled). Warnanya berubah menjadi abu-abu redup, kursor akan berbentuk palang merah saat disorot, dan kotak itu mutlak tidak bisa diklik demi menghindari kelebihan muatan (overcapacity).

9. Langkah 6: Validasi & Tinjau Ulang Data
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyelenggarakan pos pemeriksaan terakhir bagi orang tua untuk mengeliminasi kesalahan ketik sebelum data mengeras dan tersimpan permanen di pangkalan data.
- Tata Letak & Posisi: Berada di dalam kartu putih lebar. Data dibagi menjadi beberapa blok horizontal yang menyusun dari atas ke bawah. Setiap blok mewakili data dari Langkah 1 hingga Langkah 5 secara berurutan.
- Rincian Teks & Elemen Visual: 
  - Judul Blok: Teks label abu-abu redup penanda kelompok data (contoh teks: Identitas Anak, Kontak Orang Tua).
  - Isi Data: Teks tebal berwarna hitam legam yang menampilkan ulang ketikan pengguna.
  - Tautan Ubah: Teks kecil berwarna hijau dengan garis bawah di sudut kanan atas setiap blok data.
- Interaksi Visual: Saat pengguna menyorot tautan Ubah, teks tersebut memancarkan pendaran hijau menyala. Ketukan pada tautan ini memicu efek transisi layar meredup lalu meluncur kembali ke langkah spesifik yang bersangkutan.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Proyeksi Sesi (Alpine.js): Sistem secara magis menampilkan pantulan murni dari memori lokal (state formulir), bukan menarik dari server, karena data formulir ini memang belum dikirimkan.
  - Lompatan Cerdas: Jika pengguna menekan tombol Ubah pada blok Jadwal, sistem navigasi Alpine.js langsung melompat mundur tepat ke Langkah 5 tanpa menghilangkan atau me-reset data yang sudah diisi di langkah lainnya.

10. Langkah 7: Gerbang Administrasi (Konfirmasi)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menutup rangkaian panjang pendaftaran dengan penyelesaian kewajiban finansial (transfer) sebagai tiket mutlak agar data siswa bisa diverifikasi oleh Admin.
- Tata Letak & Posisi: Semua elemen dibungkus kartu putih. Di bagian atas terdapat ilustrasi keberhasilan dan tagihan, di tengah terdapat rincian rekening bank, dan di bawah menempati area lebar untuk mengunggah bukti transfer.
- Rincian Teks & Elemen Visual: 
  - Plakat Keberhasilan: Ikon centang hijau besar diapit teks tebal Pendaftaran Tahap 1 Berhasil.
  - Proyeksi Tagihan: Kotak abu-abu berisi teks nominal uang berukuran raksasa.
  - Brankas Bukti (Upload Zone): Kotak area unggah berbingkai garis putus-putus dengan ikon klip kertas di tengahnya.
  - Tombol Eksekusi: Tombol solid berwarna hijau penuh bertuliskan Kirim Bukti & Selesai.
- Interaksi Visual: Area unggah bukti akan berubah warna menjadi hijau sangat pudar saat sebuah file ditarik ke atasnya (drag and drop). Tombol Eksekusi di bawah akan memunculkan roda berputar (spinner) saat diklik untuk menandakan proses pengiriman sedang berjalan.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Pengunci Tagihan: Sistem mengambil rekam jejak harga paket mutlak dari Langkah 4 dan menampilkannya di sini secara statis (read only).
  - Validasi File: Kotak unggah dilengkapi logika pengaman yang hanya menerima format gambar (JPG/PNG) dan menolak file di atas ukuran batas maksimal (misal 2 Megabyte).
  - Penyegelan Akhir: Hentakan pada tombol Selesai akan mengeksekusi operasi HTTP POST pengiriman data final formulir beserta gambar bukti transfer ke database Laravel. Setelah sukses, alih-alih langsung ke dasbor, sistem akan melempar pengguna ke Halaman Sukses Pendaftaran.

11. Halaman Sukses Pendaftaran (Peralihan)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Memberikan umpan balik (feedback) visual instan yang melegakan, mengonfirmasi bahwa seluruh proses panjang 7 langkah telah ditangkap sistem, sekaligus memberi instruksi langkah menunggu verifikasi Admin.
- Tata Letak & Posisi: Berdiri sendiri sebagai halaman penuh (full screen) di tengah layar. Menggunakan ruang kosong yang luas (white space) di sekelilingnya agar fokus mutlak tertuju pada pesan keberhasilan.
- Rincian Teks & Elemen Visual: 
  - Ikon Raksasa: Ikon centang hijau besar atau ilustrasi perayaan ringan di posisi paling atas.
  - Tajuk Utama: Teks tebal berukuran besar berbunyi Pendaftaran Berhasil Terkirim!.
  - Teks Penjelasan: Paragraf panduan abu-abu di bawahnya, berbunyi Terima kasih. Data pendaftaran dan bukti pembayaran sedang diproses oleh Admin. Kami akan memverifikasi dalam 1x24 Jam.
  - Tombol Aksi: Tombol kapsul solid berwarna hijau bertuliskan Masuk ke Dasbor Orang Tua.
- Interaksi Visual: Saat halaman pertama kali dimuat, ikon centang membesar dari kecil ke ukuran normal dengan efek memantul halus (smooth bounce pop-up). 
- Logika Sistem & Sinkronisasi Data (Backend): Halaman ini dilindungi oleh pelindung sesi. Pengguna dicegah agar tidak bisa menekan tombol mundur (back button) browser untuk menghindari pengiriman data ganda. Hentakan pada tombol aksi akan membawa pengguna permanen ke Dasbor Utama dengan status akun siswa berbunyi Menunggu Verifikasi.

12. Kaki Halaman Minimalis (Footer)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Beroperasi sebagai lantai pembatas di ujung layar bawah tanpa memberikan polusi visual atau distraksi rute pelarian.
- Tata Letak & Posisi: Mengisi ruang kosong paling bawah, rata tengah (center alignment).
- Rincian Teks & Elemen Visual: Hanya sebaris teks abu-abu pudar berukuran sangat kecil berbunyi Hak Cipta Ruang Les.
- Interaksi Visual: Tidak ada interaksi apapun. Teks murni statis.
- Logika Sistem & Sinkronisasi Data (Backend): Tidak terhubung dengan logika sistem apapun.
