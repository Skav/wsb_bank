<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use MongoDB\Driver\Session;

class AdminAuthController extends Controller
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


        return back()->withErrors([
            "created" => "Konto zostało utworzone! Obecnie czeka na weryfikacje przez pracownika banku"
        ]);
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
            $user = auth()->user();
            session()->put("name", $user->getOriginal("name"));
            session()->put("surname", $user->getOriginal("surname"));
            session()->put("email", $user->getOriginal("email"));
            session()->put("active", $user->getOriginal("active"));
            session()->put("rank", $user->getOriginal("rank_id"));
            session()->put("account_id", $user->getOriginal("account_id"));

            try {
                if (session()->get('active') == 1 && (session()->get('rank') == '1' || session()->get('rank') == '2')) {
                    return redirect('/admin');
                }
                else{
                    $request->session()->flush();
                    return back()->withErrors(['error' => "Konto nie jest aktywowane"]);
                }
            }
            catch (\Exception $e) {
                $request->session()->flush();
                return back()->withErrors(['error' => "Niespodziewany bład"]);
            }
        }

        return back()->withErrors(['error' => "Niepoprawny login lub hasło"]);
    }
}
