# Rancangan Struktur Tabel Basis Data (Sistem Bimbingan Belajar Ruang Les)

Dokumen ini memuat perancangan struktur tabel basis data lengkap yang telah diselaraskan 100% dengan **Class Diagram Penulisan Ilmiah**. Setiap tabel disajikan menggunakan format standar: `Field Name | Type | Length | Constraint | Keterangan`.

---

## Ringkasan Daftar Tabel Basis Data Sistem

| No | Nama Tabel | Nama Kelas Diagram | Fungsi Utama Operasional |
|---|---|---|---|
| 1 | `users` | `User` | Menyimpan data akun pengguna utama beserta peran (*role*: `admin`, `orang tua`, `mentor`). |
| 2 | `mentor` | `Mentor` | Menyimpan biodata lengkap, kualifikasi pengajaran, dan data rekening bank mentor/tutor. |
| 3 | `orang_tua` | `Orang Tua` | Menyimpan profil tambahan orang tua murid (alamat domisili, nomor telepon, status hubungan). |
| 4 | `murid` | `Murid` | Menyimpan data murid, kuota sesi belajar (`kuota_belajar`), serta status keaktifan murid. |
| 5 | `program` | `Program` | Menyimpan data master paket belajar (privat, semi privat, reguler, harga, durasi, kapasitas). |
| 6 | `jadwal_kelas` | `Jadwal Kelas` | Menyimpan master jadwal kelas (hari, jam sesi, kuota terisi, pengampu mentor). |
| 7 | `pendaftaran` | `Pendaftaran` | Menyimpan data formulir pendaftaran murid baru beserta pilihan paket, jadwal, dan bukti bayar. |
| 8 | `draft_pendaftaran` | `Draft Pendaftaran` | Menyimpan draf pengisian formulir pendaftaran sementara (*multi-step form*) berbasis JSON. |
| 9 | `transaksi` | `Transaksi` | Menyimpan data transaksi pembayaran paket, nomor *invoice*, bukti bayar, dan status verifikasi. |
| 10 | `presensi` | `Presensi` | Menyimpan data rekam presensi kehadiran murid per pertemuan kelas. |
| 11 | `catatan_perkembangan` | `Catatan Perkembangan` | Menyimpan catatan perkembangan belajar murid per pertemuan (materi, skor pemahaman, fokus). |
| 12 | `nilai` | `Nilai` | Menyimpan data nilai tugas, kuis, dan latihan soal harian murid. |
| 13 | `materi_belajar` | `Materi Belajar` | Menyimpan repositori materi belajar (modul, latihan soal, kunci jawaban) beserta kontrol akses. |
| 14 | `pengumuman` | `Pengumuman` | Menyimpan berita/pengumuman sistem beserta target audiens (*Semua*, *Orang Tua*, *Tutor*). |
| 15 | `layanan` | `Layanan` | Menyimpan tiket pengajuan layanan keluhan/bantuan dari Orang Tua atau Mentor. |
| 16 | `pesan_layanan` | `Pesan Layanan` | Menyimpan riwayat percakapan/balasan pesan pada tiket layanan. |
| 17 | `settings` | `Settings` | Menyimpan pengaturan konfigurasi dinamis sistem. |
| 18 | `keunggulan` | `Keunggulan` | Menyimpan data keunggulan dan fasilitas bimbingan belajar pada landing page. |
| 19 | `testimoni` | `Testimoni` | Menyimpan data testimoni dan ulasan kesan pesan orang tua/murid. |
| 20 | `faq` | `FAQ` | Menyimpan daftar pertanyaan umum (*Frequently Asked Questions*) dan jawabannya. |
| 21 | `galeri` | `Galeri` | Menyimpan dokumentasi foto kegiatan bimbingan belajar pada landing page. |

---

## Rincian Detail Struktur Tabel Basis Data

