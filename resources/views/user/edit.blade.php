@extends('user.template')

@section('content')
     <div class="row align-items-center my-5">
          <div class="col-10">
               <h2>Edit Daftar User</h2>
          </div>
          <div class="col-2">
               <a class="btn btn-sm btn-success" href="{{ route('user.index') }}">Kembali</a>
          </div>
     </div>
     <div class="card card-lg mt-5 mx-auto" style="width: 65%;">
          <div class="card-header bg-dark.bg-gradient text-center">
               <h5>Edit Data user</h5>
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
               <form action="{{ route('user.update', $userData->user_id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                         <label for="level_id" class="form-label">Level ID</label>
                         <input type="text" id="level_id" name="level_id" class="form-control" placeholder="{{ $userData->level->level_id }} ">
                    </div>
                    <div class="mb-3">
                         <label for="user_nik" class="form-label">NIK</label>
                         <input type="text" id="user_nik" name="user_nik" class="form-control" placeholder="{{ $userData->user_nik }} ">
                    </div>
                    <div class="mb-3">
                         <label for="user_nama" class="form-label">Nama</label>
                         <input type="text" id="user_nama" name="user_nama" class="form-control"
                         placeholder="{{ $userData->user_nama }}">
                    </div>
                    <div class="mb-3">
                         <label for="user_password" class="form-label">Password</label>
                         <input type="password" id="user_password" name="user_password" class="form-control"
                         placeholder="{{ $userData->user_password }}">
                    </div>
                    <div class="mb-3">
                         <label for="user_foto" class="form-label">Foto user</label>
                         <input type="file" id="user_foto" name="user_foto" class="form-control" placeholder="{{ $userData->user_foto }}">
                    </div>
                    <button type="submit" class="btn btn-dark">Update</button>
               </form>
          </div>
          <div class="card-footer bg-dark.bg-gradient text-center">
               <h6>Sipid - Website</h6>
          </div>
     </div>
@endsection
