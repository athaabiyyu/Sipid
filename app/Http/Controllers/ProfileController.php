<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profileAdmin() {
        // Ambil data pengguna yang login
        $dataUser = UserModel::findOrFail(auth()->user()->user_id);

        return view('admin.profile.profile', [
            'title' => 'Profile | Sipid',
            'breadcrumb' => 'Halaman Profile',
            'dataUser' => $dataUser
        ]);
    }
    public function editProfileAdmin(Request $request) {
        /** @var User $user */

        $user = auth()->user();
    
        $dataProfile = $request->validate([
            'user_nik' => 'nullable|min:16|max:16|unique:s_user,user_nik,' . $user->user_id . ',user_id',
            'user_nama' => 'nullable|max:100',
            'user_nomor' => 'nullable|min:10|max:12',
            'user_foto' => 'nullable|image|file|max:1024',
            'user_alamat' => 'nullable|min:10|max:100',
        ], [
            'user_nik.min' => 'NIK harus terdiri dari 16 karakter.',
            'user_nik.max' => 'NIK harus terdiri dari 16 karakter.',
            'user_nik.unique' => 'NIK ini sudah terdaftar.',
            'user_nama.max' => 'Nama tidak boleh lebih dari 100 karakter.',
            'user_nomor.min' => 'Nomor telepon minimal terdiri dari 10 karakter.',
            'user_nomor.max' => 'Nomor telepon maksimal terdiri dari 12 karakter.',
            'user_foto.image' => 'Foto profil harus berupa gambar.',
            'user_foto.max' => 'Ukuran foto profil tidak boleh lebih dari 1MB.',
            'user_alamat.min' => 'Alamat minimal terdiri dari 10 karakter.',
            'user_alamat.max' => 'Alamat tidak boleh lebih dari 100 karakter.',
        ]);
    
        // Simpan bukti laporan di storage lokal
        if ($request->file('user_foto')) {
            $dataProfile['user_foto'] = $request->file('user_foto')->store('img-profile_user');
        }
    
        // Edit data
        $user->update($dataProfile);
    
        return redirect()->route('admin.profile')->with('success', 'Profil Berhasil di Perbarui');
    }
    public function sandiAdmin() {
        // Ambil data pengguna yang login
        $dataUser = UserModel::findOrFail(auth()->user()->user_id);

        return view('admin.profile.sandi', [
            'title' => 'Ubah Kata Sandi | Sipid',
            'breadcrumb' => 'Halaman Ubah Kata Sandi',
            'dataUser' => $dataUser,
        ]);
    }
    public function editSandiAdmin(Request $request) {
        /** @var User $user */
        $user = auth()->user();

        // Ambil password lama dari input
        $passwordLama = $request->input('password_lama');

        // Bandingkan password lama yang dimasukkan dengan password yang disimpan
        if (Hash::check($passwordLama, $user->user_password)) {
            // Jika password lama cocok, lanjutkan dengan validasi dan pembaruan password baru
            $dataProfile = $request->validate([
                'user_password' => 'required|min:5'
            ]);

            // Enkripsi password baru
            $dataProfile['user_password'] = Hash::make($dataProfile['user_password']);

            // Perbarui password
            $user->update($dataProfile);

            return redirect()->route('admin.sandi')->with('success', 'Kata Sandi Berhasil di Perbarui');
        } else {
            // Jika password lama tidak cocok, kembalikan dengan pesan kesalahan
            return redirect()->route('admin.sandi')->with('error', 'Kata Sandi Lama Salah');
        }
    }


    public function profileRw() {
        // Ambil data pengguna yang login
        $dataUser = UserModel::findOrFail(auth()->user()->user_id);

        return view('rw.profile.profile', [
            'title' => 'Profile | Sipid',
            'breadcrumb' => 'Halaman Profile',
            'dataUser' => $dataUser
        ]);
    }
    public function editProfileRw(Request $request) {
        /** @var User $user */

        $user = auth()->user();
    
        $dataProfile = $request->validate([
            'user_nik' => 'nullable|min:16|max:16|unique:s_user,user_nik,' . $user->user_id . ',user_id',
            'user_nama' => 'nullable|max:100',
            'user_nomor' => 'nullable|min:10|max:12',
            'user_foto' => 'nullable|image|file|max:1024',
            'user_alamat' => 'nullable|min:10|max:100',
        ], [
            'user_nik.min' => 'NIK harus terdiri dari 16 karakter.',
            'user_nik.max' => 'NIK harus terdiri dari 16 karakter.',
            'user_nik.unique' => 'NIK ini sudah terdaftar.',
            'user_nama.max' => 'Nama tidak boleh lebih dari 100 karakter.',
            'user_nomor.min' => 'Nomor telepon minimal terdiri dari 10 karakter.',
            'user_nomor.max' => 'Nomor telepon maksimal terdiri dari 12 karakter.',
            'user_foto.image' => 'Foto profil harus berupa gambar.',
            'user_foto.max' => 'Ukuran foto profil tidak boleh lebih dari 1MB.',
            'user_alamat.min' => 'Alamat minimal terdiri dari 10 karakter.',
            'user_alamat.max' => 'Alamat tidak boleh lebih dari 100 karakter.',
        ]);
    
        // Simpan bukti laporan di storage lokal
        if ($request->file('user_foto')) {
            $dataProfile['user_foto'] = $request->file('user_foto')->store('img-profile_user');
        }
    
        // Edit data
        $user->update($dataProfile);
    
        return redirect()->route('rw.profile')->with('success', 'Profil Berhasil di Perbarui');
    }
    public function sandiRw() {
        // Ambil data pengguna yang login
        $dataUser = UserModel::findOrFail(auth()->user()->user_id);

        return view('rw.profile.sandi', [
            'title' => 'Ubah Kata Sandi | Sipid',
            'breadcrumb' => 'Halaman Ubah Kata Sandi',
            'dataUser' => $dataUser,
        ]);
    }
    public function editSandiRw(Request $request) {
        /** @var User $user */
        $user = auth()->user();

        // Ambil password lama dari input
        $passwordLama = $request->input('password_lama');

        // Bandingkan password lama yang dimasukkan dengan password yang disimpan
        if (Hash::check($passwordLama, $user->user_password)) {
            // Jika password lama cocok, lanjutkan dengan validasi dan pembaruan password baru
            $dataProfile = $request->validate([
                'user_password' => 'required|min:5'
            ]);

            // Enkripsi password baru
            $dataProfile['user_password'] = Hash::make($dataProfile['user_password']);

            // Perbarui password
            $user->update($dataProfile);

            return redirect()->route('rw.sandi')->with('success', 'Kata Sandi Berhasil di Perbarui');
        } else {
            // Jika password lama tidak cocok, kembalikan dengan pesan kesalahan
            return redirect()->route('rw.sandi')->with('error', 'Kata Sandi Lama Salah');
        }
    }
}
