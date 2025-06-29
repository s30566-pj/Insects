<?php

namespace App\Service\ViewBuilder;

use App\Config;
use App\Service\PDO\TicketService;
use App\Service\PDO\UserController;
use DateTime;
class IssuesPageBuilder{
    public function buildIssuesPage(){
        $ticketService = new TicketService();
        $title = Config::getConfigValue('misc', 'title');
        $description = Config::getConfigValue('misc', 'description');
        $styles = ['/assets/home.css', '/assets/nav.css', '/assets/issuesMain.css'];
        $issues=$ticketService->getIssuesInOrganization($_SESSION['organization']->getId());
        include __DIR__ . "/../../../../templates/header.php";
        include __DIR__ . "/../../../../templates/Issues/body.php";
    }
}