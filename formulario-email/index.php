<?php

require_once "vendor/autoload.php";

$routes = require 'routes.php';

if(!array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
    http_response_code(400);
    die;
}

$controller = $routes[$_SERVER['REQUEST_URI']][0];
$action = $routes[$_SERVER['REQUEST_URI']][1];

(new $controller)->$action();