<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Models\User;
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

    Route::get('/acceptUser', function () {
        $users = User::where('active', '=', 0)->get();
        return view('admin.acceptUser', ['users' => $users]);
    });

    Route::post('/acceptUser/{user}', [AdminController::class, 'acceptUser']);
    Route::delete('/deleteUser/{user}', [AdminController::class, 'deleteUser']);

    Route::post('/login', [AdminAuthController::class, 'login']);
});
