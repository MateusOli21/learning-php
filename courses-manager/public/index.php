<?php

use Mateus\MVC\interfaces\RequisitionControllerInterface;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/routes.php';

$path = $_SERVER['PATH_INFO'];

if(!array_key_exists($path, $routes)){
    http_response_code(404);
    exit();
}

session_start();

if(!isset($_SESSION['logged']) 
    && $path !== null 
    && $path !== '/validate-login' 
    && $path !== '/sign-up'){
    header('Location: /');
    exit();
}

$controllerClass = $routes[$path];
    
/**  @var RequisitionControllerInterface $controller */
$controller = new $controllerClass();
$controller->processRequisition();
