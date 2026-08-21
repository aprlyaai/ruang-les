<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use MemilikiKunciUtamaRancangan;

    protected $table = 'presensi';
    protected $primaryKey = 'presensi_id';

    protected $fillable = [
        'murid_id',
        'jadwal_id',
        'tanggal_presensi',
        'status_presensi',
        'notes_presensi'
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
