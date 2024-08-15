<?php

namespace Framework;

use App\Controllers\ErrorController;

class Router
{
    protected $routes = [];

    /**
     * Add a new route
     * 
     * @param string $method
     * @param string $uri
     * @param string $action
     * @return void
     */

    public function registerRoute($method, $uri, $action)
    {
        list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
        ];
    }


    /**
     * Add Get route
     * 
     * @param string $uri
     * @param string $controller
     */

    public function get($uri, $controller)
    {
        $this->registerRoute('GET', $uri, $controller);
    }

    /**
     * Add POST route
     * 
     * @param string $uri
     * @param string $controller
     */

    public function post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    /**
     * Add PUT route
     * 
     * @param string $uri
     * @param string $controller
     */

    public function put($uri, $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    /**
     * Add DELETE route
     * 
     * @param string $uri
     * @param string $controller
     */

    public function delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }


    /**
     * Route the Reqiest
     * 
     * @param String $uri
     * @param string $method
     * @return void
     */
    public function route($uri)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        foreach ($this->routes as $route) {
            //Split the current URI into segments
            $uriSegments = explode('/', trim($uri, '/'));

            //Split the route URI into segments
            $routeSegments = explode('/', trim($route['uri'], '/'));

            $match = true;

            //check if the number of segments matches
            if (count($uriSegments) === count($routeSegments) && strtoupper($route['method'] === $requestMethod)) {
                $params = [];
                $match = true;
                for ($i = 0; $i < count($uriSegments); $i++) {
                    if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }

                    if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }

                if ($match) {
                    $controller = 'App\\Controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];

                    //Instatiate the controller and call the method
                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);
                    return;
                }
            }
        }
        ErrorController::notFound();
    }
}
