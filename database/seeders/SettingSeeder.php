<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Global Site Info
            ['key' => 'site_name', 'value' => 'Ruang Les', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'by Ismaturrohmah', 'type' => 'text'],
            ['key' => 'site_logo', 'value' => 'images/logo.png', 'type' => 'image'],
            
            // SEO & Meta Tags
            ['key' => 'meta_description', 'value' => 'Ruang Les adalah platform bimbingan belajar inovatif untuk siswa SD. Tersedia program Privat, Semi Privat, dan Reguler dengan mentor berpengalaman.', 'type' => 'longtext'],
            ['key' => 'meta_keywords', 'value' => 'ruang les, bimbingan belajar, bimbel sd, les privat sd, les reguler, bimbel interaktif', 'type' => 'text'],
            ['key' => 'og_image_url', 'value' => 'images/logo.png', 'type' => 'image'],
            
            // Navigation
            ['key' => 'nav_beranda', 'value' => 'Beranda', 'type' => 'text'],
            ['key' => 'nav_pendaftaran', 'value' => 'Pendaftaran', 'type' => 'text'],
            ['key' => 'nav_tentang', 'value' => 'Tentang Kami', 'type' => 'text'],
            ['key' => 'nav_program', 'value' => 'Program Belajar', 'type' => 'text'],
            ['key' => 'nav_faq', 'value' => 'FAQ', 'type' => 'text'],
            ['key' => 'nav_kontak', 'value' => 'Kontak', 'type' => 'text'],
            ['key' => 'nav_masuk', 'value' => 'Masuk', 'type' => 'text'],
            ['key' => 'nav_registrasi', 'value' => 'Registrasi', 'type' => 'text'],

            // Hero Section
            ['key' => 'hero_label', 'value' => 'Solusi Edukasi Modern', 'type' => 'text'],
            ['key' => 'hero_headline_1', 'value' => 'Tingkatkan Prestasi Anak', 'type' => 'text'],
            ['key' => 'hero_headline_2', 'value' => 'Bersama Ruang Les', 'type' => 'text'],
            ['key' => 'hero_description', 'value' => 'Platform bimbingan belajar inovatif untuk siswa Sekolah Dasar (SD). Pantau perkembangan secara transparan, pilih jadwal fleksibel, dan dukung masa depan cerah buah hati Anda dengan metode belajar yang menyenangkan.', 'type' => 'longtext'],
            ['key' => 'hero_image', 'value' => 'images/logo.png', 'type' => 'image'],
            ['key' => 'hero_badge_text_1', 'value' => 'Rating', 'type' => 'text'],
            ['key' => 'hero_badge_text_2', 'value' => '4.9 / 5.0', 'type' => 'text'],
            ['key' => 'hero_cta_button', 'value' => 'Daftar Sekarang', 'type' => 'text'],
            ['key' => 'hero_secondary_button', 'value' => 'Lihat Program', 'type' => 'text'],

            // Fitur Section
            ['key' => 'features_label', 'value' => 'Kenapa Memilih Kami?', 'type' => 'text'],
            ['key' => 'features_headline', 'value' => 'Belajar Lebih Dekat, Pantau Lebih Mudah', 'type' => 'text'],
            ['key' => 'features_description', 'value' => 'Anak butuh mentor yang sabar, dan orang tua butuh kepastian. Di Ruang Les, anak Anda mendapat bimbingan yang nyaman, sementara Anda bisa memantau perkembangannya kapan saja secara online.', 'type' => 'longtext'],

            // Program Section
            ['key' => 'program_label', 'value' => 'Program Unggulan', 'type' => 'text'],
            ['key' => 'program_headline', 'value' => 'Pilihan Program Belajar Kami', 'type' => 'text'],
            ['key' => 'program_description', 'value' => 'Kami menyediakan program yang disesuaikan dengan kebutuhan fokus dan gaya belajar anak Anda.', 'type' => 'longtext'],

            ['key' => 'empty_program_title', 'value' => 'Belum Ada Program Belajar', 'type' => 'text'],
            ['key' => 'empty_program_desc', 'value' => 'Silakan kembali lagi nanti untuk melihat program terbaru kami.', 'type' => 'text'],

            // Testimoni Section
            ['key' => 'testimoni_label', 'value' => 'Kisah Sukses', 'type' => 'text'],
            ['key' => 'testimoni_headline', 'value' => 'Apa Kata Orang Tua Murid', 'type' => 'text'],
            ['key' => 'testimoni_description', 'value' => 'Bergabunglah dengan ratusan orang tua yang telah mempercayakan perkembangan akademik anaknya kepada kami.', 'type' => 'longtext'],

            ['key' => 'empty_testimoni', 'value' => 'Belum ada testimoni.', 'type' => 'text'],

            // FAQ Section
            ['key' => 'faq_label', 'value' => 'Pusat Bantuan', 'type' => 'text'],
            ['key' => 'faq_headline', 'value' => 'Pertanyaan Seputar Ruang Les', 'type' => 'text'],
            ['key' => 'faq_description', 'value' => 'Punya pertanyaan seputar sistem pendaftaran, metode belajar, atau harga? Temukan jawabannya di sini.', 'type' => 'longtext'],
            ['key' => 'faq_cta_headline', 'value' => 'Masih punya pertanyaan?', 'type' => 'text'],
            ['key' => 'faq_cta_description', 'value' => 'Tim layanan pelanggan kami siap membantu Anda kapan saja. Jangan ragu untuk menghubungi kami.', 'type' => 'longtext'],
            ['key' => 'faq_cta_button', 'value' => 'Hubungi Kami Sekarang', 'type' => 'text'],

            ['key' => 'empty_faq', 'value' => 'Belum ada FAQ.', 'type' => 'text'],

            // Footer Section
            ['key' => 'footer_quick_links_title', 'value' => 'Tautan Cepat', 'type' => 'text'],
            ['key' => 'footer_contact_title', 'value' => 'Hubungi Kami', 'type' => 'text'],
            ['key' => 'footer_social_title', 'value' => 'Ikuti Kami', 'type' => 'text'],
            ['key' => 'footer_description', 'value' => 'Bimbingan belajar terpadu untuk tingkat Sekolah Dasar (SD). Memfasilitasi perkembangan akademik anak dengan pendekatan modern dan transparan, memadukan peran aktif Mentor dan Orang Tua.', 'type' => 'longtext'],
            ['key' => 'footer_social_text', 'value' => 'Dapatkan info pendaftaran terbaru dan tips belajar bermanfaat.', 'type' => 'text'],
            ['key' => 'footer_address', 'value' => 'Jl. H. Shibi No.57, RT.8/RW.001, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12640', 'type' => 'text'],
            ['key' => 'footer_maps_url', 'value' => 'https://maps.app.goo.gl/aDJuA9EVNvj6JDpB9?g_st=aw', 'type' => 'text'],
            ['key' => 'footer_email', 'value' => 'ruanglesismaturrohmah@gmail.com', 'type' => 'text'],
            ['key' => 'footer_whatsapp', 'value' => '6281319076124', 'type' => 'text'],
            ['key' => 'footer_instagram_url', 'value' => '@ruangles.id', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            \App\Models\Pengaturan::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'type' => $setting['type']]
            );
        }
    }
}
