# Rancangan Antarmuka UI - Panel Admin

> [!IMPORTANT]
> **STANDAR EMAS (GOLDEN BLUEPRINT) 2026**
> Mulai tahap eksekusi Dasbor, seluruh antarmuka Panel Admin WAJIB mematuhi standar State of the Art:
> 1. Visual: Menggunakan elemen Glassmorphism (bg-white/80 backdrop-blur-md), gradien warna halus, bayangan jatuh dinamis, dan animasi masuk bertingkat (staggered animations) dengan Alpine.js. Font menggunakan skema modern (Tailwind v4).
> 2. Clean Code (DRY): Dilarang keras mengulang kode HTML kasar. Wajib menggunakan komponen Blade yang telah dipatenkan: `<x-admin.page-header>`, `<x-admin.stat-card>`, `<x-admin.empty-state>`, dan `<x-admin.avatar>`.
> 3. Logika Keamanan: Segala transaksi data harus dibungkus DB::transaction. File yang terkait dengan data yang ditolak/dihapus wajib dibersihkan dari server menggunakan Storage::delete (Anti-Storage Leak).

---

### Filosofi Desain Panel Dasbor

Panel Admin dirancang sebagai pusat komando militer (Control Center) untuk seluruh roda operasional Ruang Les. Karena fungsinya yang sangat vital dalam menampung ribuan baris data, arsitektur visualnya sangat mengutamakan keleluasaan tata letak, navigasi sisi (sidebar) yang intuitif, dan penyajian tabel data yang sangat bersih. Antarmuka ini dirancang secara khusus untuk kenyamanan layar komputer (desktop-first) demi menjaga efisiensi jam kerja para staf manajemen.

### Rincian Anatomi Ruang Kendali Admin

Berikut adalah pembedahan mendalam mengenai setiap sudut ruangan dan modul yang tersedia di dalam Panel Admin:

1. Tata Letak Utama (Layout Dashboard)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menjaga konsistensi kerangka spasial halaman agar staf admin dapat bermanuver antar modul manajemen dengan kecepatan tinggi tanpa mengalami disorientasi tata letak.
- Tata Letak & Posisi: Mengadopsi arsitektur layar terbelah khas panel kontrol. Di sisi kiri terdapat kolom navigasi (Sidebar) selebar 250px yang terpaku permanen, sementara sisa area di sisi kanan menjadi Gelanggang Konten Utama. Di bagian paling atas membentang Kanopi (Topbar) penuh dari ujung kiri ke kanan.
- Rincian Teks & Elemen Visual: 
  - Sidebar: Memuat daftar menu teks tebal berwarna putih pudar di atas latar gelap, dikelompokkan logis dengan tajuk kecil abu-abu (contoh teks tajuk: DATA MASTER, AKADEMIK). Setiap menu didampingi ikon SVG geometris (contoh: ikon buku, ikon pengguna).
  - Topbar: Bilah atas berwarna putih bersih, memuat ikon bel lonceng (Notifikasi) dan avatar bundar foto profil admin di sudut kanan.
- Interaksi Visual: Saat menu di Sidebar disorot kursor, latar belakangnya berubah cerah dengan efek gradasi merambat, dan teks memutih terang. Bagian Sidebar akan menggulung secara mulus (smooth collapse) menyisakan ikon saja jika layar mengecil atau tombol lipat ditekan.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Data Topbar: Lencana notifikasi lonceng ditarik langsung dari jumlah data tabel yang butuh persetujuan (misalnya Pendaftar Baru belum diverifikasi). Foto dan nama admin di sudut kanan ditarik dari sesi login tabel pengguna saat ini.
  - Active State Navigasi: Logika backend mendeteksi URL aktif saat ini untuk menyorot menu Sidebar secara otomatis (memberi latar solid) agar admin selalu tahu di mana posisinya.

2. Halaman Dasbor Utama (Overview)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyuguhkan pandangan mata burung (bird's eye view) secara instan mengenai denyut operasional harian bimbel, tepat pada detik pertama admin berhasil masuk ke dalam sistem.
- Tata Letak & Posisi: Menempati kanvas Gelanggang Konten Utama. Tersusun rapi dalam format grid. Di baris paling atas berjajar 4 kotak statistik sejajar. Di baris bawahnya, terhampar tabel atau daftar aktivitas ringkas yang memakan lebar area penuh.
- Rincian Teks & Elemen Visual: 
  - Panel Statistik (Stat Card): Kotak putih berlabel abu-abu redup (contoh teks: Pendaftar Baru, Kelas Hari Ini) dengan angka data raksasa berwarna tebal. Dilengkapi ikon transparan besar di sudut kanan setiap kotaknya.
  - Papan Peringatan (Quick Action): Blok khusus menyerupai tabel ringkas yang menampilkan daftar teks singkat tentang aksi yang mendesak, diberi label lencana kapsul merah bertuliskan Segera atau Gawat.
- Interaksi Visual: Saat kursor melayang di atas Panel Statistik, kotak akan sedikit terangkat (bayangan terangkat) memberikan kesan dinamis, didukung oleh balutan efek glassmorphism yang tembus pandang.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Agregat Data Real-Time: Angka raksasa pada Panel Statistik (seperti jumlah Siswa Aktif) tidak diketik manual, melainkan dihitung seketika oleh controller Laravel (menggunakan perintah query agregasi COUNT) dari masing-masing tabel database terkait.
  - Filter Khusus Papan Peringatan: Sistem secara spesifik hanya menyaring data yang berstatus mendesak untuk ditampilkan di sini (contoh: memanggil data dari tabel Tagihan yang statusnya berbunyi Menunggu Verifikasi saja).

3. Etalase Publik (CMS Landing Page)
Alasan: Memerdekakan admin dari kebergantungan teknis, memungkinkan mereka merombak isi teks, gambar, dan nyawa halaman depan (Landing Page) secara mandiri.
Komponen dan Isi:
- Pengendali Wajah Beranda (Hero Section): Kotak input taktis untuk memodifikasi kalimat sapaan utama, bersanding dengan area unggah (upload) untuk mengganti kanvas gambar latar.
- Manipulator Narasi & Bukti: Ruang teks leluasa untuk mengubah narasi visi misi (Profil), dan tabel dinamis untuk menanamkan ulasan pelanggan (Testimoni).
- Pengatur Informasi Publik: Tabel manajemen yang memungkinkan penambahan deretan Pertanyaan Umum (FAQ) dan kotak isian pendek untuk memutakhirkan nomor WhatsApp serta tautan peta lokasi.

4. Pusat Verifikasi Administrasi

Halaman verifikasi ini secara krusial dipecah menjadi dua antarmuka (Index dan Show) yang saling terkait erat, dan masing-masing memiliki nyawa UI/UX serta logikanya sendiri:

4.1. Halaman Induk Antrean (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Bertindak sebagai loket atau papan antrean agar Admin dapat memantau dengan cepat lonjakan pendaftar baru yang butuh diproses hari ini, tanpa perlu membuka berkas mereka satu per satu.
- Tata Letak & Posisi: Sebuah tabel data lebar yang merentang penuh (full width) mendominasi Gelanggang Konten Utama. Di atas tabel ini, di sisi kanan, terdapat kotak bilah pencari (search bar). Di bagian bawah tabel, tersemat baris navigasi halaman (pagination).
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Kolom-kolom dengan tajuk berhuruf tebal (Nama Siswa, Paket, Tgl Daftar, Status, Aksi).
  - Lencana Status: Pada kolom status, terdapat lencana berbentuk kapsul kecil berwarna kuning menyala bertuliskan Menunggu.
  - Tombol Aksi: Di ujung baris setiap nama, terdapat sebuah tombol ikon kotak berukuran kecil dengan siluet mata (SVG) berwarna biru redup.
- Interaksi Visual: Saat bilah pencarian diklik, tepi kotaknya menyala hijau (focus ring). Saat baris nama di dalam tabel disorot kursor (hover), latar belakang baris tersebut akan menggelap secara halus menandakan ia bisa berinteraksi.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Memanggil data pendaftaran menggunakan metode pagination (pembatasan 10 baris per halaman) murni dari database.
  - Filter Otomatis: Hanya menyaring dan menampilkan entri formulir yang bernilai Menunggu Verifikasi.
  - Interaksi Tombol Tinjau: Ketika tombol mata ditekan, URL akan menyuntikkan ID unik milik pendaftar tersebut (melalui parameter) dan menerbangkan layar menuju Halaman Tinjauan Detail (Show).

4.2. Halaman Tinjauan Detail (Show)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan ruang terisolasi bagi Admin untuk menginvestigasi silang keaslian bukti transfer dan mengulas ulang detail 7 langkah pendaftaran sebelum menjatuhkan vonis mutlak (Terima atau Tolak).
- Tata Letak & Posisi: Halaman ini membuang bentuk tabel dan menggantinya dengan gaya tata letak grid dua kolom. Kolom kiri (lebar porsi 60%) digunakan untuk menyusun tumpukan kartu informasi (Biodata, Akademik, Wali, Jadwal). Kolom kanan (lebar porsi 40%) didedikasikan khusus untuk memajang gambar Bukti Transfer. Di ujung paling bawah layar, merentang garis pembatas berisi sekumpulan tombol keputusan.
- Rincian Teks & Elemen Visual: 
  - Data Teks: Cetakan huruf tebal berwarna hitam legam untuk rincian data yang diisi pengguna (seperti Nama Asal Sekolah, Hari Jadwal Pilihan).
  - Foto Bukti Transfer: Kotak gambar (thumbnail) berbingkai halus dengan ikon kaca pembesar kecil bersemayam di sudutnya.
  - Tombol Keputusan: Tombol Terima Pendaftaran berupa kapsul solid berwarna hijau pekat, dan tombol Tolak Data berupa kapsul bergaris pinggir (outline) merah.
- Interaksi Visual: Jika foto bukti transfer diklik, gambar akan meledak memenuhi layar (modal pop-up zoom) meredupkan latar belakang. Jika tombol Tolak Data ditekan, kotak dialog akan meluncur turun (smooth drop-down) dari langit-langit layar, meminta Admin mengetikkan alasan teknis di dalam ruang teks.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Agregasi Data Relasional: Halaman ini menyedot dan merangkai teka-teki data dari berbagai tabel berelasi sekaligus (Tabel Orang Tua, Siswa, dan Paket).
  - Transaksi Database (DB Transaction): Saat tombol Terima ditekan, backend melakukan rentetan operasi mutlak: 1) Mengubah status user menjadi Aktif, 2) Mengunci slot kuota jadwal secara permanen, dan 3) Menerbangkan notifikasi digital ke dasbor Orang Tua. Semuanya harus berhasil bersamaan, atau gagal bersamaan.

