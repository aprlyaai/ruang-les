<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengguna extends Authenticatable
{
    use MemilikiKunciUtamaRancangan, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    public function jadwals()
    {
        return $this->hasManyThrough(
            JadwalKelas::class,
            Mentor::class,
            'user_id',
            'mentor_id',
            'user_id',
            'mentor_id'
        );
    }

    public function parentProfile()
    {
        return $this->hasOne(OrangTua::class, 'user_id', 'user_id');
    }

    public function students()
    {
        return $this->hasManyThrough(
            Murid::class,
            OrangTua::class,
            'user_id',
            'orangtua_id',
            'user_id',
            'orangtua_id'
        );
    }

    public function mentorProfile()
    {
        return $this->hasOne(Mentor::class, 'user_id', 'user_id');
    }

    public function getOrangtuaIdAttribute(): ?int
    {
        return $this->parentProfile?->orangtua_id;
    }

    public function getMentorIdAttribute(): ?int
    {
        return $this->mentorProfile?->mentor_id;
    }
}
