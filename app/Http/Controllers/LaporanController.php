<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\UserModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;
use App\Models\InfrastrukturModel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



class LaporanController extends Controller
{
    /*** Display a listing of the resource */
    public function index()
    {
        // Ambil data laporan yang terkait dengan pengguna yang login
        $dataLaporan = LaporanModel::where('user_id', auth()->user()->user_id)->get();

        return view('laporan.index', [

            // kirim data ke view laporan->index
            'title' => 'Riwayat Laporan | Sipid',
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
            'bukti_laporan' => 'required|image|file|max:1024',
            'deskripsi_laporan' => 'required|max:255'
        ]);

        // simpan bukti laporan di storage lokal
        if($request->file('bukti_laporan')) {
            $validatedData['bukti_laporan'] = $request->file('bukti_laporan')->store('img-bukti_laporan');
        }

        // set nilai default tanggal secara otomatis ketika laporan dibuat
        $validatedData['tgl_laporan'] = Carbon::now();
        // set nilai default status secara otomatis ketika laporan dibuat
        $validatedData['status_id'] = 1;
        // set nilai default id user secara otomatis ektika laporan dibuat
        $validatedData['user_id'] = auth()->user()->user_id;

        // add data
        LaporanModel::create($validatedData);
        return redirect('/laporan')->with('success', 'Laporan Berhasil di Kirimkan');
    }

    public function detail($id) {
        $detailLaporan = LaporanModel::find($id);
        return view('laporan.detail', [
            'title' => 'Detail Laporan | Sipid',
            'breadcrumb' => 'Halaman Detail Laporan',
            'detailLaporan' => $detailLaporan
        ]);
    }

    public function profile() {
        // Ambil data pengguna yang login
        $dataUser = UserModel::findOrFail(auth()->user()->user_id);
    
        return view('laporan.profile',[
            'title' => 'Profile | Sipid',
            'breadcrumb' => 'Halaman Profile',
            'dataUser' => $dataUser
        ]);
    }

    public function editProfile(Request $request) {
        $user = auth()->user();

        $dataProfile = $request->validate([
            'user_nama' => 'min:10',
            'user_nomor' => 'min:10|max:12',
            'user_foto' => 'image|file|max:1024'
        ]);
    
        // simpan bukti laporan di storage lokal
        if ($request->file('user_foto')) {
            $dataProfile['user_foto'] = $request->file('user_foto')->store('img-profile_user');
        }
    
        // edit data
        $user->update($dataProfile);
    
        return redirect('/laporan/profile')->with('success', 'Profil Berhasil di Perbarui');
    }
    
}
