<?php

namespace App\Http\Interfaces\Senders;


use App\Models\User;
use App\Jobs\SendMail;
use App\Mail\AdvertisementEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Interfaces\Senders\SendableInterface;
use App\Jobs\RegisterVerification;

class EmailSend implements SendableInterface
{

    public $to; ## email
    public $verificationCode; ## 

    public function __construct($to,$verificationCode)
    {
        $this->to = $to;
        $this->verificationCode = $verificationCode;
       
    }

    public function notifiable()
    {
        $user = User::where('email',$this->to)->first();

        RegisterVerification::dispatch($user, $this->to,$this->verificationCode);

       // Mail::to($this->to)->send(new AdvertisementEmail($this->message));
    }
}
