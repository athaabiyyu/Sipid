<?php

namespace App\Http\Controllers;

use App\Models\MatrikModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;
use App\Models\KriteriaModel;
use App\Models\AlternatifModel;
use App\Models\PenilaianKriteriaModel;
use Illuminate\Routing\Controller;

class AlternatifController extends Controller
{
    public function index()
    {
        // Subquery untuk mendapatkan laporan_id terbaru untuk setiap kombinasi infrastruktur dan lokasi
        $dataAlternatif = LaporanModel::whereIn('status_id', [4,5,6,7])
                            ->orderBy('status_updated_at', 'asc')
                            ->get();
        $dataMatrik = MatrikModel::all();
        $dataKriteria = KriteriaModel::all();
        $dataPenilaian = PenilaianKriteriaModel::all();

        return view('admin.alternatif.index', [
            'breadcrumb' => 'Halaman Alternatif',
            'title' => 'Perhitungan SPK | Sipid',
            'dataKriteria' => $dataKriteria,
            'dataAlternatif' => $dataAlternatif,
            'dataMatrik' => $dataMatrik,
            'dataPenilaian' => $dataPenilaian
        ]);
    }

    public function updateNilai(Request $request, $id) {
        // Validasi input
        $request->validate([
            'matrik_nilai.*' => 'required|numeric|between:1,5',
            'kriteria_id.*' => 'required'
        ], [
            'matrik_nilai.*.required' => 'Nilai matrik harus diisi.',
            'matrik_nilai.*.numeric' => 'Nilai matrik harus berupa angka.',
            'matrik_nilai.*.between' => 'Nilai matrik harus antara 1 hingga 5.',
            'kriteria_id.*.required' => 'ID kriteria harus diisi.'
        ]);

        // Loop melalui setiap kriteria dan simpan nilai
        foreach ($request->kriteria_id as $index => $kriteria_id) {
            $nilai = $request->matrik_nilai[$index];

            // Cari matrik berdasarkan laporan ID dan kriteria ID
            $matrik = MatrikModel::where('laporan_id', $id)
                ->where('kriteria_id', $kriteria_id)
                ->first();

        // Jika matrik sudah ada, update nilai; jika tidak, buat baru
        if ($matrik) {
            $matrik->matrik_nilai = $nilai;
            $matrik->save();
        } else {
            MatrikModel::create([
                'laporan_id' => $id,
                'kriteria_id' => $kriteria_id,
                'matrik_nilai' => $nilai,
            ]);
        }
    }

    // Redirect atau response sesuai kebutuhan
    return redirect()->route('admin.alternatif.index')->with('success', 'Nilai kriteria berhasil diperbarui')->withFragment('matrikTable');
    }

    public function updateAllStatus(Request $request)
    {
        LaporanModel::where('status_id', 4)->update(['status_id' => 6]); 
        return redirect()->back()->with('success', 'Laporan berhasil dikirim ke RW.');
    }

}
