<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribeRegisterUserNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $registerSubscribeUser;

    public function __construct($registerSubscribeUser)
    {
        $this->registerSubscribeUser = $registerSubscribeUser;
    }


    public function build()
    {
        return $this->subject(str_replace('_',' ', env("APP_NAME")).' Subscription Mail')->markdown('website.mail.subscribe-registration-user-nofification')->with([
            'maildata' => $this->registerSubscribeUser,
        ]);
    }
}
