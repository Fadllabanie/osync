<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MobileRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $password;  // verification Code 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mobile-register')
           ->from(env('MAIL_USERNAME'),'Cartakk')->subject('Registration Credentials');
    }
}
