<?php

namespace App\Http\Controllers;

use App\Models\CashAmount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function acceptUser( User $user){
        $user->setAttribute('active', 1);

        do {
            $account_number = rand(1,9);

            for($i=0; $i<33; $i++) {
                $account_number .= rand(0,9);
            }
            $validator = Validator::make(['account_number' => $account_number], ['account_number' => ['required', Rule::unique('users', 'account_number')]]);
        }
        while($validator->fails());

        $user->setAttribute('account_id', $account_number);


        $cash = CashAmount::create([
            'user_id' => $user->getOriginal('id'),
            'amount' => 0,
        ]);

        $user->save();
        return back()->withErrors(['info' => 'Zaakceptowano uzytkownika']);
    }

    public function deleteUser(User $user){
        $user->delete();

        return back()->withErrors(['info' => 'Użytkownik został usunięty']);
    }
}
