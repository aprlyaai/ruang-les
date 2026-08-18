<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Generate tagihan presensi kosong (pending) untuk jadwal hari ini setiap jam 23:50
Schedule::command('attendances:generate')->dailyAt('23:50');

// Kirim tagihan pembayaran H-7, H-3, H-1, Hari H setiap jam 7 pagi
Schedule::command('cron:billing')->dailyAt('07:00');

// Kirim pengingat kelas H-1 Jam berjalan setiap awal jam
Schedule::command('cron:class')->hourly();

// Pengecekan mentor bolong setiap jam 08:00 pagi keesokan harinya
Schedule::command('cron:mentor-check')->dailyAt('08:00');
