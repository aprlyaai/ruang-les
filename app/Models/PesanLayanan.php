<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;

class PesanLayanan extends Model
{
    use MemilikiKunciUtamaRancangan;

    protected $table = 'pesan_layanan';
    protected $primaryKey = 'pesan_id';

    protected $fillable = [
        'layanan_id',
        'user_id',
        'pesan',
        'dibaca_admin',
        'dibaca_pengguna',
    ];

    protected $touches = ['ticket'];

    public function ticket()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'layanan_id');
    }

    public function user()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'user_id');
    }
}
