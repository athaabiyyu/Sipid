@extends('auth.template')

@section('content')
     <div class="card o-hidden border-0 shadow-lg my-5 ">
          <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
               <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-light"></div>
                    <div class="col-lg-7">
                         <div class="p-5">
                              <div class="text-center">
                                   <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                              </div>

                              <form class="user" method="POST" action="/registration">
                                   @csrf
                                   <div class="form-group row mt-5">
                                        <div class="col mb-3 mb-sm-0">
                                             <input type="text" id="user_nik" placeholder="NIK" name="user_nik" class="form-control form-control-user @error ('user_nik') is-invalid @enderror" value="{{ old('user_nik') }}">
                                             @error('user_nik')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                   </div>

                                   <div class="form-group row">
                                        <div class="col mb-3 mb-sm-0">
                                             <input type="text" id="user_nama" placeholder="Nama" name="user_nama" class="form-control form-control-user @error ('user_nama') is-invalid @enderror" value="{{ old('user_nama') }}">
                                             @error('user_nama')
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
                              <div class="text-center mt-5">
                                   <a class="small" href="/">Sudah Punya Akun? Masuk!</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
@endsection
