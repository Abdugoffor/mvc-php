<?php

use MVC\Http\Request;
use MVC\Http\Responce;
use MVC\Http\Route;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../routes/web.php';

$routes = (new Route(new Request, new Responce));
dd($routes->resolve());