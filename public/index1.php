<?php
session_start();

$routes = require_once "../app/routes/web.php";

$route = $_GET['route'] ?? 'login';

if (!array_key_exists($route, $routes)) {
    echo "404";
    exit;
}

$controllerName = $routes[$route]['controller'];
$method = $routes[$route]['method'];

require_once "../app/controllers/$controllerName.php";

$controller = new $controllerName();

$controller->$method();
