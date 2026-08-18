<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;

class MateriBelajar extends Model
{
    use MemilikiKunciUtamaRancangan;

    protected $table = 'materi_belajar';
    protected $primaryKey = 'materi_id';

    protected $fillable = [
        'nama_materi',
        'kelas_materi',
        'nama_mapel',
        'topik_bab',
        'tipe_materi',
        'sumber_tautan',
        'url_tautan',
        'deskripsi_materi',
        'hak_akses',
        'status_materi',
        'diunggah_oleh',
        'jumlah_klik',
    ];

    public function uploader()
    {
        return $this->belongsTo(Pengguna::class, 'diunggah_oleh', 'user_id');
    }
}
