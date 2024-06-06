@extends('admin.layouts.main')

@section('content')
     <div class="row justify-content-center mt-1">
          <div class="col-md-9">
               <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Halaman Tambah Kriteria</h1>
               </div>
               <div class="card shadow mb-4">

                    <div class="card-header py-3 d-flex justify-content-between   align-items-center bg-primary">
                         <h6 class="m-0 font-weight-bold text-light">Form Tambah Data Kriteria</h6>
                    </div>

                    <div class="card-body">
                         <form action="{{ route('admin.kriteria.store') }}" method="post">
                             @csrf
                              <!-- Input Nama Kriteria -->
                              <div class="mb-3">
                                   <label for="kriteria_nama" class="form-label">Nama Kriteria</label>
                                   <input type="text" id="kriteria_nama" name="kriteria_nama" class="form-control @error('kriteria_nama') is-invalid @enderror" placeholder="Masukkan Nama Kriteria" value="{{ old('kriteria_nama') }}">

                                   <!-- Pesan Erorr -->
                                   @error('kriteria_nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Erorr -->
                              </div>
                              <!-- End Input Nama Kriteria -->

                              <!-- Input Bobot Kriteria -->
                              <div class="mb-3">
                                   <label for="kriteria_bobot" class="form-label">Bobot Kriteria (%)</label>
                                   <div class="input-group">
                                        <input type="number" id="kriteria_bobot" name="kriteria_bobot" class="form-control @error('kriteria_bobot') is-invalid @enderror" step="0.01" placeholder="Masukkan Bobot Kriteria" value="{{ old('kriteria_bobot') }}">
                                   </div>

                                   <!-- Pesan Erorr -->
                                   @error('kriteria_bobot')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Erorr -->
                              </div>
                              <!-- End Input Bobot Kriteria -->

                              <!-- Input Attribut Kriteria -->
                              <div class="mb-3">
                                   <label for="kriteria_attribut" class="form-label">Attribut Kriteria</label>
                                   <select id="kriteria_attribut" name="kriteria_attribut" class="form-control @error('kriteria_attribut') is-invalid @enderror">
                                       <option value="Benefit" {{ old('kriteria_attribut') == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                                       <option value="Cost" {{ old('kriteria_attribut') == 'Cost' ? 'selected' : '' }}>Cost</option>
                                   </select>
                               
                                   <!-- Pesan Error -->
                                   @error('kriteria_attribut')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Error -->
                              </div>     
                              <!-- End Input Attribut Kriteria -->

                              <!-- Input Jumlah Deskripsi -->
                              <div class="mb-3">
                                   <label for="jumlah_deskripsi" class="form-label">Jumlah Deskripsi Penilaian</label>
                                   <div class="input-group">
                                        <input type="number" id="jumlah_deskripsi" name="jumlah_deskripsi" class="form-control @error('jumlah_deskripsi') is-invalid @enderror" placeholder="Masukkan Jumlah Deskripsi" value="{{ old('jumlah_deskripsi') }}">
                                   </div>

                                   <!-- Pesan Erorr -->
                                   @error('jumlah_deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Erorr -->
                              </div>
                              <!-- End Input Jumlah Deskripsi -->

                              <!-- Tombol -->
                              <div class="d-flex justify-content-between">
                                   <a class="btn btn-sm btn-secondary mb-0 mr-1" href="{{ route('admin.kriteria.index') }}">Kembali</a>
                                   <button type="submit" class="btn btn-sm btn-primary ms-auto">Simpan</button>
                              </div>  
                              <!-- End Tombol -->
                         </form>
                    </div>          
               </div>
          </div>
     </div>
@endsection
