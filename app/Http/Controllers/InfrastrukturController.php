<?php

namespace App\Http\Controllers;

use App\Models\InfrastrukturModel;
use Illuminate\Http\Request;

class InfrastrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infrastrukturData = InfrastrukturModel::all();
        return view('infrastruktur.index', compact('infrastrukturData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('infrastruktur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'infrastruktur_kode' => 'required',
            'infrastruktur_nama' => 'required',
        ]);

        InfrastrukturModel::create($request->all());
        return redirect()->route('infrastruktur.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $infrastrukturData = InfrastrukturModel::findOrFail($id);
        return view('infrastruktur.show', compact('infrastrukturData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $infrastrukturData = InfrastrukturModel::find($id);
        return view('infrastruktur.edit', compact('infrastrukturData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'infrastruktur_kode' => 'required',
            'infrastruktur_nama' => 'required',
        ]);

        InfrastrukturModel::find($id)->update($request->all());
        return redirect()->route('infrastruktur.index')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        InfrastrukturModel::find($id)->delete();
        return redirect()->route('infrastruktur.index')->with('success', 'Data Berhasil Dihapus');
    }
}
