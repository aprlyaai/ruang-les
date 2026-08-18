<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use MemilikiKunciUtamaRancangan;

    protected $table = 'mentor';
    protected $primaryKey = 'mentor_id';

    protected $fillable = [
        'user_id',
        'no_telepon_mentor',
        'tempat_lahir_mentor',
        'tanggal_lahir_mentor',
        'jenis_kelamin_mentor',
        'alamat_mentor',
        'pendidikan_mentor',
        'spesialisasi_mentor',
        'nama_bank',
        'nomor_akun_bank',
        'nama_akun_bank',
        'status_mentor',
    ];

    public function user()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'user_id');
    }

    public function getNameAttribute(): ?string
    {
        return $this->user?->name;
    }

    public function getEmailAttribute(): ?string
    {
        return $this->user?->email;
    }

    public function getAvatarAttribute(): ?string
    {
        return $this->user?->avatar;
    }
}
