<?php

namespace App\Service\ViewBuilder;
use App\Config;
use App\Controller\Authentication\AuthController;

class LoginBuilder
{
    function buildLoginPage($loginStatus = null): void
    {
        var_dump($loginStatus);
        $title = Config::getConfigValue('misc', 'title');
        $description = Config::getConfigValue('misc', 'description');
        extract(compact(['loginStatus', 'title', 'description']));
        include __DIR__ . "/../../../../templates/header.php";
        include __DIR__ . "/../../../../templates/Login/body.php";
    }
}