5. Bank Data Utama (Master Data)

5.1. Daftar Induk: Data Mentor
Modul ini bertugas mengelola siklus hidup akun pengajar (Mentor) di ekosistem bimbel. Pembuatan akun di sini tidak hanya mengisi satu tabel, melainkan menjalin relasi antar-tabel secara simultan. Sesuai arsitektur CRUD, modul ini wajib dipecah menjadi tiga antarmuka:

5.1.1. Halaman Induk Data Mentor (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan pusat kendali terpadu bagi Admin untuk memantau, mencari, dan memanajemen seluruh tenaga pengajar (aktif maupun nonaktif) di satu tempat.
- Tata Letak & Posisi: Sebuah tabel raksasa membentang penuh (full width) mendominasi Gelanggang Konten Utama. Di sudut kanan atas bercokol tombol Tambah Mentor bersisian dengan kotak pencarian (search bar). Di bagian bawah tabel, tersemat baris navigasi halaman (pagination).
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk berhuruf tebal (Foto, Nama Lengkap, Kontak, Status, Aksi). Pada kolom Foto, terdapat komponen `<x-admin.avatar>` berbentuk bundar kecil.
  - Lencana Status: Kapsul hijau untuk Aktif dan abu-abu untuk Nonaktif.
  - Tombol Aksi: Dua kotak tombol kecil di setiap baris; kuning untuk Sunting dan merah untuk Hapus (menggunakan komponen `<x-admin.delete-form>`).
- Interaksi Visual: Saat tombol Hapus ditekan, sistem tidak memunculkan modal custom, melainkan memanggil peringatan konfirmasi SweetAlert secara global (yang telah terpasang rapi di layout utama). Saat baris tabel disorot (hover), latar belakangnya sedikit menggelap.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Menarik data gabungan dari tabel pengguna dan profil pengajar, diurutkan secara hierarki menggunakan fitur pagination.
  - Penghancuran Mutlak (Force Delete & Anti-Leak): Saat konfirmasi hapus disetujui, sistem melakukan operasi forceDelete secara cascade (menghapus data otentikasi sekaligus menghapus data profil pengajar). Sistem juga secara mutlak menjalankan perintah penghapusan fisik dari Storage server untuk memusnahkan file gambar profil lama agar tidak menjadi sampah digital.

5.1.2. Halaman Tambah Mentor (Create)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan formulir khusus untuk mendaftarkan mentor baru, yang mengharuskan penciptaan akun login sekaligus pendataan profil pribadi dalam satu alur kerja yang tak terputus.
- Tata Letak & Posisi: Sebuah halaman kanvas putih terpisah (bukan pop-up modal). Terbagi menjadi dua blok form vertikal utama: Blok Kredensial Login (Email/Sandi) dan Blok Profil (Nama, Foto, Kontak).
- Rincian Teks & Elemen Visual: 
  - Input File (Foto): Area kotak putus-putus berpusat di tengah untuk mengunggah pas foto.
  - Form Input: Kotak teks standar dengan bingkai (border) halus.
  - Tombol Simpan: Kapsul solid biru raksasa di kanan bawah bertuliskan Simpan Data Mentor.
- Interaksi Visual: Saat file gambar ditarik (drag and drop) ke area foto, pinggiran kotaknya menyala hijau pudar. Begitu tombol simpan ditekan, roda berputar (spinner) akan muncul menandakan pemrosesan data sedang berjalan.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Transaksi Ganda Terikat (DB::transaction): Hentakan pada tombol simpan akan memicu operasi transaksi database absolut. Sistem akan menciptakan rekaman di tabel akun pengguna terlebih dahulu, lalu mengambil ID tersebut untuk menciptakan rekaman di tabel profil pengajar secara bersamaan. Jika salah satu gagal (misalnya email sudah dipakai), sistem melakukan rollback otomatis.
  - Unggah Gambar Fisik: Foto yang dilampirkan akan dikompresi dan dipindahkan secara fisik ke dalam folder Storage server.

5.1.3. Halaman Sunting Mentor (Edit)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Memberikan ruang bagi Admin untuk memperbarui informasi kontak, menggeser wewenang, atau sekadar mengganti pas foto pengajar.
- Tata Letak & Posisi: Halaman penuh yang wujud visual dan tata letaknya merupakan cetakan identik dari Halaman Tambah Mentor, namun kotak-kotaknya telah disuntik penuh oleh rekaman data masa lalu.
- Rincian Teks & Elemen Visual: Menampilkan foto profil saat ini (current photo). Terdapat komponen `<x-admin.toggle-switch>` di bagian paling bawah untuk memutar status Aktif/Nonaktif akun, dan tombol biru solid bertuliskan Perbarui Data Mentor.
- Interaksi Visual: Saat Admin mengklik area foto untuk mengganti gambar, pratinjau gambar (image preview) langsung berganti seketika di layar sebelum tombol perbarui ditekan.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET by ID): Menyedot data spesifik dari tabel pengguna beserta relasinya berdasarkan ID unik di dalam URL.
  - Pembersihan Cerdas (Anti-Leak Storage): Jika Admin mengunggah foto profil yang baru, sistem wajib memanggil perintah penghapusan fisik ke Storage server untuk menghancurkan foto profil lama, barulah sistem menyimpan foto profil yang baru. 
  - Pembaruan Relasional (PUT/PATCH): Sistem memperbarui data di dua tabel berbeda sekaligus secara harmonis.

5.2. Konfigurasi Produk: Paket Program Belajar
Modul krusial ini mengendalikan harga dan fasilitas yang tampil di Landing Page serta Formulir Pendaftaran. Mengadopsi arsitektur CRUD, modul ini wajib dipecah menjadi tiga antarmuka:

