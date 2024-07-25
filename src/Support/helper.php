<?php

use MVC\Application;
use MVC\View\View;

if (!function_exists('env')) {

    function env($key, $default = null)
    {
        return $_ENV[$key] ?? value($default);
    }
}

if (!function_exists('app')) {
    function app()
    {
        $instance = null;

        if (!$instance) {

            $instance = new Application();
        }

        return $instance;
    }
}

if (!function_exists('value')) {

    function value($value)
    {
        return ($value instanceof Closure) ? $value() : $value;
    }
}

if (!function_exists('base_path')) {

    function base_path()
    {
        return dirname(__DIR__) . '/../';
    }
}

if (!function_exists('view_path')) {

    function view_path()
    {
        return base_path() . 'views/';
    }
}

if (!function_exists('view')) {
    function view(string $view, $params = [])
    {
        return View::make($view, $params);
    }
}

if (!function_exists('layout')) {
    function layout(string $layout)
    {
        return View::layout($layout);
    }
}
