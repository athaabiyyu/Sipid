@extends('laporan.layouts.main')

@section('content')
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Halaman Ubah Sandi</h1>
     </div>

     <!-- Sesion Sukses -->
     @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Berhasil!</strong> {{ session('success') }}.
               <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
     @endif
     <!-- End Sesion Sukses -->

     <!-- Sesion Erorr -->
     @if (session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Upss!</strong> {{ session('error') }}.
               <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
     @endif
     <!-- End Sesion Erorr -->

     <div class="card mb-4 py-3 border-left-primary">
          <form action="{{ route('laporan.edit_sandi') }}" method="POST">
               @csrf
               <div class="card-body">
                    <div class="row">
                         <div class="col">
                         <label for="password_lama">Password Lama</label>
                         <input type="password" name="password_lama" placeholder="Masukkan Password Lama"
                              class="form-control @error('password_lama') is-invalid @enderror">
                         @error('password_lama')
                              <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                         </div>
                    </div>
                    <div class="row mt-3">
                         <div class="col">
                         <label for="user_password">Password Baru</label>
                         <input type="password" name="user_password" placeholder="Masukkan Password Baru"
                              class="form-control @error('user_password') is-invalid @enderror">
                         @error('user_password')
                              <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                         </div>
                    </div>
                    <div class="row mt-3">
                         <div class="col">
                              <a class="btn btn-sm btn-secondary me-2" href="{{ route('laporan.dashboard') }}">Kembali</a>
                              <button class="btn btn-sm btn-primary profile-button" type="submit">Simpan</button>
                         </div>        
                    </div>
               </div>
          </form>
     </div>
@endsection
