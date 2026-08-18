<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Inter', Arial, sans-serif; background-color: #f3f4f6; color: #1f2937; line-height: 1.6; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
        .header { background-color: #e0e7ff; padding: 30px; text-align: center; }
        .header h1 { color: #3730a3; margin: 0; font-size: 24px; }
        .content { padding: 30px; }
        .footer { background-color: #f9fafb; padding: 20px; text-align: center; font-size: 14px; color: #6b7280; border-top: 1px solid #e5e7eb; }
        .info-box { background-color: #f8fafc; border: 1px solid #e2e8f0; padding: 15px; border-radius: 8px; margin: 20px 0; }
        .button { display: inline-block; padding: 12px 24px; background-color: #4f46e5; color: white; text-decoration: none; border-radius: 8px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pengingat Sesi Kelas</h1>
        </div>
        <div class="content">
            @if($role == 'mentor')
                <p>Halo, <strong>{{ $schedule->mentor->name }}</strong>,</p>
                <p>Pertemuan kelas Anda akan segera dimulai dalam waktu sekitar 1 jam. Mohon persiapkan diri dan materi yang dibutuhkan.</p>
            @else
                <p>Halo, Ayah/Bunda/Wali dari <strong>{{ $student->nama_murid }}</strong>,</p>
                <p>Pertemuan belajar anak Anda akan dimulai sekitar 1 jam lagi. Mohon pastikan anak bersiap untuk mengikuti sesi belajar.</p>
            @endif

            <div class="info-box">
                <p><strong>Rincian Kelas:</strong></p>
                <ul>
                    <li><strong>Program Belajar:</strong> {{ $schedule->package->nama_program ?? '-' }}</li>
                    <li><strong>Hari:</strong> {{ $schedule->hari }}</li>
                    <li><strong>Waktu:</strong> {{ $schedule->formatted_time_range }}</li>
                </ul>
            </div>

            <center>
                <a href="{{ url('/login') }}" class="button">Masuk ke Panel Ruang Les</a>
            </center>
        </div>
        <div class="footer">
            Email ini dikirim otomatis oleh sistem Ruang Les. Mohon tidak membalas email ini secara langsung.
        </div>
    </div>
</body>
</html>
