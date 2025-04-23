<?php

use App\Http\Router;
use App\Infra\Container;

$controller = Container::userController();
$router = Router::getInstance();

$router->get('/users', [$controller, 'index']);
$router->post('/users', [$controller, 'store']);
