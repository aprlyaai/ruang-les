<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JadwalKelas;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class GenerateAttendances extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendances:generate {--date= : The date to generate attendances for (Y-m-d). Defaults to today.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate pending attendance records for class schedules that occurred on a specific date.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dateStr = $this->option('date') ?: Carbon::today()->format('Y-m-d');
        $date = Carbon::parse($dateStr);

        // Convert to Indonesian day name (Senin, Selasa, etc.)
        // Carbon uses English by default for format('l'), so we map it.
        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];
        $dayName = $days[$date->format('l')];

        $this->info("Generating pending attendances for {$dayName}, {$dateStr}...");

        $schedules = JadwalKelas::with(['students', 'mentor'])->where('hari', $dayName)->where('status_jadwal', 'active')->get();

        $countGenerated = 0;

        foreach ($schedules as $schedule) {
            foreach ($schedule->students as $student) {
                // Check if attendance already exists for this student and date
                $exists = Presensi::where('jadwal_id', $schedule->jadwal_id)
                    ->where('murid_id', $student->murid_id)
                    ->whereDate('tanggal_presensi', $date->format('Y-m-d'))
                    ->exists();

                if (!$exists) {
                    Presensi::create([
                        'murid_id'      => $student->murid_id,
                        'jadwal_id'     => $schedule->jadwal_id,
                        'tanggal_presensi' => $date->format('Y-m-d'),
                        'status_presensi' => 'pending',
                        'dibuat_oleh'      => $schedule->mentor?->user_id,
                        // material_taught, score, etc remain null initially
                    ]);
                    $countGenerated++;
                }
            }
        }

        $this->info("Successfully generated {$countGenerated} pending attendance records.");
        Log::info("Command attendances:generate completed for {$dateStr}. Generated: {$countGenerated}");
    }
}
