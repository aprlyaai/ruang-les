<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Murid;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\BillingReminderMail;

class SendBillingReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:billing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kirim email tagihan otomatis ke Orang Tua berdasarkan estimasi Hari-H (H-7, H-3, H-1, Hari H)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Memulai pengecekan tagihan pembayaran...');

        $students = Murid::with('parent.user')->where('status_murid', 'active')->get();
        $count = 0;

        $today = Carbon::today();

        foreach ($students as $student) {
            if (!$student->estimasi_hari_h) continue;

            $hDay = Carbon::parse($student->estimasi_hari_h)->startOfDay();
            // Jika tanggal H lebih besar dari hari ini, diff bernilai positif
            $diff = $today->diffInDays($hDay, false);

            if (in_array($diff, [7, 3, 1, 0])) {
                // H-7, H-3, H-1, atau Hari H (0)
                $parentEmail = $student->parent->user->email ?? null;

                if ($parentEmail) {
                    try {
                        Mail::to($parentEmail)->send(new BillingReminderMail($student, $diff));
                        $this->info("Berhasil mengirim tagihan H-{$diff} ke {$parentEmail} (Murid: {$student->nama_murid})");
                        $count++;
                    } catch (\Exception $e) {
                        $this->error("Gagal mengirim email ke {$parentEmail}: " . $e->getMessage());
                    }
                }
            }
        }

        $this->info("Selesai. Total email terkirim: $count");
    }
}
