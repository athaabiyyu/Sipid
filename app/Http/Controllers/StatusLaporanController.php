<?php

namespace App\Http\Controllers;

use App\Models\StatusLaporanModel;
use Illuminate\Http\Request;

class StatusLaporanController extends Controller
{
    /*** Display a listing of the resource.*/
    public function index()
    {
        $statusData = StatusLaporanModel::all();
        return view('status.index', compact('statusData'));
    }

    /*** Show the form for creating a new resource.*/
    public function create()
    {
        return view('status.create');
    }

    /*** Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        $request->validate([
            'status_kode' => 'required',
            'status_nama' => 'required',
        ]);

        StatusLaporanModel::create($request->all());
        return redirect()->route('status_laporan.index')->with('success', 'Data Berhasil DiTambahkan');
    }

    /*** Display the specified resource.*/
    public function show(string $id)
    {
        $statusData = StatusLaporanModel::find($id);
        return view('status.show', compact('statusData'));
    }

    /*** Show the form for editing the specified resource.*/
    public function edit(string $id)
    {
        $statusData = StatusLaporanModel::find($id);
        return view('status.edit', compact('statusData'));
    }

    /*** Update the specified resource in storage. */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status_kode' => 'required',
            'status_nama' => 'required',
        ]);
        StatusLaporanModel::find($id)->update($request->all());
        return redirect()->route('status_laporan.index')->with('success', 'Data Berhasil DiPerbarui');
    }

    /*** Remove the specified resource from storage. */
    public function destroy(string $id)
    {
        StatusLaporanModel::find($id)->delete();
        return redirect()->route('status_laporan.index')->with('success', 'Data Berhasil DiHapus');
    }
}
