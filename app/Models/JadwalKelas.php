<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;

class JadwalKelas extends Model
{
    use MemilikiKunciUtamaRancangan;

    protected $table = 'jadwal_kelas';
    protected $primaryKey = 'jadwal_id';
    protected $guarded = [];

    public function package()
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id', 'mentor_id');
    }

    public function students()
    {
        return $this->belongsToMany(Murid::class, 'jadwal_murid', 'jadwal_id', 'murid_id', 'jadwal_id', 'murid_id')
                    ->withTimestamps()
                    ->orderBy('murid.nama_murid', 'asc');
    }

    public function getAvailableQuotaAttribute()
    {
        return max(0, ($this->max_murid ?? $this->package->max_murid ?? 6) - ($this->jumlah_murid ?? 0));
    }

    public function getFormattedTimeRangeAttribute()
    {
        if (!$this->waktu_belajar) return '';
        $start = substr($this->waktu_belajar, 0, 5);
        $endHour = (int)substr($start, 0, 2) + 1;
        $end = sprintf("%02d:%s", $endHour, substr($start, 3, 2));
        return $start . ' - ' . $end . ' WIB';
    }
}
