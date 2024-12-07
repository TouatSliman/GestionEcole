<?php
class Router
{

    protected $routes = [];
    public function addRoute($method, $uri, $controller)
    {
        $this->routes[$method][$uri] = $controller;
    }

    public function matchRequest()
    {
        $uri = $_SERVER["REQUEST_URI"];
        $method = $_SERVER["REQUEST_METHOD"];
        $uri = parse_url($uri)["path"];
        
        if (array_key_exists($uri, $this->routes[$method])) {
            return $this->routes[$method][$uri]();
        }

        $this->abort();
    }

    private function abort($code = 404)
    {
        http_response_code($code);
        include "views/404.php";
        die();
    }
}
