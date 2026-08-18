<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use MemilikiKunciUtamaRancangan, HasFactory;

    protected $table = 'settings';
    protected $primaryKey = 'settings_id';

    protected $fillable = [
        'key',
        'value',
        'type',
        'group'
    ];

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('public.settings');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('public.settings');
        });
    }
}
