<?php

namespace Mvc\Http\Routing;

use Mvc\Http\Routing\Excaptions\RouterException;

class Router {

    private string $path;
    private static Route $routes;

    public function __construct($path, Route $routes = null) {
        $this->path = $path;
        
        if($routes)
            self::$routes = $routes;        
    }

    private function matchRoute(array $route) {
        
        $params = [];

        foreach ($route['params'] as $param) {
            $params['{' . $param . '}']  = '[a-zA-Z0-9-]+';
        }
        
        $path = str_replace(array_keys($params), $params, $route['path']);
        preg_match("#^$path$#", $this->path, $results);

        if($results)
            return true;

        return false;

    }

    public function run() {        
        try {
            foreach (self::$routes->getRoutes() as $route) {
                if($this->matchRoute($route))
                    return call_user_func($route['action']);
            }
            throw new RouterException('No route found');
        } catch(RouterException $rex) {
            exit($rex->report());
        }
    }


}