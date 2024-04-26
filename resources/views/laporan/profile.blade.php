@extends('laporan.layouts.main')

@section('content')
<div class="container rounded bg-white my-3">
    <div class="row">
          <div class="col-md-4 border-bottom border-2">
               <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                    <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                    <div class="mt-4" style="width: 90px; height: 90px; border-radius: 50%; overflow: hidden;">
                         @if($dataUser->user_foto)
                         <img class="rounded-circle" src="{{ asset('storage/' . $dataUser->user_foto) }}" width="90" height="90" style="object-fit: cover;">
                         @else
                         <img class="rounded-circle" src="{{ asset('img/default_profile.jpg') }}" width="90" height="90" style="object-fit: cover;">
                         @endif
                    </div>
                    <div class="mt-5">
                         <span class="font-weight-bold">Nama : {{ $dataUser->user_nama }}</span>
                    </div>
                    <div class="mt-1">
                         <span class="text-black-50">Nomo Hp :{{ $dataUser->user_nomor }}</span>
                    </div>
               </div>
          </div>
          <div class="col-md-8">
               <div class="p-3 py-5">
                    <form action="{{ url('laporan/edit_profile') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <h6 class="m-0 font-weight-bold text-primary text-right flex-grow-1">Edit Profile</h6>
                         <div class="row mt-5">
                              <div class="col">
                                   <label for="user_foto">Foto Profile</label>
                                   <input type="file" class="form-control @error ('user_foto') is-invalid @enderror" name="user_foto">
                                   @error ('user_foto')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                              </div>
                         </div>
                         <div class="row mt-3">
                              <div class="col">
                                   <label for="user_nama">Nama</label>
                                   <input type="text" name="user_nama" value="{{ auth()->user()->user_nama }}" class="form-control @error ('user_nama') is-invalid @enderror">
                                   @error ('user_nama')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                              </div>
                         </div>
                         <div class="row mt-3">
                              <div class="col">
                                   <label for="user_nomor">Nomor HP</label>
                                   <input type="number" name="user_nomor" class="form-control @error ('user_nomor') is-invalid @enderror" value="{{ $dataUser->user_nomor }}">
                                   @error ('user_nomor')
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
                                   <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                              </div>
                         </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
@endsection
