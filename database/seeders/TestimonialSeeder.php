<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimoni;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        Testimoni::truncate();

        $testimonials = [
        ];

        foreach ($testimonials as $testimonial) {
            Testimoni::create($testimonial);
        }
    }
}
