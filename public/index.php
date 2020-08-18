<?php

use Dotenv\Dotenv;
use Mvc\Http\Routing\Router;
use Mvc\Http\Request\Request;

//zaimplementowanie autoloadera oraz plików (boot.php)
require __DIR__ . '/../loaders/boot.php';
require __DIR__ . '/../routes/web.php';

$request = new Request();
$router = new Router($_SERVER['REQUEST_URI'], null, $request);
$router->run();


