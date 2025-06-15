<?php
namespace App\Service\ViewBuilder;
use App\Config;
class HomeBuilder{
 public function buildHomePage(): void
 {
     $title = Config::getConfigValue('misc', 'title');
     $description = Config::getConfigValue('misc', 'description');

     include __DIR__ . "/../../../../templates/header.php";
     include __DIR__ . "/../../../../templates/home.php";
 }
}