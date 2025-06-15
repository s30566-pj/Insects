<?php

namespace App\Service;

use App\Model\Organization;
use App\Service\PDO\OrganizationService;
use App\Service\PDO\UserController;

class SetOrganizationService
{
    public static function setOrganization(Organization $organization): bool{
        $userService = new UserController();
        $orgService = new OrganizationService();
        if (isset($_COOKIE["organizationId"])){
            if ($userService->isUserInRequestedOrganization($_SESSION["user"]->getId(), $_COOKIE["organizationId"])){ //if user is still in this organizaiton - set it
                $_SESSION["organization"]=$orgService->getOrganizationById($_COOKIE["organizationId"]);
            }
        }
    }

}