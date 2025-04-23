<?php


require_once __DIR__ . '/../vendor/autoload.php';

use App\Http\Router;

$router = new Router();


foreach(glob(__DIR__ . '/../src/Modules/*/Routes/*.php') as $routeFile) {
    require_once $routeFile;
}

$router->dispatch($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

