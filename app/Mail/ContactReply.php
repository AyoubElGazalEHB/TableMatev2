<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReply extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $response;

    public function __construct($contact, $response)
    {
        $this->contact = $contact;
        $this->response = $response;
    }

    public function build()
    {
        return $this->view('emails.contact_reply')
                    ->subject('Response to Your Contact Form Submission');
    }
}