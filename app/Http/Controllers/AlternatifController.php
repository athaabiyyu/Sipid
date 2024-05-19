<?php

namespace App\Http\Controllers;

use App\Models\MatrikModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;
use App\Models\KriteriaModel;
use App\Models\AlternatifModel;
use Illuminate\Routing\Controller;

class AlternatifController extends Controller
{
    public function index()
    {
        // Subquery untuk mendapatkan laporan_id terbaru untuk setiap kombinasi infrastruktur dan lokasi
        $dataAlternatif = LaporanModel::all();
        $dataMatrik = MatrikModel::all();
        $dataKriteria = KriteriaModel::all();

        return view('admin.alternatif.index', [
            'breadcrumb' => 'Halaman Alternatif',
            'title' => 'Perhitungan SPK | Sipid',
            'dataKriteria' => $dataKriteria,
            'dataAlternatif' => $dataAlternatif,
            'dataMatrik' => $dataMatrik
        ]);
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
        return redirect()->route('admin.alternatif.index')->with('success', 'Nilai kriteria berhasil diperbarui')->withFragment('matrikTable');;
    }

    
}
