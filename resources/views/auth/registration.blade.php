@extends('auth.template')

@section('content')
     <div class="card o-hidden border-0 shadow-lg my-5 ">
          <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
               <div class="row">
                    <div class="col-lg-5 d-none d-lg-block position-relative">
                         <div class="position-absolute top-50 start-50 translate-middle" style="width: 100%; height: 100%;">
                             <div class="w-100 h-100" style="background-image: url('{{ asset('img/sipid putih.png') }}'); background-size: contain; background-position: center center; background-repeat: no-repeat;"></div>
                         </div>
                     </div>

                    <div class="col-lg-7">
                         <div class="p-5">
                              <div class="text-center">
                                   <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                              </div>

                              <form class="user" method="POST" action="/registration">
                                   @csrf
                                   <div class="form-group row mt-5">
                                        <div class="col mb-3 mb-sm-0">
                                             <input type="text" id="username" placeholder="Username" name="username" class="form-control form-control-user @error ('username') is-invalid @enderror" value="{{ old('username') }}">
                                             @error('username')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                   </div>

                                   <div class="form-group row">
                                        <div class="col mb-3 mb-sm-0">
                                             <input type="text" id="user_nama" placeholder="Nama Lengkap" name="user_nama" class="form-control form-control-user @error ('user_nama') is-invalid @enderror" value="{{ old('user_nama') }}">
                                             @error('user_nama')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                   </div>

                                   <div class="form-group row">
                                        <div class="col mb-3 mb-sm-0">
                                             <input type="text" id="user_alamat" placeholder="Alamat" name="user_alamat" class="form-control form-control-user @error ('user_alamat') is-invalid @enderror" value="{{ old('user_alamat') }}">
                                             @error('user_alamat')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                   </div>

                                   <div class="form-group row">
                                        <div class="col mb-3 mb-sm-0">
                                             <input type="number" id="user_nomor" placeholder="Nomor HP" name="user_nomor" class="form-control form-control-user @error ('user_nomor') is-invalid @enderror" value="{{ old('user_nomor') }}">
                                             @error('user_nomor')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                   </div>

                                   <div class="form-group row">
                                        <div class="col mb-3 mb-sm-0">
                                             <input type="password" id="user_password" placeholder="Password" name="user_password" class="form-control form-control-user @error ('user_password') is-invalid @enderror">
                                             @error ('user_password')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                   </div>

                                   <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                              </form>
                              <br><br><br>
                              <hr>
                              <div class="text-center mt-2">
                                   <a class="small" href="/">Sudah Punya Akun? Masuk!</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
@endsection
