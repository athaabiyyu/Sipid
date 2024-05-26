@extends('admin.layouts.main')

@section('content')
     <div class="row justify-content-center mb-5">
          <div class="col-md-9">
               <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                         <h6 class="m-0 font-weight-bold text-primary">+ Form Edit Kriteria</h6>
                         <a class="btn btn-sm btn-success ml-auto" href="{{ route('admin.kriteria.index') }}">Kembali</a>
                    </div>
                    <div class="card-body">
                         <form method="POST" action="{{ route('admin.kriteria.update', $dataKriteria->kriteria_id) }}" onsubmit="convertPercentToDecimal()">
                         @csrf
                         @method('PUT')
                         <div class="mb-3">
                              <div class="mb-3">
                                   <label for="kriteria_kode" class="form-label">Kode kriteria</label>
                                   <input type="text" id="kriteria_kode" name="kriteria_kode" class="form-control @error('kriteria_kode') is-invalid @enderror" placeholder="Masukkan Kode Kriteria" value="{{ $dataKriteria->kriteria_kode }}">

                                   <!-- Pesan Error -->
                                   @error('kriteria_kode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Error -->
                              </div>
                              <div class="mb-3">
                                   <label for="kriteria_nama" class="form-label">Nama kriteria</label>
                                   <input type="text" id="kriteria_nama" name="kriteria_nama" class="form-control @error('kriteria_nama') is-invalid @enderror" placeholder="Masukkan Nama Kriteria" value="{{ $dataKriteria->kriteria_nama }}">

                                   <!-- Pesan Error -->
                                   @error('kriteria_nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Error -->
                              </div>
                              <div class="mb-3">
                                   <label for="kriteria_bobot" class="form-label">Bobot Kriteria (%)</label>
                                   <input type="number" id="kriteria_bobot" name="kriteria_bobot" class="form-control @error('kriteria_bobot') is-invalid @enderror" placeholder="Masukkan Bobot Kriteria" value="{{ $dataKriteria->kriteria_bobot * 100 }}" step="0.01">

                                   <!-- Pesan Error -->
                                   @error('kriteria_bobot')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Error -->
                              </div>
                              <div class="mb-3">
                                   <label for="kriteria_attribut" class="form-label">Attribut Kriteria</label>
                                   <input type="text" id="kriteria_attribut" name="kriteria_attribut" class="form-control @error('kriteria_attribut') is-invalid @enderror" placeholder="Masukkan Attribut Kriteria" value="{{ $dataKriteria->kriteria_attribut }}">

                                   <!-- Pesan Error -->
                                   @error('kriteria_attribut')
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

     <script>
          function convertPercentToDecimal() {
               var bobotField = document.getElementById('kriteria_bobot');
               var bobotValue = parseFloat(bobotField.value);

               if (!isNaN(bobotValue)) {
                    bobotField.value = bobotValue / 100;
               }
          }
     </script>
@endsection

