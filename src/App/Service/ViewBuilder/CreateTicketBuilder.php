<?php

namespace App\Service\ViewBuilder;

use App\Config;

class CreateTicketBuilder
{
    public function buildCreateTicket(): void
    {
        $title = Config::getConfigValue('misc', 'title');
        $description = Config::getConfigValue('misc', 'description');
        $styles = ['/assets/home.css', '/assets/nav.css', '/assets/main.css'];
        include __DIR__ . "/../../../../templates/header.php";
        include __DIR__ . "/../../../../templates/NewIssue/main.php";
    }
}