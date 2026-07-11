<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminResetPasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $username,
        public string $resetUrl,
        public int $expireMinutes = 60,
        public ?string $toEmail = null,
    ) {}

    public function envelope(): Envelope
    {
        $envelope = new Envelope(
            subject: 'Restablece tu contraseña — Koru Center',
        );

        if ($this->toEmail) {
            $envelope->to($this->toEmail);
        }

        return $envelope;
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin.reset-password',
            with: [
                'username' => $this->username,
                'resetUrl' => $this->resetUrl,
                'expireMinutes' => $this->expireMinutes,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
