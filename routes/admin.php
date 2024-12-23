<?php

use App\Http\Controllers\Account\AccountController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
//    'middleware' => 'auth',
    ], function () {
        Route::get('/', function() {
            return view('admin.homepage');
        });

        Route::get('/login', function() {
            return view('admin.login');
        });
});
