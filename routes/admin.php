<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => 'admin',
    ], function () {

    Route::get('/', function () {
        return view('admin.homepage');
    });

    Route::get('/login', function () {
        return view('admin.login');
    });

    Route::post('/login', [AdminAuthController::class, 'login']);
});
