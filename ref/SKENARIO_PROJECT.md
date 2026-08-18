KONSEP, SPESIFIKASI & HAK AKSES RUANG LES

Aplikasi ini adalah platform bimbingan belajar SD berbasis web dengan warna utama #B7D9B1, menghubungkan Admin, Mentor, dan Orang Tua.

1. Aturan Utama Sistem

- Penghitungan Umur: Umur anak dihitung dinamis (Tanggal Hari Ini - Tanggal Lahir). Database hanya menyimpan data Tanggal Lahir anak.
- Sistem Sesi Belajar: Pembayaran menggunakan sistem kuota paket 8 kali pertemuan (bukan iuran bulanan tetap). 
- Pengurangan Kuota: Presensi Hadir mengurangi kuota 1 sesi. Presensi Tidak Hadir/Libur tidak mengurangi kuota, melainkan menggeser mundur estimasi tanggal pertemuan ke-8 (Hari-H).
- Kuota Negatif: Admin tetap bisa mengabsen kehadiran walau kuota habis (kuota berkurang ke negatif). Saat kuota bernilai negatif, sistem otomatis mengirimkan pesan teguran pembayaran ke orang tua.
- Alur Pendaftaran: Formulir pendaftaran terdiri dari 7 langkah dengan fitur penyimpanan otomatis (save progress).
- Repository Materi: Orang tua hanya bisa mengakses materi sesuai kelas anaknya. Mentor memiliki akses ke seluruh kelas (1-6 SD) dan semua mapel. Tombol unduh materi hanya terbuka jika status pembayaran sudah diverifikasi aktif.

2. Spesifikasi Paket & Tarif Belajar

Pilihan paket belajar ditarik langsung dari master data paket sebagai berikut:

- Privat Kelas 1-3 SD: Belajar di Ruang Les Rp440.000 / Panggilan ke Rumah Rp600.000 (Maks 1 siswa).
- Privat Kelas 4-6 SD: Belajar di Ruang Les Rp640.000 / Panggilan ke Rumah Rp800.000 (Maks 1 siswa).
- Semi Privat Kelas 1-3 SD: Di Ruang Les Rp200.000 (Maks 2 siswa).
- Semi Privat Kelas 4-6 SD: Di Ruang Les Rp240.000 (Maks 2 siswa).
- Reguler Kelas 1-6 SD: Di Ruang Les Rp120.000 (Maks 6 siswa, minimal 4).
*Catatan: Semua tarif di atas berlaku untuk bundling 8 kali pertemuan.*

3. Jadwal & Sesi Belajar

Operasional bimbingan belajar berlangsung dari Senin sampai Sabtu dengan durasi 60 menit per sesi:

- Sesi 1: 15:00 - 16:00 WIB
- Sesi 2: 16:00 - 17:00 WIB
- Sesi 3: 17:00 - 18:00 WIB
- Sesi 4: 18:00 - 19:00 WIB
- Sesi 5: 19:00 - 20:00 WIB
- Sesi 6: 20:00 - 21:00 WIB
*Catatan: Kuota per sesi dibatasi. Jika kapasitas slot penuh, pilihan tersebut otomatis dinonaktifkan (disabled).*

4. Pembatasan Upload & Media

Ketentuan penyimpanan file untuk menghemat server:

- Dokumen (PDF, Docx): Diunggah langsung, ukuran maksimal 5MB - 10MB.
- Video: Hanya diperbolehkan berupa link YouTube (Unlisted) atau Google Drive untuk disematkan (embed).

5. Saluran & Pemicu Notifikasi

Sistem menggunakan dual-channel notifikasi:

- Notifikasi Web (In-App): Untuk pembaruan informasi operasional real-time.
- Notifikasi Email: Untuk urusan mendesak seperti bukti bayar, laporan perkembangan bulanan AI, dan tagihan.
- Pemicu Tagihan Normal: Dikirimkan otomatis pada H-7, H-3, H-1, dan Hari-H dari estimasi pertemuan ke-8.
- Pemicu Tagihan Tunggakan: Jika kuota <= 0, penagihan berbasis tanggal dihentikan dan diganti dengan pesan teguran setiap kali admin menginput kehadiran baru.
- Pengingat Sesi: Dikirim otomatis ke mentor dan orang tua 1 jam sebelum jadwal kelas dimulai.

6. Hak Akses Pengguna

Admin

Admin memiliki hak kontrol penuh terhadap operasional sistem, meliputi:

- melihat statistik operasional pada dashboard,
- mengelola CRUD konten website (CMS),
- mengelola CRUD data akun pengguna (akun login Admin, Mentor, dan Orang Tua),
- mengelola CRUD profil Mentor (biodata dan status aktif mengajar),
- mengelola CRUD profil Siswa (data anak didik yang terikat pada akun Orang Tua),
- mengelola CRUD paket program belajar,
- mengatur dan mengelola jadwal kelas,
- memantau presensi, catatan perkembangan, nilai, dan evaluasi bulanan AI,
- mengelola dan memverifikasi data pembayaran orang tua,
- mengelola CRUD materi di repository pembelajaran,
- serta merespons pesan bantuan dan menyebarkan pengumuman.

Mentor

Mentor bertugas mengelola kelas yang mereka pegang, meliputi:

- melihat jadwal mengajar yang diampu,
- menginput presensi kehadiran siswa,
- menginput catatan harian perkembangan siswa (materi, skor pemahaman, fokus, kendala),
- menginput nilai pertemuan siswa,
- membaca laporan evaluasi bulanan hasil AI (hanya lihat),
- serta mengakses, melihat pratinjau, dan mengunduh seluruh materi ajar di repository.

Orang Tua

Orang Tua (yang pendaftarannya sudah aktif) dapat:

- mendaftar akun dan mengisi formulir data anak,
- mengunggah bukti pembayaran (pengisian ulang kuota belajar),
- melihat jadwal kelas dan presensi anak,
- melihat catatan perkembangan harian dan nilai anak,
- memantau sisa kuota belajar anak,
- melihat pratinjau dan mengunduh materi belajar sesuai kelas anak (jika status aktif),
- berpindah profil anak (jika mendaftarkan lebih dari satu anak),
- serta mengirim umpan balik atau permintaan khusus ke admin.

Guest

Pengunjung yang belum masuk ke akun hanya dapat:

- melihat halaman utama profil bimbingan belajar,
- serta membuat akun baru Orang Tua.
