<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Barryvdh\DomPDF\PDF;
use App\Models\MatrikModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;
use App\Models\KriteriaModel;
use Illuminate\Routing\Controller;

class RWController extends Controller
{
    public function index(){
        // Hitung total laporan dengan status_id = 7
        $totalLaporanDikirimKeRw = LaporanModel::where('status_id', 7)->count();
        // Hitung total laporan dengan status_id = 8 
        $totalLaporanDirealisasikan = LaporanModel::where('status_id', 8)->count();
        // Hitung total laporan dengan status_id = 9
        $totalLaporanSelesai = LaporanModel::where('status_id', 9)->count();

        return view('rw.index', [
            'breadcrumb' => 'Halaman Dashboard',
            'title' => 'Dashboard | Sipid',
            'totalLaporanDikirimKeRw' => $totalLaporanDikirimKeRw,
            'totalLaporanDirealisasikan' => $totalLaporanDirealisasikan,
            'totalLaporanSelesai' => $totalLaporanSelesai
        ]);
    }

    public function hasilLaporan() {
        $dataAlternatif = LaporanModel::all();
        $dataMatrik = MatrikModel::all();
        $dataKriteria = KriteriaModel::all();
        $statusDirealisasikan = LaporanModel::whereIn('status_id', [8, 9])->get(); // Mengambil status_id 8 dan 9

        return view('rw.laporan.hasil_laporan', [
            'breadcrumb' => 'Halaman Hasil Laporan',
            'title' => 'Hasil Laporan | Sipid',
            'dataKriteria' => $dataKriteria,
            'dataAlternatif' => $dataAlternatif,
            'dataMatrik' => $dataMatrik,
            'statusDirealisasikan' => $statusDirealisasikan
        ]);
    }

    // cetakpdf
    public function cetakPDF() {
        // Data yang akan ditampilkan di PDF
        $dataMatrik = MatrikModel::all(); // Ambil data matrik dari database
        $dataKriteria = KriteriaModel::all(); // Ambil data kriteria dari database
        
        // Kalkulasi total utility dan perhitungan lainnya
        $totalUtilities = [];
        $groupedData = $dataMatrik->groupBy('laporan_id');
        $count = 0;
        foreach ($groupedData as $laporan_id => $matrikGroup) {
            $laporan = $matrikGroup->first()->laporan;
            if ($laporan->status->status_kode == 'STS05' || $laporan->status->status_kode == 'STS06' || $laporan->status->status_kode == 'STS07') {
                $count++;
                $totalUtility = 0;
                foreach ($dataKriteria as $kriteria) {
                    $matrik = $matrikGroup->firstWhere('kriteria_id', $kriteria->kriteria_id);
                    $nilai = $matrik ? $matrik->matrik_nilai : 0;
                    $minValue = $dataMatrik->where('kriteria_id', $kriteria->kriteria_id)->min('matrik_nilai');
                    $maxValue = $dataMatrik->where('kriteria_id', $kriteria->kriteria_id)->max('matrik_nilai');
                    
                    if ($minValue === $maxValue) {
                        $utility = 0;
                    } else {
                        $utility = ($kriteria->kriteria_attribut == 'Benefit') ? 
                            (($nilai - $minValue) / ($maxValue - $minValue)) * 100 : 
                            (($maxValue - $nilai) / ($maxValue - $minValue)) * 100;
                    }
                    
                    $weightedUtility = $utility * $kriteria->kriteria_bobot;
                    $totalUtility += $weightedUtility;
                }
                $totalUtilities[] = [
                    'alternatif' => "A{$count} - {$laporan->infrastruktur->infrastruktur_nama}",
                    'lokasi' => $laporan->alamat_laporan,
                    'totalUtility' => $totalUtility
                ];
            }
        }

        usort($totalUtilities, function($a, $b) {
            return $b['totalUtility'] <=> $a['totalUtility'];
        });

        // Variable to keep track of ranking
        $ranking = 1;
        foreach ($totalUtilities as &$data) {
            $data['ranking'] = $ranking;
            $ranking++;
        }

        // Load view untuk PDF
        $pdf = \PDF::loadView('rw.pdf.keputusan', compact('totalUtilities'));

        // Return PDF stream
        return $pdf->stream('hasil_keputusan.pdf');
    }

    // detail laporan pada admin
    public function detailHasil($id) {
        // ambil data sesuai id
        $detailLaporan = LaporanModel::find($id);

        // Check if the current status is not 'Dilihat' (assuming 'Dilihat' status_id is 2)
        // Update the status to 'Dilihat' if the current status is 1
        if ($detailLaporan->status_id == 6) {
            $detailLaporan->status_id = 7; // Assuming 'Dilihat' status_id is 7
            $detailLaporan->save();
        }

        return view('rw.laporan.detail_hasil', [

            'breadcrumb' => 'Detail Laporan',
            'title' => 'Detail Laporan | Sipid',
            'detailLaporan' => $detailLaporan
        ]);
    }

    // edit status
    public function editStatus(Request $request, $id) {
        $detailLaporan = LaporanModel::find($id);

        // Validasi input
        $validatedData = $request->validate([
            'status' => 'required|int|in:1,2,3,4,5,6,7,8,9,10',
        ]);

        // Temukan laporan berdasarkan ID
        $laporan = LaporanModel::findOrFail($id);

        // Perbarui status laporan
        $laporan->status_id = $validatedData['status'];
        // Set kolom status_created_at dengan waktu saat ini
        $laporan->status_updated_at = Carbon::now();
        $laporan->save();

        // Redirect dengan pesan sukses
        return redirect()->route('rw.hasil_laporan')
            ->with([
                'success' => 'Status berhasil diubah',
                'detailLaporan' => $detailLaporan,
                'title' => 'Hasil Laporan | Sipid',
                'breadcrumb' => 'Halaman Hasil Laporan'
            ]);
    }

    // detail realisasi
    public function detailRealisasi($id) {
        // ambil data sesuai id
        $detailLaporan = LaporanModel::find($id);

        return view('rw.laporan.detail_realisasi', [

            'breadcrumb' => 'Detail Laporan',
            'title' => 'Detail Laporan | Sipid',
            'detailLaporan' => $detailLaporan
        ]);
    }
}


