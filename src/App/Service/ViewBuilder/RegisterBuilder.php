<?php

namespace App\Service\ViewBuilder;

use App\Config;

class RegisterBuilder
{

    public function buildRegisterPage($status = null): void{
        $title = Config::getConfigValue('misc', 'title');
        $description = Config::getConfigValue('misc', 'description');
        $styles = ['/assets/registerBody.css'];
        if ($status === false){
            $message = "User exists.";
        }
        include __DIR__ . "/../../../../templates/header.php";
        include __DIR__ . "/../../../../templates/Register/body.php";
    }

}