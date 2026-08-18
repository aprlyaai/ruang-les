<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimoni extends Model
{
    use MemilikiKunciUtamaRancangan, HasFactory;

    protected $table = 'testimoni';
    protected $primaryKey = 'testimoni_id';

    protected $fillable = ['nama_pemberi', 'peran_pemberi', 'testimoni', 'rating', 'urutan', 'status_testimoni'];
    protected $guarded = ['testimoni_id'];

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('public.testimonials');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('public.testimonials');
        });
    }
}
