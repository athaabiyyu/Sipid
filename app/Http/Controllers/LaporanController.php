<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\UserModel;
use App\Models\MatrikModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;
use App\Models\AlternatifModel;
use App\Models\BuktiLaporan;
use App\Models\InfrastrukturModel;
use Illuminate\Routing\Controller;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\URL;
use App\Models\LokasiPelaporanModel;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /*** Display a listing of the resource */
    // index WARGA

    // view dashboard
    public function dashboard() {
        // Hitung total laporan dengan status_id = 1 
        $totalLaporanTerkirim = LaporanModel::where('user_id', auth()->user()->user_id)
        ->where('status_id', 1)
        ->count();
        // Hitung total laporan dengan status_id = 4
        $totalLaporanDiverifikasi = LaporanModel::where('user_id', auth()->user()->user_id)
        ->where('status_id', 4)
        ->count();
        // Hitung total laporan dengan status_id = 8 
        $totalLaporanDirealisasikan = LaporanModel::where('user_id', auth()->user()->user_id)
        ->where('status_id', 8)
        ->count();
        // Hitung total laporan dengan status_id = 9 
        $totalLaporanSelesai = LaporanModel::where('user_id', auth()->user()->user_id)
        ->where('status_id', 9)
        ->count();
        // Hitung total laporan dengan status_id = 10 
        $totalLaporanDitolak = LaporanModel::where('user_id', auth()->user()->user_id)
        ->where('status_id', 10)
        ->count();
        // Hitung semu total laporan
        $totalLaporan = LaporanModel::where('user_id', auth()->user()->user_id)->count();;

        return view('laporan.dashboard', [

            // kirim data ke view laporan->index
            'title' => 'Dashboard | Sipid',
            'breadcrumb' => 'Halaman Dashboard',
            'totalLaporanTerkirim' => $totalLaporanTerkirim,
            'totalLaporanDitolak' => $totalLaporanDitolak,
            'totalLaporanDirealisasikan' => $totalLaporanDirealisasikan,
            'totalLaporanSelesai' => $totalLaporanSelesai,
            'totalLaporan' =>  $totalLaporan,
            'totalLaporanDiverifikasi' => $totalLaporanDiverifikasi
        ]);   
    }

    // view riwayat laporan
    public function index() {
        // Ambil data laporan yang terkait dengan pengguna yang login
        $dataLaporan = LaporanModel::where('user_id', auth()->user()->user_id)->get();
        // Hitung total laporan yang terkait dengan pengguna yang login
        $totalLaporan = LaporanModel::where('user_id', auth()->user()->user_id)->count();

        return view('laporan.index', [

            // kirim data ke view laporan->index
            'title' => 'Riwayat Laporan | Sipid',
            'breadcrumb' => 'Halaman Riwayat Laporan',
            'dataLaporan' => $dataLaporan,
            'totalLaporan' => $totalLaporan
        ]);
    }

    // view buat laporan
    public function create() {
        $infrastrukturData = InfrastrukturModel::all();

        return view('laporan.create', [
            'title' => 'Buat Laporan | Sipid',
            'breadcrumb' => 'Halaman Membuat Laporan',
            'dataInfrastruktur' => $infrastrukturData,
        ]);
    }

    // proses store laporan
    // public function store(Request $request) {

    //     $validatedData = $request->validate([
    //         'infrastruktur_id' => 'required',
    //         'alamat_laporan' => 'required',
    //         'bukti_laporan' => 'required|image|file|max:1024',
    //         'deskripsi_laporan' => 'required|max:255',
    //     ], [
    //         'infrastruktur_id.required' => 'Kolom nama infrastruktur diperlukan.',
    //         'alamat_laporan.required' => 'Kolom lokasi laporan diperlukan.',
    //         'bukti_laporan.required' => 'Kolom bukti laporan diperlukan.',
    //         'bukti_laporan.image' => 'Kolom bukti laporan harus berupa gambar.',
    //         'bukti_laporan.file' => 'Kolom bukti laporan harus berupa file.',
    //         'bukti_laporan.max' => 'Ukuran file bukti laporan tidak boleh lebih dari 1024 kilobit.',
    //         'deskripsi_laporan.required' => 'Kolom deskripsi laporan diperlukan.',
    //         'deskripsi_laporan.max' => 'Deskripsi laporan tidak boleh lebih dari 255 karakter.',
    //     ]);

    //     // simpan bukti laporan di storage lokal
    //     if ($request->file('bukti_laporan')) {
    //         $validatedData['bukti_laporan'] = $request->file('bukti_laporan')->store('img-bukti_laporan');
    //     }

    //     // set nilai default tanggal secara otomatis ketika laporan dibuat
    //     $validatedData['tgl_laporan'] = Carbon::now();
    //     // set nilai default status secara otomatis ketika laporan dibuat
    //     $validatedData['status_id'] = 1;
    //     // set nilai default id user secara otomatis ektika laporan dibuat
    //     $validatedData['user_id'] = auth()->user()->user_id;

    //     // Tambahkan data laporan
    //     $laporan = LaporanModel::create($validatedData);

    //     // Setelah menyimpan laporan, buat entri matrik yang terkait
    //     $matrik = new MatrikModel();
    //     $matrik->laporan_id = $laporan->laporan_id; // Gunakan laporan_id yang baru dibuat
    //     $matrik->kriteria_id = null; // Set kriteria_id to null by default
    //     $matrik->save(); // Menyimpan matrik dengan laporan_id yang terkait

    //     return redirect('/laporan')->with('success', 'Laporan Berhasil di Kirimkan');
    // }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'infrastruktur_id' => 'required',
            'alamat_laporan' => 'required',
            'bukti_laporan.*' => 'required|image|file|max:1024',
            'deskripsi_laporan' => 'required|max:255',
        ], [
            'infrastruktur_id.required' => 'Kolom nama infrastruktur diperlukan.',
            'alamat_laporan.required' => 'Kolom lokasi laporan diperlukan.',
            'bukti_laporan.required' => 'Kolom bukti laporan diperlukan.',
            'bukti_laporan.image' => 'Kolom bukti laporan harus berupa gambar.',
            'bukti_laporan.file' => 'Kolom bukti laporan harus berupa file.',
            'bukti_laporan.max' => 'Ukuran file bukti laporan tidak boleh lebih dari 1024 kilobit.',
            'deskripsi_laporan.required' => 'Kolom deskripsi laporan diperlukan.',
            'deskripsi_laporan.max' => 'Deskripsi laporan tidak boleh lebih dari 255 karakter.',
        ]);
    
        $laporan = new LaporanModel();
        $laporan->infrastruktur_id = $validatedData['infrastruktur_id'];
        $laporan->alamat_laporan = $validatedData['alamat_laporan'];
        $laporan->deskripsi_laporan = $validatedData['deskripsi_laporan'];
        $laporan->tgl_laporan = Carbon::now();
        $laporan->status_id = 1;
        $laporan->user_id = auth()->user()->user_id;
        $laporan->save();
    
        // Handle multiple file uploads
        if ($request->hasFile('bukti_laporan')) {
            foreach ($request->file('bukti_laporan') as $file) {
                $path = $file->store('img-bukti_laporan');
                $laporan->buktiLaporan()->create(['file_path' => $path]);
            }
        }
    
        // Create related entry in MatrikModel
        $matrik = new MatrikModel();
        $matrik->laporan_id = $laporan->laporan_id;
        $matrik->kriteria_id = null; // Set kriteria_id to null by default
        $matrik->save();
    
        return redirect('/laporan')->with('success', 'Laporan Berhasil di Kirimkan');
    }
    

    // proses hapus laporan 
    // apabila status masih terkirim
    public function hapusLaporan($id) {
        // Hapus terlebih dahulu baris-baris yang terkait dari tabel s_matrik
        MatrikModel::where('laporan_id', $id)->delete();
    
        // Hapus baris-baris yang terkait dari tabel bukti_laporans
        BuktiLaporan::where('laporan_id', $id)->delete();
    
        // Setelah tidak ada lagi keterkaitan, hapus baris dari tabel s_laporan
        LaporanModel::findOrFail($id)->delete();
        
        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }
    
    
    
    // view detail laporan pada warga
    public function detail($id)
    {
        $detailLaporan = LaporanModel::find($id);
        return view('laporan.detail', [
            'title' => 'Detail Laporan | Sipid',
            'breadcrumb' => 'Halaman Detail Laporan',
            'detailLaporan' => $detailLaporan
        ]);
    }

    // view edit laporan pada warga
    public function editLaporan(string $id) {
        $dataLaporan = LaporanModel::find($id);
        $infrastrukturData = InfrastrukturModel::all();

        return view('laporan.edit_laporan', [

            // kirim data ke view laporan->index
            'title' => 'Edit Laporan | Sipid',
            'breadcrumb' => 'Halaman Edit Laporan',
            'dataLaporan' => $dataLaporan,
            'dataInfrastruktur' => $infrastrukturData,
        ]);
    }

    // proses update laporan yang di edit
    public function updateLaporan(Request $request, $id) {
        $detailLaporan = LaporanModel::findOrFail($id);

        $request->validate([
            'deskripsi_laporan' => 'required|max:255',
            'infrastruktur_id' => 'required',
            'alamat_laporan' => 'required|max:100',
            'bukti_laporan' => 'nullable|image|file|max:1024',
        ], [
            'infrastruktur_id.required' => 'Kolom nama infrastruktur diperlukan.',
            'alamat_laporan.required' => 'Kolom lokasi laporan diperlukan.',
            'bukti_laporan.image' => 'Kolom bukti laporan harus berupa gambar.',
            'bukti_laporan.file' => 'Kolom bukti laporan harus berupa file.',
            'bukti_laporan.max' => 'Ukuran file bukti laporan tidak boleh lebih dari 1024 kilobit.',
            'deskripsi_laporan.required' => 'Kolom deskripsi laporan diperlukan.',
            'deskripsi_laporan.max' => 'Deskripsi laporan tidak boleh lebih dari 255 karakter.',
        ]);

        $detailLaporan->deskripsi_laporan = $request->deskripsi_laporan;
        $detailLaporan->infrastruktur_id = $request->infrastruktur_id;

        if ($request->hasFile('bukti_laporan')) {
            // Delete the old file if exists
            if ($detailLaporan->bukti_laporan && Storage::exists($detailLaporan->bukti_laporan)) {
                Storage::delete($detailLaporan->bukti_laporan);
            }

            // Store the new file
            $detailLaporan->bukti_laporan = $request->file('bukti_laporan')->store('bukti_laporan', 'public');
        }

        $detailLaporan->save();

        return redirect()->route('laporan.detailLaporan', ['id' => $detailLaporan->laporan_id])
            ->with([
                'success' => 'Laporan berhasil diperbarui',
                'detailLaporan' => $detailLaporan,
                'title' => 'Detail Laporan | Sipid',
                'breadcrumb' => 'Halaman Detail Laporan'
            ]);
    }







    // index Admin
    public function indexAdmin() {
        // Hitung total laporan dengan status_id = 3 
        $totalLaporanSedangDiverifikasi = LaporanModel::where('status_id', 3)->count();
        // Hitung total laporan dengan status_id = 4
        $totalLaporanDiverifikasi = LaporanModel::where('status_id', 4)->count();
        // Hitung total laporan dengan status_id = 5
        $totalLaporanDirealisasikan = LaporanModel::where('status_id', 8)->count();
        // Hitung total laporan dengan status_id = 7
        $totalLaporanDikirimKeRw = LaporanModel::where('status_id', 7)->count();
        // Hitung total laporan dengan status_id = 9
        $totalLaporanSelesai = LaporanModel::where('status_id', 9)->count();
        // Hitung total laporan yang masuk
        $totalLaporan = LaporanModel::count();


        return view('admin.index', [
            'title' => 'Dashboard | Sipid',
            'breadcrumb' => 'Dashboard',
            'totalLaporan' =>  $totalLaporan,
            'totalLaporanSedangDiverifikasi' => $totalLaporanSedangDiverifikasi,
            'totalLaporanDiverifikasi' => $totalLaporanDiverifikasi,
            'totalLaporanDirealisasikan' => $totalLaporanDirealisasikan,
            'totalLaporanDikirimKeRw' => $totalLaporanDikirimKeRw,
            'totalLaporanSelesai' => $totalLaporanSelesai
        ]);
    }

    // rekap laporan
    public function rekapLaporan() {
        // ambil data laporan
        $dataLaporan = LaporanModel::all();

        return view('admin.laporan.rekap_laporan', [
            'title' => 'Rekap Laporan | Sipid',
            'dataLaporan' => $dataLaporan,
        ]);
    }

    // detial laporan pada admin
    public function detailAdmin($id) {
        // ambil data sesuai id
        $detailLaporan = LaporanModel::find($id);

        // Check if the current status is not 'Dilihat' (assuming 'Dilihat' status_id is 2)
        // Update the status to 'Dilihat' if the current status is 1
        if ($detailLaporan->status_id == 1) {
            $detailLaporan->status_id = 3; // Assuming 'Dilihat' status_id is 2
            $detailLaporan->save();
        }

            return view('admin.laporan.detail_rekap_laporan', [
                'title' => 'Detail Laporan | Sipid',
                'detailLaporan' => $detailLaporan
            ]);
    }

    // ubah status
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
        return redirect()->route('admin.rekap_laporan')
            ->with([
                'success' => 'Status berhasil diubah',
                'detailLaporan' => $detailLaporan,
                'title' => 'Rekap Laporan | Sipid',
                'breadcrumb' => 'Halaman Rekap Laporan'
            ]);
    }

    
}
