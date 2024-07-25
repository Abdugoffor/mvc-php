<?php

namespace MVC;

use MVC\Http\Request;
use MVC\Http\Responce;
use MVC\Http\Route;

class Application
{
    protected Route $route;

    protected Request $request;

    protected Responce $responce;

    public function __construct()
    {
        $this->request = new Request();

        $this->responce = new Responce();

        $this->route = new Route($this->request, $this->responce);
    }
    public function run()
    {
        $this->route->resolve();
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
}
