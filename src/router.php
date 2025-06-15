<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controller\ViewController;
use App\Controller\Authentication\AuthController;
use App\Service\PDO\OrganizationService;
use App\Service\PDO\UserController;
use App\Controller\OrganizationController;
use App\Service\SessionService;
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

$viewController = new ViewController();

$base = '/Insects/src/router.php';
$path = str_starts_with($path, $base) ? substr($path, strlen($base)) : $path;

switch ($path) {
    case '/':
        $viewController->getStartPage();
        break;
    case '/login':
    case '/login-submit':
        $viewController->getLoginPage((new AuthController())->login());
        break;
    case '/register':
        $viewController->getRegisterPage();
        break;
    case '/register-submit':
        $viewController->getRegisterPage((new UserController())->registerUser());
        break;
    case '/create-organization':
        $viewController->getCreateOrganizationPage();
        break;
    case '/create-organization-submit':
        $viewController->getCreateOrganizationPage((new OrganizationController())->createOrganization());
        break;
    case '/select-organization':
        ((new OrganizationController())->saveOrgToSession($_GET['org']));
        $viewController->getStartPage();
    case '/logout':
        ((new SessionService())->logout());
        header('Location: /');
        break;


}