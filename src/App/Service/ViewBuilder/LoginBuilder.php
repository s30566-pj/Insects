<?php

namespace App\Service\ViewBuilder;
use App\Config;
class LoginBuilder
{
    function buildLoginPage(): void
    {
        $title = Config::getConfigValue('misc', 'title');
        $description = Config::getConfigValue('misc', 'description');
    }
}