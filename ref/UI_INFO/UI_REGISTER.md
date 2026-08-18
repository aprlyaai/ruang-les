# Rancangan Antarmuka UI - Halaman Akses (Register)

> [!IMPORTANT]
> **STATUS EKSEKUSI (SELESAI 100%)**
> Halaman Autentikasi (Registrasi Publik) telah sukses dieksekusi dan tersinkronisasi penuh dengan ekosistem backend Laravel. Desain UI telah mengadopsi standar modern (Tailwind CSS v4) dengan integrasi Alpine.js untuk interaksi mikro.

---

### Filosofi Desain Gerbang Pendaftaran (Register)

Halaman Register dirancang bukan sekadar sebagai formulir isian kaku, melainkan sebagai "ruang tunggu" (lobby) virtual yang elegan sebelum orang tua memasuki sistem utama. Halaman ini berstatus sebagai titik pijak pertama bagi pengunjung baru (Orang Tua/Wali) sebelum mereka mendapatkan hak untuk melangkah ke Formulir Pendaftaran Anak 7 Langkah.

---

### Rincian Anatomi Halaman Pendaftaran (Register)

Berikut adalah bedah komponen pembentuk halaman registrasi beserta logika sistem yang memengaruhinya:

1. Kanvas Latar Belakang (Atmosphere & Background)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menghilangkan kesan intimidatif khas halaman formulir tradisional dan menanamkan identitas merek secara subliminal agar orang tua merasa nyaman saat mendaftar.
- Tata Letak & Posisi: Mengisi seluruh ruang layar belakang secara penuh (full viewport), baik di perangkat seluler maupun komputer.
- Rincian Teks & Elemen Visual: Hamparan latar belakang disapu dengan ornamen ombak vektor berlapis (SVG waves) di bagian bawah. Area kosong diisi dengan komponen abstrak cahaya raksasa (blob) yang memancarkan pendaran hijau pastel dan kuning lembut.
- Interaksi Visual: Pendaran cahaya (blob) tidak diam statis. Mereka berputar perlahan secara acak dengan durasi animasi panjang dan saling bertumpuk (menggunakan efek mix-blend-multiply) untuk memberikan kesan layar yang hidup tanpa mengalihkan konsentrasi pengisian data.

2. Identitas Merek Tersentralisasi (Centered Branding)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Mengonfirmasi kepada pengguna bahwa mereka berada di portal pendaftaran resmi yang tepat.
- Tata Letak & Posisi: Terletak tepat di bagian tengah atas, sedikit menggantung di luar kotak formulir utama.
- Rincian Teks & Elemen Visual: Memuat kotak berbingkai putih yang berisi gambar Logo Ruang Les. Di sebelahnya terdapat teks tebal bertuliskan "Ruang Les" (font Montserrat) dan teks pelengkap berwarna hijau bertuliskan "by Ismaturrohmah" (font Inter).
- Interaksi Visual: Logo beserta blok teks ini bertindak sebagai tautan interaktif. Saat kursor diarahkan ke area ini (hover), seluruh blok akan membesar secara halus (scale-105).
- Logika Sistem: Tautan pada blok ini secara otomatis mengarahkan pengunjung kembali ke Halaman Beranda (Landing Page).

3. Kartu Formulir Kaca (Glassmorphism Form Card)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menciptakan wadah yang sangat modern dan bersih, memisahkan secara tegas antara area isian data dengan latar belakang yang bergerak.
- Tata Letak & Posisi: Ditempatkan persis di tengah layar (terpusat secara vertikal dan horizontal). Kotak ini mengadopsi ukuran maksimal yang wajar (max-w-md) agar tidak merenggang buruk di layar monitor besar.
- Rincian Teks & Elemen Visual: Kotak utama menggunakan material latar belakang putih semi-transparan dengan paduan efek kaca buram (backdrop-blur-xl), menghasilkan kanvas yang menangkap pantulan ornamen di belakangnya. Di bagian atas kotak, terdapat label kapsul kecil bertuliskan teks "Buat Akun Baru". Di bawahnya, memuat teks tajuk utama berhuruf tebal: "Pendaftaran Akun Orang Tua/Wali". Di bawah judul, terdapat sebaris teks deskripsi kecil bertuliskan: "Silakan lengkapi data diri Anda untuk memulai langkah pendaftaran."
- Interaksi Visual: Pinggiran kotak dilengkapi dengan garis batas (border) tipis berwarna putih transparan yang memberikan ilusi pantulan cahaya tiga dimensi.

