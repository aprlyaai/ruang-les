# Rancangan Antarmuka UI - Landing Page

> [!IMPORTANT]
> **STATUS EKSEKUSI (SELESAI 100%)**
> Halaman Beranda Publik dan Tentang Kami telah sukses dieksekusi dengan standar desain premium (Tailwind CSS v4). Seluruh komponen telah diimplementasikan dengan tata letak dinamis dan terhubung dengan arsitektur Alpine.js untuk interaksi mikro yang mulus. Data tersinkronisasi penuh dengan Panel Admin menggunakan sistem cache.

---

## Struktur Ekosistem Publik (Halaman Publik)

Kawasan publik adalah etalase terdepan dari Ruang Les yang dirancang agar dapat dijelajahi dengan bebas oleh siapa saja tanpa perlu login. Dokumen ini berfokus pada dua halaman utama yang menjadi wajah platform.

1. Halaman Beranda Utama (The Landing Page)
Beranda tidak dipecah menjadi banyak halaman, melainkan mengadopsi gaya modern satu guliran panjang (One-Page Scroll). Navigasi berfungsi sebagai tautan jangkar (anchor link) yang meluncurkan layar dengan mulus ke bagian spesifik. Terdiri dari enam blok utama: Sambutan Hero, Keunggulan Visual, Pilihan Paket, Testimoni, FAQ, dan Ajakan Bertindak (Call to Action).

2. Halaman Tentang Kami (Profil Institusi)
Ruang ini memaparkan narasi mendalam mengenai sejarah Ruang Les, visi dan misi bimbingan belajar, serta memajang profil profesional pengajar guna membangun fondasi kepercayaan bagi orang tua.

---

## Pilar Arsitektur Frontend & Identitas Visual (UI/UX)

1. Arsitektur Berbasis Komponen (Component-Driven)
File utama beranda murni hanya memanggil komponen spesifik (seperti hero, programs). Pendekatan ini memastikan tata letak sangat rapi dan mudah diperbarui. Untuk interaktivitas (buka-tutup akordion atau geseran kartu slider), sistem menggunakan Alpine.js secara deklaratif yang menjamin halaman memuat dengan cepat.

2. Hierarki Tipografi dan Warna
Huruf Montserrat digunakan pada seluruh judul untuk kesan geometris dan tegas. Huruf Inter digunakan untuk paragraf karena tingkat keterbacaannya yang tajam. Identitas merek menggunakan warna utama hijau pastel. Warna hijau gelap ditugaskan khusus untuk tombol aksi utama agar kontras.

3. Tata Letak dan Ruang Kosong (Micro-Spacing)
Kenyamanan visual dicapai melalui sistem grid dan flexbox dengan ruang kosong (white space) yang konsisten. Menganut filosofi Mobile-First, tata letak dirakit untuk ponsel pintar terlebih dahulu, baru mekar merespons layar yang lebih besar.

4. Logika Performa dan Memori (Caching)
Karena semua konten ditarik dari database, halaman ini menggunakan sistem cache (menyimpan data sementara di server) agar memuat dengan sangat cepat. Sistem menggunakan Observer, sehingga setiap kali Admin mengubah teks, harga, atau foto di Panel Admin, cache lama otomatis terhapus dan diganti dengan yang baru (Cache Invalidation).

---

### Rincian Masing-Masing Bagian (Section) dan Logikanya

Berikut adalah rincian bagian di Landing Page, mencakup komponen visual, teks spesifik, tata letak, serta logika sistem dan sinkronisasi datanya:

1. Header (Navigasi Atas)
Alasan: Menjadi pusat kendali utama bagi pengunjung untuk berpindah bagian halaman atau masuk ke sistem.
Komponen, UI/UX, dan Logika Sistem:
- Logo Identitas: Terletak di sisi kiri. Berupa teks dua baris. Baris atas bertuliskan "Ruang Les" dengan cetak tebal, dan baris bawah bertuliskan "by Ismaturrohmah" dengan ukuran teks lebih kecil.
- Tautan Navigasi: Teks menu berjajar di tengah. Teks tersebut secara berurutan adalah "Beranda", "Program Belajar", "FAQ", dan "Kontak". Klik pada teks ini akan menggulirkan layar (anchor link) menuju bagian yang dimaksud secara halus.
- Tombol Akses Pintar: Terletak di sisi kanan. Tombol ini memiliki logika pendeteksi status sesi (Session). Jika pengunjung belum login (Guest), akan muncul tautan teks bertuliskan "Masuk" dan tombol kapsul hijau solid bertuliskan "Daftar". Jika pengguna sudah login, sistem mengenali perannya (Admin, Mentor, atau Orang Tua) dan tombol otomatis berubah menjadi teks "Halo, [Nama Pengguna]" yang jika diklik akan menuju Dasbor masing-masing.

