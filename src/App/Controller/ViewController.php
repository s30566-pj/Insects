<?php

namespace App\Controller;

use App\Service\InviteService;
use App\Service\PDO\UserController;
use App\Service\SetOrganizationService;
use App\Service\ViewBuilder\CreateOrganizationBuilder;
use App\Service\ViewBuilder\CreateTicketBuilder;
use App\Service\ViewBuilder\InvitePageBuilder;
use App\Service\ViewBuilder\IssuesPageBuilder;
use App\Service\ViewBuilder\LoginBuilder;
use App\Service\ViewBuilder\HomeBuilder;
use App\Service\ViewBuilder\OrgSelectBuilder;
use App\Service\ViewBuilder\RegisterBuilder;
use App\Service\ViewBuilder\ShowTicketBuilder;

class ViewController
{
    public function getStartPage(){
        if (! isset($_SESSION['user'])){
            $this->getLoginPage();
        } elseif ((! isset($_SESSION['organization']) || (!is_object($_SESSION['organization'])))){
            $this->getSelectOrganizationPage();
        }
        else{
            $homeBuilder = new HomeBuilder();
            $homeBuilder->buildHomePage();
        }
    }

    public function getLoginPage($loginStatus = null)
    {
        $userController = new UserController();
        if (!isset($_SESSION['user'])) {
            $loginBuilder = new LoginBuilder();
            $loginBuilder->buildLoginPage($loginStatus);
        } elseif (! $userController->isUserInAnyOrganization($_SESSION['user']->getId())){
            $createOrgBuilder = new CreateOrganizationBuilder();
            $createOrgBuilder->buildCreateOrganizationPage();
        } elseif (isset($_COOKIE["organizationId"])&& !isset($_SESSION["organization"])){
            SetOrganizationService::setOrganization();
            header('Location: /');
        } elseif ($userController->isUserInAnyOrganization($_SESSION['user']->getId())){
            header('Location: /select-organization');
        }
        else{
            $this->getStartPage();
        }
    }

    public function getRegisterPage($status=null){
        if ($status === true){
            $this->getStartPage();
            return;
        }
        if (! isset($_SESSION['user'])){
            $registerBuilder = new RegisterBuilder();
            $registerBuilder->buildRegisterPage($status);
            return;
        }

    }

    public function getCreateOrganizationPage($status=null): void{
        if ($status === true){
            $this->getStartPage();
            return;
        }
        if (! isset($_SESSION['organization'])){
            $orgBuilder = new CreateOrganizationBuilder();
            $orgBuilder->buildCreateOrganizationPage();
            return;
        }
    }

    public function getSelectOrganizationPage($status=null): void{
        $userController = new UserController();
        if ($status === true){
            $this->getStartPage();
            return;
        }
        if ((! isset($_SESSION['organization']) && $userController->isUserInAnyOrganization($_SESSION['user']->getId())) || isset($_SESSION["organization"]) ) {
            $orgSelectBuilder = new OrgSelectBuilder();
            $orgSelectBuilder->buildPage();
            return;
        }
        else{
            $this->getCreateOrganizationPage();
        }
        return; //idk if here shouldn't be getStartPage
    }

    public function getCreateTicketPage(){
        if (isset($_SESSION['user']) && isset($_SESSION['organization'])){
            $createTicketBuilder = new CreateTicketBuilder();
            $createTicketBuilder->buildCreateTicket();
        } else{
            header('Location: /');
        }
    }

    public function getIssuesPage()
    {
        if (isset($_SESSION['user']) && isset($_SESSION['organization'])){
            $issuesPageBuilder = new IssuesPageBuilder();
            $issuesPageBuilder->buildIssuesPage();
        } else{
            header('Location: /');
        }
    }

    public function getTicketPage($ticket_id){
        if (isset($_SESSION['user']) && isset($_SESSION['organization'])){
            $showTicketBuilder = new ShowTicketBuilder();
            $showTicketBuilder->buildTicketPage($ticket_id);
        } else{
            header('Location: /');
        }
    }

    public function getInvitePage()
    {
        if (isset($_SESSION['user']) && isset($_SESSION['organization'])){
            $invitePageBuilder = new InvitePageBuilder();
            $invitePageBuilder->buildPage();
        } else{
            header('Location: /');
        }
    }
}