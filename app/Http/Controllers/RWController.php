<?php

namespace App\Http\Controllers;

use App\Models\BuktiLaporan;
use Carbon\Carbon;
use PDF;
use App\Models\MatrikModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;
use App\Models\KriteriaModel;
use Illuminate\Routing\Controller;


class RWController extends Controller
{
    public function index(){
        // Hitung total laporan dengan status_id = 7
        $totalLaporanDikirimKeRw = LaporanModel::where('status_id', 6)->count();
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

    // public function editStatus(Request $request, $id) {
    //     $detailLaporan = LaporanModel::find($id);
    
    //     // Validasi input
    //     $validatedData = $request->validate([
    //         'status' => 'required|int|in:1,2,3,4,5,6,7,8,9,10',
    //     ]);
    
    //     // Temukan laporan berdasarkan ID
    //     $laporan = LaporanModel::findOrFail($id);
    
    //     // Perbarui status laporan
    //     $laporan->status_id = $validatedData['status'];
    //     // Set kolom status_updated_at dengan waktu saat ini
    //     $laporan->status_updated_at = Carbon::now();
    //     $laporan->save();
    
    //     // Cek dan simpan bukti realisasi jika ada
    //     if ($request->hasFile('bukti_realisasi')) {
    //         foreach ($request->file('bukti_realisasi') as $file) {
    //             // Simpan file dan dapatkan path
    //             $path = $file->store('bukti_realisasi');

    //             // Buat entri baru di tabel bukti_laporans dengan menyertakan file_path
    //             BuktiLaporan::create([
    //                 'laporan_id' => $laporan->laporan_id,
    //                 'file_path' => $path, // Sertakan nilai file_path yang sudah didapat
    //                 'type' => 'bukti_realisasi',
    //             ]);
    //         }
    //     }
    
    //     // Redirect dengan pesan sukses
    //     return redirect()->route('rw.hasil_laporan')
    //         ->with([
    //             'success' => 'Status berhasil diubah',
    //             'detailLaporan' => $detailLaporan,
    //             'title' => 'Hasil Laporan | Sipid',
    //             'breadcrumb' => 'Halaman Hasil Laporan'
    //         ]);
    // }
    public function editStatus(Request $request, $id) {
        $detailLaporan = LaporanModel::find($id);
    
        // Validasi input
        $validatedData = $request->validate([
            'status' => 'required|int|in:1,2,3,4,5,6,7,8,9,10',
            'bukti_realisasi' => 'required|array|min:1', // Menambahkan validasi untuk file bukti realisasi
            'bukti_realisasi.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Menambahkan validasi untuk tipe dan ukuran file
        ]);
    
        // Temukan laporan berdasarkan ID
        $laporan = LaporanModel::findOrFail($id);
    
        // Perbarui status laporan
        $laporan->status_id = $validatedData['status'];
        // Set kolom status_updated_at dengan waktu saat ini
        $laporan->status_updated_at = Carbon::now();
        $laporan->save();
    
        // Cek dan simpan bukti realisasi jika ada
        foreach ($request->file('bukti_realisasi') as $file) {
            // Simpan file dan dapatkan path
            $path = $file->store('bukti_realisasi');
    
            // Buat entri baru di tabel bukti_laporans dengan menyertakan file_path
            BuktiLaporan::create([
                'laporan_id' => $laporan->laporan_id,
                'file_path' => $path, // Sertakan nilai file_path yang sudah didapat
                'type' => 'bukti_realisasi',
            ]);
        }
    
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

    public function editStatusSelesai(Request $request, $id) {
        $detailLaporan = LaporanModel::find($id);
    
        // Validasi input
        $validatedData = $request->validate([
            'status' => 'required|int|in:1,2,3,4,5,6,7,8,9,10',
        ]);
    
        // Temukan laporan berdasarkan ID
        $laporan = LaporanModel::findOrFail($id);
    
        // Perbarui status laporan
        $laporan->status_id = $validatedData['status'];
        // Set kolom status_updated_at dengan waktu saat ini
        $laporan->status_updated_at = Carbon::now();
        $laporan->save();
    
        // Cek dan simpan bukti realisasi jika ada
        if ($request->hasFile('bukti_selesai')) {
            foreach ($request->file('bukti_selesai') as $file) {
                // Simpan file dan dapatkan path
                $path = $file->store('bukti_selesai');

                // Buat entri baru di tabel bukti_laporans dengan menyertakan file_path
                BuktiLaporan::create([
                    'laporan_id' => $laporan->laporan_id,
                    'file_path' => $path, // Sertakan nilai file_path yang sudah didapat
                    'type' => 'bukti_selesai',
                ]);
            }
        }
    
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
    public function detailSelesai($id) {
        // ambil data sesuai id
        $detailLaporan = LaporanModel::find($id);

        return view('rw.laporan.detail_selesai', [

            'breadcrumb' => 'Detail Laporan',
            'title' => 'Detail Laporan | Sipid',
            'detailLaporan' => $detailLaporan
        ]);
    }

    
    public function cetakPDF($id)
    {
        // Ambil data laporan berdasarkan ID
        $detailLaporan = LaporanModel::with(['user', 'infrastruktur', 'status', 'buktiLaporan'])->findOrFail($id);

        // Render view menjadi PDF
        $pdf = PDF::loadView('rw.pdf.laporan_selesai', compact('detailLaporan'));

        // Kembalikan stream PDF
        return $pdf->stream('detail_laporan.pdf');
    }

}


