@extends('admin.layouts.main')

@section('content')
     @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Berhasil!</strong> {{ session('success') }}.
               <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
     @endif

     @if (session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Upss!</strong> {{ session('error') }}.
               <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
     @endif

     <div class="card shadow mb-4">

          <div class="card-header py-3 d-flex justify-content-between align-items-center">
               <h6 class="m-0 font-weight-bold text-primary">Rekap Laporan</h6>
               <form class="form-inline">
                    <div class="input-group">
                         <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-addon">
                         <div class="input-group-append">
                              <button class="btn btn-primary" type="button">
                                   <i class="fas fa-search"></i>
                              </button>
                         </div>
                    </div>
               </form>
          </div>
           
          <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                         <tr class="text-center">
                              
                              <th>Nama Pelapor</th>
                              <th>Nama Infrastruktur</th>
                              <th>Tanggal</th>
                              <th>Status</th>
                              <th>Aksi</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach ($dataLaporan as $laporan)
                              <tr>                           
                                   <td>{{ $laporan->user->user_nama }}</td>
                                   <td>{{ $laporan->infrastruktur->infrastruktur_nama }}</td>
                                   <td>{{ \Carbon\Carbon::parse($laporan->tgl_laporan)->format('d-m-Y') }}</td>
                                   <td class="text-center">

                                   @if($laporan->status->status_id == 1)
                                        <a href="#" class="btn btn-sm btn-warning btn-icon-split">
                                             <span class="icon text-white-50">
                                             <i class="fas fa-exclamation-triangle"></i>
                                             </span>
                                             <span class="text">{{ $laporan->status->status_nama }}</span>
                                        </a>
                                   @elseif($laporan->status->status_id == 2)
                                        <a href="#" class="btn btn-sm btn-warning btn-icon-split">
                                             <span class="icon text-white-50">
                                             <i class="fas fa-exclamation-triangle"></i>
                                             </span>
                                             <span class="text">{{ $laporan->status->status_nama }}</span>
                                        </a>
                                   @endif

                                   </td>
                                   <td class="">
                                        <form action="{{ url('laporan/detail', $laporan->laporan_id) }}" method="POST">
                                             <a class="btn btn-info btn-sm mb-2"href="{{ url('admin/detail', $laporan->laporan_id) }}">
                                                  Detail
                                             </a>
                                             <a class="btn btn-primary btn-sm  mb-2" href="{{ route('admin.status_laporan.edit', $laporan->laporan_id) }}">Ubah Status Laporan</a>
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-danger btn-sm  mb-2"
                                             onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                        </form>
                                   </td>
                              </tr>
                         @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
@endsection
