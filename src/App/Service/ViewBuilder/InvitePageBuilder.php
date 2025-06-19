<?php

namespace App\Service\ViewBuilder;

use App\Config;
use App\Service\PDO\OrganizationService;

class InvitePageBuilder
{
    public function buildPage()
    {
        $title = Config::getConfigValue('misc', 'title');
        $description = Config::getConfigValue('misc', 'description');
        $styles = ['/assets/home.css', '/assets/nav.css', '/assets/inviteMain.css'];
        $org=$_SESSION['organization']->getName();
        include __DIR__ . "/../../../../templates/header.php";
        include __DIR__ . "/../../../../templates/Invite/body.php";
    }
}