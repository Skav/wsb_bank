<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MessageController;
use App\Models\Message;
use App\Models\Rank;
use App\Models\TransactionsHistoryAmount;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'employee',
    'as'         => 'employee.',
    'middleware' => 'employee',
], function () {

    Route::get('/', function () {
        return view('employee.homepage');
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/acceptUser', function () {
        $users = User::where('active', '=', 0)->get();
        return view('employee.acceptUser', ['users' => $users]);
    });

    Route::get('/showUsers', function () {
        $users = User::simplePaginate(10);

        return view('employee.showUsers', ['users' => $users]);
    });

    Route::get('/editUser/{user}', function (User $user) {
        $ranks = Rank::all();
        return view('employee.editUser', ['user' => $user, 'ranks' => $ranks]);
    });

    Route::get('/addUser', function () {
        $ranks = Rank::all();
        return view('employee.addUser', ['ranks' => $ranks]);
    });

    Route::get('/transactionHistory', function () {
        $transactions = TransactionsHistoryAmount::simplePaginate(10);
        return view('employee.transactionHistory', ['transactions' => $transactions]);
    });

    Route::get('/showMessages', function () {
        $messages = Message::where('is_read', '=', false)->simplePaginate(10);
        return view('employee.showMessages', ['messages' => $messages]);
    });

    Route::get('/showAllMessages', function () {
        $messages = Message::simplePaginate(10);
        return view('employee.showAllMessages', ['messages' => $messages]);
    });

    Route::put('/setMessageAsRead/{message}', [MessageController::class, 'setMessageAsReaded']);
    Route::put('/editUser/{user}', [EmployeeController::class, 'editUser']);
    Route::post('/acceptUser/{user}', [EmployeeController::class, 'acceptUser']);
    Route::post('/activateUser/{user}', [EmployeeController::class, 'acceptUser']);
    Route::put('/deactivateUser/{user}', [EmployeeController::class, 'deactivateUser']);
});
