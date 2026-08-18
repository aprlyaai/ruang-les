<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keunggulan extends Model
{
    use MemilikiKunciUtamaRancangan, HasFactory;

    protected $table = 'keunggulan';
    protected $primaryKey = 'keunggulan_id';

    protected $fillable = ['nama_keunggulan', 'deskripsi_keunggulan', 'urutan', 'status_keunggulan'];

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('public.features');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('public.features');
        });
    }
}
