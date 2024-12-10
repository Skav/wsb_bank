<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('userViews.homepage');
});

Route::post('/register', [AuthController::class, 'register']);

require __DIR__.'/admin.php';
