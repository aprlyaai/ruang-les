<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use MemilikiKunciUtamaRancangan;

    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';
    protected $guarded = [];

    protected static function booted(): void
    {
        static::creating(function ($transaction) {
            if (empty($transaction->no_invoice)) {
                $transaction->no_invoice = static::generateInvoiceNumber();
            }
        });
    }

    public static function generateInvoiceNumber(): string
    {
        $dateStr = now()->format('Ymd');
        $prefix = "INV-RL/{$dateStr}/";

        $lastInvoice = static::where('no_invoice', 'like', "{$prefix}%")
            ->orderBy('transaksi_id', 'desc')
            ->value('no_invoice');

        if ($lastInvoice && preg_match('/\/(\d{4})$/', $lastInvoice, $matches)) {
            $nextNumber = intval($matches[1]) + 1;
        } else {
            $nextNumber = 1;
        }

        return $prefix . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function student()
    {
        return $this->belongsTo(Murid::class, 'murid_id', 'murid_id');
    }

    public function user()
    {
        return $this->belongsTo(OrangTua::class, 'orangtua_id', 'orangtua_id');
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
