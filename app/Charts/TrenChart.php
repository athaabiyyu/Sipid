<?php

namespace App\Charts;

use App\Models\LaporanModel;
use App\Models\InfrastrukturModel;
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
        $label = [];
        $data = [];

        // Mengambil semua data infrastruktur
        $infrastruktur = InfrastrukturModel::all();

        foreach ($infrastruktur as $infra) {
            // Mengambil jumlah laporan untuk setiap infrastruktur
            $laporan_count = LaporanModel::where('infrastruktur_id', $infra->infrastruktur_id)->count();

            // Hanya menambahkan data ke chart jika ada laporan yang terkait dengan infrastruktur_id ini
            if ($laporan_count > 0) {
                $label[] = $infra->infrastruktur_nama; // Menggunakan nama dari model InfrastrukturModel
                $data[] = $laporan_count;
            }
            
        }

        // Menggunakan LarapexChart untuk membuat grafik batang
        $chart = $this->chart->barChart()
            ->addData('Total Laporan', $data)
            ->setXAxis($label)
            ->setColors(['#4e73df']);

        return $chart;
    }
}
