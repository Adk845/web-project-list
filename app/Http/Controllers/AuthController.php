<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Mengambil data dari form
        $credentials = $request->only('username', 'password');

        // Proses login menggunakan username dan password
        if (Auth::attempt($credentials)) {
            // Redirect ke halaman dashboard jika berhasil login
            return redirect()->intended('project`');
        }

        // Redirect kembali ke halaman login jika gagal
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
