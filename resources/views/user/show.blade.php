@extends('user.template')

@section('content')
     <div class="row align-items-center my-5">
          <div class="col-10">
               <h2>Detail Data</h2>
          </div>
          <div class="col-2">
               <a class="btn btn-sm btn-success" href="{{ route('user.index') }}">Kembali</a>
          </div>
     </div>
     
     <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>ID user:</strong>
                    {{ $userData->user_id }}
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>ID level:</strong>
                    {{ $userData->level->level_id }}
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>NIK:</strong>
                    {{ $userData->user_nik }}
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>Nama:</strong>
                    {{ $userData->user_nama }}
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>Password:</strong>
                    {{ $userData->user_password }}
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>Foto :</strong>
                    <img src="" alt="{{ $userData->user_foto }}">      
               </div>
          </div>
     </div>
@endsection
