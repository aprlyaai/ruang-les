<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use MemilikiKunciUtamaRancangan, HasFactory;

    protected $table = 'faq';
    protected $primaryKey = 'faq_id';

    protected $fillable = ['pertanyaan', 'jawaban', 'urutan', 'status_faq'];
    protected $guarded = ['faq_id'];

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('public.faqs');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('public.faqs');
        });
    }
}
