<?php

use App\Controller\ViewController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {
    case '/':
        (new ViewController())->getStartPage();
        break;
    case '/login-submit':
        break;

}