2. Hero Section (Bagian Sambutan)
Alasan: Memberikan kesan pertama yang memukau dan langsung menyampaikan nilai jual utama bimbel.
Komponen, UI/UX, dan Logika Sistem:
- Latar Belakang: Menggunakan elemen abstrak melayang (blob) beranimasi lambat dengan gradasi hijau lembut.
- Judul Utama dan Deskripsi: Terdapat label kecil di bagian paling atas bertuliskan "Solusi Edukasi Modern". Tepat di bawahnya, terdapat teks judul berukuran sangat besar, tebal, dan tegas (contoh teks: "Tingkatkan Prestasi Anak Bersama Ruang Les"). Di bawah judul, terdapat teks deskripsi pendukung berukuran sedang yang menjelaskan metode belajar. Seluruh teks (label, judul, deskripsi) ini ditarik dinamis dari tabel pengaturan di database.
- Tombol Aksi (CTA): Terdapat dua tombol sejajar. Tombol pertama berwarna hijau solid bertuliskan "Daftar Sekarang". Tombol ini mendeteksi sesi pengguna; jika diklik oleh Guest diarahkan ke Pendaftaran Akun Dasar, jika diklik oleh Orang Tua yang sudah login langsung diarahkan ke Formulir Pendaftaran 7 Langkah. Tombol kedua bertuliskan "Lihat Program" dengan gaya garis luar (outline) hijau transparan yang berfungsi menggulir layar ke bawah.
- Gambar Interaktif: Gambar utama diletakkan di sisi kanan, dilapisi kotak hijau bergradasi. Saat disorot (hover), kotak hijau tersebut memutar dan terbuka perlahan. Di pojok gambar terdapat komponen lencana kecil melayang (badge) bertuliskan "Rating 4.9 / 5.0" yang dilengkapi ikon bintang emas dan berayun dengan efek pantul lambat (bounce-slow).

3. Keunggulan Kami (Fitur)
Alasan: Meyakinkan orang tua secara instan dengan menonjolkan nilai plus metode bimbingan belajar.
Komponen, UI/UX, dan Logika Sistem:
- Judul Bagian: Teks heading di bagian tengah atas bertuliskan "Mengapa Memilih Ruang Les?".
- Tata Letak: Di bawah judul, terdapat kotak-kotak fitur yang menggunakan grid responsif (1 kolom di HP, 2 kolom di tablet, 4 kolom sejajar di desktop).
- Interaksi Visual: Setiap kotak fitur memuat ikon melingkar berbasis SVG, diikuti teks judul fitur (contoh: "Mentor Ramah Anak"), dan di bawahnya teks deskripsi singkat (contoh: "Pendekatan personal untuk setiap siswa"). Saat disorot (hover), kotak memunculkan efek bayangan yang membuatnya seolah terangkat lembut.
- Sinkronisasi Data: Gambar ikon, teks judul, dan teks deskripsi ditarik dari tabel database. Sistem menggunakan filter untuk hanya menampilkan fitur yang diatur "aktif" oleh Admin. Urutan kotak dari kiri ke kanan berurutan berdasarkan nilai urutan yang diketik oleh Admin.

4. Program Belajar (Pilihan Paket)
Alasan: Memberikan transparansi layanan dan biaya agar orang tua bisa membandingkan secara mandiri.
Komponen, UI/UX, dan Logika Sistem:
- Judul Bagian: Teks heading di bagian tengah atas bertuliskan "Pilihan Program Belajar Kami", diikuti sub-teks deskriptif "Pilih paket yang paling sesuai dengan kebutuhan anak Anda".
- Kartu Paket: Tampilan kotak-kotak bersusun yang masing-masing memuat label teks di atas (contoh: "Ruang Reguler"). Di bawah label terdapat teks harga ukuran besar (contoh: "Rp 500.000 / 8x Pertemuan"). Di bawah harga, terdapat daftar rincian fasilitas dengan ikon centang kecil (teks poin contoh: "Maksimal 5 Siswa", "Durasi 60 Menit", "Lokasi di Bimbel").
- Sinkronisasi Data: Nama paket, angka harga, dan teks rincian fasilitas ditarik dari tabel paket. Perubahan nominal harga yang dilakukan di Panel Admin akan seketika mengubah teks harga yang tertera di kartu ini.
- Tombol Pilih Paket: Tombol hijau solid bertuliskan "Pilih Paket" di bagian paling bawah setiap kartu. Saat diklik, tombol ini mendeteksi sesi login untuk arah tujuan navigasi, sekaligus membawa parameter ID Paket tersebut. Dengan begitu, paket terpilih akan otomatis tercentang pada halaman pemilihan paket saat pendaftaran, dan nominal harganya langsung disalin ke rincian tagihan akhir pendaftaran.

