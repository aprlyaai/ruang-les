<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\JadwalKelas;
use App\Models\Murid;

class ClassReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $schedule;
    public $role; // 'mentor' atau 'ortu'
    public $student; // Nullable if role is mentor

    /**
     * Create a new message instance.
     */
    public function __construct(JadwalKelas $schedule, $role, Murid $student = null)
    {
        $this->schedule = $schedule;
        $this->role = $role;
        $this->student = $student;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Siap-siap! Kelas Ruang Les akan dimulai dalam 1 jam lagi.",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'surel.pengingat-kelas',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
