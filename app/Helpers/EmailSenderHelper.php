<?php

namespace App\Helpers;

use App\Mail\EmailSender as Email;
use Illuminate\Support\Facades\Mail;

class EmailSenderHelper
{

    protected function  __Construct()
    {
    }

    static protected $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }


    public function sendEmail($email, $subject = '', $message = '')
    {
        $recipientEmail = 'ahmedwry588@gmail.com';
        $emailData = ['key' => 'value']; // Any data you want to pass to the email view

        Mail::to($recipientEmail)->send(new Email($emailData));

        return 'Email sent successfully!';
    }
}
