@extends('admin.layouts.main')

@section('content')
     <div class="row justify-content-center mb-5">
          <div class="col-md-9">
               <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                         <h6 class="m-0 font-weight-bold text-primary">+ Form Edit Data Status</h6>
                         <a class="btn btn-sm btn-success ml-auto" href="{{ route('admin.status_laporan.index') }}">Kembali</a>
                    </div>
                    <div class="card-body">
                         <form method="POST" action="{{ route('admin.status_laporan.update', $statusData->status_id) }}">

                         @csrf
                         @method('PUT')
                         <div class="mb-3">
                              <div class="mb-3">
                                   {{-- <label for="status_nama" class="form-label">Nama Status</label>
                                   <select id="status_nama" name="status_nama" class="form-control @error('status_nama') is-invalid @enderror">
                                   {{-- <option value="">Pilih Nama Status</option>
                                        @foreach ($statusData as $status)
                                             <option value="{{ $status->status_id }}">{{ $status->status_nama }}</option>
                                        @endforeach

                                        <!-- Pesan Erorr -->  
                                        @error('status_nama')
                                             <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <!-- Pesan Erorr -->   

                                   </select> --}}

                                   {{-- <label for="status_nama" class="form-label">Nama Status</label>
                                   <input type="text" id="status_nama" name="status_nama"
                                   class="form-control @error('status_nama') is-invalid @enderror"
                                   placeholder="Masukkan Nama status" value="{{ $statusData->status_nama }}">

                                   <!-- Pesan Error -->
                                   @error('status_nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   <!-- Pesan Error --> --}}
                              </div>
                              <button type="submit" class="btn btn-primary">Kirim</button>
                         </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
@endsection

