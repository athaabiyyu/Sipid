@extends('user.template')

@section('content')
     <div class="row align-items-center my-5">
          <div class="col-10">
               <h2>Membuat Daftar User</h2>
          </div>
          <div class="col-2">
               <a class="btn btn-sm btn-success" href="{{ route('user.index') }}">Kembali</a>
          </div>
     </div>
     <div class="card card-lg mt-5 mx-auto" style="width: 65%;">
          <div class="card-header bg-dark.bg-gradient text-center">
               <h5>Create Data user</h5>
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
               <form action="{{ route('user.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                         <label for="level_id" class="form-label">Level ID</label>
                         <select id="level_id" name="level_id" class="form-control">
                         <option value="">Pilih Level</option>
                         @foreach ($userData as $user)
                              <option value="{{ $user->level->level_id }}">{{ $user->level->level_id }}</option>
                         @endforeach
                         </select>
                    </div>
                    <div class="mb-3">
                         <label for="user_nik" class="form-label">NIK</label>
                         <input type="text" id="user_nik" name="user_nik" class="form-control" placeholder="Masukkan NIK ">
                    </div>
                    <div class="mb-3">
                         <label for="user_nama" class="form-label">Nama</label>
                         <input type="text" id="user_nama" name="user_nama" class="form-control"
                         placeholder="Masukkan Nama user">
                    </div>
                    <div class="mb-3">
                         <label for="user_password" class="form-label">Password</label>
                         <input type="password" id="user_password" name="user_password" class="form-control"
                         placeholder="Masukkan Password">
                    </div>
                    <div class="mb-3">
                         <label for="user_foto" class="form-label">Foto user</label>
                         <input type="file" id="user_foto" name="user_foto" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
               </form>
          </div>
          <div class="card-footer bg-dark.bg-gradient text-center">
               <h6>Sipid - Website</h6>
          </div>
     </div>
@endsection
