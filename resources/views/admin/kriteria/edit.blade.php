@extends('admin.layouts.main')

@section('content')
     <div class="row justify-content-center mb-5">
          <div class="col-md-9">
               <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Halaman Edit Kriteria</h1>
                    <a class="btn btn-sm btn-success" href="{{ route('admin.kriteria.index') }}">Kembali</a>
               </div>
               <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
                         <h6 class="m-0 font-weight-bold text-light">Form Edit Kriteria</h6>
                    </div>

                    <div class="card-body">
                         <form method="POST" action="{{ route('admin.kriteria.update', $dataKriteria->kriteria_id) }}"
                         onsubmit="convertPercentToDecimal()">
                              @csrf
                              @method('PUT')
                              <!-- Input Nama Kriteria -->
                              <div class="mb-3">
                                   <label for="kriteria_nama" class="form-label">Nama Kriteria</label>
                                   <input type="text" id="kriteria_nama" name="kriteria_nama"
                                        class="form-control @error('kriteria_nama') is-invalid @enderror"
                                        placeholder="Masukkan Nama Kriteria" value="{{ $dataKriteria->kriteria_nama }}">

                                   <!-- Pesan Erorr -->
                                   @error('kriteria_nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Erorr -->
                              </div>
                              <!-- End Input Nama Kriteria -->

                              <!-- Input Bobot Kriteria -->
                              <div class="mb-3">
                                   <label for="kriteria_bobot" class="form-label">Bobot Kriteria</label>
                                   <input type="text" id="kriteria_bobot" name="kriteria_bobot"
                                        class="form-control @error('kriteria_bobot') is-invalid @enderror"
                                        placeholder="Masukkan Nama Kriteria" value="{{ $dataKriteria->kriteria_bobot * 100 }}">

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
                                   <select id="kriteria_attribut" name="kriteria_attribut"
                                        class="form-control @error('kriteria_attribut') is-invalid @enderror">
                                        <option value="Benefit"
                                             {{ $dataKriteria->kriteria_attribut == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                                        <option value="Cost" {{ $dataKriteria->kriteria_attribut == 'Cost' ? 'selected' : '' }}>
                                             Cost</option>
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
                                        <input type="number" id="jumlah_deskripsi" name="jumlah_deskripsi"
                                             class="form-control @error('jumlah_deskripsi') is-invalid @enderror"
                                             placeholder="Masukkan Jumlah Deskripsi" value="{{ $dataKriteria->jumlah_deskripsi }}">
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
                                   <button type="submit" class="btn btn-sm btn-primary ms-auto">Simpan</button>
                              </div>
                              <!-- End Tombol -->
                         </form>
                    </div>
               </div>
          </div>
     </div>

     <script>
          // Konfersi input bobot dari integer menjadi desimal
          function convertPercentToDecimal() {
              var bobotField = document.getElementById('kriteria_bobot');
              var bobotValue = parseFloat(bobotField.value);
      
              if (!isNaN(bobotValue) && bobotValue > 100) {
                  bobotField.value = bobotValue / 100;
              }
          }
     </script>  
@endsection
