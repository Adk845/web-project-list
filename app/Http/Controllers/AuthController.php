<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    
        // Cek apakah username benar tapi password salah
        $user = \App\Models\User::where('username', $request->username)->first();
        
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // Jika login berhasil, redirect ke halaman dashboard
                Auth::login($user);
                return redirect()->intended('project');
            } else {
                // Jika password salah, redirect kembali dengan pesan khusus
                return back()->withErrors([
                    'password' => 'Password salah.'
            ])->withInput($request->only('username'));
            }
        } else {
            // Jika username salah
            return back()->withErrors([
                'username' => 'Username tidak ditemukan.',
            ])->withInput($request->only('username'));
        }
    }
    

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
