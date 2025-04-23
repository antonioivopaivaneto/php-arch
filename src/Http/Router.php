<?php

namespace App\Http;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get(string $path, callable $handle):void
    {
        $this->addRoute('GET', $path, $handle);
        
    }
    public function post(string $path, callable $handle):void
    {
        $this->addRoute('POST', $path, $handle);
        
    }

    private function addRoute(string $method, string $path, callable $handle):void
    {
        $this->routes[$method.$path] = $handle;
    }


    public function dispatch(string $method, string $uri):void 
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $key = $method.$uri;

        if(isset($this->routes[$key])){
            call_user_func($this->routes[$key]);
        }else{
            http_response_code(404);
            echo json_encode(["error"=> "Route not found"]);
        }
        
    }

    public static function getInstance(): self
    {
        static $instance;
        if (!$instance) {
            $instance = new self();
        }
        return $instance;
    }
}