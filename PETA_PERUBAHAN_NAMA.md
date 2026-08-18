# Peta Perubahan Nama

Dokumen ini merangkum perubahan penamaan kode ke Bahasa Indonesia. Seluruh import kelas, pemanggilan `view()`, `@include`, komponen Blade, konfigurasi autentikasi, factory, seeder, route, notifikasi, dan email yang terdampak telah disesuaikan.

## Model Utama

| Sebelum | Sesudah |
| --- | --- |
| `User` | `Pengguna` |
| `Student` | `Murid` |
| `ParentProfile` | `OrangTua` |
| `MentorProfile` | `Mentor` |
| `Package` | `Program` |
| `ClassSchedule` | `JadwalKelas` |
| `Attendance` | `Presensi` |
| `ProgressNote` | `CatatanPerkembangan` |
| `StudentScore` | `Nilai` |
| `Material` | `MateriBelajar` |
| `Registration` | `Pendaftaran` |
| `RegistrationDraft` | `DraftPendaftaran` |
| `Transaction` | `Transaksi` |
| `Announcement` | `Pengumuman` |
| `Feature` | `Keunggulan` |
| `Gallery` | `Galeri` |
| `Testimonial` | `Testimoni` |
| `Ticket` | `Layanan` |
| `TicketReply` | `PesanLayanan` |
| `Setting` | `Pengaturan` |

## Contoh Controller

| Sebelum | Sesudah |
| --- | --- |
| `PackageController` | `ProgramController` |
| `StudentController` | `MuridController` |
| `ParentController` | `OrangTuaController` |
| `AttendanceController` | `PresensiController` |
| `ProgressNoteController` | `CatatanPerkembanganController` |
| `RegistrationVerificationController` | `VerifikasiPendaftaranController` |
| `DashboardMentorController` | `DasborMentorController` |
| `DashboardOrangTuaController` | `DasborOrangTuaController` |
| `PublicController` | `PublikController` |
| `NotificationController` | `NotifikasiController` |

## Struktur Tampilan

- Tampilan admin menggunakan folder seperti `program`, `murid`, `orang-tua`, `jadwal-kelas`, `presensi`, `catatan-perkembangan`, `pengumuman`, `layanan`, dan `pengaturan`.
- Tampilan mentor dikelompokkan ke `dasbor`, `jadwal`, `presensi`, `catatan`, `nilai`, `materi`, `riwayat-belajar`, `layanan`, dan `profil`.
- Tampilan orang tua dipindahkan dari `ortu` ke `orang-tua` dan dikelompokkan ke `dasbor`, `kelas`, `keuangan`, `repositori`, `layanan`, dan `profil`.
- Nama umum berkas Blade diubah, misalnya `index` menjadi `daftar`, `show` menjadi `detail`, dan `form` menjadi `formulir`.

## Nama yang Sengaja Dipertahankan

Direktori standar Laravel (`app`, `resources`, `views`, `Controllers`, `Models`, `components`, dan `layouts`) tetap dipertahankan. Method resource controller seperti `index`, `store`, `show`, `update`, dan `destroy`, serta URI/nama route yang sudah dipakai aplikasi, juga tidak diubah untuk menjaga konvensi Laravel dan kompatibilitas tautan.

Setelah mengganti versi project, jalankan:

```bash
composer dump-autoload
php artisan optimize:clear
php artisan route:list
php artisan test
```
