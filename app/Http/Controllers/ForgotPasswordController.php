<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
{
    $request->validate([
        'username' => 'required',
    ]);

    $user = User::where('username', $request->username)->first();

    if (!$user) {
        return back()->withErrors(['username' => 'Username tidak ditemukan.']);
    }

    $token = Str::random(60);

    // Simpan token di kolom remember_token
    $user->update([
        'remember_token' => Hash::make($token),
    ]);

    // Arahkan ke halaman reset password dengan token
    return redirect()->route('reset.password', ['token' => $token, 'username' => $user->username]);
}

    public function showResetPasswordForm($token, $username)
    {
        return view('auth.reset-password', ['token' => $token, 'username' => $username]);
    }

    public function resetPassword(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required|confirmed',
        'token' => 'required',
    ]);

    // Cari pengguna berdasarkan username
    $user = User::where('username', $request->username)->first();

    if (!$user) {
        return back()->withErrors(['username' => 'Username tidak ditemukan.']);
    }

    // Cek apakah token valid
    if (!Hash::check($request->token, $user->remember_token)) {
        return back()->withErrors(['token' => 'Token tidak valid.']);
    }

    // Update password pengguna
    $user->update([
        'password' => Hash::make($request->password),
        'remember_token' => null, // Hapus token setelah password berhasil direset
    ]);

    return redirect()->route('login')->with('status', 'Password berhasil direset.');
}

    
}


