<?php

$routes = [
    '~^/users/register$~' => ['App\Controller\UserController', 'singUp'],
    '~^/users/login$~' => ['App\Controller\UserController', 'login'],
    '~^/users/logout$~' => ['App\Controller\UserController', 'logout'],
    '~^/employers$~' => ['App\Controller\EmployerController', 'index'],
    '~^/employers/create$~' => ['App\Controller\EmployerController', 'create'],
    '~^/employers/(\d+)/destroy$~' => ['App\Controller\EmployerController', 'destroy'],
    '~^/employers/(\d+)/edit$~' => ['App\Controller\EmployerController', 'edit'],
    '~^/employers/(\d+)/update$~' => ['App\Controller\EmployerController', 'update']
];

$route = $_SERVER['REQUEST_URI'];

foreach ($routes as $key => $element) {
    if (preg_match($key, $route)) {
        session_start();
        $class = new $element[0];
        $method = $element[1];
        $class->$method();
        exit;
    }
}
http_response_code(404);
echo 404;

