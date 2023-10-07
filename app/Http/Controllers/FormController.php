<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailService;
use PHPMailer\PHPMailer\PHPMailer;
use Mail;
use App\Mail\RequestMail;

use App\Events\OrderArrived;
use App\Events\CallRequested;

class FormController extends Controller
{
    public function order(Request $request, PHPMailer $phpMailer) {
        OrderArrived::dispatch($request->post());

        # Mail::to(env("MAIL_RECIEVER"))->send(new RequestMail($request->post()));
        return back()->withInput();

        # $phpMailer->isSMTP();                                            //Send using SMTP

        # $phpMailer->CharSet = PHPMailer::CHARSET_UTF8;
        # $phpMailer->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        # $phpMailer->SMTPAuth   = true;                                   //Enable SMTP authentication
        # $phpMailer->Username   = 'stepin.aleksandr.dj@gmail.com';                     //SMTP username
        # $phpMailer->Password   = 'kkddfvnkqpwmxihi';                               //SMTP password
        # $phpMailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        # $phpMailer->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        # //Recipients
        # $phpMailer->setFrom('stepin.aleksandr.dj@gmail.com');
        # $phpMailer->addAddress('stepin.aleksandr.dj@gmail.com');

        # //Content
        # // $phpMailer->isHTML(true);                                  //Set email format to HTML
        # $phpMailer->Subject = 'Новая заявка';

        # $body = "";
        # $body .= "Имя: " . $request->post("name") . PHP_EOL;
        # $body .= "Телефон: " . $request->post("phone") . PHP_EOL;
        # $body .= "Почта: " . $request->post("email") . PHP_EOL;

        # $phpMailer->Body = $body;
        # $phpMailer->send();

        # echo "<pre>";
        # var_dump($mail);
    }

    public function call(Request $request) {
        CallRequested::dispatch($request->post());

        return json_encode([
            "status" => "success",
            "message" => "Ваша заявка принята",
        ]);
    }
}
