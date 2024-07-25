<?php

namespace MVC\Http;

use MVC\View\View;

class Route
{
    public static array $routes = [];

    public Request $request;

    public Responce $responce;

    public function __construct(Request $request, Responce $responce)
    {
        $this->request = $request;

        $this->responce = $responce;
    }

    public static function get($route, callable|array|string $action)
    {
        self::$routes['get'][$route] = $action;
    }
    public static function post($route, callable|array|string $action)
    {
        self::$routes['post'][$route] = $action;
    }

    public function resolve()
    {
        $path = $this->request->path();

        $method = $this->request->method();

        $action = self::$routes[$method][$path] ?? false;

        // if (array_key_exists($path, self::$routes[$method])) {
        //     dd('Route not found');
        // }

        if (!$action) {
            // 404
            View::error('404');
        }

        if (is_callable($action)) {
            // function bo'lganda ishga tushadi
            call_user_func_array($action, []);
        }

        if (is_array($action)) {
            // massiz bo'lgan controller objectini hosil qilib methodga murojat qiladi
            call_user_func_array([new $action[0], $action[1]], []);
        }
    }
}
