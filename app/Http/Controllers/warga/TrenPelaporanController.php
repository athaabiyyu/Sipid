<?php

namespace App\Http\Controllers\warga;

use App\Charts\DonutChart;
use App\Http\Controllers\Controller;
use App\Models\LaporanModel;
use App\Charts\TrenChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;


class TrenPelaporanController extends Controller
{
    public function testes() {
        $chart = new TrenChart(new LarapexChart);
        $trenChart = $chart->build();

        return view('tren_pelaporan.index', [
            'breadcrumb' => 'Halaman Trend Laporan',
            'title' => 'Trend Laporan | Sipid',
            'trenChart' => $trenChart
        ]);
    }
}
