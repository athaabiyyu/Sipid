<?php

namespace App\Http\Controllers;

use App\Models\InfrastrukturModel;
use App\Models\LaporanModel;
use App\Models\StatusLaporanModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /*** Display a listing of the resource */
    public function index()
    {
        $laporanData = LaporanModel::all();
        return view('laporan.index', compact('laporanData'));
    }

    /*** Show the form for creating a new resource.*/
    public function create()
    {
        $userData = UserModel::all();
        $infrastrukturData = InfrastrukturModel::all();
        $statusData = StatusLaporanModel::all();
        return view('laporan.create', compact('userData', 'infrastrukturData', 'statusData'));
    }

    /*** Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'infrastruktur_id' => 'required',
            'bukti_laporan' => 'required',
            'tgl_laporan' => 'required',
            'deskripsi_laporan' => 'required',
            'status_id' => 'required',
        ]);

        LaporanModel::create($request->all());
        return redirect()->route('laporan.index')->with('success', 'Laporan Berhasil Diunggah');
    }

    /*** Display the specified resource.*/
    public function show(string $id)
    {
        $laporanData = LaporanModel::find($id);
        return view('laporan.show', compact('laporanData'));
    }

    /*** Show the form for editing the specified resource.*/
    public function edit(string $id)
    {
        $userData = UserModel::all();
        $infrastrukturData = InfrastrukturModel::all();
        $statusData = StatusLaporanModel::all();
        $laporanData = LaporanModel::find($id);
        return view('laporan.edit', compact('laporanData', 'userData', 'infrastrukturData', 'statusData'));
    }

    /*** Update the specified resource in storage.*/
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'infrastruktur_id' => 'required',
            'bukti_laporan' => 'required',
            'tgl_laporan' => 'required',
            'deskripsi_laporan' => 'required',
            'status_id' => 'required',
        ]);

        LaporanModel::find($id)->update($request->all());
        return redirect()->route('laporan.index')->with('success', 'Laporan Berhasil DiPerbarui');
    }

    /*** Remove the specified resource from storage.*/
    public function destroy(string $id)
    {
        LaporanModel::find($id)->delete();
        return redirect()->route('laporan.index')->with('success', 'Laporan Berhasil DiHapus');
    }
}
