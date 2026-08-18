<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JadwalKelas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClassReminderMail;

class SendClassReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:class';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kirim pengingat kelas H-1 Jam ke Mentor dan Orang Tua murid.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Memulai pengecekan jadwal kelas H-1 Jam...');

        $now = Carbon::now();
        $targetTime = $now->copy()->addHour(); // 1 jam dari sekarang

        // Translasi hari ke format Indonesia ('Senin', 'Selasa', dll)
        $hariIndo = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];
        $todayIndo = $hariIndo[$now->format('l')];

        // Format target time ke H:00 (karena jadwal kelas tepat jam e.g. 15:00)
        $targetTimeStr = $targetTime->format('H:00');

        $schedules = JadwalKelas::with(['mentor', 'students.parent.user'])
            ->where('hari', $todayIndo)
            ->where('waktu_belajar', $targetTimeStr)
            ->where('status_jadwal', 'active')
            ->get();

        $countEmail = 0;

        foreach ($schedules as $schedule) {
            // Kirim ke Mentor
            if ($schedule->mentor && $schedule->mentor->email) {
                try {
                    Mail::to($schedule->mentor->email)->send(new ClassReminderMail($schedule, 'mentor'));
                    $countEmail++;
                } catch (\Exception $e) {
                    $this->error("Gagal kirim ke mentor {$schedule->mentor->name}: " . $e->getMessage());
                }
            }

            // Kirim ke Orang Tua murid di kelas tersebut
            foreach ($schedule->students as $student) {
                if ($student->status_murid === 'active' && $student->parent && $student->parent->user && $student->parent->user->email) {
                    try {
                        Mail::to($student->parent->user->email)->send(new ClassReminderMail($schedule, 'ortu', $student));
                        $countEmail++;
                    } catch (\Exception $e) {
                        $this->error("Gagal kirim ke ortu {$student->nama_murid}: " . $e->getMessage());
                    }
                }
            }
        }

        $this->info("Selesai. Total pengingat kelas terkirim: $countEmail");
    }
}
