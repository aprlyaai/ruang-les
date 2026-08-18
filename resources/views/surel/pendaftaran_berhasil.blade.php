<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pendaftaran Berhasil</title>
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
        .badge { display: inline-block; padding: 4px 12px; background-color: #fef3c7; color: #d97706; border-radius: 9999px; font-size: 12px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Ruang Les</h1>
            <p style="margin: 5px 0 0 0; color: #4b5563;">by Ismaturrohmah</p>
        </div>
        <div class="content">
            <h2>Halo, Ayah/Bunda/Wali {{ $registration->nama_orangtua }}!</h2>
            <p>Terima kasih telah mempercayakan pendidikan tambahan untuk anak Anda kepada Ruang Les. Kami telah menerima data pendaftaran beserta bukti pembayaran Anda.</p>

            <div class="info-box">
                <div class="info-row">
                    <span class="info-label">Nama Siswa:</span>
                    <span class="info-value">{{ $registration->nama_murid }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Kelas:</span>
                    <span class="info-value">{{ $registration->kelas }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Paket Program Belajar:</span>
                    <span class="info-value">{{ $registration->package->nama_program ?? 'Program Belajar Ruang Les' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Status:</span>
                    <span class="info-value"><span class="badge">Menunggu Verifikasi</span></span>
                </div>
            </div>

            <p>Saat ini tim Admin kami sedang melakukan pengecekan (verifikasi) bukti pembayaran Anda. Proses ini biasanya memakan waktu maksimal 1x24 jam.</p>
            <p>Kami akan mengirimkan email pemberitahuan berikutnya segera setelah akun Anda diaktifkan dan jadwal kelas resmi disusun.</p>

            <p style="margin-top: 30px;">Salam hangat,<br><strong>Tim Ruang Les</strong></p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Ruang Les by Ismaturrohmah. Semua hak cipta dilindungi.
        </div>
    </div>
</body>
</html>
