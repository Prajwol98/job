<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class CustomMailer
{

    public $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Port = 465;
        $this->mail->Username = 'chaudharypra89@gmail.com';
        $this->mail->Password = 'fzjmonvjjokirwev';

        $this->mail->SMTPSecure = 'ssl';
        $this->mail->setFrom('chaudharypra89@gmail.com', 'Mailer');
    }


    public function sendMail($to, $subject, $body)
    {
        $this->mail->addAddress($to);

        //Content
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;

        $this->mail->send();
    }
}
?>