<?php
namespace App\Service\ViewBuilder;
use App\Config;
use App\Service\PDO\TicketService;

class HomeBuilder{
 public function buildHomePage(): void
 {
     $ticketService = new TicketService();
     $title = Config::getConfigValue('misc', 'title');
     $description = Config::getConfigValue('misc', 'description');
     $styles = ['/assets/home.css', '/assets/nav.css', '/assets/main.css'];
     $assToMeIssue=$ticketService->getIssuesAssignedToUser($_SESSION['user']->getId(), $_SESSION['organization']->getId());
     $unassigned=$ticketService->getIssuesInOrganization($_SESSION['organization']->getId());
     $reportedByMe=$ticketService->getIssuesReportedByUser($_SESSION['user']->getId(),$_SESSION['organization']->getId());
     $recentlyResolved=$ticketService->getIssuesRecentlyResolved($_SESSION['organization']->getId());
     include __DIR__ . "/../../../../templates/header.php";
     include __DIR__ . "/../../../../templates/home.php";
 }
}