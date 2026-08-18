# Aturan Utama Project Ruang Les

1. Sebelum menulis kode atau membuat file baru, kamu WAJIB membaca KONSEP_BIMBEL.md, TECH_STACK.md, dan STRUKTUR_FOLDER.md.
2. Gunakan warna utama #B7D9B1 pada Tailwind CSS.
3. Ikuti standar arsitektur Laravel MVC dan best practices PHP.
4. Jangan mengubah logika perhitungan usia otomatis, sisa kuota negatif, dan pergeseran Hari-H tanpa persetujuan.
5. Untuk setiap tugas baru yang kompleks, kamu WAJIB menampilkan "Implementation Plan" terlebih dahulu dan menunggu persetujuan saya sebelum menulis kode atau mengubah file.
6. Jika instruksi ambigu, tanyakan terlebih dahulu sebelum menulis kode.

# Ruang Les UI/UX & Backend Admin Standards

Saat memodifikasi panel admin dan controller, WAJIB ikuti aturan ini:

1. DRY Components (Tinggal Panggil Aja): Dilarang menulis HTML manual secara berulang. Wajib gunakan komponen UI yang sudah ada:
   - x-admin.page-header untuk semua judul halaman.
   - x-admin.empty-state untuk tabel kosong.
   - x-admin.avatar untuk foto profil pengguna.
   - x-admin.delete-form untuk tombol hapus.
   - x-admin.toggle-switch untuk on/off.
   - x-ui.inline-error untuk SEMUA pesan error form (Admin, Mentor, Ortu, Publik).
   - x-ui.file-upload untuk area unggah dokumen berukuran besar (Drag & Drop).
   - x-ui.badge untuk menyeragamkan SEMUA label status (warna primary, warning, danger, gray) lintas panel.
   - x-ui.image-modal untuk fitur lightbox / pratinjau gambar layar penuh secara instan.

2. Global Scripts (SweetAlert): Dilarang copy-paste script konfirmasi SweetAlert di setiap file index.blade.php. Script global sudah terpasang di layouts/admin.blade.php. Cukup tambahkan class .delete-form atau .reset-password-form di tag form Anda.

3. Backend Data Integrity: 
   - Wajib menggunakan forceDelete secara cascade (menghapus profil terkait seperti mentorProfile) saat menghapus Akun Pengguna (Users).
   - Selalu bersihkan/hapus file gambar lama dari Storage server saat mengganti atau menghapus foto profil.
   - Halaman Kelola Pengguna hanya untuk tabel 'users'. Gunakan DB::transaction jika ingin membuat tabel 'users' dan profil terkaitnya sekaligus (misalnya dari halaman Data Mentor).
   - Perlindungan Data Historis (Anti-Delete): Dilarang keras melakukan hard-delete pada data master (seperti Jadwal Kelas atau Paket) jika data tersebut sudah berelasi dengan data operasional historis (seperti Presensi atau Tagihan). Jika sudah memiliki rekam jejak, data hanya boleh dinonaktifkan (diarsipkan).
   - Ekspansi Pembersihan Storage: Wajib membersihkan/menghapus file lama dari Storage server (menggunakan `Storage::delete()`) pada SEMUA modul yang menggunakan file/gambar (seperti Pengumuman, Galeri, Materi Belajar, dan Bukti Transfer Pendaftaran), tidak terbatas hanya pada foto profil pengguna.

4. UI/UX Consistency & Cross-Panel Synchronization:
   - Keseragaman Visual: Komponen UI (seperti Badge Status, Empty State, atau Tag Kategori) yang menghubungkan fitur yang sama lintas panel (Admin, Mentor, Orang Tua) WAJIB 100% identik secara visual (warna, font, margin).
   - Penyesuaian Konteks Tata Letak (Table vs Card): Meskipun visual identik, struktur tata letak BOLEH dan HARUS disesuaikan dengan konteks peran. Panel Admin (Kelola Data Master) lebih cocok menggunakan Table View (Daftar CRUD lengkap). Sedangkan Panel Mentor (Ruang Operasional Harian) lebih cocok menggunakan Card/Grid View yang berfokus pada aksi cepat (Quick Actions).
   - Logika Notifikasi (1-Arah vs 2-Arah): 
     * Fitur Komunikasi/Tiket (Layanan) WAJIB bersistem 2-Arah (Pengirim dan Penerima sama-sama mendapat badge notifikasi). 
     * Fitur Distribusi Konten/Data (Jadwal Kelas, Materi Belajar) cukup bersistem 1-Arah (Hanya penerima/Mentor/Ortu yang mendapat badge notifikasi, sedangkan Admin sebagai pembuat data tidak perlu).

5. Clean UX & Notification Standards:
   - Anti-Redundant Toast: DILARANG KERAS menggunakan Toast Notification untuk menampilkan error validasi form dasar (misal: kolom wajib diisi). Gunakan Inline Errors (teks merah di bawah input) untuk validasi form. Toast hanya diperuntukkan bagi status Sukses Final atau Error Sistem berskala global.
   - Toleransi Duplikasi Tiket: Fitur pengiriman keluhan/tiket harus menerima data ganda (spamming tidak sengaja) dengan cara menghasilkan `ticket_number` yang unik untuk setiap baris, demi menghindari konflik database (Crash).

6. Laravel Routing & Sidebar Active State:
   - Wildcard Route Trap: Saat menentukan active state (menyala) pada menu Sidebar menggunakan `request()->routeIs()`, DILARANG HANYA mengandalkan format wildcard jika rute utamanya tidak berakhiran `.index`. 
   - WAJIB daftarkan rute induk dan anak sekaligus di dalam fungsi (Contoh yang benar: `request()->routeIs('mentor.jadwal', 'mentor.jadwal.*')`) untuk mencegah menu mati saat berada di halaman utama indeks.

