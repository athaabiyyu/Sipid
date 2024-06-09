@extends('laporan.layouts.main')

@section('content')
     
     <div class="row justify-content-center mb-5">
          <div class="col-md-9">
               <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Halaman Edit Laporan</h1>
                    <a class="btn btn-sm btn-success mb-0" href="{{ route('laporan.detailLaporan', $dataLaporan->laporan_id) }}">Kembali</a>
               </div>
               <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
                         <h6 class="m-0 font-weight-bold text-light">Form Edit Laporan</h6>
                    </div>
                    <div class="card-body">
                         <form method="POST" action="{{ route('laporan.updateLaporan', $dataLaporan->laporan_id) }}" enctype="multipart/form-data">
                         @csrf
                         <div class="mb-3">
                              <label for="infrastruktur_id" class="form-label">Nama Infrastruktur</label>
                              <select id="infrastruktur_id" name="infrastruktur_id"
                                   class="form-control @error('infrastruktur_id') is-invalid @enderror">
                                   <option value="">Pilih Nama Infrastruktur</option>
                                   @foreach ($dataInfrastruktur as $infrastruktur)
                                        <option value="{{ $infrastruktur->infrastruktur_id }}"
                                             {{ old('infrastruktur_id', $dataLaporan->infrastruktur_id) == $infrastruktur->infrastruktur_id ? 'selected' : '' }}>
                                             {{ $infrastruktur->infrastruktur_nama }}
                                        </option>
                                   @endforeach
                              </select>

                              <!-- Pesan Error -->
                              @error('infrastruktur_id')
                                   <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                              <!-- Pesan Error -->
                              </select>

                              <!-- Bukti Laporan -->
                              <div class="mb-3 mt-3">
                                   <label for="bukti_laporan" class="form-label">Bukti Laporan</label>
                                   <input type="file" id="bukti_laporan" name="bukti_laporan"
                                        class="form-control @error('bukti_laporan') is-invalid @enderror">

                                   <!-- Pesan Erorr -->
                                   @error('bukti_laporan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Erorr -->
                              </div>
                              <!-- End Bukti Laporan -->

                              <!-- Isi Laporan -->
                              <div class="mb-3">
                                   <label for="deskripsi_laporan" class="form-label">Isi Laporan</label>
                                   <textarea id="deskripsi_laporan" name="deskripsi_laporan"
                                        class="form-control @error('deskripsi_laporan') is-invalid @enderror" placeholder="Masukkan detail kerusakan">{{ old('deskripsi_laporan', $dataLaporan->deskripsi_laporan) }}</textarea>

                                   <!-- Pesan Error -->
                                   @error('deskripsi_laporan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Error -->
                              </div>
                              <!-- End Isi Laporan -->

                              <!-- Alamat -->
                              <div class="mb-3">
                                   <label for="alamat_laporan" class="form-label">Alamat Kerusakan</label>
                                   <input type="text" id="alamat_laporan" name="alamat_laporan"
                                        class="form-control @error('alamat_laporan') is-invalid @enderror"
                                        placeholder="Masukkan alamat Kerusakan"
                                        value="{{ old('alamat_laporan', $dataLaporan->alamat_laporan) }}">

                                   <!-- Pesan Error -->
                                   @error('alamat_laporan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Error -->
                              </div>
                              <!-- End Alamat -->

                              <!-- Tombol -->
                              <div class="d-flex justify-content-end align-items-right">
                                   <button type="submit" class="btn btn-sm btn-primary mb-0">Kirim</button>
                              </div> 
                              <!-- End Tombol -->
                         </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
@endsection
