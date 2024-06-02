<?php

namespace App\Charts;

use App\Models\LaporanModel;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TrenChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
         $laporan = LaporanModel::selectRaw('MONTH(tgl_laporan) as bulan, COUNT(*) as jumlah')
            ->whereYear('tgl_laporan', date('Y'))
            ->groupBy('bulan')
            ->get();

         $label = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
            
        $data = $laporan->pluck("jumlah")->toArray();

        return $this->chart->barChart()
            ->setTitle('Jumlah Laporan Masuk Per Bulan')
            ->addData('ppp',$data)
            ->setXAxis($label);
    }
}
