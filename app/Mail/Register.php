<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Admin;

class Register extends Mailable
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
    public function __construct(Admin $admin, $password)
    {
        $this->name = $admin->name;
        $this->email = $admin->email;
        $this->password = $password;  // password or verification Code 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.Register')
           ->from(env('MAIL_USERNAME'),'Cartakk')->subject('Registration Credentials');
    }
}
