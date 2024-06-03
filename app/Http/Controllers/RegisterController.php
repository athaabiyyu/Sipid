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
            'username' => 'required',
            'user_nama' => 'required|min:5|max:100',
            'user_alamat' => 'required|min:5|max:100',
            'user_nomor' => 'required|min:10|max:12',
            'user_password' => 'required|min:5'
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username harus terdiri dari 16 karakter.',
            'username.max' => 'Username harus terdiri dari 16 karakter.',
            'user_nama.required' => 'Nama wajib diisi.',
            'user_nama.min' => 'Nama harus terdiri dari minimal 5 karakter.',
            'user_nama.max' => 'Nama maksimal terdiri dari 100 karakter.',
            'user_alamat.required' => 'Alamat wajib diisi.',
            'user_alamat.min' => 'Alamat harus terdiri dari minimal 5 karakter.',
            'user_alamat.max' => 'Alamat maksimal terdiri dari 100 karakter.',
            'user_nomor.required' => 'Nomor telepon wajib diisi.',
            'user_nomor.min' => 'Nomor telepon harus terdiri dari minimal 10 karakter.',
            'user_nomor.max' => 'Nomor telepon maksimal terdiri dari 12 karakter.',
            'user_password.required' => 'Password wajib diisi.',
            'user_password.min' => 'Password minimal terdiri dari 5 karakter.'
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
