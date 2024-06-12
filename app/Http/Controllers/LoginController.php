<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        if (strpos(Auth::user()->username, 'admin') !== false) {
            return redirect()->intended('/adminHome');
        }
        return redirect()->intended('/');
    }
    return redirect()->back()->withInput($request->only('username'))->withErrors(['username' => 'Nama atau password salah']);
}


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); 
    }
}