4. Input Data & Interaksi Mikro (Form Inputs)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Mengumpulkan tiga data otentikasi esensial dengan cara yang ramah pengguna dan mencegah kesalahan pengetikan sandi.
- Tata Letak & Posisi: Tiga kotak isian disusun vertikal (atas ke bawah): Nama Lengkap, Email, dan Kata Sandi beserta Konfirmasinya.
- Rincian Teks & Elemen Visual: Setiap label kotak isian memuat teks wajib. Di dalam kotak input, terdapat teks petunjuk pudar (placeholder). Kotak "Nama Lengkap" ditemani ikon SVG berbentuk profil orang di sisi kirinya; kotak "Alamat Email" ditemani ikon amplop surat; dan kotak "Kata Sandi" ditemani ikon gembok kunci bergaya garis abu-abu (outline).
- Interaksi Visual: Saat pengguna mengeklik sebuah kotak untuk mengetik (fokus), kotak tersebut akan menyala memancarkan cincin bercahaya (ring) hijau muda yang lembut. 
- Sensor Kata Sandi (Alpine.js): Khusus pada baris input Kata Sandi dan Konfirmasi Kata Sandi, terdapat ikon bentuk "Mata" (eye) melayang di sisi paling kanan kotak. Komponen ini ditenagai Alpine.js. Saat ikon mata diklik, ikonnya berubah menjadi "Mata Tercoret", dan titik-titik kata sandi yang diketik seketika berubah wujud menjadi huruf yang bisa dibaca. Hal ini terjadi secara instan tanpa perlu memuat ulang layar (no page reload).
- Logika Sistem Keamanan (Backend): Saat tombol ditekan, Laravel Backend memeriksa masukan. Jika email yang dimasukkan sudah pernah terdaftar, atau sandi yang diketik kurang dari 8 karakter, halaman ini akan seketika menolak dan mengembalikan pengguna dengan memunculkan teks peringatan (error message) berwarna merah menyala tepat di bawah kotak input yang bermasalah.

5. Tombol Eksekusi & Tautan Alternatif (CTA)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Mendorong aksi pengiriman formulir dan menyelamatkan navigasi pengguna jika mereka sebenarnya tidak butuh mendaftar (hanya ingin masuk).
- Tata Letak & Posisi: Memenuhi bagian bawah kartu formulir, disusun bersusun.
- Rincian Teks & Elemen Visual: Terdapat satu tombol kapsul besar berwarna hijau pekat, bertuliskan teks tebal "Daftar Sekarang". Di bagian paling bawah formulir, terdapat satu baris teks kecil abu-abu bertuliskan "Sudah memiliki akun? ", yang bersambung dengan teks tautan berwarna hijau bertuliskan "Masuk di sini".
- Interaksi Visual: Tombol aksi memancarkan efek bayangan. Saat kursor mouse mendekat (hover), warna hijau menjadi lebih pekat, bayangan meluas, dan posisi tombol seakan terangkat ke atas secara halus.
- Logika Sistem (Backend): Saat tombol "Daftar Sekarang" ditekan, sistem backend Laravel memvalidasi dan menyimpan data pendaftar baru. Setelah data sukses tersimpan (sukses teregistrasi), sesi pengguna (Session) langsung aktif secara otomatis (Auto-Login), dan sistem seketika memutar rute, menerbangkan pengguna masuk ke dalam halaman "Formulir Pendaftaran Anak 7 Langkah (Langkah 1)" tanpa perlu memaksa mereka melewati halaman Login lagi.
