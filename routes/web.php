<?php
use Mvc\Http\Routing\Route;
use Mvc\Http\Routing\Router;
use App\Http\Controllers;
use App\Http\Controllers\ExampleController;

$routes = new Route();

$routes->set('/', function() {
    ExampleController::index();
});

$routes->set('/contact', function() {
    echo 'contact';
});

$routes->set('/entry/{id}', function() {
    echo 'entry';
}, ['id']);

$router = new Router($_SERVER['REQUEST_URI'], $routes);
