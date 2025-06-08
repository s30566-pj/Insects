<?php

namespace App\Controller;

use App\Service\ViewBuilder\LoginBuilder;
use App\Service\ViewBuilder\HomeBuilder;

class ViewController
{
    public function getStartPage(){
        if ($_SESSION['user'] == null){
            $loginBuilder = new LoginBuilder();
            $loginBuilder->buildLoginPage();
        } else{
            $homeBuilder = new HomeBuilder();
            $homeBuilder->buildHomePage();
        }
    }

    public function getLoginPage($loginStatus = null){
        if ($_SESSION['user'] == null){
            $loginBuilder = new LoginBuilder();
            $loginBuilder->buildLoginPage($loginStatus);
        }
    }

}