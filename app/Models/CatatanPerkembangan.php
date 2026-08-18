<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;

class CatatanPerkembangan extends Model
{
    use MemilikiKunciUtamaRancangan;

    protected $table = 'catatan_perkembangan';
    protected $primaryKey = 'catatan_id';

    protected $fillable = [
        'murid_id',
        'jadwal_id',
        'mentor_id',
        'tanggal_catatan',
        'materi',
        'skor_pemahaman',
        'status_fokus',
        'catatan_perkembangan'
    ];

    public function student()
    {
        return $this->belongsTo(Murid::class, 'murid_id', 'murid_id');
    }

    public function schedule()
    {
        return $this->belongsTo(JadwalKelas::class, 'jadwal_id', 'jadwal_id');
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id', 'mentor_id');
    }
}
