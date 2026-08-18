<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use MemilikiKunciUtamaRancangan;

    protected $table = 'nilai';
    protected $primaryKey = 'nilai_id';

    protected $fillable = [
        'murid_id',
        'jadwal_id',
        'tanggal_penilaian',
        'tipe_nilai',
        'materi_nilai',
        'skor_nilai',
        'notes_nilai',
    ];

    public function student()
    {
        return $this->belongsTo(Murid::class, 'murid_id', 'murid_id');
    }

    public function schedule()
    {
        return $this->belongsTo(JadwalKelas::class, 'jadwal_id', 'jadwal_id');
    }
}
