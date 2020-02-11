<?php

require __DIR__ . '/../vendor/autoload.php';

ini_set("display_errors", true);

use Alura\Cursos\Controller\InterfaceControllerRequest;

$resource = $_SERVER['REDIRECT_URL'];
//$resource = $_SERVER['PATH_INFO'];

$server_name = $_SERVER['SERVER_NAME'];
$routes = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($resource, $routes)) {
    http_response_code(404);
    exit();
}

session_start();

if(!isset($_SESSION['logado']) && $resource !== '/login' && $resource !== '/logar') {
    header('Location: /login');
    exit();
}

$classController = $routes[$resource];
/** @var InterfaceControllerRequest $controller*/
$controller = (new $classController())->processRequest();
