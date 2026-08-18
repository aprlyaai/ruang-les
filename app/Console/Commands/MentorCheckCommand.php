<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MentorCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:mentor-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mendeteksi kelas kemarin yang presensi atau catatannya belum diisi oleh mentor';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Memulai pengecekan kedisiplinan mentor untuk kelas kemarin...');

        $yesterday = \Carbon\Carbon::yesterday();
        $hariIndo = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];
        $yesterdayDay = $hariIndo[$yesterday->format('l')];

        // Cari jadwal kelas yang seharusnya berjalan kemarin
        $schedules = \App\Models\JadwalKelas::with(['mentor', 'students'])
            ->where('hari', $yesterdayDay)
            ->where('status_jadwal', 'active')
            ->get();

        $countTeguran = 0;

        foreach ($schedules as $schedule) {
            $mentor = $schedule->mentor;
            if (!$mentor) continue;

            $missingTasks = [];

            // Cek Presensi
            $attendanceExists = \App\Models\Presensi::where('jadwal_id', $schedule->jadwal_id)
                ->whereDate('tanggal_presensi', $yesterday->format('Y-m-d'))
                ->exists();

            if (!$attendanceExists) {
                $missingTasks[] = 'Presensi';
            }

            // Cek Catatan Perkembangan (Jurnal)
            $progressNoteExists = \App\Models\CatatanPerkembangan::where('jadwal_id', $schedule->jadwal_id)
                ->whereDate('tanggal_catatan', $yesterday->format('Y-m-d'))
                ->exists();

            if (!$progressNoteExists) {
                $missingTasks[] = 'Catatan Perkembangan';
            }

            // Cek Nilai
            $scoreExists = \App\Models\Nilai::where('jadwal_id', $schedule->jadwal_id)
                ->whereDate('tanggal_penilaian', $yesterday->format('Y-m-d'))
                ->exists();

            if (!$scoreExists) {
                $missingTasks[] = 'Nilai';
            }

            // Jika ada yang bolong, kirim notifikasi & email teguran ke mentor
            if (!empty($missingTasks)) {
                try {
                    $mentor->user->notify(new \App\Notifications\MentorReminderNotification($schedule, $missingTasks));
                    \Illuminate\Support\Facades\Log::info("Teguran dikirim ke mentor {$mentor->name} karena data kelas kemarin belum lengkap: " . implode(', ', $missingTasks));
                    $countTeguran++;
                } catch (\Exception $e) {
                    $this->error("Gagal kirim teguran ke mentor {$mentor->name}: " . $e->getMessage());
                }
            }
        }

        $this->info("Pengecekan selesai. Total teguran terdeteksi: $countTeguran");
    }
}
