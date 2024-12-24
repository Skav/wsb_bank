<?php

use App\Models\CashAmount;
use App\Models\TransactionsHistoryAmount;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('user.homepage');
})->middleware('user');

Route::get('/register', function () {
    return view('user.register');
});

Route::get('/login', function () {
    return view('user.login');
});

Route::get('/profile', function () {
    $cash = CashAmount::where('user_id', '=', auth()->user()->getOriginal('id'))->first();
    $transactions = TransactionsHistoryAmount::where('sender_account_number', '=', auth()->user()->getOriginal('account_number'))->orWhere('receiver_account_number', '=', auth()->user()->getOriginal('account_number'))->get();
    return view('user.profile', ['cash' => $cash, 'transactions' => $transactions]);
})->middleware('loggedUser');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/login', [AuthController::class, 'login']);

require __DIR__.'/admin.php';
