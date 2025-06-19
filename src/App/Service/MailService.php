<?php

namespace App\Service;
use App\Config;
use PHPMailer\PHPMailer\PHPMailer;
class MailService
{
    private array $config;
    
    public function __construct(){
        $this->config = Config::getConfigArray('smtp');
    }
    
    function sendMailSMTP($title, $body, $toEmail, $from_name)
    {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host       = $this->config['host'];
        $mail->Port       = $this->config['port'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $this->config['user'];
        $mail->Password   = $this->config['password'];
        $mail->SMTPSecure = $this->config['encryption'];

        $mail->setFrom($this->config['email'], $from_name);
        $mail->addAddress($toEmail);

        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body    = $body;
        $mail->send();
    }



}