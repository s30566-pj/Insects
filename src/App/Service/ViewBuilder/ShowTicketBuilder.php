<?php

namespace App\Service\ViewBuilder;

use App\Config;
use App\Service\PDO\TicketService;

class ShowTicketBuilder
{

    public function buildTicketPage($ticket_id){
        $title = Config::getConfigValue('misc', 'title');
        $description = Config::getConfigValue('misc', 'description');
        $styles = ['/assets/home.css', '/assets/nav.css', '/assets/ticket.css'];
        $ticketService = new TicketService();
        $ticket = $ticketService->getTicketInOrganization($_SESSION['organization']->getId(), $ticket_id);
        $comments = $ticketService->getTicketComments($ticket_id);
        include __DIR__ . "/../../../../templates/header.php";
        include __DIR__ . "/../../../../templates/Ticket/body.php";
    }

}