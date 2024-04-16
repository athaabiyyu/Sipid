@extends('layouts.templateCRUD')

@section('content')
     <div class="row align-items-center my-5">
          <div class="col-10">
               <h2>Edit Daftar Status</h2>
          </div>
          <div class="col-2">
               <a class="btn btn-sm btn-success" href="{{ route('status_laporan.index') }}">Kembali</a>
          </div>
     </div>
     <div class="card card-lg mt-5 mx-auto" style="width: 65%;">
          <div class="card-header bg-dark.bg-gradient text-center">
               <h5>Edit Data status</h5>
          </div>

          @if ($errors->any())
               <div class="alert alert-danger">
                    <strong>Ops</strong> Input gagal<br><br>
                    <ul>
                         @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                    </ul>
               </div>
          @endif

          <div class="card-body">
               <form action="{{ route('status_laporan.update', $statusData->status_id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                         <label for="status_kode" class="form-label">Kode status</label>
                         <input type="text" id="status_kode" name="status_kode" class="form-control"
                         placeholder="{{ $statusData->status_kode }}">
                    </div>
                    <div class="mb-3">
                         <label for="status_nama" class="form-label">Nama status</label>
                         <input type="text" id="status_nama" name="status_nama" class="form-control"
                         placeholder="{{ $statusData->status_nama }}">
                    </div>
                    <button type="submit" class="btn btn-dark">Update</button>
               </form>
          </div>
          <div class="card-footer bg-dark.bg-gradient text-center">
               <h6>Sipid - Website</h6>
          </div>
     </div>
@endsection
