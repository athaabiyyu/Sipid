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
        return view('admin.status.index', compact('statusData'), [
            'title' => 'Manage Status Laporan | Sipid', 
            'breadcrumb' => 'Data Status Laporan'
        ]);
    }

    /*** Show the form for creating a new resource.*/
    public function create()
    {
        return view('admin.status.create', [
            'title' => 'Tambah Status Laporan | Sipid', 
            'breadcrumb' => 'Tambah Status Laporan'
        ]);
    }

    /*** Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        $request->validate([
            'status_kode' => 'required|min:3|max:10|unique:s_status_laporan,status_kode',
            'status_nama' => 'required|min:3|max:50',
        ]);

        StatusLaporanModel::create($request->all());
        return redirect()->route('admin.status_laporan.index')->with('success', 'Data Berhasil DiTambahkan');
    }

    /*** Show the form for editing the specified resource.*/
    public function edit(string $id)
    {
        $statusData = StatusLaporanModel::find($id);
        return view('admin.status.edit', compact('statusData'), [
            'title' => 'Edit Status Laporan | Sipid', 
            'breadcrumb' => 'Edit Status Laporan'
        ]);
    }

    /*** Update the specified resource in storage. */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status_kode' => 'required|min:3|max:10|unique:s_status_laporan,status_kode,'. $id .',status_id',
            'status_nama' => 'required|min:3|max:50',
        ]); 
        StatusLaporanModel::find($id)->update($request->all());
        return redirect()->route('admin.status_laporan.index')->with('success', 'Data Berhasil DiPerbarui');
    }

    /*** Remove the specified resource from storage. */
    public function destroy(string $id)
    {
        StatusLaporanModel::find($id)->delete();
        return redirect()->route('admin.status_laporan.index')->with('success', 'Data Berhasil DiHapus');
    }
}
