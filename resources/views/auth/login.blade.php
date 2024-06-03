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
                            <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('loginGagal'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Upss!</strong> {{ session('loginGagal') }}.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form class="s_user" method="post" action="/">
                            @csrf
                            <div class="form-group row mt-5">
                                <div class="col mb-3 mb-sm-0">
                                    <input type="text" id="username" placeholder="Masukkan Username" name="username"
                                        class="form-control form-control-user @error('username') is-invalid @enderror">
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col mb-3 mb-sm-0">
                                    <input type="password" id="user_password" placeholder="Password" name="user_password"
                                        class="form-control form-control-user @error('user_password') is-invalid @enderror">
                                    @error('user_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                        </form>

                        <br><br><br><br>
                        <hr>
                        <div class="text-center mt-5">
                            <a class="small" href="/registration">Belum Punya Akun? Buat Akun!</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
