@extends('layouts.templateCRUD')

@section('content')
     <div class="row align-items-center my-5">
          <div class="col-10">
               <h2>Detail Data</h2>
          </div>
          <div class="col-2">
               <a class="btn btn-sm btn-success" href="{{ route('level.index') }}">Kembali</a>
          </div>
     </div>
     
     <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>ID Level:</strong>
                    {{ $levelData->level_id }}
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>Kode Level:</strong>
                    {{ $levelData->level_kode }}
               </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                    <strong>Nama Level:</strong>
                    {{ $levelData->level_nama }}
               </div>
          </div>
     </div>
@endsection
