<?php

namespace App\Controller;

use App\Model\Ticket;
use App\Service\PDO\TicketService;

class TicketController
{
    public function createTicket(): bool{
        $organizationId = $_POST['organization']->getId();
        $title = $_POST['ticket-title'];
        $description = $_POST['ticket-description'];
        $assigned_to = $_POST['assign-to'];
        $reported_by = $_SESSION['user']->getId();

        $ticketService = new TicketService();
        $ticketService->createTicket($organizationId, $title, $description, $assigned_to, $reported_by);


    }
}