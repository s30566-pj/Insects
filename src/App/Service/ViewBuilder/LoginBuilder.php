<?php

namespace App\Service\ViewBuilder;
use App\Config;
use App\Controller\Authentication\AuthController;

class LoginBuilder
{
    function buildLoginPage($loginStatus = null): void
    {
        $title = Config::getConfigValue('misc', 'title');
        $description = Config::getConfigValue('misc', 'description');
        $styles = ['/assets/loginBody.css'];
        include __DIR__ . "/../../../../templates/header.php";
        include __DIR__ . "/../../../../templates/Login/body.php";
    }
}