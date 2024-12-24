<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use MongoDB\Driver\Session;

class AdminAuthController extends Controller
{
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
