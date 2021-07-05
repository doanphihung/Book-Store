<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMailSignup($user)
    {
        $toName = $user->name;
        $toEmail = $user->email;
        $data = [
            'name' => $toName,
            'emai' =>$toEmail
        ];
        Mail::send('mail.Mail-signup', $data, function ($message) use ($toName, $toEmail) {
            $message->to($toEmail, $toName)->subject('Registration Successful');
            $message->from('hungq394@gmail.com', 'DH Book-Store');
        });
    }
}