### 1. Tabel `users` (Class User)
*Menyimpan data akun utama seluruh pengguna sistem.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `user_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik akun pengguna (User ID). |
| `name` | VARCHAR | 100 | Not Null | Nama lengkap pengguna. |
| `email` | VARCHAR | 50 | Unique, Not Null | Alamat email (digunakan untuk login). |
| `password` | VARCHAR | 255 | Not Null | Kata sandi terenkripsi (Bcrypt Hash). |
| `role` | ENUM | 'admin', 'orang tua', 'mentor' | Not Null | Hak akses peran pengguna dalam sistem. |
| `avatar` | VARCHAR | 100 | Nullable | Path simpan berkas foto profil pengguna. |

---

### 2. Tabel `mentor` (Class Mentor)
*Menyimpan biodata lengkap, kualifikasi pengajaran, dan rekening bank mentor.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `mentor_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik profil mentor. |
| `user_id` | INT | - | Foreign Key (`users.user_id`), Not Null | Relasi ke ID akun pengguna (`users`). |
| `no_telepon_mentor` | VARCHAR | 20 | Nullable | Nomor telepon / WhatsApp mentor. |
| `tempat_lahir_mentor` | VARCHAR | 20 | Nullable | Tempat lahir mentor. |
| `tanggal_lahir_mentor` | DATE | - | Nullable | Tanggal lahir mentor. |
| `jenis_kelamin_mentor` | ENUM | 'Laki-laki', 'Perempuan' | Nullable | Jenis kelamin mentor. |
| `alamat_mentor` | TEXT | - | Nullable | Alamat tempat tinggal domisili mentor. |
| `pendidikan_mentor` | VARCHAR | 50 | Nullable | Latar belakang pendidikan/lulusan. |
| `spesialisasi_mentor` | VARCHAR | 50 | Nullable | Spesialisasi mata pelajaran yang diampu. |
| `nama_bank` | VARCHAR | 30 | Nullable | Nama bank pemegang rekening. |
| `nama_akun_bank` | VARCHAR | 100 | Nullable | Nama pemilik rekening bank mentor. |
| `nomor_akun_bank` | VARCHAR | 30 | Nullable | Nomor rekening bank mentor. |

---

### 3. Tabel `orang_tua` (Class Orang Tua)
*Menyimpan profil tambahan orang tua murid.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `orangtua_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik profil orang tua. |
| `user_id` | INT | - | Foreign Key (`users.user_id`), Not Null | Relasi ke ID akun pengguna (`users`). |
| `no_telepon_orangtua` | VARCHAR | 20 | Nullable | Nomor WhatsApp/kontak orang tua. |
| `alamat_domisili` | VARCHAR | 500 | Nullable | Alamat rumah domisili orang tua. |
| `status_hubungan` | VARCHAR | 50 | Nullable | Hubungan keluarga (Ayah, Ibu, Wali). |

---

### 4. Tabel `murid` (Class Murid)
*Menyimpan data murid/murid yang terikat pada akun orang tua.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `murid_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik data murid. |
| `orangtua_id` | INT | - | Foreign Key (`orang_tua.orangtua_id`), Not Null | Relasi ke ID orang tua (`orang_tua`). |
| `nama_murid` | VARCHAR | 100 | Not Null | Nama lengkap murid. |
| `panggilan_murid` | VARCHAR | 20 | Not Null | Nama panggilan murid. |
| `tempat_lahir_murid` | VARCHAR | 20 | Not Null | Tempat lahir murid. |
| `tanggal_lahir_murid` | DATE | - | Not Null | Tanggal lahir (dasar hitung usia otomatis). |
| `jenis_kelamin_murid` | ENUM | 'Laki-laki', 'Perempuan' | Not Null | Jenis kelamin murid. |
| `agama` | VARCHAR | 20 | Not Null | Agama murid. |
| `sekolah` | VARCHAR | 100 | Not Null | Nama sekolah asal murid. |
| `kelas` | VARCHAR | 10 | Not Null | Jenjang kelas SD murid. |
| `nilai_rata_rata` | DECIMAL | 5,2 | Nullable | Nilai rata-rata rapor sekolah terakhir. |
| `mapel_ditingkatkan` | VARCHAR | 100 | Nullable | Mata pelajaran yang ingin ditingkatkan. |
| `mapel_sulit` | VARCHAR | 100 | Nullable | Mata pelajaran yang dirasa sulit. |
| `karakteristik_anak` | TEXT | - | Not Null | Karakteristik / gaya belajar / catatan anak. |
| `kuota_belajar` | INT | - | Not Null, Default: 0 | Sisa kuota sesi belajar (bisa bernilai negatif). |
| `status_murid` | ENUM | 'pending', 'active', 'inactive' | Not Null | Status keaktifan murid dalam bimbingan. |

