@extends('layouts.templateCRUD')

@section('content')
     <div class="row align-items-center my-5">
          <div class="col-10">
               <h2>Membuat Data Laporan</h2>
          </div>
          <div class="col-2">
               <a class="btn btn-sm btn-success" href="{{ route('laporan.index') }}">Kembali</a>
          </div>
     </div>
     <div class="card card-lg mt-5 mx-auto" style="width: 65%;">
          <div class="card-header bg-dark.bg-gradient text-center">
               <h5>Create Data laporan</h5>
          </div>

          @if ($errors->any())
               <div class="alert alert-danger">
                    <strong>Ops</strong> Input gagal<br><br>
                    <ul>
                         @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                    </ul>
               </div>
          @endif

          <div class="card-body">
               <form action="{{ route('laporan.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                         <label for="user_id" class="form-label">Nama Pelapor</label>
                         <select id="user_id" name="user_id" class="form-control">
                         <option value="">Nama Pelapor</option>
                         @foreach ($userData as $user)
                              <option value="{{ $user->user_id }}">{{ $user->user_nama }}</option>
                         @endforeach
                         </select>
                    </div>
                    <div class="mb-3">
                         <label for="infrastruktur_id" class="form-label">Nama Infrastruktur</label>
                         <select id="infrastruktur_id" name="infrastruktur_id" class="form-control">
                         <option value="">Nama Infrastruktur</option>
                         @foreach ($infrastrukturData as $infrastruktur)
                              <option value="{{ $infrastruktur->infrastruktur_id }}">{{ $infrastruktur->infrastruktur_nama }}</option>
                         @endforeach
                         </select>
                    </div>
                    <div class="mb-3">
                         <label for="bukti_laporan" class="form-label">Bukti Laporan</label>
                         <input type="file" id="bukti_laporan" name="bukti_laporan" class="form-control">
                    </div>
                    <div class="mb-3">
                         <label for="tgl_laporan" class="form-label">Tgl Laporan</label>
                         <input type="date" id="tgl_laporan" name="tgl_laporan" class="form-control"
                         placeholder="Masukkan Tanggal laporan">
                    </div>
                    <div class="mb-3">
                         <label for="deskripsi_laporan" class="form-label">Deskripsi Laporan</label>
                         <textarea id="deskripsi_laporan" name="deskripsi_laporan" class="form-control" placeholder="Masukkan Deskripsi Laporan"></textarea>
                    </div>
                    <div class="mb-3">
                         <label for="status_id" class="form-label">Status Laporan</label>
                         <select id="status_id" name="status_id" class="form-control">
                         <option value="">Status Laporan</option>
                         @foreach ($statusData as $status)
                              <option value="{{ $status->status_id }}">{{ $status->status_nama }}</option>
                         @endforeach
                         </select>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
               </form>
          </div>
          <div class="card-footer bg-dark.bg-gradient text-center">
               <h6>Sipid - Website</h6>
          </div>
     </div>
@endsection
