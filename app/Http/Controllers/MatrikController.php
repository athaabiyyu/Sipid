<?php

namespace App\Http\Controllers;

use App\Models\MatrikModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;
use App\Models\KriteriaModel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class MatrikController extends Controller
{
    public function index() {

        // Ambil data laporan dengan menghindari duplikasi berdasarkan infrastruktur_nama dan lokasi_pelaporan
        $dataAlternatif = LaporanModel::with('infrastruktur', 'lokasi')
        ->select('infrastruktur_id', 'lokasi_laporan_id', DB::raw('MIN(laporan_id) as laporan_id'))
        ->groupBy('infrastruktur_id', 'lokasi_laporan_id')
        ->get();
        $dataKriteria = KriteriaModel::all();
        $dataMatrik = MatrikModel::all();

        return view('admin.matrik.index',[
            'breadcrumb' => 'Halaman Matrik',
            'title' => 'Matrik | Sipid',
            'dataMatrik' => $dataMatrik,
            'dataKriteria' => $dataKriteria,
            'dataAlternatif' => $dataAlternatif,
        ]);
    }
}

