<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrangTua extends Model
{
    use MemilikiKunciUtamaRancangan, HasFactory;

    protected $table = 'orang_tua';
    protected $primaryKey = 'orangtua_id';

    protected $fillable = [
        'user_id',
        'alamat_domisili',
        'no_telepon_orangtua',
        'status_hubungan'
    ];

    public function user()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'user_id');
    }

    public function students()
    {
        return $this->hasMany(Murid::class, 'orangtua_id', 'orangtua_id');
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
