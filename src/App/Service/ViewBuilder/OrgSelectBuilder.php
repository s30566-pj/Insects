<?php

namespace App\Service\ViewBuilder;
use App\Config;
use App\Service\PDO\OrganizationService;
class OrgSelectBuilder
{
    public function buildPage()
    {
        $title = Config::getConfigValue('misc', 'title');
        $description = Config::getConfigValue('misc', 'description');
        $organizationsService = new OrganizationService();
        $styles = ['/assets/selectOrgBody.css'];
        $orgs=$organizationsService->getOrganizationsByUserId($_SESSION["user"]->getId());

        include __DIR__ . "/../../../../templates/header.php";
        include __DIR__ . "/../../../../templates/SelectOrganization/body.php";
    }


}