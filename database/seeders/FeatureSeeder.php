<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Keunggulan::truncate();

        $features = [
            [
                'nama_keunggulan' => 'Pendampingan Personal & Hangat',
                'deskripsi_keunggulan' => 'Tim pengajar pilihan kami membimbing dengan penuh kesabaran. Kami percaya setiap anak unik, sehingga metode mengajar selalu disesuaikan dengan karakter dan kecepatan belajar masing-masing murid.',
                'urutan' => 1
            ],
            [
                'nama_keunggulan' => 'Laporan Pantauan Berkala',
                'deskripsi_keunggulan' => 'Tidak perlu menunggu akhir bulan. Pantau daftar presensi, evaluasi fokus, hingga nilai anak secara langsung kapan saja melalui dashboard intuitif khusus untuk Orang Tua.',
                'urutan' => 2
            ],
            [
                'nama_keunggulan' => 'Penjadwalan Fleksibel',
                'deskripsi_keunggulan' => 'Pilih sendiri slot sesi pertemuan yang tersedia. Fitur otomatis pada sistem kami memastikan jadwal belajar aman, tidak bentrok, dan kuota sesi selalu terpantau.',
                'urutan' => 3
            ],
            [
                'nama_keunggulan' => 'Repositori Materi Digital',
                'deskripsi_keunggulan' => 'Akses modul pembelajaran, latihan soal interaktif, dan video pembahasan materi dari mana saja. Semua materi disusun rapi sesuai kurikulum sekolah dan kelas anak Anda.',
                'urutan' => 4
            ]
        ];

        foreach ($features as $feature) {
            \App\Models\Keunggulan::create($feature);
        }

        // Section settings
        $settings = [
            ['key' => 'features_label', 'value' => 'Kenapa Memilih Kami?', 'type' => 'text'],
            ['key' => 'features_headline', 'value' => 'Belajar Lebih Dekat, Pantau Lebih Mudah', 'type' => 'text'],
            ['key' => 'features_description', 'value' => 'Anak butuh mentor yang sabar, dan orang tua butuh kepastian. Di Ruang Les, anak Anda mendapat bimbingan yang nyaman, sementara Anda bisa memantau perkembangannya kapan saja secara online.', 'type' => 'longtext'],
        ];

        foreach ($settings as $setting) {
            \App\Models\Pengaturan::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'type' => $setting['type']]
            );
        }
    }
}
