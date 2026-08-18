<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use MemilikiKunciUtamaRancangan, HasFactory;

    protected $table = 'galeri';
    protected $primaryKey = 'galeri_id';

    protected $fillable = ['gambar', 'kategori', 'nama_gambar', 'urutan', 'status_galeri'];
}
