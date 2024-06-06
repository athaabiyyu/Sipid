<?php
namespace App\Http\Controllers;

use App\Models\KriteriaModel;
use App\Models\MatrikModel;
use App\Models\PenilaianKriteriaModel;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{

    public function index() {
        $dataKriteria = KriteriaModel::all();

        return view('admin.kriteria.index', [
            'breadcrumb' => 'Kriteria',
            'title' => 'Kriteria | Sipid',
            'dataKriteria' => $dataKriteria,
        ]);
    }

    // buat data kriteria
    public function create() {
        $dataKriteria = KriteriaModel::all();

        return view('admin.kriteria.create', [
            'title' => 'Tambah kriteria | Sipid',
            'breadcrumb' => 'Halaman Tambah Kriteria',
            'dataKriteria' => $dataKriteria,
        ]);
    }

    // store data kriteria baru
    public function store(Request $request) {
        $validasiData = $request->validate([
            'kriteria_nama' => 'required|max:100',
            'kriteria_bobot' => 'required|numeric', 
            'kriteria_attribut' => 'required|in:Benefit,Cost', 
            'jumlah_deskripsi' => 'required|numeric', 
        ],[
            'kriteria_nama.required' => 'Nama kriteria wajib diisi.',
            'kriteria_nama.max' => 'Nama kriteria tidak boleh lebih dari 100 karakter.',
            'kriteria_bobot.required' => 'Bobot kriteria wajib diisi.',
            'kriteria_bobot.numeric' => 'Bobot kriteria harus berupa angka.',
            'kriteria_attribut.required' => 'Attribut kriteria wajib dipilih.',
            'kriteria_attribut.in' => 'Attribut kriteria harus berupa Benefit atau Cost.',
            'jumlah_deskripsi.required' => 'Jumlah deskripsi penilaian wajib diisi.',
            'jumlah_deskripsi.numeric' => 'Jumlah deskripsi penilaian harus berupa angka.',
        ]);
    
        // Ubah huruf awal menjadi kapital pada nama kriteria
        $validasiData['kriteria_nama'] = ucfirst($validasiData['kriteria_nama']);

        // konfersi kriteria_bobot dari percentage to decimal
        $validasiData['kriteria_bobot'] = $validasiData['kriteria_bobot'] / 100;
    
        // Auto increment kriteria_kode ketika kriteria baru ditambahkan
        $lastKriteria = KriteriaModel::orderBy('kriteria_id', 'desc')->first();
        if ($lastKriteria) {
            $lastCode = intval(substr($lastKriteria->kriteria_kode, 1));
            $newCode = 'C' . ($lastCode + 1);
        } else {
            $newCode = 'C1';
        }
        $validasiData['kriteria_kode'] = $newCode;
    
        $kriteria = KriteriaModel::create($validasiData);
    
        return redirect()->route('admin.kriteria.keterangan_penilaian', ['id' => $kriteria->kriteria_id])->with('success', 'Data Kriteria berhasil ditambahkan');
    }

    // edit data kriteria
    public function edit($id) {
        $dataKriteria = KriteriaModel::findOrFail($id);

        return view('admin.kriteria.edit', [
            'title' => 'Edit Kriteria | Sipid',
            'breadcrumb' => 'Halaman Edit Kriteria',
            'dataKriteria' => $dataKriteria
        ]);
    }

    // update data kriteria yang diedit
    public function update(Request $request, $id) {
        $validasiData = $request->validate([
            'kriteria_nama' => 'required|max:100',
            'kriteria_bobot' => 'required|numeric', 
            'kriteria_attribut' => 'required|in:Benefit,Cost', 
            'jumlah_deskripsi' => 'required|numeric', 
        ],[
            'kriteria_nama.required' => 'Nama kriteria wajib diisi.',
            'kriteria_nama.max' => 'Nama kriteria tidak boleh lebih dari 100 karakter.',
            'kriteria_bobot.required' => 'Bobot kriteria wajib diisi.',
            'kriteria_bobot.numeric' => 'Bobot kriteria harus berupa angka.',
            'kriteria_attribut.required' => 'Attribut kriteria wajib dipilih.',
            'kriteria_attribut.in' => 'Attribut kriteria harus berupa Benefit atau Cost.',
            'jumlah_deskripsi.required' => 'Jumlah deskripsi penilaian wajib diisi.',
            'jumlah_deskripsi.numeric' => 'Jumlah deskripsi penilaian harus berupa angka.',
        ]);

        // Ubah huruf awal menjadi kapital pada nama kriteria
        $validasiData['kriteria_nama'] = ucfirst($validasiData['kriteria_nama']);

        // konfersi kriteria_bobot dari percentage to decimal
        $validasiData['kriteria_bobot'] = $validasiData['kriteria_bobot'] / 100;

        // Perbarui data kriteria
        KriteriaModel::where('kriteria_id', $id)->update($validasiData);

        return redirect()->route('admin.kriteria.keterangan_penilaian', ['id' => $id])->with('success', 'Data Kriteria berhasil diedit');
    }

    // buat / edit keterangan penilaian
    public function keterangan_penilaian($id) {
        $dataKriteria = KriteriaModel::findOrFail($id);
        $jumlah_deskripsi = $dataKriteria->jumlah_deskripsi;
    
        // Ambil data yang ada di database
        $existingPenilaian = PenilaianKriteriaModel::where('kriteria_id', $id)->get();
    
        $level_keparahan_array = $existingPenilaian->pluck('level_keparahan')->toArray();
        $skor_penilaian_array = $existingPenilaian->pluck('skor_penilaian_kriteria')->toArray();
        $deskripsi_penilaian_array = $existingPenilaian->pluck('deskripsi_penilaian_kriteria')->toArray();
    
        return view('admin.kriteria.keterangan_penilaian', [
            'breadcrumb' => 'Kriteria',
            'title' => 'Kriteria | Sipid',
            'kriteria_id' => $id,
            'jumlah_deskripsi' => $jumlah_deskripsi,
            'level_keparahan_array' => $level_keparahan_array,
            'skor_penilaian_array' => $skor_penilaian_array,
            'deskripsi_penilaian_array' => $deskripsi_penilaian_array,
        ]);
    }
    
    // store / update keterngan penilaian
    public function simpan_keterangan_penilaian(Request $request, $id) {
        $kriteria_id = $id; // Menggunakan id dari rute
    
        // Validasi data yang diterima dari request
        $validasiData = $request->validate([
            'level_keparahan.*' => 'required|string',
            'skor_penilaian.*' => 'required|numeric',
            'deskripsi_penilaian.*' => 'required|string',
        ],[
            // Pesan validasi
        ]);
    
        // Hapus semua data penilaian lama untuk kriteria ini
        PenilaianKriteriaModel::where('kriteria_id', $kriteria_id)->delete();
    
        // Simpan setiap baris formulir sebagai entri baru
        foreach ($validasiData['level_keparahan'] as $index => $level) {
            PenilaianKriteriaModel::create([
                'kriteria_id' => $kriteria_id,
                'level_keparahan' => $level,
                'skor_penilaian_kriteria' => $validasiData['skor_penilaian'][$index],
                'deskripsi_penilaian_kriteria' => $validasiData['deskripsi_penilaian'][$index],
            ]);
        }
    
        return redirect()->route('admin.kriteria.index')->with('success', 'Data Keterangan Kriteria berhasil diperbarui');
    }
     
    // hapus data kriteria
    public function destroy($id) {
        // Hapus semua baris dari tabel s_matrik yang terkait dengan kriteria yang ingin dihapus
        MatrikModel::where('kriteria_id', $id)->delete();
    
        PenilaianKriteriaModel::where('kriteria_id', $id)->delete();

        // Hapus kriteria dari tabel s_kriteria
        KriteriaModel::findOrFail($id)->delete();
    
        // Redirect kembali ke halaman kriteria dengan pesan sukses
        return redirect()->route('admin.kriteria.index')->with('success', 'Data Kriteria berhasil dihapus');
    }
    
}
