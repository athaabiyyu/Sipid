<?php
namespace App\Http\Controllers;

use App\Models\KriteriaModel;
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

    // public function edit($id)
    // {
    //     $dataKriteria = KriteriaModel::findOrFail($id);

    //     return view('admin.kriteria.edit', [
    //         'title' => 'Edit Kriteria | Sipid',
    //         'breadcrumb' => 'Halaman Edit Kriteria',
    //         'dataKriteria' => $dataKriteria
    //     ]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $validasiData = $request->validate([
    //         'kriteria_kode' => 'required|max:10',
    //         'kriteria_nama' => 'required|min:3|max:50',
    //         'kriteria_bobot' => 'required|numeric|min:0|max:1',
    //         'kriteria_attribut' => 'required',
    //     ]);

    //     // Dapatkan bobot kriteria saat ini
    //     $kriteriaSaatIni = KriteriaModel::find($id);
    //     $bobotKriteriaSaatIni = $kriteriaSaatIni->kriteria_bobot;

    //     // Validasi total bobot harus tepat 100%
    //     $totalBobot = KriteriaModel::where('kriteria_id', '!=', $id)->sum('kriteria_bobot') + $validasiData['kriteria_bobot'];

    //     if ($totalBobot != 1) {
    //         return redirect()->back()->withErrors(['kriteria_bobot' => 'Total bobot kriteria harus tepat 100%'])->withInput();
    //     }

    //     $kriteriaSaatIni->update($validasiData);
    //     return redirect()->route('admin.kriteria.index')->with('success', 'Data Kriteria berhasil diperbarui');
    // }
}
