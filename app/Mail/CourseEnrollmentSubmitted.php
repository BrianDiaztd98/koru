<?php

namespace App\Mail;

use App\Models\CourseEnrollment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class CourseEnrollmentSubmitted extends Mailable
{
    public function __construct(public CourseEnrollment $enrollment) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New CE course enrollment: '.$this->enrollment->course?->title_en,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.course-enrollment-submitted',
            with: ['enrollment' => $this->enrollment],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
