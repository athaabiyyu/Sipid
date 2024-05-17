<?php

namespace App\Http\Controllers;

use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index() {
        // Subquery untuk mendapatkan laporan_id terbaru untuk setiap kombinasi infrastruktur dan lokasi
        $sub = LaporanModel::selectRaw('MAX(laporan_id) as laporan_id')
            ->groupBy('infrastruktur_id', 'lokasi_laporan_id');

        // Query utama yang bergabung dengan subquery untuk mendapatkan detail laporan
        $dataAlternatif = LaporanModel::joinSub($sub, 'latest_laporan', function ($join) {
            $join->on('s_laporan.laporan_id', '=', 'latest_laporan.laporan_id');
        })->get();

        $dataKriteria = KriteriaModel::all();

        return view('admin.alternatif.index', [
            'breadcrumb' => 'Halaman Alternatif',
            'title' => 'Alternatif | Sipid',
            
            'dataKriteria' => $dataKriteria
        ]);
    }
}
