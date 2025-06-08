<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Config;
use App\Controller\HomeController;

// Load config data
Config::load(__DIR__ . '/../config/config.php');

$homeController = new HomeController();
$homeController->buildHomePage();