@extends('layouts.templateCRUD')

@section('content')
     <div class="row align-items-center my-5">
          <div class="col-10">
               <h2>Detail Data</h2>
          </div>
          <div class="col-2">
               <a class="btn btn-sm btn-success" href="{{ route('laporan.index') }}">Kembali</a>
          </div>
     </div>
     
     <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>ID laporan:</strong>
                    {{ $laporanData->laporan_id }}
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>Nama Pelapor:</strong>
                    {{ $laporanData->user->user_nama }}
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>Nama Infrastruktur</strong>
                    {{ $laporanData->infrastruktur->infrastruktur_nama }}
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>Bukti Laporan:</strong>
                    {{ $laporanData->bukti_laporan }}
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>Tanggal Laporan:</strong>
                    {{ $laporanData->tgl_laporan }}
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>Deskripsi Laporan :</strong>
                    <img src="" alt="{{ $laporanData->deskripsi_laporan }}">      
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>Status Laporan :</strong>
                    {{ $laporanData->status->status_nama }}     
               </div>
          </div>
     </div>
@endsection
