<?php

namespace App\Observers;

use App\Models\Program;
use Illuminate\Support\Facades\Cache;

class PackageObserver
{
    private function clearCache()
    {
        Cache::forget('public.packages');
    }

    public function created(Program $package): void { $this->clearCache(); }
    public function updated(Program $package): void { $this->clearCache(); }
    public function deleted(Program $package): void { $this->clearCache(); }
    public function restored(Program $package): void { $this->clearCache(); }
    public function forceDeleted(Program $package): void { $this->clearCache(); }
}
