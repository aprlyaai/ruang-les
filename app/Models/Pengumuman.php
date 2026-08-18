<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
    use MemilikiKunciUtamaRancangan, HasFactory, SoftDeletes;

    protected $table = 'pengumuman';
    protected $primaryKey = 'pengumuman_id';

    protected $fillable = [
        'judul_pengumuman',
        'isi_pengumuman',
        'target_audience',
        'diprioritaskan',
        'status_pengumuman',
        'dibuat_oleh',
    ];

    protected $casts = [
        'diprioritaskan' => 'boolean',
        'status_pengumuman' => 'boolean',
    ];

    public function author()
    {
        return $this->belongsTo(Pengguna::class, 'dibuat_oleh', 'user_id');
    }
}
