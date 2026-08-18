<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;

class StatusBacaNotifikasi extends Model
{
    use MemilikiKunciUtamaRancangan;

    protected $table = 'status_baca_notifikasi';
    protected $primaryKey = 'status_baca_id';

    protected $fillable = [
        'user_id',
        'kunci',
        'terakhir_dibaca',
    ];

    protected $casts = [
        'terakhir_dibaca' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'user_id');
    }
}
