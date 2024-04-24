<?php

namespace App\Http\Controllers;

use App\Models\InfrastrukturModel;
use App\Models\LaporanModel;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



class LaporanController extends Controller
{
    /*** Display a listing of the resource */
    public function index()
    {
        
        // Ambil data laporan yang terkait dengan pengguna yang login
        $dataLaporan = LaporanModel::where('user_id', auth()->user()->user_id)->get();

        return view('laporan.index', [

            // kirim data ke view laporan->index
            'title' => 'Laporan | Sipid',
            'breadcrumb' => 'Halaman Riwayat Laporan',
            'dataLaporan' => $dataLaporan,
        ]);
    }

    public function create() {
        $infrastrukturData = InfrastrukturModel::all();

        return view('laporan.create', [
            'title' => 'Buat Laporan | Sipid', 
            'breadcrumb' => 'Halaman Membuat Laporan',
            'dataInfrastruktur' => $infrastrukturData
        ]);
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'infrastruktur_id' => 'required',
            'bukti_laporan' => 'required|file|mimes:jpg,bmp,png',
            'deskripsi_laporan' => 'required|max:255'
        ]);

        // set nilai default tanggal secara otomatis ketika laporan dibuat
        $validatedData['tgl_laporan'] = Carbon::now();
        // set nilai default status secara otomatis ketika laporan dibuat
        $validatedData['status_id'] = 1;
        // set nilai default id user secara otomatis ektika laporan dibuat
        $validatedData['user_id'] = auth()->user()->user_id;

        // add data
        LaporanModel::create($validatedData);
        return redirect('/laporan')->with('success', 'l Berhasil Ditambahkan');
    }

}
