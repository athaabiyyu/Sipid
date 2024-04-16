@extends('layouts.templateCRUD')

@section('content')
     <div class="row align-items-center my-5">
          <div class="col-10">
               <h2>Membuat Daftar Level</h2>
          </div>
          <div class="col-2">
               <a class="btn btn-sm btn-success" href="{{ route('level.index') }}">Kembali</a>
          </div>
     </div>
     <div class="card card-lg mt-5 mx-auto" style="width: 65%;">
          <div class="card-header bg-dark.bg-gradient text-center">
               <h5>Create Data Level</h5>
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
               <form action="{{ route('level.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                         <label for="level_kode" class="form-label">Kode Level</label>
                         <input type="text" id="level_kode" name="level_kode" class="form-control"
                         placeholder="Masukkan Kode Level">
                    </div>
                    <div class="mb-3">
                         <label for="level_nama" class="form-label">Nama Level</label>
                         <input type="text" id="level_nama" name="level_nama" class="form-control"
                         placeholder="Masukkan Nama Level">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
               </form>
          </div>
          <div class="card-footer bg-dark.bg-gradient text-center">
               <h6>Sipid - Website</h6>
          </div>
     </div>
@endsection
