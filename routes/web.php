<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublikController;
use App\Http\Controllers\Autentikasi\MasukController;
use App\Http\Controllers\Autentikasi\RegistrasiController;

Route::get('/', [PublikController::class, 'index']);
Route::get('/tentang-kami', [PublikController::class, 'tentangKami'])->name('tentang-kami');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [MasukController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [MasukController::class, 'login']);

    Route::get('/register', [RegistrasiController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegistrasiController::class, 'register']);
});

Route::post('/logout', [MasukController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/api/notifications/poll', [\App\Http\Controllers\NotifikasiController::class, 'poll'])->name('api.notifications.poll');

    Route::get('/pendaftaran', [\App\Http\Controllers\OrangTua\PendaftaranController::class, 'showForm'])->name('pendaftaran.form');
    Route::post('/pendaftaran', [\App\Http\Controllers\OrangTua\PendaftaranController::class, 'saveStep'])->name('pendaftaran.save');
    Route::post('/pendaftaran/autosave', [\App\Http\Controllers\OrangTua\PendaftaranController::class, 'autosave'])->name('pendaftaran.autosave');
    Route::get('/pendaftaran/sukses', function () {
        return view('pendaftaran.sukses');
    })->name('pendaftaran.sukses');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');

    // Profil Saya
    Route::get('/profile', [\App\Http\Controllers\Admin\ProfilController::class, 'index'])->name('profile.index');
    Route::put('/profile', [\App\Http\Controllers\Admin\ProfilController::class, 'update'])->name('profile.update');

    // Kelola Pendaftaran & Keuangan
    Route::get('/regist-verifications', [\App\Http\Controllers\Admin\VerifikasiPendaftaranController::class, 'index'])->name('regist-verifications.index');
    Route::get('/regist-verifications/{id}', [\App\Http\Controllers\Admin\VerifikasiPendaftaranController::class, 'show'])->name('regist-verifications.show');
    Route::post('/regist-verifications/{id}/approve', [\App\Http\Controllers\Admin\VerifikasiPendaftaranController::class, 'approve'])->name('regist-verifications.approve');
    Route::post('/regist-verifications/{id}/reject', [\App\Http\Controllers\Admin\VerifikasiPendaftaranController::class, 'reject'])->name('regist-verifications.reject');

    Route::get('/transactions', [\App\Http\Controllers\Admin\TransaksiController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/kuota', [\App\Http\Controllers\Admin\TransaksiController::class, 'kuota'])->name('transactions.kuota');
    Route::post('/transactions/kuota/remind', [\App\Http\Controllers\Admin\TransaksiController::class, 'sendReminder'])->name('transactions.remind');
    Route::post('/transactions/manual', [\App\Http\Controllers\Admin\TransaksiController::class, 'storeManual'])->name('transactions.manual');
    Route::get('/transactions/{id}', [\App\Http\Controllers\Admin\TransaksiController::class, 'show'])->name('transactions.show');
    Route::post('/transactions/{id}/verify', [\App\Http\Controllers\Admin\TransaksiController::class, 'verify'])->name('transactions.verify');
    Route::post('/transactions/{id}/reject', [\App\Http\Controllers\Admin\TransaksiController::class, 'reject'])->name('transactions.reject');

    // Pengaturan Web (Landing Page)
    Route::get('/pengaturan-web', [\App\Http\Controllers\Admin\PengaturanController::class, 'index'])->name('settings.index');
    Route::post('/pengaturan-web', [\App\Http\Controllers\Admin\PengaturanController::class, 'update'])->name('settings.update');

    // Data Master
    Route::post('/users/{id}/restore', [\App\Http\Controllers\Admin\PenggunaController::class, 'restore'])->name('users.restore');
    Route::post('/users/{id}/toggle-status', [\App\Http\Controllers\Admin\PenggunaController::class, 'toggleStatus'])->name('users.toggle-status');
    Route::post('/users/{id}/reset-password', [\App\Http\Controllers\Admin\PenggunaController::class, 'resetPassword'])->name('users.reset-password');
    Route::resource('users', \App\Http\Controllers\Admin\PenggunaController::class);
    Route::resource('mentor', \App\Http\Controllers\Admin\MentorController::class);
    Route::resource('students', \App\Http\Controllers\Admin\MuridController::class);
    Route::resource('parents', \App\Http\Controllers\Admin\OrangTuaController::class);
    Route::post('/packages/reorder', [\App\Http\Controllers\Admin\ProgramController::class, 'reorder'])->name('packages.reorder');
    Route::post('/packages/{id}/toggle-status', [\App\Http\Controllers\Admin\ProgramController::class, 'toggleStatus'])->name('packages.toggle-status');
    Route::resource('packages', \App\Http\Controllers\Admin\ProgramController::class);

    // CMS Data Master
    Route::post('/features/reorder', [\App\Http\Controllers\Admin\KeunggulanController::class, 'reorder'])->name('features.reorder');
    Route::post('/features/{id}/toggle-status', [\App\Http\Controllers\Admin\KeunggulanController::class, 'toggleStatus'])->name('features.toggle-status');
    Route::resource('features', \App\Http\Controllers\Admin\KeunggulanController::class);
    Route::post('/faqs/reorder', [\App\Http\Controllers\Admin\FaqController::class, 'reorder'])->name('faqs.reorder');
    Route::post('/faqs/{id}/toggle-status', [\App\Http\Controllers\Admin\FaqController::class, 'toggleStatus'])->name('faqs.toggle-status');
    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);
    Route::post('/testimonials/reorder', [\App\Http\Controllers\Admin\TestimoniController::class, 'reorder'])->name('testimonials.reorder');
    Route::post('/testimonials/{id}/toggle-status', [\App\Http\Controllers\Admin\TestimoniController::class, 'toggleStatus'])->name('testimonials.toggle-status');
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimoniController::class);
    Route::post('/galleries/reorder', [\App\Http\Controllers\Admin\GaleriController::class, 'reorder'])->name('galleries.reorder');
    Route::post('/galleries/{id}/toggle-status', [\App\Http\Controllers\Admin\GaleriController::class, 'toggleStatus'])->name('galleries.toggle-status');
    Route::resource('galleries', \App\Http\Controllers\Admin\GaleriController::class);

    // Akademik & KBM
    Route::resource('class-schedules', \App\Http\Controllers\Admin\JadwalKelasController::class);
    Route::post('/class-schedules/{id}/add-student', [\App\Http\Controllers\Admin\JadwalKelasController::class, 'addStudent'])->name('class-schedules.add-student');
    Route::delete('/class-schedules/{id}/remove-student/{murid_id}', [\App\Http\Controllers\Admin\JadwalKelasController::class, 'removeStudent'])->name('class-schedules.remove-student');
    Route::post('/class-schedules/{id}/remind-mentor', [\App\Http\Controllers\Admin\JadwalKelasController::class, 'remindMentor'])->name('class-schedules.remind-mentor');
    Route::get('/attendances', [\App\Http\Controllers\Admin\PresensiController::class, 'index'])->name('attendances.index');
    Route::put('/attendances/{id}', [\App\Http\Controllers\Admin\PresensiController::class, 'update'])->name('attendances.update');
    Route::delete('/attendances/{id}', [\App\Http\Controllers\Admin\PresensiController::class, 'destroy'])->name('attendances.destroy');
    Route::get('/attendances/siswa/{id}', [\App\Http\Controllers\Admin\PresensiController::class, 'showStudent'])->name('attendances.student');
    Route::get('/progress-notes', [\App\Http\Controllers\Admin\CatatanPerkembanganController::class, 'index'])->name('progress-notes.index');
    Route::post('/progress-notes', [\App\Http\Controllers\Admin\CatatanPerkembanganController::class, 'store'])->name('progress-notes.store');
    Route::get('/progress-notes/siswa/{id}', [\App\Http\Controllers\Admin\CatatanPerkembanganController::class, 'show'])->name('progress-notes.show');
    Route::put('/progress-notes/{id}', [\App\Http\Controllers\Admin\CatatanPerkembanganController::class, 'update'])->name('progress-notes.update');
    Route::delete('/progress-notes/{id}', [\App\Http\Controllers\Admin\CatatanPerkembanganController::class, 'destroy'])->name('progress-notes.destroy');


    // Evaluasi AI Per Bulan

    Route::resource('scores', \App\Http\Controllers\Admin\NilaiController::class);

    // Komunikasi & File
    Route::post('/announcements/{id}/toggle-status', [\App\Http\Controllers\Admin\PengumumanController::class, 'toggleStatus'])->name('announcements.toggle-status');
    Route::resource('announcements', \App\Http\Controllers\Admin\PengumumanController::class);
    Route::resource('repository', \App\Http\Controllers\Admin\RepositoriController::class);
    Route::get('/helpdesks', [\App\Http\Controllers\Admin\LayananController::class, 'index'])->name('helpdesks.index');
    Route::get('/helpdesks/{id}', [\App\Http\Controllers\Admin\LayananController::class, 'show'])->name('helpdesks.show');
    Route::post('/helpdesks/{id}/reply', [\App\Http\Controllers\Admin\LayananController::class, 'reply'])->name('helpdesks.reply');
    Route::post('/helpdesks/{id}/close', [\App\Http\Controllers\Admin\LayananController::class, 'close'])->name('helpdesks.close');
});

