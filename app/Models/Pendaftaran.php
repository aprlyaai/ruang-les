<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use MemilikiKunciUtamaRancangan, HasFactory;

    protected $table = 'pendaftaran';
    protected $primaryKey = 'pendaftaran_id';

    protected $fillable = [
        'user_id',
        'nama_murid', 'panggilan_murid', 'tempat_lahir_murid', 'tanggal_lahir_murid', 'jenis_kelamin_murid', 'agama',
        'sekolah', 'kelas', 'nilai_rata_rata', 'mapel_ditingkatkan', 'mapel_sulit', 'karakteristik_anak',
        'nama_orangtua', 'status_hubungan', 'no_telepon_orangtua', 'email_orangtua', 'alamat_domisili',
        'program_id', 'jadwal_1_id', 'jadwal_2_id',
        'bukti_bayar',
        'status_pendaftaran', 'alasan_penolakan'
    ];

    public function user()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'user_id');
    }

    public function package()
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }

    public function schedule1()
    {
        return $this->belongsTo(JadwalKelas::class, 'jadwal_1_id', 'jadwal_id');
    }

    public function schedule2()
    {
        return $this->belongsTo(JadwalKelas::class, 'jadwal_2_id', 'jadwal_id');
    }
}