---

### 5. Tabel `program` (Class Program)
*Menyimpan data master paket bimbingan belajar.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `program_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik program paket belajar. |
| `tipe_program` | ENUM | 'Privat', 'Semi Privat', 'Reguler' | Not Null | Kategori jenis paket belajar. |
| `nama_program` | VARCHAR | 100 | Not Null | Nama paket bimbingan belajar. |
| `kelas_program` | VARCHAR | 10 | Not Null | Peruntukan tingkat kelas SD. |
| `max_murid` | INT | - | Not Null | Kapasitas maksimal murid per kelas. |
| `pertemuan` | INT | - | Not Null | Jumlah total sesi pertemuan per periode. |
| `durasi_belajar` | INT | - | Not Null | Durasi belajar per sesi (dalam menit). |
| `harga` | INT | - | Not Null | Harga / biaya paket belajar (Rp). |
| `lokasi_belajar` | VARCHAR | 10 | Not Null | Lokasi belajar (Ruang Les / Home Visit). |
| `deskripsi_program` | TEXT | - | Nullable | Deskripsi detail fasilitas paket. |
| `status_program` | ENUM | 'active', 'inactive' | Not Null | Status keaktifan program paket. |

---

### 6. Tabel `jadwal_kelas` (Class Jadwal Kelas)
*Menyimpan data master jadwal sesi kelas dan pengelompokan murid.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `jadwal_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik jadwal kelas. |
| `nama_kelas` | VARCHAR | 100 | Nullable | Nama kelas/rombel. |
| `program_id` | INT | - | Foreign Key (`program.program_id`), Not Null | Relasi ke ID program paket (`program`). |
| `mentor_id` | INT | - | Foreign Key (`mentor.mentor_id`), Nullable | Relasi ke ID mentor pengampu (`mentor`). |
| `hari` | ENUM | 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu' | Not Null | Hari pelaksanaan sesi bimbingan. |
| `waktu_belajar` | ENUM | '15:00', '16:00', '17:00', '18:00', '19:00', '20:00' | Not Null | Sesi jam dimulainya pembelajaran. |
| `max_murid` | INT | - | Not Null | Batas maksimum kuota murid. |
| `status_jadwal` | ENUM | 'active', 'full booked', 'archived' | Not Null | Status ketersediaan jadwal kelas. |

---

