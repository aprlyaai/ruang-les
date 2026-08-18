# Rancangan Antarmuka UI - Halaman Akses (Login Portal)

> [!IMPORTANT]
> **STATUS EKSEKUSI (SELESAI 100%)**
> Halaman Login telah sukses dieksekusi sebagai pintu gerbang tunggal (Universal Gate) untuk seluruh peran pengguna (Admin, Mentor, Orang Tua). Desain UI memancarkan standar estetika premium (Tailwind CSS v4) yang sejajar dengan Halaman Beranda.

---

### Filosofi Desain Portal Masuk (Login)

Halaman Login dirancang bukan sekadar sebagai formulir isian kaku, melainkan sebagai "ruang tunggu" (lobby) virtual yang elegan sebelum pengguna menapaki sistem utama. Tujuannya adalah menciptakan transisi visual yang mulus dari Halaman Publik menuju Panel Dasbor, dengan tetap menjaga fokus mutlak pada keamanan dan otentikasi. Karena fungsinya universal, sistem secara cerdas akan mendeteksi hak akses (role) pengguna berdasarkan alamat email yang dimasukkan, lalu mengarahkannya ke dasbor yang relevan tanpa perlu memilih peran secara manual.

---

### Rincian Anatomi Halaman Masuk (Login)

Secara arsitektural, halaman Login merupakan cerminan visual sejati (mirror) dari halaman Register, demi menjaga konsistensi ingatan visual (muscle memory) pengunjung terhadap identitas Ruang Les. Berikut adalah rincian pembentuknya:

1. Kanvas Latar Belakang (Atmosphere & Background)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menghilangkan kesan intimidatif khas halaman login aplikasi konvensional dan menanamkan identitas merek secara subliminal agar pengguna merasa familier.
- Tata Letak & Posisi: Latar belakang ini mengisi seluruh layar penuh (full viewport width & height), melebar tanpa celah di ujung perangkat apa pun (HP maupun Desktop).
- Rincian Teks & Elemen Visual: Hamparan latar belakang menggunakan kanvas putih yang disapu ornamen ombak vektor berlapis (SVG waves) berwarna hijau pastel. Di sela-sela ombak, terdapat pendaran cahaya raksasa (blob) bernuansa hijau dan kuning pudar.
- Interaksi Visual: Komponen cahaya (blob) beranimasi dengan efek rotasi lambat dan bergeser secara acak. Saat bertumpuk, warnanya akan membaur dengan mulus (menggunakan efek mix-blend-multiply), menciptakan ilusi layar yang hidup dan bernapas tanpa mendistraksi proses login.

2. Identitas Merek Tersentralisasi (Centered Branding)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Mengonfirmasi kedatangan pengguna di portal resmi yang sah dan aman, memberikan ketenangan psikologis sebelum memasukkan kredensial.
- Tata Letak & Posisi: Diposisikan di tengah atas layar, melayang sedikit di atas kotak batas formulir utama.
- Rincian Teks & Elemen Visual: Tersusun atas ikon kotak berbingkai putih bersih yang berisi logo Ruang Les. Di sebelah kanannya menempel teks judul tebal bertuliskan "Ruang Les" (font Montserrat) serta teks hijau yang lebih kecil bertuliskan "by Ismaturrohmah" (font Inter).
- Interaksi Visual: Keseluruhan grup (logo dan teks) adalah sebuah tombol navigasi tak kasat mata. Saat disorot oleh kursor mouse (hover), grup tersebut membesar dengan mulus (scale-105).
- Logika Sistem: Jika blok ini diklik, sistem akan langsung melempar pengguna memutar balik ke beranda depan (Landing Page).

