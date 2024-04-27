@extends('laporan.layouts.main')

@section('content')
     <div class="row justify-content-center mt-5">
          <div class="col-md-9">
               <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                         <h6 class="m-0 font-weight-bold text-primary">+ Form Buat Laporan Infrastruktur</h6>
                         <a class="btn btn-sm btn-success ml-auto" href="{{ url('laporan') }}">Kembali</a>
                    </div>
                    <div class="card-body">
                         <form method="POST" action="{{ url('laporan') }}" enctype="multipart/form-data">
                              @csrf
                              <div class="mb-3">
                                   <label for="infrastruktur_id" class="form-label">Nama Infrastruktur</label>
                                   <select id="infrastruktur_id" name="infrastruktur_id" class="form-control @error('infrastruktur_id') is-invalid @enderror">
                                   <option value="">Pilih Nama Infrastruktur</option>
                                        @foreach ($dataInfrastruktur as $infrastruktur)
                                             <option value="{{ $infrastruktur->infrastruktur_id }}">{{ $infrastruktur->infrastruktur_nama }}</option>
                                        @endforeach

                                        <!-- Pesan Erorr -->  
                                        @error('infrastruktur_id')
                                             <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <!-- Pesan Erorr -->   

                                   </select>
                                   <div class="mb-3 mt-3">
                                        <label for="bukti_laporan" class="form-label">Bukti Laporan</label>
                                        <input type="file" id="bukti_laporan" name="bukti_laporan" class="form-control @error('bukti_laporan') is-invalid @enderror">

                                        <!-- Pesan Erorr -->  
                                        @error('bukti_laporan')
                                             <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <!-- Pesan Erorr -->  
                                   </div>

                                   <div class="mb-3">
                                        <label for="deskripsi_laporan" class="form-label">Deskripsi Laporan</label>
                                        <textarea id="deskripsi_laporan" name="deskripsi_laporan" class="form-control @error('deskripsi_laporan') is-invalid @enderror" placeholder="Masukkan lokasi dan detail kerusakan">{{ old('deskripsi_laporan') }}</textarea>
                                    
                                        <!-- Pesan Error -->
                                        @error('deskripsi_laporan')
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
