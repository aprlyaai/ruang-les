<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Ditolak</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>Halo, {{ $pendaftaran->nama_orangtua }}</h2>

    <p>Terima kasih telah mendaftar di Ruang Les untuk ananda <strong>{{ $pendaftaran->nama_murid }}</strong>.</p>

    <p>Mohon maaf, pendaftaran Anda saat ini tidak dapat kami proses (Ditolak) dengan alasan sebagai berikut:</p>

    <div style="background-color: #fce4e4; padding: 15px; border-left: 4px solid #f44336; margin: 20px 0;">
        <strong>Alasan Penolakan:</strong><br>
        {{ $pendaftaran->alasan_penolakan }}
    </div>

    <p>Jika ada pertanyaan atau Anda merasa ada kekeliruan, silakan hubungi tim Ruang Les melalui daftar kontak kami.</p>

    <p>Terima kasih atas pengertiannya.</p>
    <br>
    <p>Hormat kami,</p>
    <p><strong>Tim Ruang Les</strong></p>
</body>
</html>
