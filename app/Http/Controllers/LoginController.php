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
            'user_nik' => 'required|min:16|max:16',
            'user_password' => 'required|min:5'
        ], [
            'user_nik.required' => 'NIK wajib diisi.',
            'user_nik.min' => 'NIK harus terdiri dari 16 karakter.',
            'user_nik.max' => 'NIK harus terdiri dari 16 karakter.',
            'user_password.required' => 'Password wajib diisi.',
            'user_password.min' => 'Password minimal terdiri dari 5 karakter.'
        ]);

        if (Auth::attempt(['user_nik' => $credentials['user_nik'], 'password' => $credentials['user_password']])) {
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

        return back()->with('loginGagal', 'NIK atau Password Salah');
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
