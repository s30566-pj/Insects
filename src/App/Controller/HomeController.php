<?php
namespace App\Controller;
use App\Config;
class HomeController{
 public function buildHomePage(): void
 {
     $title = Config::getConfigValue('misc', 'title');
     $description = Config::getConfigValue('misc', 'description');
    // shares title and description with view
     extract(compact("title", "description"));

     include __DIR__ . "/../../../templates/header.php";
 }
}