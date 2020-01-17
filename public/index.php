<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\InterfaceControllerRequest;

$resource = $_SERVER['REQUEST_URI'];
$routes = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($resource, $routes)) {
    http_response_code(404);
    exit();
}

$classController = $routes[$resource];
/** @var InterfaceControllerRequest $controller*/
$controller = (new $classController())->processaRequisicao();
