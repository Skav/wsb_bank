<?php

use App\Http\Controllers\Account\AccountController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
//    'middleware' => 'auth',
    ], function () {
        Route::get('/', function() {
            return view('adminViews.homepage');
        });

        Route::get('/login', function() {
            return view('adminViews.login');
        });
});
