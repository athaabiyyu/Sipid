@extends('laporan.layouts.main')

@section('content')
     <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex justify-content-between align-items-center">
               <h6 class="m-0 font-weight-bold text-primary">Riwayat Laporan</h6>
               <a class="btn btn-sm btn-success ml-auto" href="{{ url('laporan/tambah') }}">+ Buat Laporan</a>
          </div>
           
          <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                         <tr>
                              <th>#</th>
                              <th>Nama Infrastruktur</th>                     
                              <th>Tanggal</th>
                              <th>Deskripsi</th>
                              <th>Status</th>
                              <th>Aksi</th>
                         </tr>
                         </thead>
                         <tbody>
                              @foreach($dataLaporan as $laporan)
                                   <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $laporan->infrastruktur->infrastruktur_nama }}</td>
                                        <td>{{ $laporan->tgl_laporan }}</td>
                                        <td>{{ substr($laporan->deskripsi_laporan, 0, 20) }}...</td>
                                        <td>{{ $laporan->status->status_nama }}</td>
                                        <td class="text-center">
                                             <a class="btn btn-warning btn-sm" href="{{ url('/laporan/detail', $laporan->laporan_id) }}">Detail</a>
                                        </td>
                                   </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>>
@endsection
