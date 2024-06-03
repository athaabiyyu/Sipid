<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index()
    {
        return view(
            'auth.login',
            [
                'title' => 'Login | Sipid',
            ]
        );
    }

    // autentikasi login
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'user_password' => 'required|min:5'
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username harus terdiri dari 16 karakter.',
            'username.max' => 'Username harus terdiri dari 16 karakter.',
            'user_password.required' => 'Password wajib diisi.',
            'user_password.min' => 'Password minimal terdiri dari 5 karakter.'
        ]);

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['user_password']])) {
            $request->session()->regenerate();

            // cek level id user yang login
            if(auth()->user()->level_id == 1) {
                return redirect()->intended('/admin');
            } elseif(auth()->user()->level_id == 2) {
                return redirect()->intended('/rw');
            } else {
                return redirect()->intended('/laporan');
            }
            
        }

        return back()->with('loginGagal', 'Username atau Password Salah');
    }

    // logout
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
