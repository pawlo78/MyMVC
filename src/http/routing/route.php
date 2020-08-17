<?php

namespace Mvc\Http\Routing;
use Closure;

class Route
{
    
    #Routes array   
    private array $routes = [];

    #Sets route   
    public function set(string $path, \Closure $action, array $params = [])
    {
        $this->routes[] = ['path' => $path,'action' => $action, 'params' => $params];
    }

    #Returns all routes    
    public function getRoutes(): array
    {
        return $this->routes;
    }
}