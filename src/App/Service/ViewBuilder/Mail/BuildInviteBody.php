<?php

namespace App\Service\ViewBuilder\Mail;

use App\Config;

class BuildInviteBody
{

    function getBody($token, $org_name, $expires_at)
    {
        $title = Config::getConfigValue('misc', 'title');
        $url = Config::getConfigValue('misc', 'url');
        $htmlTemplate = file_get_contents(__DIR__ . '/../../../templates/InviteMail/body.html');
        $replacements = [
            '{{org_name}}' => $org_name,
            '{{invite_link}}' => $url.'/accept?token=abc123',
            '{{token}}' => $token,
            '{{ctitle}}' => $title,
            '{{expires_at}}' => $expires_at
        ];
        foreach ($replacements as $placeholder => $value) {
            $htmlTemplate = str_replace($placeholder, $value, $htmlTemplate);
        }
        return $htmlTemplate;
    }

}