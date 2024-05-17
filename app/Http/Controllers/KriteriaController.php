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

        // Subquery untuk mendapatkan laporan_id terbaru untuk setiap kombinasi infrastruktur dan lokasi
        $dataAlternatif = LaporanModel::all();
        $dataMatrik = MatrikModel::all();
        $dataKriteria = KriteriaModel::all();

        return view('admin.kriteria.index', [
            'breadcrumb' => 'Kriteria',
            'title' => 'Kriteria | Sipid',
            'dataKriteria' => $dataKriteria,
            'dataAlternatif' => $dataAlternatif,
            'dataMatrik' => $dataMatrik
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

    public function updateNilai(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'matrik_nilai' => 'required|numeric',
            'kriteria_id' => 'required'
        ]);

        // Cari matrik berdasarkan laporan ID
        $matrik = MatrikModel::where('laporan_id', $id)
            ->where('kriteria_id', $request->kriteria_id)
            ->first();

        // Jika matrik sudah ada, update nilai; jika tidak, buat baru
        if ($matrik) {
            $matrik->matrik_nilai = $request->matrik_nilai;
            $matrik->save();
        } else {
            MatrikModel::create([
                'laporan_id' => $id,
                'kriteria_id' => $request->kriteria_id,
                'matrik_nilai' => $request->matrik_nilai,
            ]);
        }

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.kriteria.index')->with('success', 'Nilai kriteria berhasil diperbarui');
    }
}
