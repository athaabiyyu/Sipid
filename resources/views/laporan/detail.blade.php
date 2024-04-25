@extends('laporan.layouts.main')
@section('content')
     <div class="card mb-4 py-2 border-left-info">
          <div class="card-body">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Laporan ID</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <small>{{ $detailLaporan->laporan_id }}</small>
                    </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Nama Infrastruktur</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <small>{{ $detailLaporan->infrastruktur->infrastruktur_nama }}</small>
                    </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Tanggal Laporan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <small>{{ $detailLaporan->tgl_laporan }}</small>
                    </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Bukti Laporan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <img src="" alt="{{ $detailLaporan->infrastruktur->infrastruktur_nama }}">
                    </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Deskripsi Laporan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <small>{{ $detailLaporan->deskripsi_laporan }}</small>
                    </div>
               </div>
               <hr>
               <a class="btn btn-info ml-auto" href="{{ url('laporan') }}">Kembali</a>
          </div>
     </div>
@endsection
