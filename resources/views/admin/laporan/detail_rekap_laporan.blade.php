@extends('admin.layouts.main')

@section('content')
     @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Berhasil!</strong> {{ session('success') }}.
               <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
     @endif

     @if (session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Upss!</strong> {{ session('error') }}.
               <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
     @endif
     <div class="card mb-4 py-2 border-left-primary">
          <div class="card-body">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Laporan ID</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <small>{{ $detailLaporan->laporan_id }}</small>
                    </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Nama Pelapor</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <small>{{ $detailLaporan->user->user_nama }}</small>
                    </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Nama Infrastruktur</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <small>{{ $detailLaporan->infrastruktur->infrastruktur_nama }}</small>
                    </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Tanggal Laporan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <small>{{ \Carbon\Carbon::parse($detailLaporan->tgl_laporan)->format('d-m-Y') }}</small>
                    </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Bukti Laporan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <img src="{{ asset('storage/' . $detailLaporan->bukti_laporan) }}" alt="Bukti Laporan"
                         class="img-fluid rounded" style="width: 200px; height: auto;">
                    </div>
               </div>
               <hr>
               <div class="row mb-4">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Deskripsi Laporan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <small>{{ $detailLaporan->deskripsi_laporan }}</small>
                    </div>
               </div>
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Lokasi</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <small>{{ $detailLaporan->alamat_laporan }}</small>
                    </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Status Laporan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <small>
                         @if ($detailLaporan->status->status_id == 1)
                              <a href="#" class="btn btn-sm btn-primary btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-check-circle"></i>
                                   </span>
                                   <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                              </a>
                         @elseif($detailLaporan->status->status_id == 2)
                              <a href="#" class="btn btn-sm btn-warning btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-cogs"></i>
                                   </span>
                                   <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                              </a>
                         @elseif($detailLaporan->status->status_id == 3)
                              <a href="#" class="btn btn-sm btn-info btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-hammer"></i>
                                   </span>
                                   <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                              </a>
                         @elseif($detailLaporan->status->status_id == 4)
                              <a href="#" class="btn btn-sm btn-success btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-hammer"></i>
                                   </span>
                                   <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                              </a>
                         @elseif($detailLaporan->status->status_id == 5)
                              <a href="#" class="btn btn-sm btn-success btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                   </span>
                                   <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                              </a>
                         @else
                              <a href="#" class="btn btn-sm btn-danger btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-times"></i>
                                   </span>
                                   <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                              </a>
                         @endif
                         </small>
                    </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Ubah Status</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <form id="statusForm{{ $detailLaporan->detailLaporan_id }}"
                         action="{{ route('admin.ubah_status', $detailLaporan->laporan_id) }}" method="POST">
                         @csrf
                         <div class="btn-group">
                              <button type="button"
                                   class="btn btn-sm dropdown-toggle {{ $detailLaporan->status_id == 1
                                        ? 'btn-primary'
                                        : ($detailLaporan->status_id == 2
                                             ? 'btn-primary'
                                             : ($detailLaporan->status_id == 3
                                             ? 'btn-primary'
                                             : ($detailLaporan->status_id == 4
                                                  ? 'btn-primary'
                                                  : ($detailLaporan->status_id == 5
                                                       ? 'btn-primary'
                                                       : 'btn-primary')))) }}
                                             "
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   {{ $detailLaporan->status->status_nama ?? 'Pilih Status' }}
                              </button>
                              <div class="dropdown-menu">
                                   <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').status.value = 1; document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').submit();">Terkirim
                                   </a>
                                   <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').status.value = 2; document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').submit();">Dalam
                                        Verifikasi
                                   </a>
                                   <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').status.value = 3; document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').submit();">Dalam
                                        Proses
                                   </a>
                                   <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').status.value = 4; document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').submit();">Direalisasikan
                                   </a>
                                   <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').status.value = 5; document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').submit();">Selesai
                                   </a>
                                   <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').status.value = 6; document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').submit();">Ditolak
                                   </a>
                              </div>
                         </div>
                         <input type="hidden" name="status" value="{{ $detailLaporan->status_id }}">
                         </form>
                    </div>
               </div>
               <hr>
               <a class="btn btn-sm btn-success ml-auto" href="{{ url('admin/rekap_laporan') }}">Kembali</a>
          </div>
     </div>
@endsection