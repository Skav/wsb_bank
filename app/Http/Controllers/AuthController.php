<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request) {
        $incoming_fields = $request->validate([
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
            'confirm_password' => ['required', 'min:6', 'same:password'],
            'age' => ['required'],
            'gender' => ['required', 'in:male,female'],
        ]);

        $incoming_fields['rank_id'] = 3;
        $incoming_fields['password'] = bcrypt($incoming_fields['password']);
        $incoming_fields['confirm_password'] = "";
        $user = User::create($incoming_fields);
        auth()->login($user);


        return redirect('/');
    }

    public function logout(Request $request) {
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request) {
        $incoming_fields = $request->validate([
            'email' => ['required', Rule::exists('users', 'email')],
            'password' => ['required'],
        ]);

        if(auth()->attempt($incoming_fields)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors(['loginFailed' => "Nie udalo sie zalogow"]);
    }
}
