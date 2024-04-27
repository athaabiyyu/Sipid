@extends('admin.layouts.main')

@section('content')
     <div class="row justify-content-center mb-5">
          <div class="col-md-9">
               <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                         <h6 class="m-0 font-weight-bold text-primary">+ Form Edit Data Level</h6>
                         <a class="btn btn-sm btn-success ml-auto" href="{{ route('admin.level.index') }}">Kembali</a>
                    </div>
                    <div class="card-body">
                         <form method="POST" action="{{ route('admin.level.update', $levelData->level_id) }}">

                         @csrf
                         @method('PUT')
                         <div class="mb-3">
                              <div class="mb-3">
                                   <label for="level_kode" class="form-label">Kode level</label>
                                   <input type="text" id="level_kode" name="level_kode"
                                   class="form-control @error('level_kode') is-invalid @enderror"
                                   placeholder="Masukkan Kode Level" value="{{ $levelData->level_kode }}">

                                   <!-- Pesan Error -->
                                   @error('level_kode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Error -->
                              </div>
                              <div class="mb-3">
                                   <label for="level_nama" class="form-label">Nama level</label>
                                   <input type="text" id="level_nama" name="level_nama"
                                   class="form-control @error('level_nama') is-invalid @enderror"
                                   placeholder="Masukkan Nama level" value="{{ $levelData->level_nama }}">

                                   <!-- Pesan Error -->
                                   @error('level_nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Error -->
                              </div>
                              <button type="submit" class="btn btn-primary">Kirim</button>
                         </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
@endsection

