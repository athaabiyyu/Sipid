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

          <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
               <h6 class="m-0 font-weight-bold text-light">Data Infrastruktur</h6>
               <a class="btn btn-sm btn-success ml-auto" href="{{ url('admin/infrastruktur/tambah') }}">+ Tambah Infrastruktur</a>
          </div>

          <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                         <tr class="text-center">
                              <th>#</th>
                              <th>Kode Infrastruktur</th>
                              <th>Nama Infrastruktur</th>
                              <th>Aksi</th>
                         </tr>
                         </thead>
                         <tbody>
                              @foreach ($dataInfrastruktur as $infrastruktur)
                              <tr class="text-center">
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $infrastruktur->infrastruktur_kode }}</td>
                                   <td>{{ $infrastruktur->infrastruktur_nama }}</td>
                                   <td>
                                        <form action="{{ url('admin/infrastruktur/hapus', $infrastruktur->infrastruktur_id) }}" method="POST">
                                             <a class="btn btn-warning btn-sm" href="{{ url('admin/infrastruktur/edit', $infrastruktur->infrastruktur_id) }}">Edit</a>
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-danger btn-sm"
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
