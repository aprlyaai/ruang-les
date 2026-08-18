<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Galeri::truncate();

        $galleries = [
        ];

        foreach ($galleries as $gallery) {
            \App\Models\Galeri::create($gallery);
        }
    }
}
