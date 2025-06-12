<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();



use App\Config;

// Load config data
Config::load(__DIR__ . '/config/config.php');

// Forward all requests to router
require_once __DIR__ . '/src/router.php';