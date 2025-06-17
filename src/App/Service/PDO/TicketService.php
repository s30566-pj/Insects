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

    public function createTicketComment($ticketId, $author_id, $content): bool
    {
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("INSERT INTO ticket_comments (`ticket_id`, `authosr_id`, `content`) VALUES (:ticket_id, :author_id, :content)");
        return $stmt->execute([
            'ticket_id' => $ticketId,
            'author_id' => $author_id,
            'content' => $content
        ]);
    }

    public function getIssuesAssignedToUser($user_id, $org_id): array{
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("SELECT * FROM tickets WHERE assigned_to = :user_id AND organization_id = :org_id");
        $stmt->execute([
            "user_id" => $user_id,
            "org_id" => $org_id
        ]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getIssuesInOrganization($org_id): array{
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("SELECT t.id, o.name AS organization_name, t.title, t.description, t.status, CONCAT(u1.first_name, ' ', u1.surname) AS reported_by, CONCAT(u2.first_name, ' ', u2.surname) AS assigned_to, t.resolved_at, t.created_at, t.updated_at FROM tickets t JOIN organizations o ON t.organization_id = o.id JOIN users u1 ON t.reported_by = u1.id LEFT JOIN users u2 ON t.assigned_to = u2.id WHERE organization_id = :org_id");
        $stmt->execute([
            "org_id" => $org_id
        ]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getIssuesReportedByUser($user_id, $org_id): array{
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("SELECT * FROM tickets WHERE organization_id = :org_id AND reported_by = :user_id");
        $stmt->execute([
            "org_id" => $org_id,
            "user_id" => $user_id
        ]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getIssuesRecentlyResolved($org_id): array{
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("SELECT * FROM tickets WHERE organization_id = :org_id AND resolved_at IS NOT NULL ORDER BY resolved_at DESC");
        $stmt->execute([
            "org_id" => $org_id
        ]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}