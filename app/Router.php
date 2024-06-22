<?php
namespace App;

class Router
{
    protected static $routes = [];

    public static function get($path, $callback)
    {
        static::$routes['get'][$path] = $callback;
    }

    public static function post($path, $callback)
    {
        static::$routes['post'][$path] = $callback;
    }

    public function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function resolve()
    {
        $method = $this->getMethod();
        $path = $_SERVER["REQUEST_URI"];
        $path = str_replace(ROOT_URI, "/", $path);
        $position = strpos($path, "?");
        if ($position) {
            $path = substr($path, 0, $position);
        }

        $callback = false;

        foreach (static::$routes[$method] as $route => $handler) {
            $routePattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([^/]+)', $route);
            if (preg_match('#^' . $routePattern . '$#', $path, $matches)) {
                array_shift($matches);
                $callback = $handler;
                break;
            }
        }

        if ($callback === false) {
            echo "404 NOT FOUND";
            die;
        }

        if (is_callable($callback)) {
            return call_user_func_array($callback, $matches);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0];
            return call_user_func_array($callback, $matches);
        }
    }
}

?>