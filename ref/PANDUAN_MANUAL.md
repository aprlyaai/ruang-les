# Panduan Manual Pembangunan Sistem Ruang Les v2

Dokumen ini mendokumentasikan seluruh tahapan instalasi, konfigurasi, pembuatan model, migrasi database, manajemen akses, hingga pengaturan antarmuka pengguna pada sistem bimbingan belajar Ruang Les v2.

## Persiapan Awal dan Instalasi

### Instalasi Laravel
Proyek dimulai dengan menginisialisasi kerangka kerja Laravel menggunakan Composer.

```bash
composer create-project laravel/laravel ruang-les-v2
```

### Konfigurasi Environment
Pengaturan koneksi basis data ditentukan pada berkas .env untuk mengarahkan penyimpanan data ke sistem MySQL server lokal melalui Laragon.

Pengaturan variabel basis data diubah menjadi:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_ruang_les_v2
DB_USERNAME=root
DB_PASSWORD=
```

## Struktur Skema Database dan Model

Pembuatan model beserta berkas migrasinya dilakukan secara paralel menggunakan artisan command. Terdapat 17 model utama yang saling berelasi sesuai kebutuhan bisnis operasional bimbingan belajar.

### Perintah Pembuatan Entitas
Setiap entitas dibuat menggunakan perintah berikut secara berurutan:

```bash
php artisan make:model Siswa -m
php artisan make:model Mentor -m
php artisan make:model Paket -m
php artisan make:model Jadwal -m
php artisan make:model Pendaftaran -m
php artisan make:model Presensi -m
php artisan make:model Catatan -m
php artisan make:model Nilai -m
php artisan make:model EvaluasiAi -m
php artisan make:model Pembayaran -m
php artisan make:model Kuota -m
php artisan make:model Materi -m
php artisan make:model Notifikasi -m
php artisan make:model Pengumuman -m
php artisan make:model Layanan -m
php artisan make:model KontenLanding -m
```

### Konfigurasi Relasi dan Atribut Model
Setiap file model dikonfigurasi dengan properti fillable untuk keamanan mass-assignment, properti casts untuk konversi otomatis tipe data (seperti tipe data date dan JSON), serta fungsi relasi relasional database seperti belongsTo dan hasMany.

### Penambahan Kolom Estimasi Hari-H
Untuk mendukung fitur pergeseran hari-H pada sistem notifikasi tagihan, kolom khusus estimasi_hari_h ditambahkan ke dalam migrasi tabel kuotas.

```php
Schema::create('kuotas', function (Blueprint $table) {
    $table->id();
    $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
    $table->integer('sisa_sesi');
    $table->date('estimasi_hari_h')->nullable();
    $table->timestamps();
});
```

### Eksekusi Migrasi Database
Setelah seluruh skema siap, pembuatan tabel di MySQL dilakukan dengan menjalankan migrasi.

```bash
php artisan migrate
```

## Seeder Data Awal dan Middleware

### Pembuatan Data Seeder
Data awal untuk admin sistem dan master paket pembelajaran dimasukkan ke dalam basis data menggunakan berkas seeder.

```bash
php artisan make:seeder UserSeeder
php artisan make:seeder PaketSeeder
```

UserSeeder bertugas mendaftarkan satu akun Administrator secara default:
```php
User::create([
    'name' => 'Administrator Ruang Les',
    'email' => 'admin@ruangles.com',
    'password' => Hash::make('password123'),
    'role' => 'admin',
]);
```

PaketSeeder memasukkan daftar paket bimbel (Ruang Privat, Semi Privat, dan Reguler) lengkap dengan harga dan detail jumlah pertemuan.

Kedua seeder tersebut kemudian didaftarkan di dalam DatabaseSeeder.php dan dijalankan menggunakan perintah:

```bash
php artisan db:seed
```

Untuk menyegarkan seluruh database dan mengisi ulang seeder dari awal, perintah berikut dapat digunakan:

```bash
php artisan migrate:fresh --seed
```

### Sistem Hak Akses (Middleware)
Sebuah middleware khusus bernama RoleMiddleware dibuat untuk menyaring akses rute berdasarkan peran pengguna.

```bash
php artisan make:middleware RoleMiddleware
```

Pada RoleMiddleware.php, pemeriksaan dilakukan dengan membandingkan parameter role yang dikirimkan:
```php
if ($request->user() && $request->user()->role === $role) {
    return $next($request);
}
```

Middleware ini didaftarkan pada bootstrap/app.php agar dapat dipanggil di file routing:
```php
$middleware->alias([
    'role' => \App\Http\Middleware\RoleMiddleware::class,
]);
```

## Sistem Autentikasi dan Routing

### Controller Autentikasi
Logika masuk (login), registrasi akun orang tua, serta keluar sistem (logout) ditangani oleh LoginController dan RegisterController di dalam direktori Controllers/Auth.

```bash
php artisan make:controller Auth/LoginController
php artisan make:controller Auth/RegisterController
```

Setelah login berhasil dilakukan, controller akan mengarahkan pengguna secara dinamis:
- Peran admin diarahkan ke dashboard admin (/admin/dashboard).
- Peran orang tua diarahkan ke halaman utama beranda (/).

### Konfigurasi Routing
Definisi rute diatur di dalam routes/web.php untuk menghubungkan tautan dengan controller publik maupun controller autentikasi.

```php
Route::get('/', [PublicController::class, 'index']); // Mengirim data $pakets dinamis ke view beranda

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
```

### Tampilan Halaman Autentikasi
Antarmuka pengguna untuk masuk dan mendaftar menggunakan layout pembungkus khusus guest `<x-guest-layout>` (ditemukan di `resources/views/components/guest-layout.blade.php`) agar terpisah dari Header dan Footer global bimbingan belajar, sehingga menciptakan visual yang minimalis dan terpusat.

Tampilan Registrasi (resources/views/auth/register.blade.php):
- Mengumpulkan data Nama Lengkap, Alamat Email, Password, dan Konfirmasi Password.
- Validasi email bersifat unik untuk mencegah duplikasi akun orang tua.
- Password diverifikasi dengan aturan konfirmasi sebelum akun dibuat dengan role 'ortu' secara otomatis.

Tampilan Login (resources/views/auth/login.blade.php):
- Mengumpulkan Alamat Email dan Password.
- Menyediakan checkbox "Ingat Saya" untuk menyimpan sesi pengguna.
- Menampilkan peringatan kesalahan visual jika kredensial tidak valid.

## Konfigurasi Antarmuka Pengguna (Frontend)


### Instalasi Aset dan Tailwind CSS v4
Instalasi dependensi pustaka frontend diproses menggunakan npm. Tailwind CSS versi 4 dikonfigurasi melalui Vite sebagai sistem kompilasi aset utama proyek.

```bash
npm install
npm run dev
```

### Desain Warna dan Tema Brand
Warna dasar bimbel diatur dalam resources/css/app.css. Warna utama brand #B7D9B1 didaftarkan di dalam direktori @theme bersama shade warna pendukung dengan kontras yang lebih tinggi (warna hijau sage gelap) untuk memastikan standar aksesibilitas keterbacaan teks di dalam aplikasi.

```css
@theme {
    --color-primary: #B7D9B1;
    --color-primary-50: #f4f9f3;
    --color-primary-100: #e5f2e2;
    --color-primary-200: #cee6c8;
    --color-primary-300: #b7d9b1;
    --color-primary-400: #93c38b;
    --color-primary-500: #B7D9B1;
    --color-primary-600: #51854a;
    --color-primary-700: #426c3c;
    --color-primary-800: #355630;
    --color-primary-900: #2c4728;
    --color-primary-950: #142412;
}
```

### Layout dan Komponen Halaman
Layout dibentuk menggunakan pendekatan sistem komponen Blade agar bersifat dinamis dan seragam di semua halaman.

- Layout Utama (resources/views/components/app-layout.blade.php): Bertindak sebagai kerangka pembungkus global halaman menggunakan variabel slot.
- Layout Guest (resources/views/components/guest-layout.blade.php): Bertindak sebagai kerangka pembungkus khusus halaman autentikasi (login/register) yang terpisah dari Header dan Footer global dengan desain minimalis.
- Header Komponen (resources/views/components/header.blade.php): Menampilkan logo, tautan navigasi, tombol pendaftaran bagi tamu, atau menu dropdown profil dengan inisialisasi AlpineJS jika pengguna telah masuk.
- Footer Komponen (resources/views/components/footer.blade.php): Berisi 4 kolom formal untuk menyajikan deskripsi bimbel, tautan cepat, detail kontak resmi, dan tautan media sosial.

### Pelebaran Kontainer Layout
Untuk memaksimalkan area pembacaan konten pada layar resolusi tinggi, seluruh kontainer luar layout utama diperlebar dari batas maksimal standar max-w-7xl menjadi max-w-[90rem] (lebar 1440 piksel) disertai bantalan sisi px-4 sm:px-6 lg:px-8.

## Pemeliharaan Sistem

### Pembersihan Cache Manual
Saat melakukan perubahan struktur rute, file konfigurasi, maupun file tampilan Blade, cache sistem disarankan untuk dibersihkan guna memuat berkas konfigurasi terbaru.

```bash
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:clear
```

## Formulir Pendaftaran 7 Langkah

### Struktur Tabel Draf Pendaftaran
Untuk mengantisipasi data yang hilang karena sesi terputus atau perubahan halaman yang tidak disengaja, sistem pendaftaran 7 langkah dirancang menggunakan tabel `pendaftaran_drafts`.

Tabel ini menyimpan status draf pendaftaran secara persisten:
- `user_id` yang mereferensikan akun Orang Tua.
- `current_step` untuk mencatat langkah aktif saat ini.
- `draft_data` bertipe JSON untuk menyimpan kerangka isian formulir Langkah 1 hingga 7.

```bash
php artisan make:model PendaftaranDraft -m
```

### Logika Multi-Langkah dan Validasi (Backend)
Alur pengisian multi-langkah ini dikelola melalui `PendaftaranController`. Alur ini terdiri dari dua fungsi utama:
- `showForm()`: Bertugas membaca data draf milik `user` yang masuk. Jika belum ada, sistem otomatis membuat entri draf baru dimulai dari Langkah 1.
- `saveStep()`: Menerima masukan dari halaman, mendeteksi status `current_step`, dan memvalidasinya secara parsial (Langkah 1 memvalidasi identitas anak, Langkah 2 memvalidasi akademik, dan seterusnya). Validasi yang sukses akan diformat menjadi JSON, lalu digabungkan dengan draf sebelumnya dan disimpan.

Tombol "Kembali" dan "Selanjutnya" diproses secara dinamis menggunakan parameter input `action` untuk menaikkan atau menurunkan `current_step`.

### Antarmuka Pengguna (Frontend)
Halaman pendaftaran (`resources/views/public/pendaftaran.blade.php`) dirancang dengan antarmuka yang sangat responsif:
- Progress Bar: Menampilkan 7 indikator langkah dengan palet warna hijau sage. Warna abu-abu (langkah berikutnya), putih dengan garis batas hijau (langkah aktif), dan hijau penuh (langkah selesai).
- Penghitung Usia Real-Time: Pada Langkah 1 (Identitas Anak), kolom Usia dibuat menjadi *read-only*. Javascript memproses input dari Date Picker Tanggal Lahir dan menghitung selisih tahun serta bulan dengan tanggal hari ini secara instan, lalu menampilkannya sebagai teks di layar browser tanpa menyimpannya secara duplikat ke dalam database.
- Pemilihan Paket & Proteksi Kuota: Pada Langkah 4 dan 5, paket dan jadwal diambil dari tabel `pakets` dan `jadwals`. Di Langkah 5, logika sistem secara dinamis memblokir (*disable*) pemilihan jadwal jika sisa kuotanya telah mencapai angka nol (`kuota_maksimal - terisi <= 0`).

### Finalisasi dan Eksekusi Database (DB::transaction)
Ketika pengguna telah mengunggah bukti pembayaran dan menekan "Selesai & Kirim Data" di Langkah 7, semua rekaman draf JSON di dalam `pendaftaran_drafts` dipecah dan didistribusikan ke dalam tiga tabel operasional utama:
1. `siswas`: Menyimpan identitas siswa dan riwayat akademis (Langkah 1 & 2).
2. `pendaftarans`: Menyimpan data orang tua, serta mereferensikan id Paket dan id Jadwal yang dipilih (Langkah 3, 4, & 5).
3. `pembayarans`: Mengalkulasi harga paket terpilih ke dalam kolom `total_tagihan` dan menyimpan tautan lokasi file bukti transfer (Langkah 7).
4. `jadwals`: Meng-inkremen kolom `terisi` pada tabel jadwal agar sisa kuota berkurang secara aktual.

Proses pemecahan data parsial ini dieksekusi dengan membungkusnya menggunakan *Database Transaction* (`DB::transaction`). Apabila salah satu kueri penyimpanan di atas gagal (contohnya tabel pembayaran *crash*), seluruh proses di-rollback, sehingga tidak ada data sebagian yang mengotori sistem, dan data draf pengguna tidak hilang. Data draf hanya akan dihapus `delete()` jika `DB::transaction` sukses 100%.

## Pembaruan Reaktivitas Unggah Bukti dan Redaksi Pesan Verifikasi

### Antarmuka Pengunggahan Bukti Pembayaran
Pada Langkah 7, area pengunggahan bukti pembayaran diperbarui untuk mendukung reaktivitas UI secara instan dan fitur seret-lepas (drag-and-drop):
- Visual State Aktif: Saat file dipilih atau diseret (dragged) ke dalam area unggah, bingkai putus-putus berubah menjadi hijau solid (`border-[#B7D9B1]` dan `bg-[#f4f9f3]`), serta menyembunyikan instruksi default.
- Pratinjau File (Preview): Jika file berupa gambar, sistem menampilkan pratinjau thumbnail gambar secara real-time. Jika file berupa dokumen PDF, ikon dokumen PDF akan ditampilkan beserta informasi nama file dan ukuran file dalam MB.
- Kemudahan Penggantian: Disediakan tombol "Ganti File" untuk memudahkan pengguna memperbarui pilihan file sebelum mengirimkan data.

### Redaksi Halaman Berhasil
Pesan pada halaman sukses pendaftaran (`resources/views/public/sukses-daftar.blade.php`) disesuaikan agar selaras dengan operasional manual (tanpa integrasi API pihak ketiga):
- Teks informasi diubah dari pengiriman notifikasi WhatsApp otomatis menjadi pemberitahuan bahwa status verifikasi dapat dipantau langsung lewat dashboard akun orang tua atau akan dihubungi oleh admin melalui nomor telepon terdaftar secara manual.

## Panel Admin & Verifikasi Pendaftaran

### Arsitektur Rute dan Kontroler
Sistem manajemen internal dipisahkan menggunakan middleware `role:admin` untuk memastikan keamanan akses. Semua rute dilindungi dengan awalan `/admin` dan dikelola melalui kontroler khusus di dalam ruang nama `App\Http\Controllers\Admin`:
- `AdminController`: Mengatur tampilan dasbor utama dan agregasi data statistik sederhana.
- `AdminPendaftaranController`: Mengelola antrean pendaftaran berstatus `pending`, menampilkan profil dan detail pendaftaran, serta menangani aksi verifikasi.

### Tampilan & Layout (UI/UX)
Panel Admin dibangun di atas kerangka `resources/views/layouts/admin.blade.php`, menampilkan desain minimalis berwarna dominan abu-abu terang dengan sidebar navigasi statis berwarna utama (hijau sage / `#B7D9B1`). Layout tersebut juga mengimplementasikan Alpine.js untuk fitur buka-tutup navigasi (responsive mobile-menu).
Halaman yang disediakan pada tahap awal meliputi:
- Dasbor Admin: Menampilkan 4 kartu agregasi data secara real-time (Total Siswa, Pendaftaran Pending, Pendaftaran Aktif, Pendapatan).
- Indeks Verifikasi: Tabel daftar pendaftaran masuk yang menyajikan ringkasan singkat dari calon siswa.
- Detail Verifikasi (Show): Merupakan laman krusial yang menampilkan informasi menyeluruh (identitas, sekolah, orang tua, paket, jadwal), lengkap dengan fasilitas zoom-in (*lightbox*) mandiri untuk melihat gambar bukti transfer secara detail dan aman.

### Logika Persetujuan, Penolakan, dan Otomatisasi (Verifikasi)
Ketika admin menyetujui sebuah pendaftaran, sistem (`AdminPendaftaranController@verify`) akan menjalankan pembungkus `DB::transaction` untuk mengeksekusi serangkaian operasi kritikal:
1. Pendaftaran (`pendaftarans.status`) diperbarui dari `pending` menjadi `aktif`.
2. Status pembayaran (`pembayarans.status`) diubah menjadi `verified` beserta rekaman identitas admin pemverifikasi (`verified_by`).
3. Inisialisasi Kuota Belajar: Algoritma cerdas otomatis menyisipkan rekaman ke dalam tabel `kuotas`. Jika anak tersebut merupakan **Siswa Baru**, sistem memberi nilai `sisa_sesi` sebanyak 8 (sesuai paket bulanan standar), dan mengalkulasi `estimasi_hari_h`. Namun jika statusnya **Perpanjangan Paket**, sistem mendeteksi kuota lamanya dan secara cerdas *menjumlahkan* sisa sesinya (`sisa_sesi += 8`) demi mencegah *database crash* akibat duplikasi data `hasOne`.

Sebaliknya, jika admin menekan tombol **Tolak & Hapus Pendaftaran** (`AdminPendaftaranController@reject`), sistem memicu mekanisme *Garbage Collection*:
1. Mencegah *Quota Leak*: Sistem menginspeksi pilihan jadwal anak tersebut, lalu secara proaktif mengurangi (`decrement`) nilai `terisi` pada tabel `jadwals` agar kursi kembali tersedia bagi umum.
2. Membersihkan entri `pendaftarans` dan menghapus data `siswas` apabila siswa tersebut belum memiliki riwayat kelas yang aktif sama sekali.

### Konfigurasi Penyimpanan Bukti Transfer
Agar berkas bukti pembayaran dapat dirender dengan benar di web (tidak error 404/broken), pengembang dan sysadmin harus memastikan tautan simbolis (symlink) dari `storage/app/public` menuju `public/storage` telah terpasang di peladen. Perintah yang digunakan adalah:
```bash
php artisan storage:link
```
Sistem Blade pada Panel Admin selalu memanggil berkas menggunakan asisten fungsi bawaan `asset('storage/...path...')` guna menjamin kompatibilitas URL yang seragam di berbagai lingkungan peladen.

## Master Data Admin (Kelola Siswa, Mentor, & Jadwal)

### Aturan Perlindungan Data (Strict Delete Rule)
Pada modul Master Data (Siswa, Mentor, Jadwal), sistem mengimplementasikan *Strict Delete Rule* pada fungsi `destroy` di masing-masing kontroler untuk mencegah kerusakan integritas data relasional:
- **Jadwal**: Tidak dapat dihapus jika kolom `terisi > 0` atau memiliki entri di tabel `pendaftarans`. Admin akan menerima notifikasi error *flash* jika mencoba menghapusnya.
- **Mentor**: Tidak dapat dihapus jika ID mentor tersebut masih tertaut pada slot Jadwal kelas manapun. Admin harus memindahkan atau menghapus jadwalnya terlebih dahulu.
- **Siswa**: Fitur penghapusan siswa *hanya diperbolehkan* untuk siswa yang status pendaftarannya masih `pending` (untuk membersihkan data *spam/junk*). Jika siswa sudah `aktif`, tombol hapus tidak akan muncul.

### Operasional Master Data
- **Kelola Siswa (`SiswaController`)**: Menampilkan daftar semua siswa dengan lencana status (Aktif/Pending/Tidak Ada). Detail siswa menampilkan 360-derajat data anak, termasuk sisa kuota, riwayat tagihan, dan pilihan paket.
- **Kelola Mentor (`MentorController`)**: Formulir penambahan mentor langsung membuat akun *User* baru dengan role `mentor`. Admin wajib membuat password secara manual untuk diberikan ke pengajar.
- **Kelola Jadwal (`JadwalController`)**: Admin membuat kerangka jadwal mingguan. Parameter penentu meliputi Hari, Sesi Jam, Kuota Maksimal, serta penunjukan Mentor. Visualisasi *progress bar* disediakan di UI (warna hijau jika aman, merah jika penuh) untuk melacak keterisian kelas.

## Portal Orang Tua (Parent Portal)

### Dasbor Dinamis & Manajemen State
Portal Orang Tua dibangun untuk memberikan transparansi penuh terhadap perkembangan belajar anak. Sistem ini mengimplementasikan konsep *State Management* dengan 3 kondisi dinamis pada `DashboardOrangTuaController`:
1. State A (Belum Terdaftar): Akun tanpa anak atau tanpa pendaftaran. Menyajikan tampilan sambutan (*onboarding*) dengan tombol CTA utama menuju formulir pendaftaran 7 langkah.
2. State B (Menunggu Verifikasi): Status pendaftaran bernilai `pending`. Menyajikan banner informasi peringatan berwarna kuning, melabeli kartu anak dengan status "Pending", dan mengunci seluruh tautan sidebar dengan visibilitas `disabled`.
3. State C (Aktif): Pendaftaran yang telah terverifikasi. Seluruh tautan menu terbuka secara penuh. Dasbor menampilkan *Widget* metrik "Sisa Kuota Sesi" dan "Estimasi Hari-H" yang datanya ditarik langsung dari tabel `kuotas`.

### Tampilan & Komponen Layout
Layout antarmuka utama (`resources/views/layouts/ortu.blade.php`) menggunakan struktur Sidebar dan Header. Menu navigasi di dalam Sidebar bereaksi secara pintar dengan memutus tautan (menjadi teks abu-abu berikon gembok) apabila kondisi data anak aktif dalam mode "Pending" (terkunci). Sisa kuota di-*render* secara khusus dengan tipografi tebal (5xl) beserta komponen dekoratif untuk menonjolkan fungsi operasional inti. Menu turunan (seperti Presensi, Nilai, dll) untuk sementara dialihkan ke laman *placeholder* estetik guna menjaga keutuhan pengalaman navigasi.

### Integrasi Alih Anak (Switch Student)
Bagi Orang Tua yang memiliki lebih dari satu anak, portal mendukung manajemen *Multi-Siswa* terpusat.
- Penyimpanan Status Aktif: Identifikasi anak yang sedang dipantau disimpan di dalam sesi (`session('active_siswa_id')`).
- Antarmuka Dropdown: Header atas memiliki menu dropdown yang me-render form `POST`.
- Validasi Keamanan: `SwitchSiswaController@switchSiswa` menjamin keamanan dengan memastikan ID siswa yang akan diaktifkan mutlak dimiliki oleh pengguna yang sedang masuk (`Auth::id()`) sebelum status sesi diperbarui.

## Modul Akademik & Portal Mentor

### Arsitektur Data dan Penugasan Mentor
Modul Mentor didesain berdasarkan konsep operasional "Memasangkan Siswa + Mentor + Waktu". Pada pembaruan ini, kolom `mentor_id` ditambahkan ke dalam tabel `jadwals` melalui berkas migrasi `add_mentor_id_to_jadwals_table`. 
Dengan struktur ini, proses bisnis berjalan lancar tanpa memerlukan tabel perantara (pivot table) yang rumit:
- Admin membuat sebuah slot `Jadwal` dan menugaskan seorang Mentor ke dalamnya.
- Saat Siswa/Orang Tua mendaftar, mereka memilih `Jadwal` tersebut.
- Sistem secara otomatis mengetahui bahwa siswa tersebut diajar oleh mentor yang bersangkutan.

### Dasbor Mentor dan Pengingat Tugas
Laman dasbor mentor (`DashboardMentorController`) dilengkapi algoritma pengecekan **Tugas Tertunda** harian. Sistem mendeteksi `Jadwal` mentor yang dijadwalkan pada hari ini (berdasarkan relasi hari, misal: 'Senin'), menarik semua siswa aktif yang terdaftar di jadwal tersebut, lalu memeriksa tabel `presensis` dan `catatans`. Apabila ada satu saja komponen presensi atau catatan perkembangan yang belum diisi oleh mentor di hari berjalan, sistem akan memunculkan alarm visual berwarna oranye cerah pada Dasbor Mentor.

### Algoritma Presensi dan Pergeseran Hari-H
Fitur pengisian presensi (`PresensiMentorController`) merupakan tulang punggung kalkulasi finansial di aplikasi Ruang Les. Algoritma Presensi dirancang sebagai berikut:
1. **Status Hadir**: Anak mengikuti kelas secara normal. Kolom `sisa_sesi` pada tabel `kuotas` dikurangi 1. Tanggal `estimasi_hari_h` tidak mengalami modifikasi karena prediksi kelulusan awal (saat verifikasi pembayaran) telah mengasumsikan kehadiran penuh.
2. **Status Tidak Hadir / Libur**: Anak absen (izin, sakit, alpha) atau kelas diliburkan secara nasional. Dalam kondisi ini, `sisa_sesi` tidak dikurangi sama sekali. Sebagai konsekuensinya, sistem menarik jadwal mingguan anak dari `Pendaftaran`, lalu secara otomatis menggeser (*push forward*) tanggal `estimasi_hari_h` mundur sejauh 1 jadwal pertemuan berikutnya. Mekanisme dinamis ini menjamin presisi waktu penagihan biaya bimbel oleh Admin, mencegah tagihan turun prematur akibat absensi murid.

### Manajemen Catatan Perkembangan dan Evaluasi Nilai
Selain presensi, Mentor diwajibkan untuk menyimpan riwayat akademis harian setiap pasca-sesi melalui kontroler `CatatanMentorController` dan `NilaiMentorController`:
- **Catatan Harian**: Memuat parameter kualitatif dan kuantitatif seperti materi spesifik, skor pemahaman skala 1-100, status tingkat fokus anak (radio button), hingga deteksi kendala/kesulitan belajar siswa. Seluruh data mentah (*raw data*) ini dipersiapkan sebagai material umpan mesin kecerdasan buatan (AI) yang akan menyusun paragraf laporan akhir bulan secara naratif.
- **Nilai Evaluasi**: Input reguler yang mencatat parameter nilai kuantitatif dari ujian seperti tes formatif, *try out*, maupun ulangan harian.
