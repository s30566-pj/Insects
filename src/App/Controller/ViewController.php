<?php

namespace App\Controller;

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

    public function getLoginPage($loginStatus = null){
        if (! isset($_SESSION['user'])){
            $loginBuilder = new LoginBuilder();
            $loginBuilder->buildLoginPage($loginStatus);
        } else{
            $this->getStartPage();
        }
    }

    public function getRegisterPage($status=null)
    {
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

}