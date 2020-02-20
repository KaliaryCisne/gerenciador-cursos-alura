<?php

require __DIR__ . '/../vendor/autoload.php';

ini_set("display_errors", true);

use Psr\Http\Server\RequestHandlerInterface;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

$request_uri = $_SERVER['REQUEST_URI'];
$resource = explode("?", $request_uri)[0];

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

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

$classController = $routes[$resource];
/** @var RequestHandlerInterface $controller*/
$controller = new $classController();
$response = $controller->handle($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();

