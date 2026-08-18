<?php

namespace App\Observers;

use App\Models\Pengaturan;
use Illuminate\Support\Facades\Cache;

class SettingObserver
{
    private function clearCache()
    {
        Cache::forget('public.settings');
    }

    public function created(Pengaturan $setting): void { $this->clearCache(); }
    public function updated(Pengaturan $setting): void { $this->clearCache(); }
    public function deleted(Pengaturan $setting): void { $this->clearCache(); }
    public function restored(Pengaturan $setting): void { $this->clearCache(); }
    public function forceDeleted(Pengaturan $setting): void { $this->clearCache(); }
}
