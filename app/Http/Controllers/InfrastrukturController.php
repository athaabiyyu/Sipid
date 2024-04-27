<?php

namespace App\Http\Controllers;

use App\Models\InfrastrukturModel;
use Illuminate\Http\Request;

class InfrastrukturController extends Controller
{
    /*** Display a listing of the resource.*/
    public function index()
    {
        $dataInfrastruktur = InfrastrukturModel::all();

        return view('admin.infrastruktur.index',[
            'title' => 'Infrastruktur | Sipid', 
            'breadcrumb' => 'Data Infrastruktur',
            'dataInfrastruktur' => $dataInfrastruktur,
        ]);
    }

    /*** Show the form for creating a new resource.*/
    public function create()
    {

        $dataInfrastruktur = InfrastrukturModel::all();

        return view('admin.infrastruktur.create', [
            'title' => 'Tambah Infrastruktur | Sipid', 
            'breadcrumb' => 'CRUD Infrastruktur',
            'dataInfrastruktur' => $dataInfrastruktur,
        ]);
    }

    /*** Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        $request->validate([
            'infrastruktur_kode' => 'required|min:3|max:10',
            'infrastruktur_nama' => 'required|max:50',
        ]);

        InfrastrukturModel::create($request->all());
        return redirect('admin/infrastruktur')->with('success', 'Data Berhasil Ditambahkan');
    }

    /*** Show the form for editing the specified resource.*/
    public function edit(string $id)
    {
        $dataInfrastruktur = InfrastrukturModel::find($id);
        return view('admin.infrastruktur.edit',[
            'title' => 'Tambah Infrastruktur | Sipid', 
            'breadcrumb' => 'CRUD Infrastruktur',
            'dataInfrastruktur' => $dataInfrastruktur,
        ]);
    }

    /*** Update the specified resource in storage.*/
    public function update(Request $request, string $id)
    {
        $request->validate([
            'infrastruktur_kode' => 'required|min:3|max:10',
            'infrastruktur_nama' => 'required|max:50',
        ]);

        InfrastrukturModel::find($id)->update($request->all());
        return redirect('admin/infrastruktur')->with('success', 'Data Berhasil Diperbarui');
    }

    /*** Remove the specified resource from storage.*/
    public function destroy(string $id)
    {
        InfrastrukturModel::find($id)->delete();
        return redirect('admin/infrastruktur')->with('success', 'Data Berhasil Dihapus');
    }
}
