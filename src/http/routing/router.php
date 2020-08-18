<?php

namespace Mvc\Http\Routing;
use Mvc\Http\Routing\Excaptions\RouterException;
use Mvc\Http\Request\Request;

class Router {

    private string $path;
    private static Route $routes;
    private Request $request;

    public function __construct($path, Route $routes = null, Request $request = null) {
        $this->path = $path;
        
        if($routes)
            self::$routes = $routes;        

        if($request)
            $this->request = $request;
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

    //wydobycie wartości parametru
    private function setGetData(array $route) {
        $trim = explode('{', $route['path']);
        $parsedPath = preg_replace("#$trim[0]#", '', $this->path, 1);

        foreach ($route['params'] as $param) {
            preg_match("#[a-zA-Z0-9-]+#", $parsedPath, $results);
            $tempPath = explode($results[0], $parsedPath, 2);
            $parsedPath = $tempPath[1];
            $_GET[$param] = $results[0];
        }
    }


    public function run() {        
        try {
            foreach (self::$routes->getRoutes() as $route) {
                
                if($this->matchRoute($route)) {
                    $this->setGetData($route);
                    return call_user_func_array($route['action'], [$this->request]);
                }
            }
            throw new RouterException('No route found');
        } catch(RouterException $rex) {
            exit($rex->report());
        }
    }


}