### 7. Tabel `pendaftaran` (Class Pendaftaran)
*Menyimpan formulir pendaftaran murid baru yang diisi oleh Orang Tua.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `pendaftaran_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik pendaftaran. |
| `user_id` | INT | - | Foreign Key (`users.user_id`), Not Null | Relasi ke ID akun orang tua pendaftar. |
| `nama_murid` | VARCHAR | 100 | Not Null | Nama lengkap calon murid. |
| `panggilan_murid` | VARCHAR | 50 | Not Null | Nama panggilan calon murid. |
| `tempat_lahir_murid` | VARCHAR | 20 | Not Null | Tempat lahir calon murid. |
| `tanggal_lahir_murid` | DATE | - | Not Null | Tanggal lahir calon murid. |
| `jenis_kelamin_murid` | ENUM | 'Laki-laki', 'Perempuan' | Not Null | Jenis kelamin calon murid. |
| `agama` | VARCHAR | 20 | Not Null | Agama calon murid. |
| `sekolah` | VARCHAR | 100 | Not Null | Sekolah asal calon murid. |
| `kelas` | VARCHAR | 10 | Not Null | Tingkat kelas SD calon murid. |
| `nilai_rata_rata` | DECIMAL | 5,2 | Nullable | Nilai rata-rata rapor sekolah. |
| `mapel_ditingkatkan` | VARCHAR | 100 | Not Null | Mapel yang ingin ditingkatkan. |
| `mapel_sulit` | VARCHAR | 100 | Not Null | Mapel yang dirasa sulit. |
| `karakteristik_anak` | TEXT | - | Not Null | Catatan khusus sifat/gaya belajar murid. |
| `nama_orangtua` | VARCHAR | 100 | Not Null | Nama lengkap orang tua/wali. |
| `email_orangtua` | VARCHAR | 50 | Not Null | Alamat email orang tua. |
| `no_telepon_orangtua` | VARCHAR | 20 | Not Null | Nomor WhatsApp/telepon orang tua. |
| `status_hubungan` | VARCHAR | 50 | Not Null | Status hubungan keluarga. |
| `alamat_domisili` | TEXT | - | Not Null | Alamat domisili tempat tinggal. |
| `program_id` | INT | - | Foreign Key (`program.program_id`), Not Null | Relasi ke ID paket belajar pilihan. |
| `jadwal_1_id` | INT | - | Foreign Key (`jadwal_kelas.jadwal_id`), Not Null | Relasi ke ID jadwal pilihan sesi 1. |
| `jadwal_2_id` | INT | - | Foreign Key (`jadwal_kelas.jadwal_id`), Not Null | Relasi ke ID jadwal pilihan sesi 2. |
| `bukti_bayar` | VARCHAR | 255 | Nullable | Path file bukti transfer pendaftaran. |
| `status_pendaftaran` | ENUM | 'pending', 'approved', 'rejected' | Not Null | Status kelayakan pengajuan pendaftaran. |
| `alasan_penolakan` | TEXT | - | Nullable | Catatan alasan penolakan dari Admin. |

---

### 8. Tabel `draft_pendaftaran` (Class Draft Pendaftaran)
*Menyimpan draf sementara formulir pendaftaran bertahap (Multi-step).*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `draft_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik draf pendaftaran. |
| `user_id` | INT | - | Foreign Key (`users.user_id`), Not Null | Relasi ke ID akun orang tua pendaftar. |
| `current_step` | INT | - | Not Null | Tahap langkah formulir terakhir. |
| `draft_data` | JSON | - | Nullable | Objek JSON berisi draf isian formulir. |

---

### 9. Tabel `transaksi` (Class Transaksi)
*Menyimpan data transaksi tagihan dan bukti pembayaran paket oleh Orang Tua.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `transaksi_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik transaksi. |
| `no_invoice` | VARCHAR | 50 | Unique, Not Null | Kode faktur tagihan unik. |
| `orangtua_id` | INT | - | Foreign Key (`orang_tua.orangtua_id`), Not Null | Relasi ke ID orang tua pembayar. |
| `murid_id` | INT | - | Foreign Key (`murid.murid_id`), Not Null | Relasi ke ID murid yang ditambah kuotanya. |
| `program_id` | INT | - | Foreign Key (`program.program_id`), Not Null | Relasi ke ID program yang dibeli. |
| `jadwal_1_id` | INT | - | Foreign Key (`jadwal_kelas.jadwal_id`), Nullable | Relasi ke ID jadwal sesi ke-1 murid. |
| `jadwal_2_id` | INT | - | Foreign Key (`jadwal_kelas.jadwal_id`), Nullable | Relasi ke ID jadwal sesi ke-2 murid. |
| `total_pembayaran` | DECIMAL | 10,2 | Not Null | Total nominal transaksi pembayaran (Rp). |
| `bukti_pembayaran` | VARCHAR | 255 | Nullable | Path berkas foto bukti transfer bank. |
| `status_transaksi` | ENUM | 'pending', 'verified', 'rejected' | Not Null | Status verifikasi pembayaran oleh Admin. |

---

### 10. Tabel `presensi` (Class Presensi)
*Menyimpan rekam presensi kehadiran murid per pertemuan kelas.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `presensi_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik presensi. |
| `murid_id` | INT | - | Foreign Key (`murid.murid_id`), Not Null | Relasi ke ID murid (`murid`). |
| `jadwal_id` | INT | - | Foreign Key (`jadwal_kelas.jadwal_id`), Not Null | Relasi ke ID jadwal kelas (`jadwal_kelas`). |
| `tanggal_presensi` | DATE | - | Not Null | Tanggal pelaksanaan sesi pertemuan les. |
| `status_presensi` | ENUM | 'hadir', 'tidak hadir', 'libur' | Not Null | Status kehadiran murid pada hari pertemuan. |
| `notes_presensi` | TEXT | - | Nullable | Catatan tambahan alasan presensi/keterangan. |

