<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.registration', [
            'title' => 'Registration | Sipid'
        ]);
    }
    
    public function store(Request $request) {

        // validasi data input
        $validatedData = $request->validate([
            'user_nik' => 'required|min:16|max:16|unique:s_user',
            'user_nama' => 'required|min:5|max:100',
            'user_password' => 'required|min:5'
        ]);
    
        // Enkripsi password
        $validatedData['user_password'] = Hash::make($validatedData['user_password']);
    
        // Set default level id untuk setiap kali data register
        $validatedData['level_id'] = 3;
    
        // Simpan data ke dalam database
        UserModel::create($validatedData);
    
        // Redirect ke halaman utama setelah registrasi berhasil
        return redirect('/')->with('success', 'Berhasil Mendaftarkan Akun!');
    }
    
}
