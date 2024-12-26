<?php

namespace App\Http\Controllers;

use App\Models\CashAmount;
use App\Models\TransactionsHistoryAmount;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionsHistoryAmountController extends Controller
{
    public function sendTransfer(Request $request){
        $incoming_fields = $request->validate([
            'receiverName' => 'required',
            'accountNumber' => ['required', 'numeric', 'digits_between:34,34'],
            'transferAmount' => ['required', 'numeric'],
            'transferTitle' => ['required']
        ]);

        $userCashAmount = CashAmount::where('user_id', auth()->id())->first();

        if ($userCashAmount < $incoming_fields['transferAmount']) {
            return back()->withErrors([
                'transferAmount' => 'Brak wystarczających środków na koncie!'
            ]);
        }

        $userAccountNumber = auth()->user()->getOriginal("account_number");

        if($userAccountNumber == $incoming_fields['accountNumber']){
            return back()->withErrors([
                'accountNumber' => 'Nie możesz przelać pieniędzy sobie samemu!'
            ]);
        }

        $userCashAmount->amount -= $incoming_fields['transferAmount'];
        $amountSaved = $userCashAmount->save();


        if(!$amountSaved){
            return back()->withErrors([
                'error' => "Wystąpił nieoczekiwany bład"
            ]);
        }

        $transaction = TransactionsHistoryAmount::create([
            'title' => $incoming_fields['transferTitle'],
            'amount' => $incoming_fields['transferAmount'],
            'sender_account_number' => $userAccountNumber,
            'receiver_account_number' => $incoming_fields['accountNumber'],
            'receiver_fullname' => $incoming_fields['receiverName'],
            'sender_fullname' => session('name') . " " . session('surname'),
        ]);

        return back()->withErrors([
            'success' => "Wysłano przelew!"
        ]);
    }

    public function sendWaitingTransfers(){
        $waitingTransactions = TransactionsHistoryAmount::where('send', '=', '0')->get();

        foreach($waitingTransactions as $transaction){
            $receiverUserId = User::where('account_number', '=', $transaction->receiver_account_number)->get('id')->first();

            if ($receiverUserId){
                $userCashAmount = CashAmount::where('user_id', '=', $receiverUserId->id)->first();

                if($userCashAmount) {
                    $userCashAmount->amount += $transaction->amount;
                    $userCashAmount->save();
                }
            }

            $transaction->send = 1;
            $isTransactionUpdated = $transaction->save();

            if(!$isTransactionUpdated){
                return false;
            }

        }

        return true;
    }
}
