@extends('layouts.templateCRUD')

@section('content')
     <div class="row align-items-center my-5">
          <div class="col-10">
               <h2>Membuat Daftar infrastruktur</h2>
          </div>
          <div class="col-2">
               <a class="btn btn-sm btn-success" href="{{ route('infrastruktur.index') }}">Kembali</a>
          </div>
     </div>
     <div class="card card-lg mt-5 mx-auto" style="width: 65%;">
          <div class="card-header bg-dark.bg-gradient text-center">
               <h5>Create Data infrastruktur</h5>
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
               <form action="{{ route('infrastruktur.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                         <label for="infrastruktur_kode" class="form-label">Kode Infrastruktur</label>
                         <input type="text" id="infrastruktur_kode" name="infrastruktur_kode" class="form-control" placeholder="Masukkan Kode Infrastruktur">
                    </div>
                    <div class="mb-3">
                         <label for="infrastruktur_nama" class="form-label">Nama Infrastruktur</label>
                         <input type="text" id="infrastruktur_nama" name="infrastruktur_nama" class="form-control" placeholder="Masukkan Nama Infrastruktur">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
               </form>
          </div>
          <div class="card-footer bg-dark.bg-gradient text-center">
               <h6>Sipid - Website</h6>
          </div>
     </div>
@endsection
