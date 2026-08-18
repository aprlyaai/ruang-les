<?php

namespace App\Observers;

use App\Models\Keunggulan;
use Illuminate\Support\Facades\Cache;

class FeatureObserver
{
    private function clearCache()
    {
        Cache::forget('public.features');
    }

    public function created(Keunggulan $feature): void { $this->clearCache(); }
    public function updated(Keunggulan $feature): void { $this->clearCache(); }
    public function deleted(Keunggulan $feature): void { $this->clearCache(); }
    public function restored(Keunggulan $feature): void { $this->clearCache(); }
    public function forceDeleted(Keunggulan $feature): void { $this->clearCache(); }
}
