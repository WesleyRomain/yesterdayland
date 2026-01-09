<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Publieke property om data aan de view door te geven

    /*
     Aangeroepen wanneer je een ContactMessage($data) doet
    */
    public function __construct($data)
    {
        $this->data = $data; // Bewaar de meegestuurde data in de class
    }

    /*
     Definieer het onderwerp (de 'enveloppe')
    */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nieuw contactbericht', // Onderwerp van de mail
        );
    }

    /*
     Definieer de content van de mail
    */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
            with: [
                'data' => $this->data,
            ]
        );
    }

    /*
      Eventuele bijlagen
    */
    public function attachments(): array
    {
        return [];
    }
}
