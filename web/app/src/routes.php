<?php

$routes = [
    '/users/register' => ['App\Controller\UserController', 'singUp'],
    '/users/login' => ['App\Controller\UserController', 'login'],
    '/users/logout' => ['App\Controller\UserController', 'logout'],
    '/employers' => ['App\Controller\EmployerController', 'index'],
];

$route = $_SERVER['REQUEST_URI'];

if (array_key_exists($route, $routes)) {
    session_start();
    $class = new $routes[$route][0];
    $method = $routes[$route][1];
    $class->$method();
    exit;
} else {
    http_response_code(404);
    echo 404;
}
