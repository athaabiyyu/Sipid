<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\LaporanModel;
use Illuminate\Http\Request;

class TrenPelaporanController extends Controller
{
    function sumLaporan()
    {
        $total_Laporan = LaporanModel::count();
        return response()->json([
            'judul' => 'Jumlah Laporan',
            'total_items' => $total_Laporan
        ]);
    }
}
