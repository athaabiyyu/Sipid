<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\UserModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;
use App\Models\InfrastrukturModel;
use App\Models\LokasiPelaporanModel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\alert;

class LaporanController extends Controller
{
    /*** Display a listing of the resource */
    // index WARGA
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

    public function create()
    {
        $infrastrukturData = InfrastrukturModel::all();
        $lokasiData = LokasiPelaporanModel::all();

        return view('laporan.create', [
            'title' => 'Buat Laporan | Sipid',
            'breadcrumb' => 'Halaman Membuat Laporan',
            'dataInfrastruktur' => $infrastrukturData,
            'dataLokasi' => $lokasiData
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'infrastruktur_id' => 'required',
            'lokasi_laporan_id' => 'required',
            'bukti_laporan' => 'required|image|file|max:1024',
            'deskripsi_laporan' => 'required|max:255',
        ],[
            'infrastruktur_id.required' => 'Kolom infrastruktur id diperlukan.',
            'lokasi_laporan_id.required' => 'Kolom lokasi laporan id diperlukan.',
            'bukti_laporan.required' => 'Kolom bukti laporan diperlukan.',
            'bukti_laporan.image' => 'Kolom bukti laporan harus berupa gambar.',
            'bukti_laporan.file' => 'Kolom bukti laporan harus berupa file.',
            'bukti_laporan.max' => 'Ukuran file bukti laporan tidak boleh lebih dari 1024 kilobit.',
            'deskripsi_laporan.required' => 'Kolom deskripsi laporan diperlukan.',
            'deskripsi_laporan.max' => 'Deskripsi laporan tidak boleh lebih dari 255 karakter.',
        ]);

        // simpan bukti laporan di storage lokal
        if ($request->file('bukti_laporan')) {
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

    // detail laporan pada warga
    public function detail($id)
    {
        $detailLaporan = LaporanModel::find($id);
        return view('laporan.detail', [
            'title' => 'Detail Laporan | Sipid',
            'breadcrumb' => 'Halaman Detail Laporan',
            'detailLaporan' => $detailLaporan
        ]);
    }

    public function profile()
    {
        // Ambil data pengguna yang login
        $dataUser = UserModel::findOrFail(auth()->user()->user_id);

        return view('laporan.profile', [
            'title' => 'Profile | Sipid',
            'breadcrumb' => 'Halaman Profile',
            'dataUser' => $dataUser
        ]);
    }

    public function editProfile(Request $request)
    {
        $user = auth()->user();

        $dataProfile = $request->validate([
            'user_nama' => 'nullable|max:100',
            'user_nomor' => 'min:10|max:12|nullable',
            'user_foto' => 'image|file|max:1024|nullable',
            'user_alamat' => 'min:10|max:100|nullable',
        ]);

        // simpan bukti laporan di storage lokal
        if ($request->file('user_foto')) {
            $dataProfile['user_foto'] = $request->file('user_foto')->store('img-profile_user');
        }

        // edit data
        $user->update($dataProfile);

        return redirect('/laporan/profile')->with('success', 'Profil Berhasil di Perbarui');
    }

    public function sandi()
    {

        // Ambil data pengguna yang login
        $dataUser = UserModel::findOrFail(auth()->user()->user_id);

        return view('laporan.sandi', [
            'title' => 'Ubah Kata Sandi | Sipid',
            'breadcrumb' => 'Halaman Ubah Kata Sandi',
            'dataUser' => $dataUser,
        ]);
    }

    public function editSandi(Request $request)
    {
        $user = auth()->user();

        // Ambil password lama dari input
        $passwordLama = $request->input('password_lama');

        // Bandingkan password lama yang dimasukkan dengan password yang disimpan
        if (Hash::check($passwordLama, $user->user_password)) {
            // Jika password lama cocok, lanjutkan dengan validasi dan pembaruan password baru
            $dataProfile = $request->validate([
                'user_password' => 'required|min:5'
            ]);

            // Enkripsi password baru
            $dataProfile['user_password'] = Hash::make($dataProfile['user_password']);

            // Perbarui password
            $user->update($dataProfile);

            return redirect('/laporan/sandi')->with('success', 'Kata Sandi Berhasil di Perbarui');
        } else {
            // Jika password lama tidak cocok, kembalikan dengan pesan kesalahan
            return redirect('/laporan/sandi')->with('error', 'Kata Sandi Lama Salah');
        }
    }

    // index Admin
    public function indexAdmin() {

        return view('admin.index', [
            'title' => 'Index | Sipid', 
            'breadcrumb' => 'Index',
        ]);
    }
    
    // rekap laporan
    public function rekapLaporan() {

        // ambil data laporan
        $dataLaporan = LaporanModel::all();

        return view('admin.laporan.rekap_laporan', [
            'title' => 'Rekap Laporan | Sipid', 
            'breadcrumb' => 'Data Infrastruktur',
            'dataLaporan' => $dataLaporan
        ]);
    }

    // detial laporan pada admin
    public function detailAdmin($id) {

        // ambil data sesuai id
        $detailLaporan = LaporanModel::find($id);

        return view('admin.laporan.detail_rekap_laporan', [
            
            'breadcrumb' => 'Detail Laporan',
            'title' => 'Detail Laporan | Sipid',
            'detailLaporan' => $detailLaporan
        ]);
    }
}