---

### 11. Tabel `catatan_perkembangan` (Class Catatan Perkembangan)
*Menyimpan catatan perkembangan belajar murid harian dari Mentor.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `catatan_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik catatan perkembangan. |
| `murid_id` | INT | - | Foreign Key (`murid.murid_id`), Not Null | Relasi ke ID murid yang dinilai. |
| `jadwal_id` | INT | - | Foreign Key (`jadwal_kelas.jadwal_id`), Nullable | Relasi ke ID jadwal kelas pertemuan. |
| `tanggal_catatan` | DATE | - | Not Null | Tanggal pertemuan pembelajaran. |
| `materi` | VARCHAR | 100 | Not Null | Pokok bahasan/materi yang dipelajari. |
| `skor_pemahaman` | INT | - | Nullable | Skor tingkat pemahaman murid (skala 1-100). |
| `status_fokus` | ENUM | 'sangat fokus', 'fokus', 'kurang fokus', 'tidak fokus' | Not Null | Kategori tingkat fokus konsentrasi anak. |
| `catatan_perkembangan` | TEXT | - | Nullable | Catatan evaluasi ringkas perkembangan anak. |

---

### 12. Tabel `nilai` (Class Nilai)
*Menyimpan data nilai tugas, kuis, dan latihan harian murid.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `nilai_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik data nilai murid. |
| `murid_id` | INT | - | Foreign Key (`murid.murid_id`), Not Null | Relasi ke ID murid yang dinilai. |
| `jadwal_id` | INT | - | Foreign Key (`jadwal_kelas.jadwal_id`), Nullable | Relasi ke ID jadwal sesi kelas. |
| `tanggal_penilaian` | DATE | - | Not Null | Tanggal pengambilan nilai. |
| `tipe_nilai` | VARCHAR | 100 | Not Null | Jenis penilaian (Kuis, PR, Latihan Soal, dll). |
| `materi_nilai` | VARCHAR | 100 | Not Null | Judul / nama tugas penilaian. |
| `skor_nilai` | INT | - | Not Null | Skor nilai perolehan angka (0 - 100). |
| `notes_nilai` | TEXT | - | Nullable | Catatan evaluasi atau feedback nilai. |

---

### 13. Tabel `materi_belajar` (Class Materi Belajar)
*Menyimpan modul dan berkas materi bimbingan belajar di repositori.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `materi_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik materi belajar. |
| `nama_materi` | VARCHAR | 150 | Not Null | Judul berkas/materi pembelajaran. |
| `kelas_materi` | ENUM | '1', '2', '3', '4', '5', '6' | Not Null | Tingkat kelas SD sasaran materi. |
| `nama_mapel` | VARCHAR | 50 | Not Null | Nama mata pelajaran. |
| `topik_bab` | VARCHAR | 100 | Nullable | Sub-topik atau bab pembahasan. |
| `tipe_materi` | ENUM | 'Modul Teori', 'Latihan Soal', 'Kunci Jawaban' | Not Null | Tipe format materi bimbingan. |
| `sumber_tautan` | ENUM | 'Google Drive', 'YouTube', 'Lainnya' | Not Null | Platform media penyimpan tautan materi. |
| `url_tautan` | TEXT | - | Not Null | Alamat URL tautan materi/video. |
| `deskripsi_materi` | TEXT | - | Nullable | Deskripsi uraian materi belajar. |
| `hak_akses` | ENUM | 'Publik', 'Murid', 'Mentor' | Not Null | Hak akses pengunduhan berkas. |
| `jumlah_klik` | INT | - | Not Null, Default: 0 | Total statistik jumlah akses/unduhan. |
| `status_materi` | ENUM | 'active', 'inactive' | Not Null | Status keaktifan materi (active/inactive). |

---

### 14. Tabel `pengumuman` (Class Pengumuman)
*Menyimpan pengumuman dan penyiaran informasi sistem.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `pengumuman_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik pengumuman. |
| `judul_pengumuman` | VARCHAR | 255 | Not Null | Judul informasi pengumuman. |
| `isi_pengumuman` | TEXT | - | Not Null | Isi lengkap informasi pengumuman. |
| `target_audience` | ENUM | 'Semua', 'Orang Tua', 'Tutor' | Not Null | Target penerima pengumuman. |
| `status_pengumuman` | ENUM | 'active', 'inactive' | Not Null | Status tayang pengumuman. |

