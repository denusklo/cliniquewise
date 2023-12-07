<?php

use Illuminate\Support\Facades\Route;
use PHPMailer\PHPMailer\PHPMailer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpmailer', function () {
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = config('mail.mailers.smtp.username');
    $mail->Password = config('mail.mailers.smtp.password');
    $mail->setFrom('info@denusklo.com', 'Your Name');
    $mail->addReplyTo('info@denusklo.com', 'Your Name');
    $mail->addAddress('denusklo@gmail.com', 'Receiver Name');
    $mail->Subject = 'Checking if PHPMailer works';
    // $mail->msgHTML(file_get_contents('message.html'), __DIR__);
    $mail->Body = 'This is just a plain text message body';
    $mail->addAttachment('attachment.txt');
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'The email message was sent.';
    }
});
