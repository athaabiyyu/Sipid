@extends('laporan.layouts.main')

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

     <div class="row">
          <div class="col-md-4">
               <div class="card mb-4 py-3 border-bottom-info">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                         <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                         <div class="mt-4" style="width: 90px; height: 90px; border-radius: 50%; overflow: hidden;">
                         @if ($dataUser->user_foto)
                              <img class="rounded-circle" src="{{ asset('storage/' . $dataUser->user_foto) }}" width="90"
                                   height="90" style="object-fit: cover;">
                         @else
                              <img class="rounded-circle" src="{{ asset('img/default_profile.jpg') }}" width="90"
                                   height="90" style="object-fit: cover;">
                         @endif
                         </div>
                         <div class="mt-5">
                         <span class="text-black-50">NIK : {{ $dataUser->user_nik }}</span>
                         </div>
                         <div class="mt-1">
                         <span class="text-black-50">Nama : {{ $dataUser->user_nama }}</span>
                         </div>
                         <div class="mt-1">
                         <span class="text-black-50">Nomor Hp : {{ $dataUser->user_nomor }}</span>
                         </div>
                         <div class="mt-1">
                         <span class="text-black-50">Alamat : {{ $dataUser->user_alamat }}</span>
                         </div>
                    </div>
               </div>
          </div>

          <div class="col-md-8">
               <div class="card mb-4 py-3 border-bottom-info">
                    <div class="p-3 py-5">
                         <form action="{{ url('laporan/edit_profile') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <h6 class="m-0 font-weight-bold text-primary text-right flex-grow-1">Edit Profile</h6>
                         <div class="row mt-4">
                              <div class="col">
                                   <label for="user_foto">Foto Profile</label>
                                   <input type="file" class="form-control @error('user_foto') is-invalid @enderror"
                                        name="user_foto">
                                   @error('user_foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                              </div>
                              <div class="col">
                                   <label for="user_nama">Nama Lengkap</label>
                                   <input type="text" name="user_nama" value="{{ auth()->user()->user_nama }}"
                                        class="form-control @error('user_nama') is-invalid @enderror">
                                   @error('user_nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                              </div>
                         </div>
                         <div class="row mt-3">
                              <div class="col">
                                   <label for="user_nomor">Nomor HP</label>
                                   <input type="number" name="user_nomor"
                                        class="form-control @error('user_nomor') is-invalid @enderror"
                                        value="{{ $dataUser->user_nomor }}" placeholder="Masukkan Nomor Hp">
                                   @error('user_nomor')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                              </div>
                              <div class="col">
                                   <label for="user_alamat">Alamat</label>
                                   <input type="text" name="user_alamat" value="{{ auth()->user()->user_alamat }}"
                                        class="form-control @error('user_alamat') is-invalid @enderror"
                                        placeholder="Masukkan Alamat">
                                   @error('user_alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                              </div>
                         </div>
                         <div class="mt-5">
                              <div class="row">
                                   <div class="col text-left">
                                        <a class="btn btn-sm btn-success ml-auto" href="{{ url('laporan') }}">Kembali</a>
                                   </div>
                                   <div class="col text-right">
                                        <button class="btn btn-primary btn-sm profile-button" type="submit">Simpan</button>
                                   </div>
                              </div>
                         </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
@endsection
