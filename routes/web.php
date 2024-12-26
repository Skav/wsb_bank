<?php

use App\Http\Controllers\TransactionsHistoryAmountController;
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
    $transactions = TransactionsHistoryAmount::where('send', '=', 1)
        ->where('sender_account_number', '=', auth()->user()->getOriginal('account_number'))
        ->orWhere('receiver_account_number', '=', auth()->user()->getOriginal('account_number'))
        ->limit(10)
        ->get();

    $waiting_transactions = TransactionsHistoryAmount::where('send', '=', 0)
        ->where('sender_account_number', '=', auth()->user()->getOriginal('account_number'))
        ->limit(10)
        ->get();

    return view('user.profile', ['cash' => $cash, 'transactions' => $transactions, 'waiting_transactions' => $waiting_transactions]);
})->middleware('loggedUser');

Route::get('/sendTransfer', function () {
    return view('user.sendTransfer');
})->middleware('loggedUser');

Route::post('/sendTransfer', [TransactionsHistoryAmountController::class, 'sendTransfer'])->middleware('loggedUser');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/login', [AuthController::class, 'login']);

require __DIR__.'/admin.php';
