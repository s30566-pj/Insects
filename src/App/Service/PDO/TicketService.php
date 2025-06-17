<?php

namespace App\Service\PDO;

use App\Model\Ticket;

class TicketService extends MysqlController
{
    public function createTicket($organizationId, $title, $description, $assigned_to, $reported_by): bool{
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("INSERT INTO tickets (`organization_id`, `title`, `description`, `assigned_to`, `reported_by`) VALUES (:organization_id, :title, :description, :assigned_to, :reported_by)");
        return $stmt->execute([
            'organization_id' => $organizationId,
            'title' => $title,
            'description' => $description,
            'assigned_to' => $assigned_to,
            'reported_by' => $reported_by
        ]);
    }


}