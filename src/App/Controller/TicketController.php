<?php

namespace App\Controller;

use App\Model\Ticket;
use App\Service\PDO\TicketService;

class TicketController
{
    public function createTicket(): bool{
        $organizationId = $_SESSION['organization']->getId();
        $title = $_POST['ticket-title'];
        $description = $_POST['ticket-description'];
        if ($_POST['assign-to'] === ""){
            $assignTo = null;
        }else {
            $assigned_to = $_POST['assign-to'];
        }
        $reported_by = $_SESSION['user']->getId();

        $ticketService = new TicketService();
        return $ticketService->createTicket($organizationId, $title, $description, $assigned_to, $reported_by);


    }

    public function addComment(){
        $ticket_id = $_POST['ticketId'];
        $author_id = $_SESSION['user']->getId();
        $content = $_POST['comment'];

        $ticketService = new TicketService();
        return $ticketService->createTicketComment($ticket_id, $author_id, $content);

    }
}