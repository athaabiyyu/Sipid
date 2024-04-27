@extends('admin.layouts.main')

@section('content')
     <div class="row justify-content-center mb-5">
          <div class="col-md-9">
               <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                         <h6 class="m-0 font-weight-bold text-primary">+ Form Tambah Infrastruktur</h6>
                         <a class="btn btn-sm btn-success ml-auto" href="{{ url('admin/infrastruktur') }}">Kembali</a>
                    </div>
                    <div class="card-body">
                         <form method="POST" action="{{ url('admin/infrastruktur') }}">
                         @csrf
                         <div class="mb-3">
                              <div class="mb-3">
                                   <label for="infrastruktur_kode" class="form-label">Kode Infrastruktur</label>
                                   <input type="text" id="infrastruktur_kode" name="infrastruktur_kode"
                                   class="form-control @error('infrastruktur_kode') is-invalid @enderror"
                                   placeholder="Masukkan Kode Infrastruktur" value="{{ old('infrastruktur_kode') }}">

                                   <!-- Pesan Error -->
                                   @error('infrastruktur_kode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Error -->
                              </div>
                              <div class="mb-3">
                                   <label for="infrastruktur_nama" class="form-label">Nama Infrastruktur</label>
                                   <input type="text" id="infrastruktur_nama" name="infrastruktur_nama"
                                   class="form-control @error('infrastruktur_nama') is-invalid @enderror"
                                   placeholder="Masukkan Nama Infrastruktur" value="{{ old('infrastruktur_nama') }}">

                                   <!-- Pesan Error -->
                                   @error('infrastruktur_nama')
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
