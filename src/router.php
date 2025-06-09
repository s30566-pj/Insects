<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controller\ViewController;
use App\Controller\Authentication\AuthController;
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

$viewController = new ViewController();

$base = '/Insects/src/router.php';
$path = str_starts_with($path, $base) ? substr($path, strlen($base)) : $path;

switch ($path) {
    case '/':
        $viewController->getStartPage();
        break;
    case '/login-submit':
        $viewController->getLoginPage((new AuthController())->login());
        break;

}