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
               <h6 class="m-0 font-weight-bold text-primary">Data Level User</h6>
               <a class="btn btn-sm btn-success ml-auto" href="{{ route('admin.level.create') }}">+ Tambah level</a>
          </div>

          <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                         <tr class="text-center">
                              <th>#</th>
                              <th>Kode Level</th>
                              <th>Nama Level</th>
                              <th>Aksi</th>
                         </tr>
                         </thead>
                         <tbody>
                              @foreach ($levelData as $level)
                              <tr class="text-center">
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $level->level_kode }}</td>
                                   <td>{{ $level->level_nama }}</td>
                                   <td>
                                        <form action="{{ route('admin.level.destroy', $level->level_id) }}" method="POST">
                                             <a class="btn btn-warning btn-sm" href="{{ route('admin.level.edit', $level->level_id) }}">Edit</a>
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

