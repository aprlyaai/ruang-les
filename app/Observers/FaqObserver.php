<?php

namespace App\Observers;

use App\Models\Faq;
use Illuminate\Support\Facades\Cache;

class FaqObserver
{
    private function clearCache()
    {
        Cache::forget('public.faqs');
    }

    public function created(Faq $faq): void { $this->clearCache(); }
    public function updated(Faq $faq): void { $this->clearCache(); }
    public function deleted(Faq $faq): void { $this->clearCache(); }
    public function restored(Faq $faq): void { $this->clearCache(); }
    public function forceDeleted(Faq $faq): void { $this->clearCache(); }
}
