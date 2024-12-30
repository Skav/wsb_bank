<?php

namespace App\Http\Controllers;

use App\Models\CashAmount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function acceptUser(User $user){
        $user->setAttribute('active', 1);

        $userAccount = CashAmount::where('user_id', '=', $user->id);

        if($userAccount->count() < 1) {
            do {
                $account_number = rand(1, 9);

                for ($i = 0; $i < 33; $i++) {
                    $account_number .= rand(0, 9);
                }
                $validator = Validator::make(['account_number' => $account_number], ['account_number' => ['required', Rule::unique('users', 'account_number')]]);
            } while ($validator->fails());

            $user->setAttribute('account_number', $account_number);


            $cash = CashAmount::create([
                'user_id' => $user->getOriginal('id'),
                'amount' => 0,
            ]);
        }

        $user->save();
        return back()->withErrors(['info' => 'Zaakceptowano uzytkownika']);
    }

    public function editUser(User $user, Request $request){
        $incoming_fields = $request->validate([
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:9', 'max:9'],
            'age' => ['required', 'numeric', 'min:12'],
            'gender' => ['required', 'in:male,female'],
            'rank_id' => ['required', Rule::exists('ranks', 'id')],
        ]);


        if ($request->has('password') && !empty($request->get('password'))) {
            $passowords = $request->validate([
                'password' => ['required', 'min:6'],
                'confirm_password' => ['required', 'min:6', 'same:password'],
            ]);

            if($passowords['password'] != $passowords['confirm_password']){
                return back()->withErrors(['error', "Hasła muszą być identyczne!"]);
            }
            $user->setAttribute('password', Hash::make($passowords['password']));
        }

        if ($request->has('active')) {
            $this->acceptUser($user);
        }
        else {
            $this->deactivateUser($user);
        }

        $user->update($incoming_fields);
        $user->save();

        return back()->withErrors(['info' => 'Zaaktualizowano!']);
    }

    public function deleteUser(User $user){
        $user->delete();

        return back()->withErrors(['info' => 'Użytkownik został usunięty']);
    }

    public function  deactivateUser(User $user)
    {
        $user->setAttribute('active', 0);
        $user->save();

        return back()->withErrors(['info' => 'Zdeaktywowano uzytkownika']);
    }

    public function addUser(Request $request) {
        $incoming_fields = $request->validate([
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone' => ['required', 'min:9', 'max:9'],
            'password' => ['required', 'min:6'],
            'confirm_password' => ['required', 'min:6', 'same:password'],
            'age' => ['required', 'numeric', 'min:12'],
            'gender' => ['required', 'in:male,female'],
            'rank_id' => ['required', Rule::exists('ranks', 'id')],
        ]);

        $incoming_fields['password'] = bcrypt($incoming_fields['password']);
        $incoming_fields['confirm_password'] = "";
        $user = User::create($incoming_fields);

        if ($request->has('active')) {
            $this->acceptUser($user);
        }


        return back()->withErrors([
            "created" => "Konto zostało utworzone!"
        ]);
    }
}