5. Kisah Sukses (Testimoni)
Alasan: Bertindak sebagai bukti sosial (social proof) untuk meyakinkan calon pendaftar.
Komponen, UI/UX, dan Logika Sistem:
- Judul Bagian: Teks heading di tengah atas bertuliskan "Apa Kata Orang Tua Murid".
- Interaksi Visual: Di bawah judul, terdapat deretan kartu ulasan memanjang yang bisa digeser kiri-kanan secara mulus (carousel) menggunakan Alpine.js. 
- Komponen Kartu Ulasan: Di bagian atas kartu terdapat rentetan 5 ikon bintang emas. Di bawahnya adalah teks kutipan ulasan dengan format miring (italic). Di bagian paling bawah kartu terdapat lingkaran inisial nama, diikuti teks nama orang tua berhuruf tebal, dan teks kelas anak berukuran kecil (contoh: "Bunda Rara - Kelas 4 SD").
- Transisi Mulus (Smooth Collapse): Jika teks ulasan terlalu panjang (lebih dari 3 baris), muncul tombol teks kecil bertuliskan "Baca selengkapnya". Saat tombol ini ditekan, kartu akan memanjang ke bawah. Saat dilipat kembali dengan menekan "Tutup", kartu mengecil ke atas secara natural dengan durasi tunda presisi agar pergerakannya mulus layaknya mentega.
- Sinkronisasi Data: Menarik semua teks (nama, ulasan, kelas) dari tabel testimoni. Hanya ulasan orang tua yang sudah diberi centang (aktif) oleh Admin yang akan dipublikasikan ke layar.

6. FAQ (Pertanyaan yang Sering Diajukan)
Alasan: Menjawab kebingungan operasional secara instan untuk meringankan beban staf menjawab pesan berulang.
Komponen, UI/UX, dan Logika Sistem:
- Judul Bagian: Teks heading di tengah atas bertuliskan "Pertanyaan Seputar Ruang Les".
- Interaksi Visual: Di bawah judul, terdapat daftar baris pertanyaan menyusun ke bawah (akordion). Setiap baris memuat teks pertanyaan (contoh: "Bagaimana sistem pembayaran di Ruang Les?") yang diakhiri dengan ikon panah ke bawah di sebelah kanannya. Saat baris diklik, kotak di bawahnya akan merekah untuk membuka teks paragraf jawaban secara mulus (smooth transition) tanpa membuat lompatan kasar di layar menggunakan Alpine.js.
- Sinkronisasi Data: Teks pertanyaan dan teks paragraf jawaban ditarik murni dari tabel FAQ database, disusun dari atas ke bawah sesuai nomor urut (prioritas) dari Admin.

7. Penutup Aksi (Call to Action / CTA)
Alasan: Titik pungkas untuk menangkap antusiasme pengunjung di bagian paling bawah halaman untuk bertindak.
Komponen, UI/UX, dan Logika Sistem:
- Tata Letak: Kotak sorotan berlatar belakang hijau gelap memanjang penuh (full width) yang sangat menonjol, diletakkan tepat di atas footer. 
- Komponen Teks: Di dalam kotak hijau, terdapat teks putih berukuran besar bertuliskan "Siap Memulai Perjalanan Belajar?".
- Tombol Aksi Final: Di bawah teks tersebut, terdapat tombol kapsul besar putih solid bertuliskan "Daftar Sekarang". Logika pendeteksian sesi sepenuhnya berlaku di sini, memisahkan secara cerdas arah navigasi antara tamu dan pengguna yang sudah login.

8. Kaki Halaman (Footer)
Alasan: Jangkar penutup informasi legalitas dan menyediakan akses menu tanpa perlu menggulir ke atas.
Komponen, UI/UX, dan Logika Sistem:
- Tata Letak: Desain berjejer dalam 4 kolom vertikal. 
- Rincian Kolom: 
  - Kolom 1 memuat Logo Ruang Les dan teks paragraf deskripsi singkat visi bimbel. 
  - Kolom 2 memuat teks "Tautan Cepat" dengan daftar teks berjejer ke bawah (Beranda, Program, FAQ, Kontak). 
  - Kolom 3 memuat teks "Hubungi Kami" dengan rincian ikon dan teks alamat lengkap domisili, tautan teks WhatsApp, dan teks alamat email resmi. 
  - Kolom 4 memuat teks "Ikuti Kami" dan deretan ikon lingkaran media sosial (seperti Instagram).
