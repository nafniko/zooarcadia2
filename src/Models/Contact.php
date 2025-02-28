<?php

namespace Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Contact extends Models
{
    public function sendMail()
    {
        $emailregex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";


if(isset($_POST["submit"]) && isset($_POST["email"]) && isset($_POST["message"])&& isset($_POST["objet"])) {


    $email = htmlentities($_POST["email"]);

    $sendmessage = $email .':'. htmlentities($_POST["message"]);

    $objet = htmlentities($_POST["objet"]);

    if (preg_match($emailregex, $email)) {

        try {

        $mail = new PHPMailer (true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp-relay.sendinblue.com";
        $mail->Port = 587;
        $mail->Username = "7f7095001@smtp-brevo.com";
        $mail->Password = 'rjUImBqN7QMgXT5P' ;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->isHTML(true);
        $mail->Subject = $objet;
        $mail->Body = $sendmessage;
        $mail->setFrom("zooarcadianiko1960@gmail.com",'zoo');
        $mail->addAddress("zooarcadianiko1960@gmail.com",'zoo');
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->send();
        }catch (Exception $e) {
            echo "Mailer Error: ".$e->getMessage();
        }

    }
}
}

}
