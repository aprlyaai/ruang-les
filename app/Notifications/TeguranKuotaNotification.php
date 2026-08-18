<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeguranKuotaNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $student;
    public $sendEmail;

    /**
     * Create a new notification instance.
     */
    public function __construct($student, $sendEmail = false)
    {
        $this->student = $student;
        $this->sendEmail = $sendEmail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        $channels = ['database'];
        if ($this->sendEmail) {
            $channels[] = 'mail';
        }
        return $channels;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Peringatan Tunggakan Kuota - Ruang Les')
            ->greeting('Halo Bunda/Ayah ' . ($notifiable->name ?? ''))
            ->line('Sekadar menginfokan bahwa sesi belajar Ananda ' . $this->student->nama_murid . ' sudah melampaui kuota (Sisa: ' . $this->student->kuota_belajar . ').')
            ->line('Mohon kerjasamanya untuk penyelesaian administrasi agar operasional kami tetap berjalan lancar.')
            ->line('Terima kasih sudah mempercayakan pendidikan tambahan untuk Ananda kepada kami.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'murid_id' => $this->student->id,
            'student_name' => $this->student->nama_murid,
            'kuota_belajar' => $this->student->kuota_belajar,
            'message' => 'Sesi belajar Ananda ' . $this->student->panggilan_murid . ' telah melampaui kuota (Sisa: ' . $this->student->kuota_belajar . ')'
        ];
    }
}