- Bagian Bawah: Ditutup dengan garis tipis horizontal dan sebaris teks hak cipta bertuliskan "Copyright © 2026 Ruang Les. All rights reserved."

---

### Rincian Halaman Tentang Kami (Profil Institusi)

Sebagai halaman pendamping, Tentang Kami berfokus untuk menceritakan jiwa dan nilai inti Ruang Les secara visual dengan integrasi berikut:

1. Sambutan & Profil Pendiri
Alasan: Membangun jembatan emosional antara calon orang tua murid dan pengajar utama.
Komponen, UI/UX, dan Logika Sistem:
- Interaksi Visual: Menggunakan latar berupa ombak vektor (SVG wave) hijau di bagian atas yang menyatu dengan pendaran cahaya abstrak (blob).
- Komponen Teks Kiri: Terdapat label kapsul kecil bertuliskan "Mengenal Kami". Di bawahnya adalah teks judul besar (contoh: "Berawal dari Kepedulian terhadap Pendidikan Anak"). Di bawah judul, mengalir teks paragraf panjang yang menceritakan sejarah terbentuknya Ruang Les. Teks ini ditarik dinamis dari konfigurasi database.
- Potret Pendiri Kanan: Foto pendiri dilapisi bingkai melayang miring. Di sudut bawah foto, terdapat lencana nama berupa kotak kecil berwarna putih yang berayun lambat (bounce-slow). Di dalam lencana tersebut terdapat ikon topi toga, teks tebal "Ismaturrohmah, S.Pd", dan teks kecil "Founder Ruang Les".

2. Kartu Visi dan Misi
Alasan: Menjabarkan komitmen jangka panjang Ruang Les.
Komponen, UI/UX, dan Logika Sistem:
- Interaksi Visual: Dua kotak raksasa (Visi di kiri, Misi di kanan) menggunakan material kaca tembus pandang (Glassmorphism backdrop-blur) di atas ombak latar. Kedua kotak ini akan sedikit terangkat (lift-up) saat disorot kursor, disertai perubahan pada intensitas bayangannya menjadi lebih tajam.
- Komponen Teks: Kotak Visi memuat ikon mata, teks judul "Visi Kami", dan teks paragraf tebal penjabaran visi. Kotak Misi memuat ikon target panah, teks judul "Misi Kami", dan daftar rincian misi ke bawah yang diakhiri ikon centang hijau (bullet points). Teks di kedua kartu ini dikelola murni dari tabel Admin.

3. Galeri Dokumentasi
Alasan: Menyuguhkan bukti nyata kegiatan belajar mengajar yang hangat.
Komponen, UI/UX, dan Logika Sistem:
- Judul Bagian: Teks heading di bagian atas bertuliskan "Momen Belajar Bersama".
- Interaksi Visual: Di bawah judul terdapat deretan foto horizontal. Mesin slider Alpine.js merespons ukuran layar (menampilkan 3 foto utuh di komputer atau 1.15 foto terpotong di layar HP untuk memancing gestur geser jari).
- Efek Hover Foto: Setiap foto dilapisi kotak tajam. Saat gambar disorot (hover), dua hal terjadi bersamaan: foto membesar perlahan (scale-110), dan gradasi hitam transparan merambat dari bawah foto ke atas untuk memunculkan teks kecil kategori (contoh: "Kelas Reguler") dan teks judul kegiatan (contoh: "Keseruan Belajar Matematika").
- Sinkronisasi Data: File foto asli dan teks (kategori beserta judul momen) ditarik otomatis dari tabel database berdasarkan data galeri yang disetujui Admin.

4. Penutup Aksi (CTA)
Alasan: Mengonversi rasa percaya audiens usai melihat galeri menjadi tindakan mendaftar.
Komponen, UI/UX, dan Logika Sistem:
- Interaksi Visual: Kotak memanjang bergradasi hijau pekat dengan pendaran cahaya terang (overlay) di setiap sudut-sudut kotak, kontras dengan sisa area halaman putih.
- Komponen Teks: Teks judul putih di tengah bertuliskan "Mari Bertumbuh Bersama Ruang Les".
- Logika Sistem Tombol: Di bawah teks judul terdapat satu tombol besar putih solid bertuliskan "Mulai Belajar Sekarang". Tombol pintar ini mendeteksi status pengunjung dan menyediakan persimpangan navigasi langsung menuju Pendaftaran Dasar (bagi tamu) atau Formulir Pengisian Langkah Pertama (bagi pengguna yang sudah terotentikasi).
