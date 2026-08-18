<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Akun Diaktifkan</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f3f4f6; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
        .header { background-color: #B7D9B1; padding: 30px 20px; text-align: center; }
        .header h1 { margin: 0; color: #1f2937; font-size: 24px; }
        .content { padding: 30px; color: #4b5563; line-height: 1.6; }
        .content h2 { color: #111827; font-size: 20px; margin-top: 0; }
        .info-box { background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 15px; margin: 20px 0; }
        .info-row { display: flex; margin-bottom: 8px; }
        .info-label { font-weight: bold; width: 150px; color: #374151; }
        .info-value { color: #1f2937; }
        .footer { background-color: #f9fafb; padding: 20px; text-align: center; font-size: 14px; color: #6b7280; border-top: 1px solid #e5e7eb; }
        .btn { display: inline-block; padding: 12px 24px; background-color: #4f46e5; color: #ffffff; text-decoration: none; border-radius: 8px; font-weight: bold; margin-top: 15px; }
        .badge { display: inline-block; padding: 4px 12px; background-color: #d1fae5; color: #047857; border-radius: 9999px; font-size: 12px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Ruang Les</h1>
            <p style="margin: 5px 0 0 0; color: #4b5563;">by Ismaturrohmah</p>
        </div>
        <div class="content">
            <h2>Selamat! Pendaftaran Telah Diverifikasi</h2>
            <p>Halo, Ayah/Bunda/Wali {{ $registration->nama_orangtua }}!</p>
            <p>Bukti pembayaran Anda telah berhasil diverifikasi oleh tim Ruang Les. Pendaftaran untuk ananda <strong>{{ $student->nama_murid }}</strong> kini berstatus <span class="badge">Aktif</span>.</p>

            <div class="info-box">
                <div class="info-row">
                    <span class="info-label">Nama Siswa:</span>
                    <span class="info-value">{{ $student->nama_murid }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Paket Program Belajar:</span>
                    <span class="info-value">{{ $registration->package->nama_program ?? 'Bimbel Reguler' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Kuota Pertemuan:</span>
                    <span class="info-value">{{ $student->kuota_belajar }} Sesi</span>
                </div>
            </div>

            <p>Sekarang Anda sudah dapat mengakses seluruh fitur Ruang Les melalui akun Orang Tua secara penuh untuk melihat jadwal kelas, memantau kehadiran, perkembangan belajar, nilai, serta mengunduh modul materi belajar.</p>

            <div style="text-align: center;">
                <a href="{{ url('/login') }}" class="btn">Masuk ke Dashboard</a>
            </div>

            <p style="margin-top: 30px;">Salam hangat,<br><strong>Tim Ruang Les</strong></p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Ruang Les by Ismaturrohmah. Semua hak cipta dilindungi.
        </div>
    </div>
</body>
</html>
