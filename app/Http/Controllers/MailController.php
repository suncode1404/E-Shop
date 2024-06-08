<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\GuiEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail(MailRequest $request)
    {
        $arr = request()->post();
        $name = trim(strip_tags($arr['name']));
        $subject = trim(strip_tags($arr['subject']));
        $email = trim(strip_tags($arr['email']));
        $phone = trim(strip_tags($arr['phone']));
        $message = trim(strip_tags($arr['message']));
        $adminEmail = 'thitrungtinh@gmail.com';
        Mail::mailer('smtp')->to($adminEmail)
            ->send(new GuiEmail($name, $subject, $email, $phone, $message));
        alert('Bạn đã gửi thông tin thành công', 'Cảm ơn quý khách đã gửi tin cho E-shop', 'success');
        return redirect()->route('client.home');
    }
}
