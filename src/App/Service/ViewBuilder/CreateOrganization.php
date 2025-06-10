<?php

namespace App\Service\ViewBuilder;

use App\Config;

class CreateOrganization
{
    public function buildCreateOrganizationPage($status=null){
        $title = Config::getConfigValue('misc', 'title');
        $description = Config::getConfigValue('misc', 'description');
    }
}