<?php

use Elaine\Mvc\Controller\PostsController\Error404Controller;
use Elaine\Mvc\Controller\PostsController\FormPostController;
use Elaine\Mvc\Controller\PostsController\ListPostController;
use Elaine\Mvc\Repository\PostsRepository;
use Elaine\Mvc\Repository\UserRepository;


require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new PDO("mysql:host=localhost:3306;dbname=blog", "root", "pha123pj456#18");

$routes = require_once __DIR__ . '/../config/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$validUser = substr($pathInfo, 1, 7);

if ($validUser === 'usuario') {
    $repository = new UserRepository($pdo);
} else {
    $repository = new PostsRepository($pdo);
}

$key = "$httpMethod|$pathInfo";
if(array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($repository);
} else {
    $controller = new Error404Controller();
}

$controller->processaRequisicao();

