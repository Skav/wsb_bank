<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('user.homepage');
});

Route::get('/register', function () {
    return view('user.register');
});

Route::get('/login', function () {
    return view('user.login');
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/login', [AuthController::class, 'login']);

require __DIR__.'/admin.php';
