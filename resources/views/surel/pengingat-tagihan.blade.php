<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Inter', Arial, sans-serif; background-color: #f3f4f6; color: #1f2937; line-height: 1.6; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
        .header { background-color: #B7D9B1; padding: 30px; text-align: center; }
        .header h1 { color: #2C5E2A; margin: 0; font-size: 24px; }
        .content { padding: 30px; }
        .footer { background-color: #f9fafb; padding: 20px; text-align: center; font-size: 14px; color: #6b7280; border-top: 1px solid #e5e7eb; }
        .alert { background-color: #fef2f2; border-left: 4px solid #ef4444; padding: 15px; border-radius: 4px; margin: 20px 0; color: #991b1b; }
        .button { display: inline-block; padding: 12px 24px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 8px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pemberitahuan Tagihan Ruang Les</h1>
        </div>
        <div class="content">
            <p>Halo, Ayah/Bunda/Wali dari <strong>{{ $student->nama_murid }}</strong>,</p>

            <p>Sistem kami mendeteksi bahwa paket belajar anak Anda akan segera jatuh tempo dalam waktu dekat.
               Berikut rincian status kuota saat ini:</p>

            <ul>
                <li><strong>Sisa Kuota Sesi:</strong> {{ $student->kuota_belajar }} Sesi</li>
                <li><strong>Estimasi Hari-H:</strong> {{ \Carbon\Carbon::parse($student->estimasi_hari_h)->translatedFormat('l, d F Y') }}</li>
            </ul>

            <div class="alert">
                <strong>Status:</strong>
                @if($diff == 0)
                    Hari ini adalah Hari H estimasi jatuh tempo! Mohon segera lakukan pembayaran top-up.
                @else
                    Kurang dari {{ $diff }} hari menuju estimasi jatuh tempo (Hari H).
                @endif
            </div>

            <p>Untuk menghindari pemberhentian layanan belajar sementara atau nilai kuota negatif, silakan masuk ke panel Orang Tua dan lakukan Top-Up kuota melalui menu Keuangan.</p>

            <center>
                <a href="{{ url('/login') }}" class="button">Masuk ke Panel Ruang Les</a>
            </center>

            <p style="margin-top: 30px;">Salam hormat,<br>Tim Ruang Les</p>
        </div>
        <div class="footer">
            Email ini dikirim otomatis oleh sistem Ruang Les. Mohon tidak membalas email ini secara langsung.
        </div>
    </div>
</body>
</html>
