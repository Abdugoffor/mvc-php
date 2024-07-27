<?php

use Dotenv\Dotenv;
use MVC\Http\Request;
use MVC\Http\Responce;
use MVC\Http\Route;
use MVC\Support\Arr;

require_once __DIR__ . '/../src/Support/helper.php';
require_once base_path() . 'vendor/autoload.php';
require_once base_path() . 'routes/web.php';
require_once base_path() . 'config/config.php';

// $routes = (new Route(new Request, new Responce));

// $routes->resolve();

// $env = Dotenv::createImmutable(base_path());

// $env->load();

app()->run();

// var_dump(Arr::has(['db' => ['host' => 'localhost', ['user' => 'admin']]], 'db.host'));
