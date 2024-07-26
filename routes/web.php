<?php

use App\Controllers\MainController;
use App\Controllers\TestController;
use MVC\Http\Route;

Route::get('/', [TestController::class, 'index']);
Route::get('/create', [TestController::class, 'create']);
Route::post('/createData', [TestController::class, 'createData']);
Route::get('/test', [MainController::class, 'test']);
