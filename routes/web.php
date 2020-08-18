<?php
use Mvc\Http\Routing\Route;
use Mvc\Http\Routing\Router;
use App\Http\Controllers;
use App\Http\Controllers\ExampleController;
use Mvc\Http\Request\Request;


$routes = new Route();

$routes->set('/', function() {
    ExampleController::index();
});


$routes->set('/contact', function() {
    echo 'contact';
});


$routes->set('/entry/{id}', function(Request $request) {
    echo response()->json($request->getAll());
}, ['id']);


$router = new Router($_SERVER['REQUEST_URI'], $routes);
