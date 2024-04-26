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
                         <tr class="text-center">
                              <th>#</th>
                              <th>Nama Infrastruktur</th>
                              <th>Tanggal</th>
                              <th>Deskripsi</th>
                              <th>Status</th>
                              <th>Aksi</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach ($dataLaporan as $laporan)
                              <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $laporan->infrastruktur->infrastruktur_nama }}</td>
                                   <td>{{ \Carbon\Carbon::parse($laporan->tgl_laporan)->format('d-m-Y') }}</td>
                                   <td>{{ substr($laporan->deskripsi_laporan, 0, 30) }}...</td>
                                   <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-warning btn-icon-split">
                                             <span class="icon text-white-50">
                                                  <i class="fas fa-exclamation-triangle"></i>
                                             </span>
                                             <span class="text">{{ $laporan->status->status_nama }}</span>
                                        </a>
                                   </td>
                                   <td class="text-center">
                                        <a class="btn btn-info btn-sm"href="{{ url('laporan/detail', $laporan->laporan_id) }}">
                                             Detail
                                        </a>
                                   </td>
                              </tr>
                         @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
@endsection
