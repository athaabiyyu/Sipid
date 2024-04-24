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
            'user_nik' => 'required',
            'user_password' => 'required'
        ]);

        if (Auth::attempt(['user_nik' => $credentials['user_nik'], 'password' => $credentials['user_password']])) {
            $request->session()->regenerate();
            return redirect()->intended('laporan.index');
        }

        return back()->with('loginGagal', 'NIK atau Password Salah');
    }
}
