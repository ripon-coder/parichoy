<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;
    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    public function build()
    {
        return $this->markdown('website.mail.contact-mail')->with('contact_data', $this->contactData);
    }
}
