<?php

namespace App\Controller;

use App\Service\ViewBuilder\LoginBuilder;
use App\Service\ViewBuilder\HomeBuilder;

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
        }
    }

}