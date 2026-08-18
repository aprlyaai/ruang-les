<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use MemilikiKunciUtamaRancangan;

    protected $table = 'program';
    protected $primaryKey = 'program_id';

    protected $fillable = [
        'tipe_program',
        'nama_program',
        'kelas_program',
        'max_murid',
        'pertemuan',
        'durasi_belajar',
        'harga',
        'lokasi_belajar',
        'deskripsi_program',
        'status_program',
        'direkomendasikan',
        'urutan'
    ];

    public function getStudentCapacityLabelAttribute()
    {
        return 'Maksimal ' . $this->max_murid . ' murid per kelas';
    }



    public function schedules()
    {
        return $this->hasMany(JadwalKelas::class, 'program_id', 'program_id');
    }

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('public.packages');
        });
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('public.packages');
        });
    }
}