// Orang Tua / Parent Portal Routes
Route::middleware(['auth', 'role:orang_tua'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\OrangTua\DasborOrangTuaController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/switch', function () { return redirect()->route('dashboard'); });
    Route::post('/dashboard/switch', [\App\Http\Controllers\OrangTua\GantiMuridController::class, 'switchSiswa'])->name('dashboard.switch');

    // Profil Saya
    Route::get('/dashboard/profile', [\App\Http\Controllers\OrangTua\ProfilController::class, 'index'])->name('ortu.profile.index');
    Route::put('/dashboard/profile', [\App\Http\Controllers\OrangTua\ProfilController::class, 'update'])->name('ortu.profile.update');

    // Menu Akademik
    Route::get('/dashboard/jadwal', [\App\Http\Controllers\OrangTua\KelasOrangTuaController::class, 'jadwal'])->name('ortu.jadwal');
    Route::get('/dashboard/buku-akademik', [\App\Http\Controllers\OrangTua\KelasOrangTuaController::class, 'bukuAkademik'])->name('ortu.buku-akademik');

    // Menu Keuangan
    Route::get('/dashboard/tagihan', [\App\Http\Controllers\OrangTua\KeuanganOrangTuaController::class, 'tagihan'])->name('ortu.tagihan');
    Route::post('/dashboard/pembayaran/upload', [\App\Http\Controllers\OrangTua\KeuanganOrangTuaController::class, 'uploadBukti'])->name('ortu.pembayaran.upload');
    Route::get('/dashboard/riwayat', [\App\Http\Controllers\OrangTua\KeuanganOrangTuaController::class, 'riwayat'])->name('ortu.riwayat');

    // Menu Lainnya
    Route::get('/dashboard/repositori', [\App\Http\Controllers\OrangTua\RepositoriOrangTuaController::class, 'index'])->name('ortu.repositori');
    Route::get('/dashboard/layanan', [\App\Http\Controllers\OrangTua\LayananOrangTuaController::class, 'index'])->name('ortu.layanan.index');
    Route::post('/dashboard/layanan', [\App\Http\Controllers\OrangTua\LayananOrangTuaController::class, 'store'])->name('ortu.layanan.store');
    Route::get('/dashboard/layanan/{id}', [\App\Http\Controllers\OrangTua\LayananOrangTuaController::class, 'show'])->name('ortu.layanan.show');
    Route::post('/dashboard/layanan/{id}/reply', [\App\Http\Controllers\OrangTua\LayananOrangTuaController::class, 'reply'])->name('ortu.layanan.reply');
    Route::post('/dashboard/layanan/{id}/close', [\App\Http\Controllers\OrangTua\LayananOrangTuaController::class, 'close'])->name('ortu.layanan.close');
});

