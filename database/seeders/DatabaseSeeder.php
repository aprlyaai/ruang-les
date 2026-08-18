<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            FeatureSeeder::class,
            PackageSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
            GallerySeeder::class,
            ClassScheduleSeeder::class,
            TestingDataSeeder::class,
        ]);
    }
}
