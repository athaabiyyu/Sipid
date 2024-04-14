<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levelData = LevelModel::all();
        return view('level.index', compact('levelData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'level_kode' => 'required',
                'level_nama' => 'required',
            ]
        );

        // add data
        LevelModel::create($request->all());
        return redirect()->route('level.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, LevelModel $levelData)
    {
        $levelData = LevelModel::findOrFail($id);
        return view('level.show', compact('levelData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $levelData = LevelModel::find($id);
        return view('level.edit', compact('levelData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'level_kode' => 'required',
                'level_nama' => 'required',
            ]
        );

        // update
        $levelData = LevelModel::find($id)->update($request->all());
        return redirect()->route('level.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LevelModel::find($id)->delete();
        return redirect()->route('level.index')->with('success', 'Data Berhasil Dihapus');
    }
}
