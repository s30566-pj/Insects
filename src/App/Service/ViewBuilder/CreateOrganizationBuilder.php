<?php

namespace App\Service\ViewBuilder;

use App\Config;

class CreateOrganizationBuilder
{
    public function buildCreateOrganizationPage($status=null){
        $title = Config::getConfigValue('misc', 'title');
        $description = Config::getConfigValue('misc', 'description');
        $styles = ['/assets/createOrganizationBody.css'];

        include __DIR__ . "/../../../../templates/header.php";
        include __DIR__ . "/../../../../templates/CreateOrganization/body.html";
    }
}