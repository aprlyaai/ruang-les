<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run()
    {
        Faq::truncate();

        $faqs = [
            [
                'pertanyaan' => 'Apakah kelas bisa dilakukan di rumah murid?',
                'jawaban' => 'Ya, kami menyediakan opsi "Panggilan ke Rumah" di mana mentor kami yang akan datang langsung ke rumah Anda untuk pengalaman belajar yang lebih personal dan nyaman.',
                'urutan' => 1,
                'status_faq' => true,
            ],
            [
                'pertanyaan' => 'Bagaimana jika anak berhalangan hadir pada jadwal yang disepakati?',
                'jawaban' => 'Anda bisa melakukan penjadwalan ulang (reschedule) maksimal 24 jam sebelum kelas dimulai melalui dashboard Orang Tua tanpa khawatir akan kehilangan atau hangusnya kuota sesi belajar Anda.',
                'urutan' => 2,
                'status_faq' => true,
            ],
            [
                'pertanyaan' => 'Apakah orang tua mendapatkan laporan hasil belajar?',
                'jawaban' => 'Tentu! Kami menyediakan laporan pantauan berkala setiap selesai sesi pertemuan. Laporan mencakup detail materi, tingkat fokus anak, dan catatan khusus dari mentor yang bisa diakses langsung via portal.',
                'urutan' => 3,
                'status_faq' => true,
            ],
            [
                'pertanyaan' => 'Mata pelajaran apa saja yang diajarkan?',
                'jawaban' => 'Fokus utama kurikulum kami adalah pada mata pelajaran inti Sekolah Dasar: Matematika, Bahasa Indonesia, IPAS (Ilmu Pengetahuan Alam dan Sosial), dan Bahasa Inggris dasar.',
                'urutan' => 4,
                'status_faq' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
