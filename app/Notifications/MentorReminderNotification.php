<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\JadwalKelas;

class MentorReminderNotification extends Notification
{
    use Queueable;

    protected $schedule;
    protected $missingTasks;

    /**
     * Create a new notification instance.
     */
    public function __construct(JadwalKelas $schedule, array $missingTasks)
    {
        $this->schedule = $schedule;
        $this->missingTasks = $missingTasks;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        $channels = ['database'];
        if ($notifiable->email) {
            $channels[] = 'mail';
        }
        return $channels;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $tasksText = implode(', ', $this->missingTasks);
        $timeRange = $this->schedule->formatted_time_range;
        return (new MailMessage)
            ->subject('Pengingat Kelengkapan Kelas - Ruang Les')
            ->greeting('Halo Mentor ' . ($notifiable->name ?? ''))
            ->line('Anda memiliki data kelas hari ini yang belum lengkap diisi.')
            ->line('Kelas: ' . ($this->schedule->package->nama_program ?? 'Program') . ' (' . $timeRange . ')')
            ->line('Bagian yang belum lengkap: ' . $tasksText . '.')
            ->line('Mohon segera melengkapi data murid tersebut.')
            ->action('Buka Panel Mentor', route('mentor.dashboard'))
            ->line('Terima kasih atas kerja samanya.');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        $tasksText = implode(', ', $this->missingTasks);
        return [
            'jadwal_id' => $this->schedule->id,
            'nama_kelas' => $this->schedule->nama_kelas,
            'missing_tasks' => $this->missingTasks,
            'message' => 'Segera lengkapi data kelas (' . $tasksText . ') untuk sesi ' . $this->schedule->formatted_time_range . ' hari ini.'
        ];
    }
}
