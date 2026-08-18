<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use MemilikiKunciUtamaRancangan;

    protected $table = 'layanan';
    protected $primaryKey = 'layanan_id';

    protected $fillable = [
        'no_ticket',
        'user_id',
        'kategori_layanan',
        'subject_layanan',
        'status_layanan',
    ];

    protected static function booted(): void
    {
        static::creating(function ($ticket) {
            if (empty($ticket->no_ticket)) {
                $ticket->no_ticket = static::generateTicketNumber();
            }
        });
    }

    public static function generateTicketNumber(): string
    {
        $dateStr = now()->format('Ymd');
        $prefix = "TKT-RL/{$dateStr}/";

        $lastTicket = static::where('no_ticket', 'like', "{$prefix}%")
            ->orderBy('layanan_id', 'desc')
            ->value('no_ticket');

        if ($lastTicket && preg_match('/\/(\d{4})$/', $lastTicket, $matches)) {
            $nextNumber = intval($matches[1]) + 1;
        } else {
            $nextNumber = 1;
        }

        return $prefix . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function user()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(PesanLayanan::class, 'layanan_id', 'layanan_id');
    }

    public function hasUnreadReplies()
    {
        return $this->replies->where('dibaca_admin', false)->where('user_id', '!=', auth()->id())->count() > 0;
    }
}
