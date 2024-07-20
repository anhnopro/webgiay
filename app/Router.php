<?php
namespace App;

class Router
{
    protected static $routes = [];
    protected static $prefix = '';

    public static function prefix($prefix, $callback)
    {
        $parentPrefix = static::$prefix;
        static::$prefix .= rtrim($prefix, '/') . '/';

        call_user_func($callback);

        static::$prefix = $parentPrefix;
    }

    public static function get($path, $callback)
    {
        static::$routes['get'][static::$prefix . ltrim($path, '/')] = $callback;
    }

    public static function post($path, $callback)
    {
        static::$routes['post'][static::$prefix . ltrim($path, '/')] = $callback;
    }

    public function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function resolve()
    {
        $method = $this->getMethod();
        $path = $_SERVER["REQUEST_URI"];
        
        // Remove ROOT_URI from the beginning of the path
        $path = str_replace(ROOT_URI, '', $path);
        
        // Remove query string if present
        $position = strpos($path, "?");
        if ($position !== false) {
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
            http_response_code(404);
            echo "404 NOT FOUND - The requested URL " . htmlspecialchars($path) . " was not found on this server.";
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
    

    // Method to return registered routes for debugging
    public static function getRegisteredRoutes()
    {
        return static::$routes;
    }
}
?>
