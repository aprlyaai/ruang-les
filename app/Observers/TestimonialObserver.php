<?php

namespace App\Observers;

use App\Models\Testimoni;
use Illuminate\Support\Facades\Cache;

class TestimonialObserver
{
    private function clearCache()
    {
        Cache::forget('public.testimonials');
    }

    public function created(Testimoni $testimonial): void { $this->clearCache(); }
    public function updated(Testimoni $testimonial): void { $this->clearCache(); }
    public function deleted(Testimoni $testimonial): void { $this->clearCache(); }
    public function restored(Testimoni $testimonial): void { $this->clearCache(); }
    public function forceDeleted(Testimoni $testimonial): void { $this->clearCache(); }
}
