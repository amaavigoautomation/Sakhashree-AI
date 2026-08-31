<?php

namespace App\Mail;

use App\Models\Consultant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConsultationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $consultation;

    /**
     * Create a new message instance.
     */
    public function __construct(Consultant $consultation)
    {
        $this->consultation = $consultation;
    }

    /**
     * Email subject
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Consultation Submitted Successfully',
        );
    }

    /**
     * Email content (view)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.consultation_submitted',
            with: [
                'consultation' => $this->consultation,
            ],
        );
    }

    /**
     * Attachments (optional)
     */
    public function attachments(): array
    {
        return [];
    }
}
