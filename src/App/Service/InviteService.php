<?php

namespace App\Service;
use App\Service\PDO\InviteServiceSQL;
use App\Service\ViewBuilder\Mail\BuildInviteBody;

class InviteService
{
    public function invite($email, $user_id, $org_id, $org_name){
        if (!isset($_SESSION['user']) || !isset($_SESSION['organization'])){
            header('Location: /');
        }
        $token = bin2hex(random_bytes(32));
        $invited_by = $user_id;
        $status = 'pending';
        $expires_at = date('Y-m-d H:i:s', strtotime('+2 days'));

        $inviteService = new InviteServiceSQL();
        $invite_status = $inviteService->addInvite($org_id, $email, $token, $invited_by, $status, $expires_at);

        if($invite_status){
            $user_name = $_SESSION['user']->getName();
            $user_lastname = $_SESSION['user']->getSurname();
            $username = $user_name . ' ' . $user_lastname;
            $title = 'Invitation to ' . $org_name;
            $body = (new BuildInviteBody())->getBody($token, $org_name, $expires_at);

            $mailService = new MailService();
            $mailService->sendMailSMTP($title, $body, $email, $username);
            return true;
        }
        return false;

    }

}