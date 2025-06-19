<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controller\ViewController;
use App\Controller\Authentication\AuthController;
use App\Service\PDO\UserController;
use App\Controller\OrganizationController;
use App\Service\SessionService;
use App\Controller\TicketController;
use App\Service\PDO\TicketService;
use App\Service\InviteService;
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
        (new OrganizationController())->saveOrgToSession($_GET['org']);
        setcookie("organizationId", $_SESSION["organization"]->getId(), time() + 3600);
        header('Location: /');
        break;
    case '/create-ticket':
        $viewController->getCreateTicketPage();
        break;
    case '/create-issue-submit':
        (new TicketController())->createTicket();
        header('Location: /');
        break;
    case '/issues':
        $viewController->getIssuesPage();
        break;
    case '/org-select':
        $viewController->getSelectOrganizationPage();
        break;
    case '/ticket':
        $viewController->getTicketPage($_GET["id"]);
        break;
    case '/create-comment':
        (new TicketService())->createTicketComment($_GET["id"], $_SESSION['user']->getId(), $_POST['comment'] );
        header('Location: /ticket?id='.$_GET["id"]);
        break;
    case '/invite':
        $viewController->getInvitePage();
        break;
    case '/send-invite':
        (new InviteService())->invite($_POST['to_email'], $_SESSION['user']->getId(), $_SESSION["organization"]->getId(), $_SESSION['organization']->getName());
        header('Location: /');
        break;
    case '/accept':
        (new InviteService())->acceptInvite($_GET["token"]);
    case '/logout':
        (new SessionService())->logout();
        header('Location: /');
        break;


}