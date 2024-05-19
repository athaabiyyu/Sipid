<?php

namespace App\Http\Controllers;

use App\Models\KriteriaModel;
use App\Models\LaporanModel;
use App\Models\MatrikModel;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {

        $dataKriteria = KriteriaModel::all();

        return view('admin.kriteria.index', [
            'breadcrumb' => 'Kriteria',
            'title' => 'Kriteria | Sipid',
            'dataKriteria' => $dataKriteria,
        ]);
    }

    public function edit($id)
    {
        // Ambil data pengguna yang login
        $dataKriteria = KriteriaModel::findOrFail($id);

        return view('admin.kriteria.edit', [
            'title' => 'Edit Kriteria | Sipid',
            'breadcrumb' => 'Halaman Edit Kriteria',
            'dataKriteria' => $dataKriteria
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasiData = $request->validate([
            'kriteria_kode' => 'required|max:10',
            'kriteria_nama' => 'required|min:3|max:50',
            'kriteria_bobot' => 'required',
            'kriteria_attribut' => 'required',
        ]);

        KriteriaModel::find($id)->update($validasiData);
        return redirect()->route('admin.kriteria.index')->with('success', 'Data Kriteria berhasil di perbarui');
    }
}