5.2.1. Halaman Induk Paket Belajar (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Bertindak sebagai etalase pengawasan bagi Admin untuk melihat daftar seluruh paket belajar secara komprehensif tanpa harus berpindah layar.
- Tata Letak & Posisi: Sebuah tabel data merentang penuh (full width) di Gelanggang Konten Utama. Di sudut kanan atas tabel, bertengger sebuah tombol Tambah Paket.
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk berhuruf tebal (Nama Paket, Harga, Jumlah Pertemuan, Status, Aksi).
  - Lencana Status: Kapsul hijau bertuliskan Aktif dan abu-abu bertuliskan Nonaktif.
  - Tombol Aksi: Dua tombol kotak kecil di ujung baris; ikon pensil kuning (Sunting) dan ikon tong sampah merah (Hapus).
- Interaksi Visual: Saat tombol Hapus ditekan, layar tidak langsung menghapus data, melainkan memunculkan peringatan SweetAlert bergaya pantulan lambat (bounce-slow) di tengah layar.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Memanggil daftar paket dari database.
  - Proteksi Hapus (Anti-Delete): Sesuai aturan sistem, backend mencegah keras (hard delete) jika paket tersebut sudah memiliki rekam jejak historis terhubung dengan siswa atau tagihan. Sistem hanya mengizinkan pengubahan status menjadi Nonaktif.

5.2.2. Modal Tambah Paket (Create)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Memberikan ruang input terisolasi agar Admin dapat merancang produk bimbel baru secara fokus tanpa terdistraksi halaman lain.
- Tata Letak & Posisi: Berbentuk kotak dialog melayang (pop-up modal) berukuran sedang, berada presisi di tengah layar (center-aligned), menutupi tabel di latar belakang.
- Rincian Teks & Elemen Visual: 
  - Input Harga: Kotak isian bergaris batas halus (border) khusus pengetikan angka.
  - Tombol Simpan: Kapsul solid biru penuh bertuliskan Simpan Paket.
- Interaksi Visual: Saat angka diketik pada kolom Harga, sistem langsung memformatnya dengan titik ribuan secara seketika (contoh: 150.000). Saat tombol Batal diklik, kotak modal lenyap dengan efek memudar halus (smooth fade-out).
- Logika Sistem & Sinkronisasi Data (Backend): Menembakkan instruksi HTTP POST ke pangkalan data. Setelah sukses, modal tertutup otomatis dan tabel Index di belakangnya seketika menyegarkan diri (auto-refresh) memanggil data terbaru.

5.2.3. Modal Sunting Paket (Edit)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Memungkinkan penyesuaian harga atau operasional paket tanpa harus menghapus dan membuat ulang data dari nol.
- Tata Letak & Posisi: Menggunakan ukuran dan tata letak persis seperti Modal Tambah, namun seluruh kolom isiannya telah terisi penuh oleh rekaman data masa lalu.
- Rincian Teks & Elemen Visual: Terdapat sebuah tombol sakelar (toggle switch) di bagian bawah untuk mengatur status Aktif/Nonaktif. Tombol utama berubah wujud menjadi biru solid bertuliskan Perbarui Data.
- Interaksi Visual: Saat tombol sakelar ditekan, lingkarannya bergeser mulus ke kanan dan warnanya berubah seketika dari abu-abu menjadi hijau menyala.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Tarik Data Spesifik (GET by ID): Menyedot rekaman spesifik dari database berdasarkan parameter ID milik baris yang diklik.
  - Sinkronisasi Global Instan: Hentakan pada tombol Perbarui Data akan mengukir nominal baru di database. Perubahan nominal ini akan secara magis dan instan memperbarui harga yang terpajang secara publik di Landing Page serta Formulir Pendaftaran.

5.3. Daftar Induk: Data Murid (Siswa)
Modul ini bertugas sebagai katalog elektronik untuk seluruh siswa yang telah sah bergabung dengan bimbel. Berbeda dengan halaman verifikasi pendaftaran yang bersifat antrean sementara, modul ini adalah muara akhir tempat data siswa menetap. Sesuai arsitektur CRUD, modul ini dipecah menjadi tiga antarmuka:

5.3.1. Halaman Induk Data Murid (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menjadi direktori pencarian cepat bagi Admin untuk melihat daftar seluruh siswa aktif maupun alumni, serta memantau sisa kuota pertemuan mereka secara agregat.
- Tata Letak & Posisi: Sebuah tabel data yang membentang penuh (full width) merajai Gelanggang Konten Utama. Di sudut kanan atas tabel, terdapat tombol Tambah Siswa bersisian dengan kotak pencarian (search bar). Di kaki tabel, terpasang navigasi halaman (pagination).
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk berhuruf tebal (Foto, Nama Siswa, Asal Sekolah, Paket Aktif, Status, Aksi). Pada kolom Foto, menggunakan komponen `<x-admin.avatar>` bundar berukuran kecil.
  - Lencana Status: Kapsul hijau bertuliskan Aktif dan kapsul abu-abu bertuliskan Nonaktif/Alumni.
  - Tombol Aksi: Dua tombol ikon kecil di setiap baris; ikon pensil kuning untuk Sunting, ikon tong sampah merah untuk Hapus (menggunakan komponen `<x-admin.delete-form>`).
- Interaksi Visual: Saat tombol Hapus ditekankan, layar memanggil kotak dialog konfirmasi SweetAlert secara global (layout level). Jika baris tabel disorot (hover), latar belakangnya berpendar sedikit lebih gelap.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Memanggil data gabungan antara tabel pengguna dan profil siswa, lengkap dengan relasi ke tabel paket program belajar yang sedang diambil.
  - Penghancuran Terproteksi (Anti-Delete): Berbeda dengan data mentor, penghapusan data siswa sangat riskan karena menyangkut rekam jejak tagihan dan presensi kelas. Jika siswa sudah memiliki rekam jejak historis, sistem akan memblokir operasi hard delete dan hanya mengizinkan penonaktifan akun (Ubah Status). Jika syarat penghapusan terpenuhi, sistem wajib memanggil perintah penghapusan fisik ke Storage server untuk memusnahkan foto profil demi mencegah penumpukan file sampah.

5.3.2. Halaman Tambah Murid (Create)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Memberikan pintu belakang (backdoor) bagi Admin untuk mendaftarkan siswa secara manual (misalnya untuk pendaftar jalur luring atau datang langsung ke kantor) tanpa harus melalui formulir pendaftaran publik.
- Tata Letak & Posisi: Halaman kanvas penuh yang memanjang ke bawah (bukan pop-up modal). Form dibagi menjadi tiga blok visual: Blok Kredensial Akun (Email/Sandi), Blok Profil Siswa (Nama, Sekolah, Foto), dan Blok Pemilihan Paket Belajar.
- Rincian Teks & Elemen Visual: 
  - Input File (Foto): Kotak unggah bergaris putus-putus.
  - Pilihan Paket: Sebuah menu tarik-turun (dropdown select) berbingkai halus yang menampilkan daftar paket yang aktif.
  - Tombol Simpan: Kapsul biru solid berukuran besar di ujung kanan bawah bertuliskan Simpan Data Siswa.
- Interaksi Visual: Saat memilih paket dari dropdown, teks opsi berubah warna dari abu-abu menjadi hitam pekat (focus state). Jika tombol simpan ditekan, roda berputar (spinner) muncul dan tombol meredup untuk mencegah klik ganda.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Transaksi Kompleks (DB::transaction): Menggunakan operasi transaksi database mutlak. Sistem akan mencetak entri di tabel akun pengguna, lalu mencetak entri di tabel profil siswa, dan secara bersamaan memanipulasi slot kuota paket di tabel terkait. Jika ada satu proses yang gagal (misalnya email duplikat), seluruh proses otomatis dibatalkan dan digulung mundur (rollback).
  - Unggah Gambar Fisik: Foto yang dilampirkan akan dikompresi dan dipindahkan secara fisik ke dalam folder Storage server.

5.3.3. Halaman Sunting Murid (Edit)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Fasilitas mutlak bagi Admin untuk mengoreksi kesalahan ketik data diri, mengganti paket belajar antar semester, atau sekadar memperbarui foto profil siswa.
- Tata Letak & Posisi: Cetak biru visual yang sama persis dengan Halaman Tambah Murid, namun seluruh kotak inputnya telah disuntik oleh rekaman data masa lalu yang ditarik dari pangkalan data.
- Rincian Teks & Elemen Visual: Menampilkan foto profil saat ini (current photo). Di dasar form, bercokol komponen `<x-admin.toggle-switch>` untuk memutus akses akun siswa yang sudah lulus (alumni).
- Interaksi Visual: Saat area gambar profil diklik untuk diganti, pratinjau (image preview) akan me-render wujud gambar baru secara lokal sebelum tombol simpan ditekan.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET by ID): Menyedot rekaman spesifik berdasarkan ID unik di dalam URL.
  - Pembersihan Cerdas (Anti-Leak Storage): Jika terdeteksi unggahan foto baru, backend secara proaktif memanggil perintah penghapusan fisik untuk menghanguskan foto lama sebelum menyimpan nama file baru di database.
  - Pembaruan Relasional (PUT/PATCH): Melakukan pembaruan serentak di tabel pengguna dan profil siswa.

5.4. Daftar Induk: Data Orang Tua / Wali
Modul ini bertindak sebagai buku induk untuk mengelola relasi wali murid. Akun orang tua sangat krusial karena merupakan pemegang otoritas finansial (pembayar tagihan) sekaligus muara pengiriman notifikasi jadwal dan rapor anak. Sesuai arsitektur CRUD, modul ini dipecah menjadi tiga antarmuka utama:

5.4.1. Halaman Induk Data Orang Tua (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan papan kontrol bagi Admin untuk melacak dan mencari data kontak darurat (WhatsApp/Email) para orang tua secara cepat tanpa harus membuka profil siswa satu per satu.
- Tata Letak & Posisi: Sebuah tabel data yang membentang penuh (full width) menguasai Gelanggang Konten Utama. Di sudut kanan atas, terdapat tombol Tambah Orang Tua dan kotak pencarian (search bar). Di kaki tabel tersemat fitur navigasi halaman (pagination).
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk tebal (Nama Wali, Email, Nomor WhatsApp, Jumlah Anak, Status, Aksi).
  - Lencana Status: Kapsul hijau untuk Aktif dan kapsul abu-abu untuk Nonaktif.
  - Tombol Aksi: Dua tombol kotak kecil di ujung baris (ikon pensil kuning untuk Sunting, ikon tong sampah merah untuk Hapus menggunakan komponen `<x-admin.delete-form>`).
- Interaksi Visual: Saat tombol Hapus ditekankan, layar memanggil kotak dialog konfirmasi SweetAlert secara global. Jika baris tabel disorot kursor, latar belakangnya menggelap halus.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Menarik data gabungan dari tabel pengguna dan profil wali, serta menghitung agregasi relasi (misalnya berapa jumlah anak yang terikat ke akun ini) menggunakan fitur perhitungan dinamis (withCount) dari Laravel Eloquent.
  - Penghancuran Terproteksi (Anti-Delete): Penghapusan keras (hard delete) pada data orang tua mutlak diblokir jika akun tersebut masih mengikat data anak (siswa) yang aktif. Sistem hanya akan mengizinkan operasi ini (beserta penghapusan berjenjang/cascade delete) jika orang tua tersebut sudah tidak memiliki tanggungan anak di dalam sistem.

5.4.2. Halaman Tambah Orang Tua (Create)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan celah khusus bagi Admin untuk membuatkan akun wali secara manual jika terjadi kasus pendaftaran luring (offline) yang mendesak.
- Tata Letak & Posisi: Halaman kanvas penuh (bukan pop-up modal). Terbagi menjadi dua blok visual: Blok Kredensial Akses (Email/Sandi) dan Blok Data Pribadi (Nama Lengkap, Nomor WhatsApp, Alamat).
- Rincian Teks & Elemen Visual: 
  - Form Input: Kotak isian teks berbingkai halus dengan label huruf tebal.
  - Tombol Simpan: Kapsul solid biru penuh di pojok kanan bawah bertuliskan Simpan Data Wali.
- Interaksi Visual: Saat kotak isian diklik, pinggirannya menyala biru (focus ring). Ketika tombol simpan ditekankan, muncul animasi roda berputar (spinner) dan tombol meredup untuk mencegah klik berulang.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Transaksi Relasional (DB::transaction): Hentakan pada tombol simpan mengeksekusi operasi transaksi pangkalan data mutlak. Sistem menciptakan rekaman pengguna terlebih dahulu, disusul penciptaan profil wali secara instan. Jika terjadi kegagalan sistem (seperti email duplikat), seluruh jejak data yang baru separuh dibuat akan dibatalkan sepenuhnya (rollback).

5.4.3. Halaman Sunting Orang Tua (Edit)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Memberikan wewenang kepada Admin untuk mengoreksi nomor WhatsApp atau mereset kata sandi orang tua jika mereka kehilangan akses ke dasbor publik.
- Tata Letak & Posisi: Duplikat visual yang persis sama dengan Halaman Tambah Orang Tua, namun seluruh kotak isiannya telah disuntik dengan data terdahulu yang ditarik dari pangkalan data.
- Rincian Teks & Elemen Visual: Dilengkapi komponen `<x-admin.toggle-switch>` di bagian terbawah untuk membekukan (suspend) akses akun orang tua secara instan.
- Interaksi Visual: Saat toggle switch ditekankan, warnanya seketika berubah dari hijau menyala ke abu-abu gelap.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET by ID): Memanggil rekaman dari pangkalan data berdasarkan parameter ID spesifik dari URL.
  - Pembaruan Serentak (PUT/PATCH): Melakukan pembaruan rekaman secara serentak di tabel pengguna dan profil wali. Pembaruan nomor WhatsApp di sini akan langsung mensinkronkan rute pengiriman notifikasi otomatis di seluruh ekosistem bimbel ke nomor yang baru tanpa perlu pengaturan tambahan.

6. Mesin Akademik (Jadwal, Presensi, Rapor)
Alasan: Modul terpadat yang bertugas memutar roda pendidikan yang sesungguhnya; melacak presensi harian, mengevaluasi siswa, hingga bermuara pada penciptaan rapor akhir.
6.1. Halaman Jadwal Kelas (Kalender Operasional)
Modul ini adalah jantung operasional bimbel yang mempertemukan entitas Siswa, Mentor, dan Slot Waktu. Mengadopsi arsitektur CRUD, modul ini wajib dipecah menjadi tiga antarmuka:

6.1.1. Halaman Induk Jadwal Kelas (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan papan kontrol terpadu bagi Admin untuk memantau seluruh jadwal kelas yang sedang, akan, atau telah berlangsung dalam rentang waktu tertentu.
- Tata Letak & Posisi: Layar didominasi oleh sebuah tabel data besar (full width). Di pojok kanan atas, terdapat tombol Buat Jadwal dan filter rentang tanggal (date range picker). Di bagian bawah, tersemat navigasi halaman (pagination).
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk berhuruf tebal (Tanggal & Waktu, Nama Siswa, Nama Mentor, Paket, Status Kelas, Aksi).
  - Lencana Status: Kapsul biru (Akan Datang), kapsul hijau (Selesai), dan kapsul merah (Batal).
  - Tombol Aksi: Dua kotak kecil di setiap baris; ikon pensil kuning (Sunting) dan ikon tong sampah merah (Hapus melalui komponen `<x-admin.delete-form>`).
- Interaksi Visual: Saat Admin mengubah rentang tanggal pada filter, tabel langsung memuat ulang (refresh) baris datanya. Saat tombol Hapus ditekankan, kotak dialog konfirmasi SweetAlert meluncur turun secara global.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Menarik data relasional kompleks yang menyatukan tabel jadwal dengan tabel mentor, tabel siswa, dan tabel paket. Data diurutkan berdasarkan tanggal kelas terdekat.
  - Aturan Penghancuran (Anti-Delete): Jadwal yang berstatus Selesai atau sudah memiliki rekam jejak kehadiran (presensi) mutlak dikunci dan tidak bisa dihapus keras (hard delete). Admin hanya bisa membatalkan kelas (Ubah Status) untuk menjaga keutuhan riwayat honor mentor.

6.1.2. Modal Buat Jadwal (Create)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Memberikan ruang input cepat dan terfokus bagi Admin untuk menjadwalkan pertemuan baru tanpa harus kehilangan konteks tabel jadwal di layar belakang.
- Tata Letak & Posisi: Kotak dialog melayang (pop-up modal) berukuran menengah yang berpusat presisi di tengah layar (center-aligned), meredupkan tabel di latar belakang.
- Rincian Teks & Elemen Visual: 
  - Input Waktu: Kotak pemilih tanggal dan waktu (datetime picker) berbingkai halus.
  - Dropdown Relasi: Tiga menu tarik-turun (select box) untuk mencari Mentor, Siswa, dan Paket Belajar.
  - Tombol Simpan: Kapsul solid biru penuh di sudut kanan bawah bertuliskan Simpan Jadwal.
- Interaksi Visual: Saat kotak dropdown diketik, daftar nama Mentor atau Siswa tersaring seketika (live filtering). Saat tombol batal diklik, kotak modal lenyap dengan efek pudar halus (smooth fade-out).
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Pencegahan Bentrok (Conflict Check): Saat tombol simpan ditekankan, backend mengeksekusi validasi silang (cross-validation) ke pangkalan data untuk memastikan mentor atau siswa yang dipilih tidak memiliki jadwal lain di jam yang persis sama. Jika bentrok, sistem menolak operasi secara mutlak dan melempar peringatan.
  - Sinkronisasi Kuota: Pembuatan jadwal ini juga bertugas memotong sisa kuota pertemuan pada paket milik siswa terkait.

6.1.3. Modal Sunting Jadwal (Edit)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Memungkinkan Admin untuk menggeser hari, jam, atau menukar mentor pengajar jika terjadi kendala mendadak (reschedule).
- Tata Letak & Posisi: Mewarisi cetak biru tata letak Modal Buat Jadwal secara presisi, namun seluruh kotak isiannya sudah terisi penuh oleh rekaman data jadwal masa lalu.
- Rincian Teks & Elemen Visual: Terdapat sebuah dropdown tambahan untuk memutar Status Kelas (Akan Datang / Batal), serta tombol biru solid bertuliskan Perbarui Jadwal.
- Interaksi Visual: Saat Admin mengganti status menjadi Batal, sebuah area teks tambahan akan meluncur turun (smooth collapse) merobek layar, meminta Admin mengetikkan alasan pembatalan.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET by ID): Menyedot rekaman jadwal beserta relasinya berdasarkan ID spesifik dari pangkalan data.
  - Pembaruan Terproteksi (PUT/PATCH): Operasi pembaruan data dihentikan mutlak oleh sistem jika jadwal tersebut sudah ditandai Selesai (karena presensi sudah dikunci oleh mentor), demi mencegah manipulasi historis secara sepihak.
6.2. Halaman Catatan Kehadiran (Presensi)
Modul ini berfungsi sebagai buku tamu digital yang merekam jejak kehadiran aktual (presensi fisik) mentor dan siswa di setiap sesi kelas. Mengadopsi arsitektur terstruktur, modul ini dipecah menjadi dua antarmuka utama:

6.2.1. Halaman Induk Data Presensi (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan lembar pengawasan bagi Admin untuk memvalidasi laporan kehadiran harian yang disetor oleh para mentor, serta memastikan tidak ada kelas yang terlewat pencatatannya.
- Tata Letak & Posisi: Sebuah tabel memanjang penuh (full width) mendominasi Gelanggang Konten Utama. Di sisi atas tabel, terdapat kotak filter pencarian ganda (berdasarkan Nama Mentor dan Rentang Tanggal).
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk berhuruf tebal (Tanggal Kelas, Mentor, Siswa, Jam Hadir, Status Kehadiran, Aksi).
  - Lencana Status: Kapsul hijau (Hadir), kapsul kuning (Izin/Sakit), dan kapsul merah (Tanpa Keterangan/Alpa).
  - Tombol Aksi: Sebuah tombol kotak kuning berikon pensil (Sunting) di setiap baris. Halaman ini sengaja meniadakan tombol Hapus demi menjaga integritas data absen.
- Interaksi Visual: Saat kombinasi filter tanggal dan nama diubah, tabel bereaksi memuat ulang baris datanya secara seketika tanpa harus menyegarkan seluruh halaman.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Memanggil pangkalan data absensi yang berelasi erat dengan tabel jadwal kelas. Hanya kelas dengan rentang waktu hari ini atau masa lalu yang akan bermuara dan bisa direkap di tabel ini.

6.2.2. Modal Isi dan Sunting Presensi (Form)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Fasilitas bagi Admin untuk mengambil alih pengisian presensi secara manual (jika mentor lupa melapor), serta ruang untuk mengoreksi kesalahan input status kehadiran.
- Tata Letak & Posisi: Berbentuk kotak dialog melayang (pop-up modal) yang mendarat presisi di tengah layar (center-aligned), mengaburkan tabel presensi di latar belakang.
- Rincian Teks & Elemen Visual: Menampilkan deretan nama individu yang terlibat (Mentor dan Siswa). Di sebelah setiap nama terdapat deretan tombol pilih (radio buttons) untuk Status (Hadir / Sakit / Izin / Alpa). Di sudut bawah, bersandar kapsul biru solid bertuliskan Konfirmasi Kehadiran.
- Interaksi Visual: Saat status Hadir ditekankan, lingkaran tombol radionya menyala biru solid. Jika tombol konfirmasi diklik, sistem memunculkan roda pemrosesan (spinner) dan tombol meredup demi menghindari pengiriman data ganda (double submit).
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Transaksi Pembaruan (PUT/PATCH): Mengeksekusi penulisan atau pembaruan status absensi ke pangkalan data.
  - Pemicu Pemotongan Kuota (Database Trigger): Ini adalah urat nadi arsitektur keuangan; saat presensi siswa ditandai Hadir atau Alpa (tanpa keterangan), backend akan secara ajaib memotong hak sisa kuota pertemuan pada profil siswa yang bersangkutan. Sebaliknya, jika statusnya Sakit atau Izin resmi, kuota tidak akan hangus (bergantung pada regulasi bimbel). Hal ini membuat presensi menjadi penentu utama status tunggakan siswa.
6.3. Halaman Jurnal Perkembangan (Catatan Harian)
Modul ini adalah ruang pencatatan kualitatif tempat mentor mendeskripsikan performa belajar, tingkat pemahaman materi, dan sikap siswa di setiap akhir pertemuan kelas. Catatan ini nantinya akan menjadi embrio dari rapor naratif bulanan. Mengadopsi arsitektur CRUD khusus, modul ini dipecah menjadi tiga antarmuka utama:

6.3.1. Halaman Induk Jurnal Perkembangan (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan meja pengawasan sentral bagi Admin untuk melacak dan membaca seluruh laporan harian yang telah disetor oleh para mentor, sekaligus mendeteksi jika ada kelas yang belum menyerahkan laporan.
- Tata Letak & Posisi: Sebuah tabel data yang merentang penuh (full width) mendominasi layar. Di sudut kanan atas, bertengger filter pencarian spesifik (berdasarkan Nama Siswa, Mata Pelajaran, dan Rentang Waktu).
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk berhuruf tebal (Tanggal, Mentor, Siswa, Topik Bahasan, Cuplikan Catatan, Aksi).
  - Elemen Cuplikan: Teks catatan kualitatif yang panjang akan dipotong (truncated) secara visual agar tabel tidak melebar tak beraturan, diakhiri dengan titik-titik elipsis.
  - Tombol Aksi: Kotak kuning berikon pensil untuk Sunting Jurnal.
- Interaksi Visual: Saat kursor Admin melayang di atas teks cuplikan yang terpotong (hover effect), layar akan seketika memunculkan kotak petunjuk (tooltip) melayang yang menampilkan keseluruhan teks tanpa harus berpindah halaman.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Memanggil data teks kualitatif dari tabel jurnal yang berelasi mutlak dengan entitas kelas (Schedules). Data diurutkan secara menurun berdasarkan tanggal laporan terbaru.

6.3.2. Modal Formulir Jurnal (Form)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Memberikan hak istimewa (privilege) bagi Admin untuk menyunting dan menghaluskan tata bahasa laporan mentor yang dirasa kurang profesional sebelum akhirnya dibaca oleh orang tua di aplikasi mereka.
- Tata Letak & Posisi: Berbentuk kotak dialog melayang (pop-up modal) berukuran cukup besar dan lebar, meredupkan tabel di latar belakang agar Admin fokus membaca kalimat.
- Rincian Teks & Elemen Visual: 
  - Ruang Teks (Textarea): Sebuah kotak area teks yang luas dan lega, dikhususkan untuk menampung paragraf naratif.
  - Input Teks Singkat: Kotak untuk mengisi atau mengubah Topik/Materi Bahasan hari itu.
  - Tombol Simpan: Kapsul solid biru bertuliskan Perbarui Jurnal.
- Interaksi Visual: Saat Admin mengetik atau menghapus kata di dalam ruang teks, di sudut bawah kotak terdapat angka penghitung karakter (character counter) yang bertambah dan berkurang secara langsung (real-time feedback).
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Pembaruan Teks (PUT/PATCH): Mengeksekusi pembaruan rentetan string naratif ke dalam pangkalan data, memastikan perubahannya langsung tersinkronisasi dengan dasbor Orang Tua.

6.3.3. Halaman Pembangkit Laporan AI (Generate Rapor)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Fitur revolusioner untuk meringankan beban administratif; bertugas merangkum puluhan catatan harian mentor selama sebulan menjadi satu paragraf rapor yang kohesif, profesional, dan layak baca.
- Tata Letak & Posisi: Halaman penuh yang terbelah menjadi dua porsi (split-screen). Sisi kiri layar menampilkan daftar kronologis catatan harian asli sang mentor selama sebulan. Sisi kanan layar didedikasikan sepenuhnya untuk kotak hasil racikan Kecerdasan Buatan (AI Output).
- Rincian Teks & Elemen Visual: 
  - Tombol Pembangkit: Sebuah tombol kapsul ungu terang dengan ikon percikan bintang (sparkles) bertuliskan Generate Evaluasi AI.
  - Ruang Hasil (Textarea): Kotak teks besar di sisi kanan yang teksnya masih bisa disunting secara manual oleh Admin (human-in-the-loop) paska-pemrosesan AI.
- Interaksi Visual: Saat tombol ungu ditekankan, tombol itu akan berdenyut (pulse animation) dan memunculkan teks indikator proses, sambil meredup untuk mencegah perintah ganda. Setelah usai, teks paragraf baru akan mengalir muncul selayaknya sedang diketik manual (typewriter effect) di kotak sebelah kanan.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Agregasi Data Historis (GET): Sistem meraup seluruh string teks jurnal harian milik satu spesifik siswa dalam rentang satu bulan penuh.
  - Eksekusi Pihak Ketiga (API Call): Backend mengirim bongkahan teks agregat tersebut secara terenkripsi ke server Language Model (seperti OpenAI API), disertai perintah tak terlihat (system prompt) yang meminta AI untuk menyarikan kelebihan, kekurangan, dan progres siswa ke dalam bahasa formal evaluasi. Balasan dari API kemudian disuntikkan ke tampilan layar sebelum akhirnya Admin menekan tombol simpan absolut untuk membukukannya ke tabel Rapor Akhir.
6.4. Halaman Evaluasi Angka (Nilai Siswa)
Modul ini bertugas sebagai buku rapor kuantitatif yang membukukan skor akademis siswa dari berbagai instrumen tes (Kuis, Ulangan Harian, Ujian Akhir) di setiap perjumpaan kelas. Mengadopsi arsitektur terstruktur, modul ini dipecah menjadi dua antarmuka utama:

6.4.1. Halaman Induk Evaluasi Angka (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan buku nilai terpusat bagi Admin untuk memantau fluktuasi skor akademis seluruh siswa, memastikannya telah diinput dengan benar oleh para mentor pasca ujian usai.
- Tata Letak & Posisi: Sebuah tabel data yang membentang penuh (full width) mendominasi Gelanggang Konten Utama. Di sisi atas tabel, terdapat kotak filter pencarian tiga lapis (berdasarkan Nama Siswa, Mata Pelajaran, dan Jenis Ujian).
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk berhuruf tebal (Tanggal Tes, Nama Siswa, Mata Pelajaran, Jenis Ujian, Skor Angka, Keterangan, Aksi).
  - Lencana Skor Angka: Jika skor di bawah batas minimum (KKM), lencana menyala merah muda; jika tingkat menengah, lencana menyala kuning; jika sempurna, lencana menyala hijau cerah.
  - Tombol Aksi: Dua kotak kecil di setiap baris (ikon pensil kuning untuk Sunting, ikon tong sampah merah untuk Hapus menggunakan komponen `<x-admin.delete-form>`).
- Interaksi Visual: Saat Admin menggeser parameter filter pencarian, tabel merespons seketika mengubah isinya tanpa harus menyegarkan halaman ulang (no page reload). Saat tombol Hapus ditekankan, kotak dialog peringatan SweetAlert meluncur turun secara global.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Memanggil data numerik dari pangkalan data penilaian yang berelasi erat dengan profil siswa dan mata pelajaran. Data-data angka harian ini kelak akan diakumulasi dan dicari nilai rata-ratanya oleh sistem pada saat mencetak dokumen Rapor Akhir semester.

6.4.2. Modal Formulir Penilaian (Form)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan ruang kendali bagi Admin untuk memasukkan nilai ujian siswa secara manual (susulan) atau mengoreksi kesalahan input ketik angka yang dilakukan oleh mentor.
- Tata Letak & Posisi: Berbentuk kotak dialog melayang (pop-up modal) berukuran kecil (compact), mendarat presisi di tengah layar (center-aligned) dan secara visual meredupkan tabel data di latar belakang.
- Rincian Teks & Elemen Visual: 
  - Input Angka Mutlak: Sebuah kotak isian khusus (number input) berbingkai halus yang dirancang menolak huruf alfabet, dengan batasan angka tertinggi 100.
  - Dropdown Jenis Ujian: Menu tarik-turun (select box) untuk memilih kategori (Kuis / Tugas / Ujian Semester).
  - Tombol Simpan: Kapsul solid biru bertuliskan Simpan Nilai.
- Interaksi Visual: Jika Admin tidak sengaja mengetikkan angka menembus ambang batas (misalnya 105), pinggiran kotak input seketika berpendar merah menyala dan memunculkan teks galat (error text) di dasar kotak isian.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Validasi Sisi Server (Backend Constraint): Saat tombol simpan ditekankan, pangkalan data secara mutlak menolak angka di luar rentang wajar (0 hingga 100) dan memastikan tidak ada nilai kosong yang terkirim (Not Null).
  - Sinkronisasi Transparan (PUT/PATCH): Sistem mengeksekusi penulisan rekaman angka ke tabel database. Nilai yang baru tersimpan ini akan langsung memantul (real-time sync) ke dasbor publik Orang Tua agar mereka bisa melacak kemajuan akademis anak secara transparan dan akurat.

6.5. Halaman Materi Belajar (Repositori Modul)
Modul ini bertindak sebagai perpustakaan digital terstruktur tempat Admin dan Mentor dapat mengunggah dan mendistribusikan lembar soal, salinan presentasi, hingga modul kurikulum kepada para siswa. Mengadopsi arsitektur sistem manajemen berkas (file management), modul ini dipecah menjadi dua antarmuka utama:

6.5.1. Halaman Induk Materi Belajar (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan katalog visual bagi Admin untuk mengelola, mencari, dan membagikan materi pelajaran secara terpusat agar tidak tercecer di platform komunikasi eksternal.
- Tata Letak & Posisi: Berbeda dengan bentuk tabel data yang kaku, halaman ini menggunakan arsitektur kisi-kisi kartu (card grid layout). Kartu materi berjejer rapi menyamping, menyusun 2 kolom di layar tablet dan membelah menjadi 4 kolom merata di layar komputer (desktop). Di pojok kanan atas bertengger kotak pencarian (search bar) dan tombol Unggah Materi.
- Rincian Teks & Elemen Visual: 
  - Kartu Materi: Setiap kotak kartu memiliki sebuah ikon berkas raksasa di pusatnya (ikon PDF merah muda, ikon Word biru pekat, atau ikon Video ungu). Di bagian dasar kartu, terukir teks tebal untuk Judul Materi, angka ukuran file, dan lencana kategori Tingkat Kelas.
  - Tombol Aksi: Dua tombol melayang (ikon panah bawah untuk Unduh, dan ikon tong sampah merah untuk Hapus menggunakan `<x-admin.delete-form>`).
- Interaksi Visual: Saat kursor melayang menyentuh kartu materi (hover effect), kartu tersebut akan perlahan terangkat ke atas dengan bayangan yang menebal (lifted shadow), memberikan ilusi kartu fisik yang sangat responsif.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Memanggil data meta-berkas dari pangkalan data yang diurutkan berdasarkan berkas terbaru. Akses visibilitas berkas diatur sangat ketat; sebuah materi hanya bisa dipanggil dan diunduh oleh siswa yang berhak (berlangganan paket kelas tersebut).

6.5.2. Modal Unggah Materi Belajar (Create)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Memberikan ruang fungsional untuk mengunggah dokumen fisik dari komputer lokal ke dalam peladen (server) bimbel secara aman dan terklasifikasi.
- Tata Letak & Posisi: Kotak dialog (pop-up modal) berukuran menengah yang mendarat presisi di pusat layar (center-aligned), secara visual meredupkan pendaran deretan kartu materi di latar belakang.
- Rincian Teks & Elemen Visual: 
  - Zona Jatuhkan (Dropzone): Sebuah area raksasa berbingkai putus-putus dengan ikon awan (cloud upload SVG) di tengahnya, bertuliskan instruksi tarik dan jatuhkan berkas.
  - Input Klasifikasi: Menu tarik-turun (dropdown) untuk mengikat materi tersebut ke Tingkat Kelas dan Mata Pelajaran spesifik.
  - Tombol Simpan: Kapsul solid biru bertuliskan Unggah Berkas.
- Interaksi Visual: Saat Admin menyeret file dari komputer melintasi batas zona jatuhkan (drag over), bingkai putus-putusnya akan merambat menyala menjadi hijau terang. Setelah tombol simpan ditekan, layar menampilkan bilah proses (progress bar) horizontal yang merambat naik sesuai proses pengiriman paket data.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Operasi Penyimpanan Fisik (File System): Saat tombol simpan ditekan, sistem secara fisik memindahkan berkas (PDF/DOCX) ke dalam ruang Storage server, lalu mencetak nama lintasan berkas tersebut ke tabel database.
  - Pembersihan Cerdas (Anti-Leak Storage): Berkaitan kuat dengan operasi di halaman Index, jika Admin memutuskan untuk menekan tombol Hapus pada sebuah kartu materi, sistem dilarang keras hanya sekadar menghapus catatan dari database. Backend secara absolut diwajibkan mengeksekusi perintah penghapusan fisik dari Storage server untuk memusnahkan file aslinya, guna mencegah kapasitas server meledak akibat timbunan sampah digital.

7. Arus Kas (Keuangan & Manajemen Kuota)

7.1. Halaman Validasi Pembayaran (Kas Masuk)
Modul ini bertindak sebagai gerbang kasir digital yang menyaring seluruh setoran dana masuk dari para Orang Tua sebelum resmi dibukukan ke dalam kas bimbel. Mengadopsi alur persetujuan finansial (financial approval workflow), modul ini dipecah menjadi dua antarmuka utama:

7.1.1. Halaman Induk Validasi Pembayaran (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan antrean pengawasan bagi Admin (atau staf Keuangan) untuk memeriksa, mencocokkan, dan memvalidasi keabsahan bukti transfer (struk) yang diunggah oleh Orang Tua murid.
- Tata Letak & Posisi: Sebuah tabel data yang merentang penuh (full width) mendominasi Gelanggang Konten Utama. Di sisi atas tabel, terdapat filter pencarian spesifik (berdasarkan Nama Wali, Status Pembayaran, dan Rentang Waktu Setoran).
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk berhuruf tebal (Tanggal Setor, Nama Wali, Siswa Terkait, Nominal Tagihan, Struk Bukti, Status, Aksi).
  - Lencana Status: Kapsul kuning (Menunggu Validasi), kapsul hijau cerah (Lunas/Diterima), dan kapsul merah pekat (Ditolak).
  - Tombol Aksi: Kotak biru berikon mata (Tinjau Struk) dan kotak kuning berikon pensil (Proses Validasi). Halaman ini secara mutlak meniadakan tombol Hapus demi mencegah penggelapan jejak audit keuangan (audit trail).
- Interaksi Visual: Saat Admin mengklik tombol biru (Tinjau Struk), gambar struk pembayaran akan seketika meledak membesar (zoom-in image pop-up) di tengah layar, meredupkan tabel di latar belakang agar Admin bisa membaca deretan angka di struk dengan jelas.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Memanggil data mutasi dari tabel transaksi yang berelasi dengan akun Orang Tua dan entitas Siswa. Data diurutkan secara menurun berdasarkan tanggal setoran paling baru masuk.

7.1.2. Modal Proses Pembayaran (Edit/Approve)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Ruang eksekusi mutlak bagi Admin untuk menjatuhkan vonis terhadap suatu setoran kas (Terima atau Tolak) serta memberikan alasan penolakan jika struk tidak terbaca/salah nominal.
- Tata Letak & Posisi: Berbentuk kotak dialog melayang (pop-up modal) berukuran ringkas, mendarat presisi di tengah layar (center-aligned).
- Rincian Teks & Elemen Visual: 
  - Ringkasan Data: Menampilkan teks statis (read-only) berisi Nominal Seharusnya dibandingkan dengan Nominal Disetor.
  - Opsi Keputusan: Dua tombol radio berukuran besar (Terima Pembayaran / Tolak Pembayaran).
  - Catatan Penolakan: Sebuah area teks (textarea) opsional.
  - Tombol Simpan: Kapsul solid biru bertuliskan Eksekusi Keputusan.
- Interaksi Visual: Saat tombol radio "Tolak Pembayaran" ditekankan, area teks catatan penolakan akan meluncur turun secara mulus (smooth collapse) merobek layar, memaksa Admin untuk memberikan alasan penolakan (misal: "Struk buram, mohon unggah ulang") sebelum menekan tombol simpan.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Transaksi Relasional (DB::transaction): Jika keputusan "Terima" dieksekusi, sistem secara berantai akan (1) Mengubah status transaksi menjadi Lunas, (2) Mengirimkan notifikasi ke dasbor Orang Tua, dan (3) Secara otomatis mengisi ulang atau me-reset sisa kuota sesi belajar pada profil siswa yang bersangkutan. Jika proses ini gagal di tengah jalan, seluruhnya akan digulung mundur otomatis (rollback).
  - Pembersihan Cerdas (Anti-Leak Storage): Jika keputusan "Tolak" dieksekusi secara final, sistem akan mengeksekusi perintah mutlak penghapusan fisik ke Storage server untuk menghancurkan gambar struk abal-abal tersebut secara permanen, demi mencegah penumpukan sampah visual di kapasitas server bimbel.

7.2. Radar Kuota Sesi (Manajemen Tunggakan)
Modul ini bertindak sebagai menara pengawas finansial yang mendeteksi dini risiko tunggakan pembayaran dengan melacak sisa hak pertemuan (kuota kelas) setiap siswa. Berbeda dengan modul modifikasi standar, antarmuka ini dirancang murni sebagai panel pantau interaktif tingkat tinggi (high-level monitoring).

7.2.1. Halaman Induk Radar Kuota (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan instrumen deteksi seketika bagi Admin untuk melihat siswa mana saja yang hak pertemuannya sudah habis atau menembus batas negatif (berutang jam kelas), sehingga tagihan dapat segera diterbitkan sebelum kerugian membengkak.
- Tata Letak & Posisi: Sebuah tabel data yang merentang penuh (full width) mendominasi layar. Menyesuaikan fungsinya sebagai instrumen radar, susunan data secara baku (default) diurutkan berdasarkan sisa kuota paling sedikit (atau negatif) di urutan paling atas.
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk berhuruf tebal (Nama Siswa, Paket Aktif, Total Pertemuan Paket, Sisa Kuota, Status Tunggakan, Aksi).
  - Penanda Baris Kritis (Row Highlighting): Jika sisa kuota berada di angka 0 (kritis), warna latar belakang (background) baris tabel tersebut menyala kuning redup. Jika sisa kuota menukik ke angka negatif (-1, -2, dst), seluruh baris akan menyala merah terang yang mustahil diabaikan oleh mata.
  - Tombol Aksi: Sebuah tombol hijau berikon amplop atau logo WhatsApp (Kirim Tagihan).
- Interaksi Visual: Saat Admin menggeser kursor ke atas baris tabel yang menyala merah, baris tersebut akan merespons dengan efek denyut pelan (slow-pulse animation), menstimulasi urgensi psikologis untuk segera mengambil tindakan penagihan.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Tarikan Perhitungan Dinamis (GET): Angka "Sisa Kuota" ini ditarik dari pangkalan data profil siswa. Angka ini secara otomatis terpotong (dinamis) setiap kali terjadi konfirmasi kehadiran (Hadir/Alpa) di modul Presensi Mentor.
  - Saringan Urgensi (Filter Trigger): Terdapat sekumpulan lencana saringan cepat di atas tabel (Semua Data / Kritis / Tunggakan Negatif). Saat lencana diklik, backend mengeksekusi parameter kueri khusus (seperti `WHERE sisa_kuota < 0`) dan layar akan seketika menyisakan daftar para penunggak kelas berat tanpa memuat ulang keseluruhan kerangka halaman.

8. Layanan & Jembatan Komunikasi

8.1. Halaman Siar Pengumuman (Pusat Informasi)
Modul ini bertindak sebagai megafon digital tempat manajemen pusat menyiarkan surat edaran, berita kelulusan, jadwal libur, hingga perubahan kebijakan kepada seluruh ekosistem bimbel (publik maupun internal). Mengadopsi arsitektur publikasi konten (CMS), modul ini dipecah menjadi dua antarmuka utama:

8.1.1. Halaman Induk Riwayat Pengumuman (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan papan kontrol bagi Admin untuk melihat jejak rekam seluruh pengumuman yang pernah disiarkan, serta mengelola status tayangnya agar informasi usang tidak menumpuk di beranda pengguna.
- Tata Letak & Posisi: Sebuah tabel data lebar (full width) mendominasi layar. Di sudut kanan atas terdapat tombol Buat Pengumuman dan kotak filter pencarian.
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk berhuruf tebal (Tanggal Terbit, Judul Pengumuman, Sasaran Publikasi, Status Aktif, Aksi).
  - Lencana Sasaran: Kapsul biru (Khusus Internal/Orang Tua) dan kapsul hijau (Publik/Landing Page).
  - Sakelar Tayang (Toggle Switch): Komponen visual `<x-admin.toggle-switch>` berupa tuas geser on/off berwarna hijau (Aktif) dan abu-abu (Mati).
  - Tombol Aksi: Dua kotak kecil berikon pensil kuning (Sunting) dan ikon tong sampah merah (Hapus melalui komponen `<x-admin.delete-form>`).
- Interaksi Visual: Saat Admin mengklik tuas sakelar tayang, tuas akan meluncur ke kiri/kanan (smooth sliding) disertai perubahan warna transisi seketika, dan sudut layar akan memunculkan notifikasi pop-up kecil menyatakan status telah diperbarui.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Memanggil data teks dan meta-gambar dari pangkalan data pengumuman.
  - Sakelar Instan (AJAX PATCH): Tuas on/off ini sangat spesial karena terhubung langsung ke backend melalui kueri latar belakang (AJAX/Fetch API). Status pengumuman bisa dimatikan (ditarik dari peredaran) seketika tanpa perlu menekan tombol simpan terpisah atau memuat ulang layar (no page reload).

8.1.2. Halaman Formulir Siar Pengumuman (Create/Edit)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan ruang tata letak penulisan naskah yang komprehensif bagi Admin untuk meracik surat edaran resmi secara profesional sebelum dipublikasikan.
- Tata Letak & Posisi: Berbeda dengan modal pop-up kecil, formulir ini merentang penuh dalam satu halaman utuh (full page form) karena membutuhkan ruang ketik visual yang leluasa.
- Rincian Teks & Elemen Visual: 
  - Ruang Teks Kaya (Rich Text Editor): Sebuah kotak area teks raksasa (mirip MS Word) lengkap dengan bilah alat (toolbar) untuk menebalkan huruf, memiringkan huruf, dan membuat susunan angka (bullet numbering).
  - Input Gambar Sampul (Cover Image): Area jatuhkan gambar (dropzone) berbingkai putus-putus tebal.
  - Dropdown Sasaran: Menu tarik-turun untuk menentukan Halaman Tayang (Publik Landing Page / Internal Dasbor Orang Tua).
  - Tombol Simpan: Kapsul solid biru bertuliskan Siarkan Pengumuman.
- Interaksi Visual: Saat Admin menekan bilah alat (seperti ikon B/Bold) pada ruang teks kaya, ikon tersebut akan menyala berbayang (active state) sebagai penanda fungsi ketebalan sedang aktif.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Penyimpanan Ganda (POST/PUT): Saat formulir dikirim, sistem mengeksekusi dua operasi berat: (1) menyimpan elemen HTML murni ke pangkalan data, dan (2) secara fisik memindahkan berkas gambar sampul ke Storage server.
  - Pembersihan Cerdas (Anti-Leak Storage): Jika Admin menekan tombol Hapus pada suatu pengumuman di halaman Index (ataupun saat menimpa gambar lama dengan gambar baru di halaman Edit), backend secara absolut diwajibkan memanggil fungsi Hapus Fisik (`Storage::delete()`) untuk memusnahkan berkas gambar sampul aslinya dari server, demi mencegah pembengkakan kapasitas penyimpanan (storage leak) oleh sampah digital.

8.2. Halaman Kotak Suara (Layanan Keluhan)
Modul ini bertindak sebagai jembatan komunikasi dua arah tempat Admin menerima, membaca, dan merespons pesan tertulis dari para Orang Tua murid. Mengadopsi arsitektur meja bantuan (helpdesk), pesan ini bisa berupa permohonan izin absen, keluhan layanan, hingga penundaan pembayaran.

8.2.1. Halaman Induk Kotak Suara (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan sentra pengawasan (dashboard) agar Admin dapat melacak seluruh tiket pesan yang masuk dan memastikan tidak ada keluhan Orang Tua yang terabaikan atau tak terbalas.
- Tata Letak & Posisi: Menggunakan tata letak daftar tiket (ticket list view). Layar tidak dibagi menjadi tabel bergaris kaku, melainkan deretan kartu pesan yang membentang dari atas ke bawah (full width stacked cards). Di sisi kiri atas terdapat penapis (filter) berdasarkan Status Balasan (Menunggu Balasan / Sudah Dibalas).
- Rincian Teks & Elemen Visual: 
  - Kartu Pesan: Setiap baris menampilkan Foto Profil bundar pengirim, Nama Orang Tua berhuruf tebal, pratinjau teks pesan yang dipotong (truncated), dan keterangan waktu relatif (misal: "2 jam yang lalu").
  - Lencana Urgensi: Kapsul merah muda (Belum Terbaca), kapsul kuning (Menunggu Balasan), dan kapsul hijau cerah (Selesai).
  - Tombol Aksi: Sebuah tombol kapsul biru bertuliskan Buka Pesan di ujung kanan setiap baris kartu.
- Interaksi Visual: Saat Admin mengarahkan kursor ke atas kartu pesan, warna latar belakang kartu tersebut akan berubah menjadi abu-abu sangat muda (subtle gray highlight) untuk menandakan fokus pembacaan mata.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Memanggil data teks dari tabel pesan yang berelasi erat dengan profil Orang Tua. Data ini diurutkan secara mutlak berdasarkan waktu masuk terbaru (First In First Out), dengan prioritas utama selalu menempatkan pesan berstatus "Menunggu Balasan" di baris paling atas.

8.2.2. Modal Balas Pesan (Show/Reply)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan ruang baca terfokus sekaligus kolom pengetikan balasan instan agar Admin dapat segera merespons keluhan secara tertulis tanpa harus berpindah ke URL halaman lain.
- Tata Letak & Posisi: Berbentuk kotak dialog melayang (pop-up modal) berukuran cukup lebar, mendarat presisi di tengah layar (center-aligned) dan secara visual meredupkan daftar tiket pesan di latar belakang.
- Rincian Teks & Elemen Visual: 
  - Area Baca: Paragraf penuh berisi tulisan keluhan utuh dari Orang Tua berada di paruh atas modal (read-only).
  - Area Ketik (Textarea): Sebuah kotak isian kosong di paruh bawah modal, dikhususkan untuk Admin mengetikkan respons atau jalan keluar.
  - Tombol Simpan: Kapsul solid biru bertuliskan Kirim Balasan.
- Interaksi Visual: Saat tombol Kirim Balasan ditekankan, layar akan memunculkan roda pemrosesan (spinner) dan tombol seketika meredup untuk mengunci klik ganda (double submit prevention). Setelah sukses terkirim, kotak modal lenyap otomatis dan lencana status pada kartu pesan di latar belakang seketika berubah menjadi hijau.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Transaksi Relasional (POST & PATCH): Backend mengeksekusi dua operasi berantai. Pertama, menyimpan untaian teks balasan Admin ke pangkalan data. Kedua, memperbarui status tiket pesan dari "Menunggu Balasan" menjadi "Selesai".
  - Pantulan Seketika (Real-time Sync): Balasan dari Admin ini akan langsung memantul dan memicu notifikasi peringatan di layar Dasbor Aplikasi milik Orang Tua, memastikan rantai komunikasi tertutup dengan sempurna.

9. Pengaturan Sistem (System Settings)
Alasan: Menjadi sentra kendali paling dasar tempat struktur otorisasi dan identitas digital seluruh pihak (Admin, Mentor, Orang Tua, Siswa) dibentuk dan dijaga.

9.1. Halaman Kelola Pengguna (User Management)
Modul ini adalah ruang mesin tempat identitas utama (akun login) dikelola. Secara arsitektural, modul ini mutlak **hanya** berinteraksi dengan tabel inti `users`. Mengadopsi arsitektur CRUD berlapis keamanan tinggi, modul ini dipecah menjadi dua antarmuka utama:

9.1.1. Halaman Induk Kelola Pengguna (Index)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan tabel komando bagi Super Admin untuk mengawasi seluruh akun yang memiliki akses ke sistem, serta kemampuan untuk membekukan atau menghapus akun yang tidak lagi relevan.
- Tata Letak & Posisi: Sebuah tabel data yang merentang penuh (full width) mendominasi layar. Di sudut kanan atas terdapat tombol Tambah Pengguna dan kotak penapis (filter) berdasarkan Peran (Role).
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk berhuruf tebal (Foto Profil menggunakan `<x-admin.avatar>`, Nama Akun, Email, Peran Hak Akses, Aksi).
  - Lencana Peran (Role Badge): Kapsul ungu (Admin), kapsul biru (Mentor), dan kapsul kuning (Orang Tua).
  - Tombol Aksi: Kotak kecil berikon pensil kuning (Sunting) dan ikon tong sampah merah (Hapus). Dilarang keras merakit tombol Hapus secara manual; wajib memanggil komponen `<x-admin.delete-form>`.
- Interaksi Visual: Saat tombol Hapus ditekankan, antarmuka tidak langsung menghapus data melainkan memanggil kotak dialog konfirmasi SweetAlert dari skrip global yang sudah tertanam di `layouts/admin.blade.php`, meredupkan seluruh layar sebagai peringatan keras.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Sistem Tarik Data (GET): Memanggil data dasar lintas entitas dari tabel `users` (id, name, email, role, avatar_path).
  - Penghancuran Berantai (Cascade Force Delete): Ini adalah hukum arsitektur mutlak; saat Admin menghapus sebuah akun Pengguna, sistem diwajibkan menggunakan `forceDelete` secara berantai (cascade) untuk memusnahkan semua profil terkait (misalnya profil MentorProfile).
  - Pembersihan Fisik (Anti-Leak Storage): Tidak hanya mencabut dari pangkalan data, backend juga **wajib** memanggil `Storage::delete()` untuk memusnahkan file foto profil (avatar) yang melekat pada akun tersebut dari Storage server, agar tidak membusuk menjadi sampah digital.

9.1.2. Modal Tambah dan Sunting Pengguna (Create/Edit)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan antarmuka pendaftaran akun baru secara manual atau memperbaiki kesalahan pengetikan nama dan surel (email) pengguna.
- Tata Letak & Posisi: Berbentuk kotak dialog melayang (pop-up modal) berukuran menengah yang mendarat presisi di tengah layar (center-aligned), meredupkan pendaran tabel data di latar belakang.
- Rincian Teks & Elemen Visual: 
  - Input Gambar: Area unggah Foto Profil (avatar) berbingkai bundar.
  - Ruang Isian Teks: Kotak isian berbingkai halus untuk Nama Lengkap, Alamat Email, dan Kata Sandi (Kata sandi hanya muncul saat mode Create).
  - Pemilih Peran: Menu tarik-turun (dropdown) untuk memilih derajat otorisasi (Admin / Mentor / Orang Tua).
  - Tombol Simpan: Kapsul solid biru bertuliskan Simpan Akun.
- Interaksi Visual: Saat kotak surel (email) diisi dengan format yang salah (misal tanpa lambang '@'), pinggiran kotak seketika berpendar merah saat kursor Admin berpindah ke isian lain (on-blur validation).
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Transaksi Terpadu (DB::transaction): Jika Admin ingin menciptakan tabel `users` dan profil terkaitnya sekaligus dalam satu tarikan napas (misalnya diinjeksikan dari halaman Halaman Data Mentor), proses penciptaan tersebut **wajib** dibungkus kuat dalam blok `DB::transaction`. Jika salah satu tabel gagal tercipta, seluruh proses digulung mundur (rollback).
  - Pembersihan Timpaan Gambar (Anti-Leak Storage): Jika Admin menyunting pengguna dan memutuskan mengunggah foto profil yang baru, sistem dilarang sekadar mengubah lintasan teks di database. Backend wajib mengeksekusi `Storage::delete()` untuk membunuh file gambar avatar yang lama, sebelum menyimpan gambar yang baru ke peladen.

9.2. Halaman Kelola Bimbel (Profil Institusi)
Modul ini bertindak sebagai jantung identitas korporat, tempat Admin mengatur rupa dan identitas dasar institusi bimbingan belajar yang akan memantul secara global ke seluruh sistem (termasuk halaman Landing Page dan kop surat laporan). 

9.2.1. Halaman Induk Kelola Bimbel (Settings Dashboard)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan satu panel sentral (single source of truth) agar Admin dapat dengan mudah memutakhirkan identitas visual, kontak darurat, dan informasi profil bimbel tanpa harus menyentuh kode inti pemprograman.
- Tata Letak & Posisi: Berbentuk halaman formulir statis yang membentang penuh (full width form layout). Layar dibagi menjadi beberapa blok kartu (card blocks) yang disusun rapi secara vertikal dari atas ke bawah untuk memisahkan kategori pengaturan (misal: Blok Identitas, Blok Kontak, Blok Media Sosial).
- Rincian Teks & Elemen Visual: 
  - Blok Identitas: Menampilkan kotak input teks untuk Nama Bimbel, Slogan (Tagline), dan sebuah area unggah khusus (dropzone) berbingkai putus-putus untuk menempatkan Logo Resmi.
  - Blok Kontak: Deretan kotak isian untuk Nomor WhatsApp, Surel (Email) Resmi, dan area teks luas untuk Alamat Lengkap.
  - Tombol Aksi: Sebuah tombol kapsul solid biru berukuran besar bertuliskan Simpan Perubahan Profil, bersandar teguh di sudut kanan bawah halaman.
- Interaksi Visual: Saat Admin mengubah teks atau menempatkan logo baru, namun belum menekan tombol simpan, sistem akan memunculkan spanduk kecil (floating banner) melayang di atas layar bertuliskan peringatan "Terdapat perubahan yang belum disimpan" (Unsaved changes warning) untuk mencegah Admin tak sengaja menutup halaman dan kehilangan datanya.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Tarikan Data Tunggal (GET First): Memanggil satu baris data eksklusif (single record) dari tabel pangkalan data pengaturan institusi.
  - Sinkronisasi Global (PUT/PATCH): Saat tombol simpan ditekankan, pembaruan data ini (terutama logo dan nama bimbel) akan seketika menyebar dan menimpa tampilan di seluruh aplikasi, mulai dari sudut kiri atas panel Dasbor Admin hingga ke Beranda Publik.
  - Pembersihan Timpaan Logo (Anti-Leak Storage): Hukum mutlak kembali ditegakkan; saat logo lama ditimpa dengan logo baru, backend diwajibkan mengeksekusi perintah Hapus Fisik (`Storage::delete()`) terhadap file gambar logo usang tersebut sebelum mencetak nama file logo yang baru ke dalam peladen, demi menjaga kebersihan ruang penyimpanan server.

9.2.2. Submodul Sakelar Fitur (Feature Toggles)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Memberikan kedaulatan mutlak kepada Admin untuk menghidupkan atau mematikan modul-modul fungsional (seperti Pendaftaran Online, Fitur Rapor, atau Galeri) sesuai kebutuhan operasional masa berjalan, tanpa harus meminta intervensi dari pengembang sistem (programmer).
- Tata Letak & Posisi: Terintegrasi di dalam tab navigasi (navigation tab) yang bersebelahan dengan tab Profil Institusi di layar Kelola Bimbel. Ruang konten ini menggunakan susunan daftar vertikal (vertical list view) yang membagi ruang layar menjadi baris-baris memanjang.
- Rincian Teks & Elemen Visual: 
  - Baris Fitur: Setiap baris menampilkan Ikon Modul (SVG abu-abu), Nama Fitur berhuruf tebal (misal: "Pendaftaran Siswa Baru"), beserta satu kalimat deskripsi kecil yang menjelaskan dampaknya.
  - Sakelar Tayang (Toggle Switch): Di ujung kanan setiap baris tertanam komponen andalan kita `<x-admin.toggle-switch>` (tuas geser berwarna hijau terang saat Aktif, dan abu-abu redup saat Mati).
  - Lencana Peringatan Kritis: Khusus untuk fitur yang berdampak besar, tersemat kapsul lencana kuning bertuliskan "Berdampak Publik".
- Interaksi Visual: Saat Admin merubah tuas sakelar untuk mematikan fitur vital seperti "Pendaftaran Online", tuas tidak akan langsung bergeser. Layar akan meredup dan memunculkan kotak peringatan SweetAlert seketika: "Yakin ingin menutup pendaftaran? Tombol daftar di beranda publik akan disembunyikan." (Warning Dialog Confirmation).
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Arsitektur Tarik Data (GET): Memanggil data status aktif/nonaktif fitur dari pangkalan data khusus atau memori cache pengaturan global.
  - Pembaruan Tanpa Muat Ulang (AJAX PATCH): Mengadopsi logika mutakhir tanpa *refresh*. Saat tuas digeser dan dikonfirmasi, kueri belakang layar (AJAX) langsung membakar pembaruan tersebut ke pangkalan data. Dampaknya memantul seketika: semua elemen antarmuka di seluruh aplikasi yang terikat pada fitur tersebut (seperti hilangnya menu Rapor di Dasbor Orang Tua atau lenyapnya tombol Pendaftaran di *Landing Page*) akan menyesuaikan wujudnya saat itu juga (Real-time global rendering).

9.2.3. Submodul Ulasan Pelanggan (Testimoni)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan kendali bagi Admin untuk menyeleksi dan merakit ulasan positif dari siswa atau orang tua. Ulasan ini akan menjadi senjata ujung tombak (social proof) di beranda publik (Landing Page) guna meyakinkan calon pendaftar.
- Tata Letak & Posisi: Mengisi ruang di dalam tab navigasi ketiga pada Halaman Kelola Bimbel. Mengadopsi tata letak tabel data bergaris halus yang membentang penuh (full width table) dengan tombol Tambah Ulasan bersandar di sudut kanan atas tabel.
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk berhuruf tebal meliputi Foto Wajah (menggunakan `<x-admin.avatar>`), Nama Pemberi Ulasan, Keterangan Peran (misal: "Siswa SMA" atau "Orang Tua"), Cuplikan Teks Ulasan, dan Aksi.
  - Indikator Bintang: Tepat di bawah nama pemberi ulasan, tersusun rapi 5 buah ikon bintang (SVG). Bintang yang aktif berwarna emas solid, sisanya abu-abu redup.
  - Tombol Aksi: Dua kotak kecil berikon pensil kuning (Sunting) dan ikon tong sampah merah (Hapus, wajib dipanggil via `<x-admin.delete-form>`).
- Interaksi Visual: Saat tombol Tambah atau Sunting diklik, kotak dialog formulir (modal pop-up) akan meluncur turun dari atas layar (slide-down animation). Di dalam modal tersebut, terdapat bilah geser (slider 1 hingga 5) untuk nilai bintang; saat digeser, ikon bintang di sebelahnya akan menyala menjadi emas satu per satu secara interaktif mengikuti arah tarikan.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Tarikan Umpan Otomatis (Frontend Sync): Ulasan yang tersimpan di dalam tabel `testimonials` ini tidak memerlukan tombol *publish* tambahan. Data akan langsung ditarik (GET) secara otomatis oleh mesin *Landing Page* dan langsung dirakit menjadi komidi putar geser (carousel slider) untuk dilihat masyarakat luas.
  - Penghancuran Fisik (Anti-Leak Storage): Mengacu pada aturan mutlak sistem; setiap kali Admin menghapus sebuah ulasan, atau sekadar menimpa foto wajah pengulas dengan gambar baru, backend diwajibkan mengeksekusi `Storage::delete()` untuk memusnahkan file gambar lama dari Storage server, demi menghentikan penumpukan sampah visual di kapasitas server bimbel.

9.2.4. Submodul Pertanyaan Umum (FAQ)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan sarana bagi Admin untuk menyusun basis pengetahuan ringkas yang memuat jawaban atas pertanyaan yang paling sering diajukan (misalnya: "Berapa biaya pendaftaran?"). Ini sangat krusial sebagai palang pintu pertama untuk menekan volume pesan berulang yang masuk ke Kotak Suara.
- Tata Letak & Posisi: Berada di tab navigasi keempat (sebelah tab Testimoni) pada layar Kelola Bimbel. Area ini mengusung format tabel daftar (list table) sederhana yang memanjang lurus ke bawah, dilengkapi tombol Tambah Pertanyaan di bagian sudut kanan atas.
- Rincian Teks & Elemen Visual: 
  - Kolom Tabel: Tajuk tabel meliputi teks tebal untuk Pertanyaan, Cuplikan Jawaban, dan Aksi.
  - Hierarki Tipografi: Teks pada sel "Pertanyaan" dicetak tebal (bold), sedangkan teks pada sel "Cuplikan Jawaban" dicetak reguler (normal) dan dipotong secara otomatis (truncated) dengan akhiran titik-titik (ellipses) jika melebihi 100 karakter.
  - Tombol Aksi: Dua kotak kecil berikon pensil kuning (Sunting) dan ikon tong sampah merah (Hapus mutlak via `<x-admin.delete-form>`).
- Interaksi Visual: Mengadopsi prinsip desain akordion (accordion) tersembunyi. Saat Admin mengklik suatu baris pertanyaan di tabel, baris tersebut akan merekah mulus ke bawah (smooth slide-down) merobek jarak antar baris, lalu memperlihatkan teks jawaban utuh seutuhnya tanpa harus memaksa Admin membuka modal baru atau memuat ulang halaman.
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Penyimpanan Ringan (Text CRUD): Mengelola aliran data mentah berupa teks panjang (text) di dalam tabel `faqs`. Modul ini tidak mengizinkan atau memiliki komponen pengunggahan berkas (file upload), sehingga beban server tetap ringan.
  - Eksposur Otomatis (Frontend Sync): Serupa dengan mekanisme Testimoni, seluruh data FAQ di tabel ini akan ditarik secara massal (GET) oleh mesin *Landing Page* publik, kemudian ditata ulang menjadi format akordion dinamis yang siap dibaca oleh jutaan pasang mata pengunjung situs web.

9.2.5. Submodul Galeri (Jejak Visual)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menyediakan lemari pameran (showcase) digital tempat Admin dapat memajang foto-foto kegiatan belajar, fasilitas kelas, maupun kelulusan siswa, yang berfungsi krusial untuk membangun kredibilitas visual bimbel di mata calon pendaftar.
- Tata Letak & Posisi: Berada di tab navigasi kelima pada layar Kelola Bimbel. Tidak menggunakan bentuk tabel data bergaris, area ini dirancang murni menggunakan tata letak susunan ubin (grid tiles) atau kisi bata (masonry grid) layaknya galeri foto modern. Tombol Unggah Foto disematkan mencolok di pojok kanan atas.
- Rincian Teks & Elemen Visual: 
  - Ubin Gambar (Image Tiles): Kotak-kotak gambar berbingkai lengkung (rounded corners) yang berjajar merata mengisi lebar layar.
  - Teks Hamparan (Overlay Text): Di ujung bawah setiap gambar, terselip pita hitam semi-transparan tipis yang menampilkan teks "Judul/Keterangan Foto" dalam balutan huruf putih polos.
  - Tombol Aksi: Dua buah tombol bundar kecil melayang (floating circular buttons) bertengger di atas gambar: ikon tong sampah merah (Hapus absolut via `<x-admin.delete-form>`) dan ikon pensil kuning (Sunting).
- Interaksi Visual: Saat Admin menggeser kursor (hover) melintasi salah satu ubin gambar, gambar tersebut merespons dengan membesar perlahan (subtle zoom-in effect) namun tetap tertahan di dalam batas bingkainya. Bersamaan dengan itu, kedua tombol aksi melayang yang sebelumnya tersembunyi akan seketika muncul memudar (fade in).
- Logika Sistem & Sinkronisasi Data (Backend): 
  - Operasi Penyimpanan Ganda (POST/PUT): Saat Admin mengunggah foto baru, backend melaksanakan dua tugas berat: (1) mencetak string teks judul ke tabel `galleries`, dan (2) memindahkan berkas gambar fisik ke ruang Storage server.
  - Tarikan Etalase Otomatis (Frontend Sync): Foto-foto ini akan ditarik (GET) tanpa sakelar penerbitan oleh mesin *Landing Page* publik untuk merajut etalase galeri visual pameran bimbel.
  - Hukum Pemusnahan Fisik (Anti-Leak Storage): Hukum paling absolut ditegakkan kembali; saat Admin menekan ikon tong sampah merah untuk menghapus sebuah ulasan visual (atau menimpanya dengan foto baru), kueri backend diwajibkan mengeksekusi fungsi pemusnahan mutlak `Storage::delete()` guna menghancurkan berkas fisik usang tersebut dari kapasitas *server*, demi mencegah kebocoran penyimpanan (storage leak).
