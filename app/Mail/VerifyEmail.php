<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $token; // Declare the token property
    
    public function __construct($token)
    {
        if (empty($token)) {
            throw new \Exception('Token is required for VerifyEmail Mailable.');
        }

        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
    return $this->view('emails.verify')
                ->with(['token' => 'testToken123']) // Use a hardcoded token for testing
                ->subject('Verify Your Email Address');
    }
}