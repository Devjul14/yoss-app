<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => 'email:rfc,dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return redirect('login')->with('loginError', 'Login !');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
