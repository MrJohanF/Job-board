<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "db.php";
require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL ^ E_NOTICE);

if ($_POST["email_name"] && $_POST["email_phone"] && $_POST["email_sender_address"] && $_POST["email_subject"] && $_POST["email_concern"]) {

    $email_name = $_POST["email_name"];
    $email_phone = $_POST["email_phone"];
    $email_sender_address = $_POST["email_sender_address"];
    $email_subject = $_POST["email_subject"];
    $email_concern = $_POST["email_concern"];

    $message = "Nombre cliente: " . $email_name . "<br> Correo electronico: " . $email_sender_address . "<br> phone number: " . $email_phone . "<br> Message: " . $email_concern;

    $mail = new PHPMailer(true);

    try {
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';

        $mail->Host = 'smtp.hostinger.co';
        $mail->Port = 587;
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth = true;
        $mail->Username = 'concern-noreply@tujob.co';
        $mail->Password = 'Empleatic123.';

        $mail->setFrom('concern-noreply@tujob.co');
        $mail->addAddress('concern@tujob.co');
        $mail->addReplyTo('concern@tujob.co');

        $mail->isHTML(true);
        $mail->Subject = "Inquiry | by tuJob";
        $mail->Body = '' . $message;


        $mail->send();
        header("Location: ../index.php#inquiry_submited");
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {


}
