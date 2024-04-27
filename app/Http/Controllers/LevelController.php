<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LevelController extends Controller
{
    /*** Display a listing of the resource. */
    public function index()
    {
        $levelData = LevelModel::all();
        return view('admin.level.index', compact('levelData'), [
            'title' => 'Data Level | Sipid',
            'breadcrumb' => 'Manage Data Level'
        ]);
    }

    /*** Show the form for creating a new resource. */
    public function create()
    {
        return view('admin.level.create', [
            'title' => 'Tambah Data Level | Sipid',
            'breadcrumb' => 'Tambah Data Level'
        ]);
    }

    /*** Store a newly created resource in storage. */
    public function store(Request $request)
    {
        $request->validate(
            [
                'level_kode' => 'required|min:3|max:10',
                'level_nama' => 'required|min:3|max:50',
            ]
        );

        // add data
        LevelModel::create($request->all());
        return redirect()->route('admin.level.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /*** Show the form for editing the specified resource. */
    public function edit(string $id)
    {
        $levelData = LevelModel::find($id);
        return view('admin.level.edit', compact('levelData'), [
            'title' => 'Edit Data Level | Sipid',
            'breadcrumb' => 'Edit Data Level'
        ]);
    }

    /*** Update the specified resource in storage. */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'level_kode' => 'required|min:3|max:10',
                'level_nama' => 'required|min:3|max:50',
            ]
        );

        // update
        LevelModel::find($id)->update($request->all());
        return redirect()->route('admin.level.index')->with('success', 'Data Berhasil Diupdate');
    }

    /*** Remove the specified resource from storage.*/
    public function destroy(string $id)
    {
        LevelModel::find($id)->delete();
        return redirect()->route('admin.level.index')->with('success', 'Data Berhasil Dihapus');
    }
}
