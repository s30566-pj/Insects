<?php

namespace App\Controller;

use App\Model\Organization;
use App\Service\PDO\OrganizationService;
class OrganizationController
{
    public function createOrganization(){
    $logo = $_FILES["organizationPicture"];
    $name = $_POST["organizationName"];
    $identifier = $_POST["organizationIdentifier"];
    $pattern = "/#\d+$/";
    if (preg_match($pattern, $identifier, $matches)) {
        $hashTag = $matches[0];
    }
    if (!$this->validateImage($logo)){
        die("File validation failed");
    }

    $year = date("Y");
    $month = date("m");
    $projectRoot = realpath(dirname(__DIR__, 3));

        $basePath = $projectRoot
            . DIRECTORY_SEPARATOR . 'public'
            . DIRECTORY_SEPARATOR . 'img';
    $targetDir = $basePath
        . DIRECTORY_SEPARATOR . $year
        . DIRECTORY_SEPARATOR . $month
        . DIRECTORY_SEPARATOR . $hashTag;
    $extension = pathinfo($logo["name"], PATHINFO_EXTENSION);
    $filename = 'logo_' . bin2hex(random_bytes(10)) . '.' . $extension;
    $target= "$targetDir/$filename";

        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0755, true)) {
                throw new \RuntimeException("Nie udało się utworzyć katalogu $targetDir");
            }
        }

    if (!move_uploaded_file($logo["tmp_name"], $target)){
        die("Error uploading file");
    }

    $relativePath = "public/img/$year/$month/$hashTag/$filename";

    $OrganizationService = new OrganizationService();
    $OrganizationService->createOrganization($name, $identifier, $hashTag, $relativePath);
    $_SESSION["organization"]=$OrganizationService->getOrganizationByIdentifier($identifier);
        return true;
    }

    private function validateImage($logo):bool{
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $logo['tmp_name']);
        finfo_close($finfo);
        if (!str_contains($mimeType, "image/")) {
            return false;
        }
        return true;
    }

    public function saveOrgToSession($id):void{
        $_SESSION["organization"] = (new OrganizationService())->getOrganizationById($id);
    }

}