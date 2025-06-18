<?php

namespace App\Service\ViewBuilder;

use App\Config;
use App\Service\PDO\UserController;

class CreateTicketBuilder
{
    public function buildCreateTicket(): void
    {
        $userService = new UserController();
        $title = Config::getConfigValue('misc', 'title');
        $description = Config::getConfigValue('misc', 'description');
        $styles = ['/assets/home.css', '/assets/nav.css', '/assets/newIssueMain.css'];
        $users=$userService->getUsersInOrganization($_SESSION['organization']->getId());
        include __DIR__ . "/../../../../templates/header.php";
        include __DIR__ . "/../../../../templates/NewIssue/main.php";
    }
}