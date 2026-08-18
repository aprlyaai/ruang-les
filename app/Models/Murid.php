<?php

namespace App\Models;

use App\Models\Dukungan\MemilikiKunciUtamaRancangan;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use MemilikiKunciUtamaRancangan;

    protected $table = 'murid';
    protected $primaryKey = 'murid_id';
    protected $guarded = [];

    public function transactions()
    {
        return $this->hasMany(Transaksi::class, 'murid_id', 'murid_id');
    }

    public function classes()
    {
        return $this->belongsToMany(
            JadwalKelas::class,
            'jadwal_murid',
            'murid_id',
            'jadwal_id',
            'murid_id',
            'jadwal_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(OrangTua::class, 'orangtua_id', 'orangtua_id');
    }

    public function parent()
    {
        return $this->belongsTo(OrangTua::class, 'orangtua_id', 'orangtua_id');
    }

    public function attendances()
    {
        return $this->hasMany(Presensi::class, 'murid_id', 'murid_id');
    }

    public function scores()
    {
        return $this->hasMany(Nilai::class, 'murid_id', 'murid_id');
    }

    public function getUsiaDinamisAttribute()
    {
        if ($this->tanggal_lahir_murid) {
            return \Carbon\Carbon::parse($this->tanggal_lahir_murid)->diff(\Carbon\Carbon::now())->format('%y Tahun %m Bulan');
        }
        return null;
    }

    public function getEstimasiHariHAttribute()
    {
        $sisaSesi = $this->kuota_belajar ?? 0;
        if ($sisaSesi <= 0) {
            $offset = abs($sisaSesi);
            $targetAttendance = $this->attendances()
                ->where('status_presensi', 'hadir')
                ->orderBy('tanggal_presensi', 'desc')
                ->skip($offset)
                ->first();

            if ($targetAttendance) {
                return \Carbon\Carbon::parse($targetAttendance->tanggal_presensi)->format('Y-m-d');
            }

            // Fallback 1: Transaksi aktif terakhir
            $activeTransaction = $this->transactions()
                ->whereNotIn('status_transaksi', ['pending', 'rejected'])
                ->latest()
                ->first();
            if ($activeTransaction) {
                return \Carbon\Carbon::parse($activeTransaction->created_at)->format('Y-m-d');
            }

            // Fallback 2: Hari ini
            return \Carbon\Carbon::now()->format('Y-m-d');
        }

        // Cari transaksi aktif yang sudah di-approve/berjalan
        $activeTransaction = $this->transactions()->whereNotIn('status_transaksi', ['pending', 'rejected'])->latest()->first();
        if (!$activeTransaction) {
            // Coba ambil dari pending jika tidak ada yang aktif (untuk antisipasi)
            $activeTransaction = $this->transactions()->latest()->first();
        }

        if (!$activeTransaction) return null;

        $scheduleDays = [];
        $dayMap = [
            'Minggu' => \Carbon\Carbon::SUNDAY,
            'Senin' => \Carbon\Carbon::MONDAY,
            'Selasa' => \Carbon\Carbon::TUESDAY,
            'Rabu' => \Carbon\Carbon::WEDNESDAY,
            'Kamis' => \Carbon\Carbon::THURSDAY,
            'Jumat' => \Carbon\Carbon::FRIDAY,
            'Sabtu' => \Carbon\Carbon::SATURDAY,
        ];

        // Memuat relasi schedule secara manual untuk transaksi ini jika belum termuat
        $schedule1 = $activeTransaction->schedule1()->first();
        $schedule2 = $activeTransaction->schedule2()->first();

        if ($schedule1 && isset($dayMap[$schedule1->hari])) {
            $scheduleDays[] = $dayMap[$schedule1->hari];
        }
        if ($schedule2 && isset($dayMap[$schedule2->hari])) {
            $scheduleDays[] = $dayMap[$schedule2->hari];
        }

        if (empty($scheduleDays)) {
            // Fallback: Ambil hari dari kelas yang sedang aktif diikuti murid
            foreach ($this->classes()->where('status_jadwal', 'active')->get() as $class) {
                if (isset($dayMap[$class->hari])) {
                    $scheduleDays[] = $dayMap[$class->hari];
                }
            }
            $scheduleDays = array_unique($scheduleDays);
        }

        if (empty($scheduleDays)) return null;

        $currentDate = \Carbon\Carbon::now();
        $tempSesi = $sisaSesi;
        $maxIterations = 365;
        $iterations = 0;

        while ($tempSesi > 0 && $iterations < $maxIterations) {
            $currentDate->addDay();
            if (in_array($currentDate->dayOfWeek, $scheduleDays)) {
                $tempSesi--;
            }
            $iterations++;
        }

        if ($tempSesi == 0) {
            return $currentDate->format('Y-m-d');
        }

        return null;
    }
}
