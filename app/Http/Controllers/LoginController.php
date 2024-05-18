<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;


class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        // Periksa apakah nama pengguna mengandung kata "admin"
        if (strpos(Auth::user()->username, 'admin') !== false) {
            // Redirect pengguna admin ke halaman admin
            return redirect()->intended('/adminHome');
        }

        // Jika bukan admin, redirect ke halaman utama
        return redirect()->intended('/home');
    }

    // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
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
