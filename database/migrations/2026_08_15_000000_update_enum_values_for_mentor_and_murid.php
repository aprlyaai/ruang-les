<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Expand enum options first to allow both old and new values
        DB::statement("ALTER TABLE materials MODIFY COLUMN hak_akses ENUM('Publik', 'Siswa Aktif', 'Khusus Tutor', 'Murid', 'Mentor') NOT NULL DEFAULT 'Publik'");
        DB::statement("ALTER TABLE pengumumans MODIFY COLUMN target_audience ENUM('Semua', 'Orang Tua', 'Tutor', 'Mentor') NOT NULL DEFAULT 'Semua'");

        // 2. Convert existing data to new enum values
        DB::statement("UPDATE materials SET hak_akses = 'Murid' WHERE hak_akses = 'Siswa Aktif'");
        DB::statement("UPDATE materials SET hak_akses = 'Mentor' WHERE hak_akses = 'Khusus Tutor'");
        DB::statement("UPDATE pengumumans SET target_audience = 'Mentor' WHERE target_audience = 'Tutor'");

        // 3. Shrink enum options to final values
        DB::statement("ALTER TABLE materials MODIFY COLUMN hak_akses ENUM('Publik', 'Murid', 'Mentor') NOT NULL DEFAULT 'Publik'");
        DB::statement("ALTER TABLE pengumumans MODIFY COLUMN target_audience ENUM('Semua', 'Orang Tua', 'Mentor') NOT NULL DEFAULT 'Semua'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("UPDATE materials SET hak_akses = 'Siswa Aktif' WHERE hak_akses = 'Murid'");
        DB::statement("UPDATE materials SET hak_akses = 'Khusus Tutor' WHERE hak_akses = 'Mentor'");
        DB::statement("UPDATE pengumumans SET target_audience = 'Tutor' WHERE target_audience = 'Mentor'");

        DB::statement("ALTER TABLE materials MODIFY COLUMN hak_akses ENUM('Publik', 'Siswa Aktif', 'Khusus Tutor') NOT NULL DEFAULT 'Siswa Aktif'");
        DB::statement("ALTER TABLE pengumumans MODIFY COLUMN target_audience ENUM('Semua', 'Orang Tua', 'Tutor') NOT NULL DEFAULT 'Semua'");
    }
};