---

### 15. Tabel `layanan` (Class Layanan)
*Menyimpan tiket pengajuan layanan keluhan / pertanyaan pengguna.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `layanan_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik tiket layanan. |
| `no_ticket` | VARCHAR | 255 | Unique, Not Null | Nomor pendaftaran tiket unik. |
| `user_id` | INT | - | Foreign Key (`users.user_id`), Not Null | Relasi ke ID pengirim tiket (Ortu / Mentor). |
| `kategori_layanan` | VARCHAR | 255 | Not Null | Kategori permasalahan tiket. |
| `subject_layanan` | VARCHAR | 255 | Not Null | Subjek / judul tiket permohonan. |
| `status_layanan` | ENUM | 'Open', 'In Progress', 'Closed' | Not Null | Status penanganan tiket layanan. |

---

### 16. Tabel `pesan_layanan` (Class Pesan Layanan)
*Menyimpan percakapan/balasan obrolan pada tiket layanan 2-arah.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `pesan_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik pesan balasan. |
| `layanan_id` | INT | - | Foreign Key (`layanan.layanan_id`), Not Null | Relasi ke ID tiket utama (`layanan`). |
| `user_id` | INT | - | Foreign Key (`users.user_id`), Not Null | Relasi ke ID pengirim pesan balasan (`users`). |
| `pesan` | TEXT | - | Not Null | Isi teks percakapan balasan. |

---

### 17. Tabel `settings` (Class Settings)
*Menyimpan variabel pengaturan dan konfigurasi sistem.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `settings_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik variabel konfigurasi. |
| `key` | VARCHAR | 255 | Unique, Not Null | Kunci variabel konfigurasi (misal: `site_name`). |
| `value` | TEXT | - | Nullable | Nilai isi variabel konfigurasi. |
| `type` | VARCHAR | 255 | Not Null | Tipe format variabel (`text`, `file`, `json`). |

---

### 18. Tabel `keunggulan` (Class Keunggulan)
*Menyimpan keunggulan dan fasilitas layanan bimbingan.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `keunggulan_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik fitur keunggulan. |
| `nama_keunggulan` | VARCHAR | 100 | Not Null | Judul keunggulan fasilitas layanan. |
| `deskripsi_keunggulan` | TEXT | - | Not Null | Deskripsi uraian detail fasilitas. |

---

### 19. Tabel `testimoni` (Class Testimoni)
*Menyimpan ulasan dan kesaksian pengalaman orang tua murid.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `testimoni_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik testimoni. |
| `nama_pemberi` | VARCHAR | 50 | Not Null | Nama orang tua murid pemberi ulasan. |
| `peran_pemberi` | VARCHAR | 50 | Not Null | Status / peran pemberi ulasan. |
| `testimoni` | TEXT | - | Not Null | Teks isi ulasan / masukan pengalaman les. |
| `rating` | INT | - | Not Null, Default: 5 | Rating jumlah bintang (skala 1 s.d 5). |

---

### 20. Tabel `faq` (Class FAQ)
*Menyimpan daftar pertanyaan umum dan jawabannya.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `faq_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik FAQ. |
| `pertanyaan` | VARCHAR | 255 | Not Null | Teks pertanyaan umum pengguna. |
| `jawaban` | TEXT | - | Not Null | Teks jawaban penjelasan FAQ. |

---

### 21. Tabel `galeri` (Class Galeri)
*Menyimpan dokumentasi foto kegiatan bimbingan belajar.*

| Field Name | Type | Length | Constraint | Keterangan |
|---|---|---|---|---|
| `galeri_id` | INT | - | Primary Key, Auto Increment, Not Null | Identitas unik foto galeri. |
| `gambar` | VARCHAR | 255 | Not Null | Path lokasi penyimpanan berkas foto. |
| `kategori` | VARCHAR | 100 | Nullable | Kategori kegiatan bimbingan. |
| `nama_gambar` | VARCHAR | 100 | Not Null | Judul / keterangan foto kegiatan. |
