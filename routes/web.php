<?php

use App\Controllers\TestController;
use MVC\Http\Route;

Route::get('/', [TestController::class, 'index']);
Route::get('/create', ['TestController', 'create']);
