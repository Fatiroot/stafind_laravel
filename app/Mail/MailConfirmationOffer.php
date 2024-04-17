<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailConfirmationOffer extends Mailable
{
    use Queueable, SerializesModels;
    public $offer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($offer)
    {
    $this->offer=$offer;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
        return $this->view('email.ConfirmOffer')
                    ->subject('Confirm Offer');
    }
}
