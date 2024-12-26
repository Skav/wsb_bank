<?php

use App\Http\Controllers\TransactionsHistoryAmountController;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


// Needed to add cronjob for "php artisan schedule:run" for work -> not implemented on test instances for known reasons
Schedule::call(function () {
    $transactionsHistoryAmountController = new TransactionsHistoryAmountController();
    return $transactionsHistoryAmountController->sendWaitingTransfers();
})->name("Send waiting transfers")->everyThreeHours();
