<?php

namespace App\Controller;

use App\Service\PDO\UserController;
use App\Service\ViewBuilder\CreateOrganizationBuilder;
use App\Service\ViewBuilder\LoginBuilder;
use App\Service\ViewBuilder\HomeBuilder;
use App\Service\ViewBuilder\RegisterBuilder;
class ViewController
{
    public function getStartPage(){
        if (! isset($_SESSION['user'])){
            $loginBuilder = new LoginBuilder();
            $loginBuilder->buildLoginPage();
        } else{
            $homeBuilder = new HomeBuilder();
            $homeBuilder->buildHomePage();
        }
    }

    public function getLoginPage($loginStatus = null)
    {
        $userController = new UserController();
        var_dump($userController->isUserInAnyOrganization($_SESSION['user']->getId()));
        if (!isset($_SESSION['user'])) {
            $loginBuilder = new LoginBuilder();
            $loginBuilder->buildLoginPage($loginStatus);
        } elseif (! $userController->isUserInAnyOrganization($_SESSION['user']->getId())){
            $createOrgBuilder = new CreateOrganizationBuilder();
            $createOrgBuilder->buildCreateOrganizationPage();
        } else{
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

    public function getCreateOrganizationPage($status=null){
        if ($status === true){
            $this->getStartPage();
            return;
        }
        if (! isset($_SESSION['user'])){
            $orgBuilder = new CreateOrganizationBuilder();
            $orgBuilder->buildCreateOrganizationPage();
            return;
        }
    }

}