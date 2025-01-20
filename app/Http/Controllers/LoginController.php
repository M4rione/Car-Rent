<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function process(Request $request)
    {
        $credential = $request->validate([
            'email'=>'required|email',
            'password'=> 'required'
        ],[
            'email.required'=>'Email required!',
            'email.email'=>'Email format is incorrect!',
            'password.required'=>'Password cannot be empty!',
        ]);
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }
        return back()->withErrors([
            'email' => 'the provided credentials do not match our recoeds.'
        ])->onlyInput('email');
    }
}