7. Aturan Rendering Singkatan Database (Human-Readable Data):
   - Data dari database yang berupa karakter singkatan (seperti kolom `gender` yang berisi 'L' atau 'P') WAJIB diterjemahkan/diekspansi secara eksplisit di View (Blade) menjadi teks utuh yang ramah pengguna (misal: "Laki-laki" / "Perempuan"). Dilarang menampilkan singkatan mentah ke layar pengguna akhir.

8. Aturan Pemanggilan Relasi Spesifik (Strict Column Naming):
   - Saat memanggil relasi ke tabel spesifik (contoh: Package/Paket), WAJIB secara ketat memanggil nama kolom sesuai skema (misal: `$model->package->package_name`). DILARANG KERAS menebak nama kolom (misalnya asal memanggil `->name`) karena dapat memicu bug nilai null dan memunculkan fallback teks cadangan secara tidak terduga.

9. Chat / Conversation UI Layout (Flexbox Anchoring):
   - Setiap membuat halaman percakapan atau obrolan (seperti Helpdesk/Layanan), WAJIB menggunakan struktur Flexbox penuh pada layout (contoh: `flex flex-col min-h-[calc(100vh-11rem)]` pada pembungkus dan `flex-1` pada ruang obrolan) agar Form Balasan selalu terdorong dan menetap (*anchored*) secara proporsional di dasar layar, terlepas dari seberapa sedikit jumlah pesan yang ada.

10. Hak Akses Resolusi 2-Arah (Close Ticket Rights):
    - Pada fitur interaktif 2-arah seperti Tiket Bantuan (Helpdesk), DILARANG memberikan hak sentralistik penutupan tiket hanya kepada Admin. Baik pengirim (Orang Tua / Mentor) maupun penerima (Admin) WAJIB sama-sama memiliki tombol/hak untuk "Menutup Tiket (Selesai)" secara mandiri jika mereka merasa isu/keluhan sudah terselesaikan.

11. Terminologi & Hierarki Paket Belajar (Strict Role Binding):
    - WAJIB membedakan secara ketat dan konsisten antara: (1) Kategori (Privat/Semi Privat/Reguler), (2) Nama Paket, (3) Nama Kelas, dan (4) Evaluasi Akademik Berbasis AI (Modul Evaluasi: presensi, catatan perkembangan, nilai). Selalu sebutkan secara utuh dan jangan dicampuradukkan.
    - Pahami pembagian akses: Admin memegang kontrol penuh atas semua level. Mentor hanya memegang sebagian Kategori/Paket/Kelas yang ditugaskan (serta berwenang input materi, presensi, catatan perkembangan, dan nilai). Orang Tua (Siswa) terikat mutlak pada 1 Kategori, 1 Paket, 1 Kelas (berjalan dalam 2 hari pertemuan). Jangan membuat kolom UI yang redundan.

12. Pilar Arsitektur Utama (Core Architecture Pillars):
    - Dilarang keras merusak, menghapus, atau mengubah 5 logika inti berikut tanpa persetujuan eksplisit: (1) Logika Kalender Dinamis & Pergeseran Hari H (Hari H memakai hari dan tanggal sesuai kalender), (2) Sistem Kuota Sesi (Fleksibilitas nilai negatif), (3) Dual-Channel Notification System, (4) Smart Access Repository (berbasis status pembayaran & kelas), dan (5) Arsitektur Switch Student (Multi-Anak dalam 1 akun). Seluruh pengembangan fitur baru wajib mendukung dan tidak boleh bertabrakan dengan kelima pilar ini.

13. Prinsip DRY (Don't Repeat Yourself) code.
14. kode yang dipakai dan digunakan berulang kali dan sama baik itu di satu halaman maupun beda halaman jadi tinggal panggil aja.
15. isi yang perlu diperhatikan dan saling sama diseragamkan dengan semua panel dan semua halaman: Frontend, UI/UX, Backend, Logika, Database, Fitur, Fungsi, Wording, Teks, Warna, Font, Makro, Micro-Spacing & Layout Teks.
16. Pastikan sudah 100% sama-sama saling seragam dan saling terhubung terkoneksi semua panel dan semua halaman.
17. INGET! HANYA FOKUS APA YANG DI DISKUSIKAN YA. TIDAK USAH NGUBAH DAN SENGGOL YANG LAIN, BIARKAN SAJA.

# Ruang Les Penulisan Ilmiah
1. Bertindaklah sebagai asisten penulis akademis ahli untuk menyusun semua bab pada dokumen Penulisan Ilmiah (PI) Diploma 3.
2. Semua info penting mengenai kepenulisan ini bisa dilihat dan dipahami pada folder penulisan_ilmiah khususnya file "Pedoman Penulisan PI D3MI-2025.pdf" dan file "PPT BimTek PI 20260418.pdf". 
3. Untuk mengenai ruang les ini bisa dibaca dan dipahami kodenya. selain dari situ bisa pahami info yang ada pada folder penulisan_ilmiah khususnya file "wawancara1.txt" dan file "wawancara2.txt".
4. Untuk informasi pendukungnya ada bab 1 dan bab 2 yang telah aku buat sebelumnya untuk Penulisan Ilmiah (PI) ini, 2 bab ini bisa kamu lihat pada folder penulisan_ilmiah khususnya file "pi_bab1.txt" dan file "pi_bab2.txt".
5. Sumber jawabannya bisa berdasarkan sistem ruang les yang sudah diterapkan saat ini ya.