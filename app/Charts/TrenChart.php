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
        $laporan_listrik = LaporanModel::where('infrastruktur_id', 1)->count();
        $laporan_jalan = LaporanModel::where('infrastruktur_id', 2)->count();
        $laporan_tps = LaporanModel::where('infrastruktur_id', 3)->count();
        $laporan_air = LaporanModel::where('infrastruktur_id', 4)->count();
        $laporan_lapangan = LaporanModel::where('infrastruktur_id', 5)->count();
        $laporan_ibadah = LaporanModel::where('infrastruktur_id', 6)->count();
        $laporan_posyandu = LaporanModel::where('infrastruktur_id', 7)->count();


        $label = [
            'Jaringan Listrik',
            'Jalan',
            'TPS',
            'Saluran Air',
            'Lapangan',
            'Tempat Ibadah',
            'Posyandu',
        ];

        $data = [$laporan_listrik, $laporan_jalan, $laporan_tps, $laporan_air, $laporan_lapangan, $laporan_ibadah, $laporan_posyandu];

        return $this->chart->barChart()
            ->setTitle('Jumlah Laporan Masuk Per Infrastruktur')
            ->addData('ppp', $data)
            ->setXAxis($label);
    }
}
