<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userData = UserModel::all();
        return view('user.index', compact('userData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userData = UserModel::all();
        return view('user.create', compact('userData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'required',
            'user_nik' => 'required|min:16|max:16',
            'user_nama' => 'required|max:30',
            'user_password' => 'required|min:5',
            'user_foto' => 'required',
        ]);

        // create
        UserModel::create($request->all());
        return redirect()->route('user.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userData = UserModel::findOrFail($id);
        return view('user.show', compact('userData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userData = UserModel::find($id);
        return view('user.edit', compact('userData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validLevelIds = LevelModel::pluck('level_id')->toArray();

        $request->validate([
            'level_id' => ['required', Rule::in($validLevelIds)],
            'user_nik' => 'required|min:16|max:16',
            'user_nama' => 'required|max:30',
            'user_password' => 'required|min:5',
            // 'user_foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ], [
            'level_id.in' => 'The selected level is invalid.', // Pesan kesalahan kustom untuk aturan validasi in
            'user_foto.image' => 'The user photo must be an image file.', // Pesan kesalahan kustom untuk aturan validasi gambar
            'user_foto.mimes' => 'The user photo must be a file of type: jpeg, png, jpg, gif.', // Pesan kesalahan kustom untuk aturan validasi jenis file
            // 'user_foto.max' => 'The user photo may not be greater than 2MB in size.', 
        ]);

        // Lakukan pembaruan data pengguna di sini
        UserModel::find($id)->update($request->all());
        return redirect()->route('user.index')->with('success', 'Data Berhasil Diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserModel::find($id)->delete();
        return redirect()->route('user.index')->with('success', 'Data Berhasil Dihapus');
    }
}
