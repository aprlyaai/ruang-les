<?php

namespace App\Observers;

use App\Models\Galeri;
use Illuminate\Support\Facades\Cache;

class GalleryObserver
{
    private function clearCache()
    {
        Cache::forget('public.galleries');
    }

    public function created(Galeri $gallery): void { $this->clearCache(); }
    public function updated(Galeri $gallery): void { $this->clearCache(); }
    public function deleted(Galeri $gallery): void { $this->clearCache(); }
    public function restored(Galeri $gallery): void { $this->clearCache(); }
    public function forceDeleted(Galeri $gallery): void { $this->clearCache(); }
}
