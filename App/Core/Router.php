<?php

namespace App\Core;

use Exception;

class Router
{
    private $routes = [];

    public function get($path, $callback, $name = null)
    {
        $this->routes[] = [
            'path' => $path,
            'method' => 'GET',
            'callback' => $callback,
            'name' => $name
        ];
    }

    public function post($path, $callback, $name = null)
    {
        $this->routes[] = [
            'path' => $path,
            'method' => 'POST',
            'callback' => $callback,
            'name' => $name
        ];
    }

    public function put($path, $callback, $name = null)
    {
        $this->routes[] = [
            'path' => $path,
            'method' => 'PUT',
            'callback' => $callback,
            'name' => $name
        ];
    }

    public function delete($path, $callback, $name = null)
    {
        $this->routes[] = [
            'path' => $path,
            'method' => 'DELETE',
            'callback' => $callback,
            'name' => $name
        ];
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['path'] === $path && $route['method'] === $method) {
                $callback = $route['callback'];
                if (is_string($callback)) {
                    $this->executeControllerAction($callback);
                } else if (is_callable($callback)) {
                    call_user_func($callback);
                } else {
                    throw new Exception("Invalid route callback");
                }
                return;
            }
        }

        http_response_code(404);
        echo "Page not found";
    }

    private function executeControllerAction($controllerAction)
    {
        list($controllerName, $actionName) = explode('@', $controllerAction);

        $controllerClass = "App\\Controllers\\{$controllerName}";
        if (!class_exists($controllerClass)) {
            throw new Exception("Controller class not found");
        }

        $controller = new $controllerClass();
        if (!method_exists($controller, $actionName)) {
            throw new Exception("Controller action not found");
        }

        call_user_func([$controller, $actionName]);
    }

    public function name($name)
    {
        $lastRoute = end($this->routes);
        if ($lastRoute) {
            $lastRoute['name'] = $name;
        }
        return $this;
    }
}