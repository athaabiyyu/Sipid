{{-- @extends('admin.layouts.main')

@section('content')
     <div class="row justify-content-center mb-5">
          <div class="col-md-9">
               <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
                         <h6 class="m-0 font-weight-bold text-light">Form Edit Keterangan Kriteria</h6>
                    </div>

                    <div class="card-body">
                         <form method="POST" action="{{ route('admin.kriteria.simpan_keterangan_penilaian', $kriteria_id) }}">
                         @csrf
                         @for ($i = 0; $i < $jumlah_deskripsi; $i++)
                              <div class="row mt-3 mb-3">
                                   <div class="col-md-6">
                                        <div class="mb-3">
                                             <label for="level_keparahan_{{ $i }}" class="form-label">Level Keparahan
                                             {{ $i + 1 }}</label>
                                             <input type="text" id="level_keparahan_{{ $i }}"
                                             name="level_keparahan[]"
                                             class="form-control @error('level_keparahan.' . $i) is-invalid @enderror"
                                             placeholder="Masukkan Level Keparahan"
                                             value="{{ old('level_keparahan.' . $i, $level_keparahan_array[$i] ?? '') }}">

                                             @error('level_keparahan.' . $i)
                                             <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                        <div class="mb-6">
                                             <label for="skor_penilaian_{{ $i }}" class="form-label">Skor Penilaian
                                             {{ $i + 1 }}</label>
                                             <input type="number" id="skor_penilaian_{{ $i }}"
                                             name="skor_penilaian[]"
                                             class="form-control @error('skor_penilaian.' . $i) is-invalid @enderror"
                                             placeholder="Masukkan Skor"
                                             value="{{ old('skor_penilaian.' . $i, $skor_penilaian_array[$i] ?? '') }}">

                                             @error('skor_penilaian.' . $i)
                                             <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                   </div>

                                   <div class="col-md-7">
                                        <div class="mb-3">
                                             <label for="deskripsi_penilaian_{{ $i }}" class="form-label">Deskripsi
                                             Penilaian {{ $i + 1 }}</label>
                                             <input type="text" id="deskripsi_penilaian_{{ $i }}"
                                             name="deskripsi_penilaian[]"
                                             class="form-control @error('deskripsi_penilaian.' . $i) is-invalid @enderror"
                                             placeholder="Masukkan Deskripsi Penilaian"
                                             value="{{ old('deskripsi_penilaian.' . $i, $deskripsi_penilaian_array[$i] ?? '') }}">

                                             @error('deskripsi_penilaian.' . $i)
                                             <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                   </div>
                                   <hr class="border-5 border-primary">
                              </div>
                              
                         @endfor

                         <div class="d-flex justify-content-end">
                              <a href="{{ route('admin.kriteria.index') }}" class="btn btn-secondary btn-sm mr-2">Kembali</a>
                              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                         </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
@endsection
 --}}

 @extends('admin.layouts.main')

@section('content')
     <div class="row justify-content-center mb-5">
          <div class="col-md-9">
               <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
                         <h6 class="m-0 font-weight-bold text-light">Form Edit Keterangan Penilaian Kriteria</h6>
                    </div>

                    <div class="card-body">
                         <form method="POST" action="{{ route('admin.kriteria.simpan_keterangan_penilaian', $kriteria_id) }}">
                         @csrf
                         @for ($i = 0; $i < $jumlah_deskripsi; $i++)
                              <div class="row mt-3 mb-3">
                                   <div class="col-md-6">
                                        <div class="mb-3">
                                             <label for="level_keparahan_{{ $i }}" class="form-label">Level Keparahan Ke-{{ $i + 1 }}</label>
                                             <input type="text" id="level_keparahan_{{ $i }}"
                                             name="level_keparahan[]"
                                             class="form-control @error('level_keparahan.' . $i) is-invalid @enderror"
                                             placeholder="Masukkan Level Keparahan"
                                             value="{{ old('level_keparahan.' . $i, $level_keparahan_array[$i] ?? '') }}">

                                             @error('level_keparahan.' . $i)
                                             <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                        <div class="mb-6">
                                             <label for="skor_penilaian_{{ $i }}" class="form-label">Skor Penilaian Ke-{{ $i + 1 }}</label>
                                             <input type="number" id="skor_penilaian_{{ $i }}"
                                             name="skor_penilaian[]"
                                             class="form-control @error('skor_penilaian.' . $i) is-invalid @enderror"
                                             placeholder="Masukkan Skor"
                                             value="{{ old('skor_penilaian.' . $i, $skor_penilaian_array[$i] ?? '') }}">

                                             @error('skor_penilaian.' . $i)
                                             <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                   </div>

                                   <div class="col-md-12">
                                        <div class="mb-3">
                                             <label for="deskripsi_penilaian_{{ $i }}" class="form-label">Deskripsi
                                             Penilaian Ke-{{ $i + 1 }}</label>
                                             <textarea id="deskripsi_penilaian_{{ $i }}"
                                             name="deskripsi_penilaian[]"
                                             class="form-control @error('deskripsi_penilaian.' . $i) is-invalid @enderror"
                                             placeholder="Masukkan Deskripsi Penilaian"
                                             rows="4">{{ old('deskripsi_penilaian.' . $i, $deskripsi_penilaian_array[$i] ?? '') }}</textarea>

                                             @error('deskripsi_penilaian.' . $i)
                                             <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                   </div>
                              </div>
                         @endfor

                         <div class="d-flex justify-content-end">
                              <a href="{{ route('admin.kriteria.index') }}" class="btn btn-secondary btn-sm mr-2">Kembali</a>
                              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                         </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
@endsection
