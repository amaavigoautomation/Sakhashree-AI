<?php

namespace App\Mail;

use App\Models\Consultant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewEnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $consultation;

    public function __construct(Consultant $consultation)
    {
        $this->consultation = $consultation;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Enquiry',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new_enquiry',
            with: [
                'consultation' => $this->consultation,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