// Mentor Routes
Route::middleware(['auth', 'role:mentor'])->prefix('mentor')->name('mentor.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Mentor\DasborMentorController::class, 'index'])->name('dashboard');

    // Profil Saya
    Route::get('/profile', [\App\Http\Controllers\Mentor\ProfilController::class, 'index'])->name('profile.index');
    Route::put('/profile', [\App\Http\Controllers\Mentor\ProfilController::class, 'update'])->name('profile.update');
    // Akademik
    Route::get('/jadwal', [\App\Http\Controllers\Mentor\JadwalMentorController::class, 'index'])->name('jadwal');
    Route::get('/riwayat-belajar', [\App\Http\Controllers\Mentor\RiwayatBelajarController::class, 'index'])->name('riwayat-belajar');
    Route::get('/riwayat-belajar/{murid_id}', [\App\Http\Controllers\Mentor\RiwayatBelajarController::class, 'show'])->name('riwayat-belajar.show');


    // Presensi
    Route::get('/presensi', function () { return redirect()->route('mentor.jadwal'); });
    Route::get('/presensi/{id}/edit', [\App\Http\Controllers\Mentor\PresensiMentorController::class, 'edit'])->name('presensi.edit');
    Route::get('/presensi/{jadwal_id}/{siswa_id}', [\App\Http\Controllers\Mentor\PresensiMentorController::class, 'create'])->name('presensi.create');
    Route::post('/presensi', [\App\Http\Controllers\Mentor\PresensiMentorController::class, 'store'])->name('presensi.store');
    Route::put('/presensi/{id}', [\App\Http\Controllers\Mentor\PresensiMentorController::class, 'update'])->name('presensi.update');
    Route::delete('/presensi/{id}', [\App\Http\Controllers\Mentor\PresensiMentorController::class, 'destroy'])->name('presensi.destroy');

    // Catatan Perkembangan
    Route::get('/catatan', function () { return redirect()->route('mentor.jadwal'); });
    Route::get('/catatan/{id}/edit', [\App\Http\Controllers\Mentor\CatatanMentorController::class, 'edit'])->name('catatan.edit');
    Route::get('/catatan/{jadwal_id}/{siswa_id}', [\App\Http\Controllers\Mentor\CatatanMentorController::class, 'create'])->name('catatan.create');
    Route::post('/catatan', [\App\Http\Controllers\Mentor\CatatanMentorController::class, 'store'])->name('catatan.store');
    Route::put('/catatan/{id}', [\App\Http\Controllers\Mentor\CatatanMentorController::class, 'update'])->name('catatan.update');
    Route::delete('/catatan/{id}', [\App\Http\Controllers\Mentor\CatatanMentorController::class, 'destroy'])->name('catatan.destroy');

    // Nilai
    Route::get('/nilai', function () { return redirect()->route('mentor.jadwal'); });
    Route::get('/nilai/{id}/edit', [\App\Http\Controllers\Mentor\NilaiMentorController::class, 'edit'])->name('nilai.edit');
    Route::get('/nilai/{jadwal_id}/{siswa_id}', [\App\Http\Controllers\Mentor\NilaiMentorController::class, 'create'])->name('nilai.create');
    Route::post('/nilai', [\App\Http\Controllers\Mentor\NilaiMentorController::class, 'store'])->name('nilai.store');
    Route::put('/nilai/{id}', [\App\Http\Controllers\Mentor\NilaiMentorController::class, 'update'])->name('nilai.update');
    Route::delete('/nilai/{id}', [\App\Http\Controllers\Mentor\NilaiMentorController::class, 'destroy'])->name('nilai.destroy');

    // Lainnya
    Route::get('/materi', [\App\Http\Controllers\Mentor\MateriMentorController::class, 'index'])->name('materi.index');
    Route::get('/materi/{id}', [\App\Http\Controllers\Mentor\MateriMentorController::class, 'show'])->name('materi.show');

    // Layanan
    Route::get('/layanan', [\App\Http\Controllers\Mentor\LayananMentorController::class, 'index'])->name('layanan.index');
    Route::post('/layanan', [\App\Http\Controllers\Mentor\LayananMentorController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/{id}', [\App\Http\Controllers\Mentor\LayananMentorController::class, 'show'])->name('layanan.show');
    Route::post('/layanan/{id}/reply', [\App\Http\Controllers\Mentor\LayananMentorController::class, 'reply'])->name('layanan.reply');
    Route::post('/layanan/{id}/close', [\App\Http\Controllers\Mentor\LayananMentorController::class, 'close'])->name('layanan.close');
});
