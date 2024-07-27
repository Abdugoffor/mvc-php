<?php

use App\Controllers\TestController;
use MVC\Http\Route;

Route::get('/', [TestController::class, 'index']);
Route::get('/create', [TestController::class, 'create']);
Route::post('/store', [TestController::class, 'store']);
Route::get('/postShow/{id}', [TestController::class, 'postShow']);
