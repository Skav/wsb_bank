<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Models\Message;
use App\Models\Rank;
use App\Models\TransactionsHistoryAmount;
use App\Models\User;
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

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/acceptUser', function () {
        $users = User::where('active', '=', 0)->get();
        return view('admin.acceptUser', ['users' => $users]);
    });

    Route::get('/showUsers', function () {
        $users = User::with('rank')->simplePaginate(10);

        return view('admin.showUsers', ['users' => $users]);
    });

    Route::get('/editUser/{user}', function (User $user) {
        $ranks = Rank::all();
        return view('admin.editUser', ['user' => $user, 'ranks' => $ranks]);
    });

    Route::get('/addUser', function () {
        $ranks = Rank::all();
        return view('admin.addUser', ['ranks' => $ranks]);
    });

    Route::get('/transactionHistory', function () {
        $transactions = TransactionsHistoryAmount::simplePaginate(10);
        return view('admin.transactionHistory', ['transactions' => $transactions]);
    });

    Route::get('/showMessages', function () {
        $messages = Message::where('is_read', '=', false)->simplePaginate(10);
        return view('admin.showMessages', ['messages' => $messages]);
    });

    Route::get('/showAllMessages', function () {
        $messages = Message::simplePaginate(10);
        return view('admin.showAllMessages', ['messages' => $messages]);
    });

    Route::put('/setMessageAsRead/{message}', [MessageController::class, 'setMessageAsReaded']);
    Route::delete('/deleteMessage/{message}', [MessageController::class, 'deleteMessage']);
    Route::put('/editUser/{user}', [AdminController::class, 'editUser']);
    Route::post('/acceptUser/{user}', [AdminController::class, 'acceptUser']);
    Route::post('/activateUser/{user}', [AdminController::class, 'acceptUser']);
    Route::post('/addUser', [AdminController::class, 'addUser']);
    Route::put('/deactivateUser/{user}', [AdminController::class, 'deactivateUser']);
    Route::delete('/deleteUser/{user}', [AdminController::class, 'deleteUser']);


    Route::post('/login', [AdminAuthController::class, 'login']);
});
