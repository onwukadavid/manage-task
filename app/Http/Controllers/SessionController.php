<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        # get login detals
        $credentials = $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required']
        ]);

        # check if user exists and authenticates the user
        if(Auth::attempt($credentials))
        {
            # regenerate session token
            $request->session()->regenerateToken();

            # redirect to dashboard
            return redirect()->intended(route('home'));
        }

        return back()->withErrors(['email'=>'The provided credentials do not match our records.'])->onlyInput('email');

    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('home'));
    }
}
