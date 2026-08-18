Saya ingin mengembangkan fitur baru pada proyek Ruang Les: [SEBUTKAN NAMA FITUR BARU DI SINI]

Tugas ini membutuhkan audit arsitektur menyeluruh. Eksekusi harus 100% sesuai dengan realita, kokoh secara logika, elegan secara struktur (Clean Code), dan mengikuti pedoman di bawah ini tanpa kecuali (minimalkan penggunaan emoji dalam respons Anda).

Silakan patuhi Blueprint dan Standar Pengembangan berikut dalam merancang fitur ini:

1. Blueprint & Sinkronisasi Lintas Panel (UI/UX & Frontend)
- Keseragaman Visual 100%: Desain harus sinkron di seluruh panel (Admin, Mentor, Orang Tua, Publik). Gunakan warna utama Tailwind #B7D9B1. Font, ukuran teks, micro-spacing, dan layout teks harus selaras dan tidak terpecah-pecah.
- DRY Components (UI Maintenance): DILARANG menulis ulang elemen HTML secara manual. Anda WAJIB memanggil komponen yang sudah ada:
  x-admin.page-header, x-admin.empty-state, x-admin.avatar, x-admin.delete-form, x-admin.toggle-switch.
  x-ui.badge (untuk keseragaman label status lintas panel).
  x-ui.inline-error (untuk SEMUA error validasi form, DILARANG pakai Toast untuk error input wajib).
  x-ui.file-upload, x-ui.image-modal.
- Hierarki Layout: Sesuaikan layout dengan role. Panel Admin gunakan pendekatan Table View (CRUD lengkap). Panel Mentor gunakan Card/Grid View (Quick Actions). Untuk halaman berbasis interaksi/obrolan, WAJIB gunakan Flexbox Anchoring (flex-col min-h-[calc(100vh-11rem)] dan flex-1) agar form balasan menetap proporsional di bawah.
- Human-Readable Data: Singkatan database (misal 'L'/'P') wajib diterjemahkan penuh di view Blade. Dilarang menampilkan data mentah ke UI.

2. Backend, Database & Integritas Penyimpanan (Anti-Kebocoran)
- Zero Orphan Data: Saat menghapus data hierarkis (seperti Akun), pastikan profil terkait ikut terhapus menggunakan forceDelete berjenjang atau transaksi DB yang aman.
- Zero Storage Leak (Wajib Audit): Setiap logika yang melibatkan unggah file (foto profil, materi, bukti transfer, galeri) WAJIB menyertakan fungsi Storage::delete() untuk membersihkan file fisik lama dari server saat pembaruan atau penghapusan data.
- Proteksi Data Historis: Data master yang sudah berelasi dengan riwayat operasional (seperti Jadwal terikat Presensi) DILARANG keras di-hard-delete. Gunakan fitur penonaktifan (archived) untuk menjaga integritas riwayat.
- Strict Column Naming: Pemanggilan relasi tabel (terutama Paket/Kelas) harus secara ketat memanggil nama kolom yang benar (contoh: $model->package->package_name), bukan asal tebak yang dapat menyebabkan nilai null.

3. Logika & Pilar Arsitektur Ruang Les
Pastikan fitur baru ini terjalin harmonis dan TIDAK MERUSAK 6 pilar utama sistem yang ada:
1. Logika Kalender Dinamis & Pergeseran Hari-H.
2. Logika Kuota Sesi (termasuk toleransi sisa kuota negatif).
3. Evaluasi Akademik Berbasis AI.
4. Dual-Channel Notification (1-Arah untuk distribusi info, 2-Arah untuk layanan/tiket).
5. Smart Access Repository (berbasis status pembayaran & kelas).
6. Arsitektur Switch Student (Multi-Anak dalam 1 akun Ortu).
- Pembagian akses Strict Role Binding harus konsisten (Admin = Full Akses, Mentor = Parsial Sesuai Penugasan, Ortu = Terikat pada 1 Kelas).

4. Workflow Eksekusi (WAJIB DIPATUHI)
Sebagai langkah pertama, DILARANG LANGSUNG MENULIS ATAU MENGUBAH KODE.
Anda WAJIB memberikan "Implementation Plan" yang komprehensif terlebih dahulu. Plan tersebut harus memuat:
1. Rencana arsitektur database & logika.
2. Rencana desain antarmuka (komponen DRY yang akan dipakai).
3. Daftar file yang akan dibuat, diubah, atau dihapus.
4. Bagaimana memastikan tidak ada Storage Leak & Orphan Data pada fitur ini.

Saya akan me-review plan tersebut. Tunggu konfirmasi "PROCEED" dari saya sebelum Anda mulai menyentuh struktur kode.
