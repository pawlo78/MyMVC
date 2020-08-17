<?php

use Dotenv\Dotenv;
use Mvc\Http\Routing\Router;

//zaimplementowanie autoloadera oraz plików (boot.php)
require __DIR__ . '/../loaders/boot.php';
require __DIR__ . '/../routes/web.php';

$router = new Router($_SERVER['REQUEST_URI']);
$router->run();


