<?php

namespace App\Http\Controllers\warga;

use App\Charts\DonutChart;
use App\Charts\TrenChart;
use App\Http\Controllers\Controller;
use App\Models\LaporanModel;


class TrenPelaporanController extends Controller
{
    public function testes( TrenChart $bar){
        return view('tren_pelaporan.index', [
            'breadcrumb' => 'Halaman Trend Laporan',
            'title' => 'Dashboard | Sipid',
            'bar' => $bar->build()
        ]);
    }
}