3. Kartu Formulir Kaca (Glassmorphism Form Card)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Menciptakan wadah kokoh nan elegan, mengisolasi titik fokus input data dari latar belakang yang beranimasi.
- Tata Letak & Posisi: Terpusat secara absolut di tengah layar (vertikal dan horizontal). Memiliki batas lebar maksimal (max-w-md) agar tidak merenggang terlalu lebar di layar laptop/PC.
- Rincian Teks & Elemen Visual: Menggunakan material kotak putih semi-transparan (bg-white/80) dipadukan dengan efek kaca buram dari Tailwind (backdrop-blur-xl). Di bagian atas, bertengger label kapsul berlatar hijau muda dengan teks hijau tua: "Masuk Portal". Tepat di bawahnya adalah teks judul berukuran besar, tebal, dan tegas bertuliskan "Selamat Datang!". Diikuti sebaris teks deskripsi kecil abu-abu: "Masukkan email dan kata sandi untuk mengakses akun Anda."
- Interaksi Visual: Kotak formulir ini dilindungi oleh garis batas luar (border) tipis berwarna putih transparan yang menciptakan kesan objek kaca tiga dimensi.

4. Input Kredensial Terfokus (Focused Inputs)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Mengumpulkan dua kunci otentikasi utama secara presisi, sekaligus menyelamatkan pengguna yang lupa kata sandi.
- Tata Letak & Posisi: Dua baris isian (Alamat Email dan Kata Sandi) disusun vertikal di tengah kartu. Di bawah input kata sandi, tersemat kotak centang "Ingat Saya" di sisi kiri, sejajar dengan tautan "Lupa Kata Sandi" di sisi kanan.
- Rincian Teks & Elemen Visual: Kotak Alamat Email memuat ikon amplop surat abu-abu di sisi kirinya, sedangkan kotak Kata Sandi memuat ikon gembok terkunci. Teks *placeholder* pudar memberikan petunjuk pengetikan. Tautan "Lupa Kata Sandi?" berwarna hijau dan dicetak tebal.
- Interaksi Visual: Saat kotak diklik (fokus ketik), tepiannya memancarkan cincin warna hijau solid (ring). Saat tautan Lupa Sandi disorot (hover), teksnya bergaris bawah.
- Sensor Kata Sandi (Alpine.js): Sama seperti Register, kolom Kata Sandi di Login ini memiliki ikon 'Mata' di pojok kanan bertenaga Alpine.js. Klik ikon ini akan mengubah titik-titik kata sandi menjadi teks yang terbaca tanpa memuat ulang layar (no reload).
- Logika Sistem & Sinkronisasi Data (Backend): Saat tombol utama ditekan, Laravel memeriksa kecocokan Email dan Sandi di tabel `users` database. Jika gagal (salah eja atau tidak terdaftar), input akan menyala merah, dan muncul teks eror merah menyala: "Kredensial yang Anda berikan tidak cocok dengan data kami."

5. Tombol Eksekusi & Rute Putar Balik (Action & Switcher)
Komponen, UI/UX, dan Logika Sistem:
- Alasan & Tujuan: Mengeksekusi verifikasi keamanan gerbang utama, sekaligus memberikan jalan keluar bagi orang tua yang kebingungan karena belum punya akun.
- Tata Letak & Posisi: Berada di bagian paling bawah kartu formulir, disusun ke bawah.
- Rincian Teks & Elemen Visual: Terdapat tombol aksi berukuran penuh (full-width) dengan bentuk kapsul berwarna hijau tua solid, bertuliskan "Masuk Portal". Di dasar kartu, bertengger teks abu-abu berbunyi "Belum memiliki akun? ", disambung tautan teks hijau "Daftar di sini".
- Interaksi Visual: Saat tombol diklik, efek bayangannya membesar, warnanya menggelap, dan posisinya terangkat sedikit (hover lift).
- Logika Sistem & Sinkronisasi Data (Backend): Tombol Login ini adalah inti dari gerbang universal. Jika kredensial benar, backend memeriksa status `role` pengguna. 
  - Jika "Admin", diarahkan ke Dasbor Admin.
  - Jika "Mentor", diarahkan ke Dasbor Mentor.
  - Jika "Orang Tua/Wali", diarahkan ke Dasbor Orang Tua. 
  - Selain itu, sistem menyimpan sesi di browser (Remember Me), membuat pengguna tidak perlu login berulang-ulang di perangkat yang sama.
