<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Config;
use App\Controller\HomeBuilder;

// Load config data
Config::load(__DIR__ . '/../config/config.php');

$homeController = new HomeBuilder();
$homeController->buildHomePage();