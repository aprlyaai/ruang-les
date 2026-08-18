<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Murid;

class BillingReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $diff; // H-7, H-3, dll

    /**
     * Create a new message instance.
     */
    public function __construct(Murid $student, $diff)
    {
        $this->student = $student;
        $this->diff = $diff;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $label = $this->diff == 0 ? "Hari H" : "H-{$this->diff}";
        return new Envelope(
            subject: "Tagihan Pembayaran Ruang Les - {$label} ({$this->student->nama_murid})",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'surel.pengingat-tagihan',
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
