# Peta Jalan (Roadmap) Penyelesaian Ruang Les v2

Dokumen ini berfungsi sebagai panduan eksekusi tahapan akhir untuk memastikan proyek selesai dengan terstruktur, 100% *End-to-End* (E2E), dan tanpa celah (fatamorgana). Semua langkah harus diselesaikan secara sekuensial (berurutan). Dilarang melompat ke fase berikutnya sebelum fase saat ini benar-benar tuntas.

---

## 🚧 FASE 1: Pelunasan "Utang Fitur" (Development Akhir)
**Fokus:** Mengerjakan bagian logika interaktif, mengaitkan *backend* (database), dan memperindah *styling* pada 15% sisa fitur yang tertinggal.
**Status saat ini:** `Selesai (Tuntas)`

- [x] **Evaluasi AI (Tuntas 100%):** Mengaitkan AI Service dengan data nyata (Catatan Perkembangan & Nilai), serta mengunci otomatis jika data mentor bolong.
- [x] **Cron Job Tagihan & Kelas (Tuntas 100%):** Pemicu pengingat tagihan dan kelas otomatis dari server, serta teguran instan kuota negatif.
- [x] **Notifikasi Email (Tuntas 100%):**
  - [x] Pembuatan `RegistrationSuccessMail` (Terkirim otomatis saat Ortu selesai mendaftar).
  - [x] Pembuatan `AccountActivatedMail` (Terkirim saat Admin memverifikasi pembayaran).
- [x] **Sistem Notifikasi In-App (Sidebar Badge & Toast) (Tuntas 100%):**
  - [x] Menyatukan seluruh peringatan (Pendaftaran, Nilai, Tiket) ke dalam *Badge* angka merah di Sidebar.
  - [x] Mengoptimalkan *polling Toast Notification* agar berjalan selaras secara *real-time* dengan Sidebar Badge.
- [x] **Sistem Deteksi Bolong (Pengingat Mentor) (Tuntas 100%):**
  - [x] Membuat Cron Job (`cron:mentor-check`) yang mendeteksi kelas kemarin yang presensi, catatan, atau nilainya belum diisi.
  - [x] Mengirimkan peringatan ke mentor terkait.
- [x] **Standarisasi UI/UX (Tahap Akhir):**
  - [x] Menyeragamkan visual *Badge Status*, *Toast Notification*, dan tata letak *Empty State* di seluruh panel.
- [x] **Audit Pembersihan Storage (Cascade File):**
  - [x] Memastikan `Storage::delete()` tereksekusi saat penghapusan/pergantian data (Foto Profil, Materi, Bukti Bayar).
---

## 🧪 FASE 2: Pengujian Skenario Penuh (End-to-End Testing)
**Fokus:** Mensimulasikan penggunaan dunia nyata.
**Status saat ini:** `Selesai (Tuntas)`

- [x] **Skenario 1 (Pendaftaran):** Mendaftar sebagai Orang Tua baru $\rightarrow$ *Upload* bukti bayar palsu $\rightarrow$ Terima email.
- [x] **Skenario 2 (Verifikasi Admin):** Admin memvalidasi data $\rightarrow$ Akun Ortu aktif $\rightarrow$ Hari-H mulai dihitung.
- [x] **Skenario 3 (Siklus Belajar):** Mentor memulai sesi $\rightarrow$ Mentor mengisi presensi & nilai $\rightarrow$ Kuota siswa terpotong otomatis.
- [x] **Skenario 4 (Sistem Teguran & Tagihan):** Kuota siswa sengaja dibuat 0 atau negatif $\rightarrow$ Sistem otomatis menembak peringatan Tagihan.
- [x] **Skenario 5 (AI Generate):** Menarik laporan AI bulanan dari catatan mentor yang terkumpul.

---

## 🔒 FASE 3: Audit Keamanan & Refactoring (Perapian)
**Fokus:** Memastikan tidak ada *bug* akses silang dan membersihkan kode sampah.
**Status saat ini:** `Selesai (Tuntas)`

- [x] Memastikan seluruh rute (Admin, Mentor, Ortu) dilindungi *Middleware* berlapis. *(Semua rute sudah terlindungi `auth` + `role` — audit konfirm)*
- [x] Mencegah ID Traversal: Menutup celah `store()` di `NilaiMentorController` dan `CatatanMentorController` yang tidak memverifikasi kepemilikan jadwal saat menerima POST.
- [x] Refactoring: Mengganti `generateAi()` di `ProgressNoteController` yang menggunakan teks hardcoded palsu dengan panggilan `AiEvaluationService` yang nyata.
- [x] Membersihkan & menyinkronkan seeder ke data aktual: `UserSeeder`, `PackageSeeder`, `ClassScheduleSeeder`, `FeatureSeeder` diupdate. Seeder testing tetap ada namun tidak dipanggil `DatabaseSeeder`.

---

## 🚀 FASE 4: Persiapan Peluncuran (Deployment)
**Fokus:** Membawa aplikasi dari status *Localhost* menjadi *Production-Ready*.
**Status saat ini:** `Belum Dimulai`

- [ ] Mengamankan `APP_DEBUG=false` di `.env`.
- [ ] Mengoptimalkan *Cache* (Routes, Views, Config) melalui `php artisan optimize`.
- [ ] Melakukan migrasi dan *Seeding* bersih untuk data siap pakai (Data Paket, Data Akun Super Admin awal).
- [ ] Pembuatan panduan/dokumentasi struktur *folder* jika dibutuhkan.

---

> **Aturan Eksekusi Bersama AI:** AI dilarang mencentang paksa kotak di dalam dokumen ini (dan `TASKLIST_FITUR.md`) tanpa bukti *testing* dan persetujuan otentik dari *User*. FOKUS SATU PERSATU.
