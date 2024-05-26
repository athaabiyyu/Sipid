@extends('laporan.layouts.main')

@section('content')

     <!-- Card -->
     <div class="row">
          <!-- Card Jumlah Laporan Terkirim -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Laporan Terkirim
                              </div>
                              <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalLaporanTerkirim }}</div>
                                   </div>
                              </div>
                              @if ($totalLaporanTerkirim > 0)
                              <div class="row mt-3">
                                   <div class="col">
                                        <a href="{{ url('/laporan?status=1') }}" class="btn btn-secondary btn-sm">Detail &rarr;</a>
                                   </div>
                              </div>
                              @endif
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-paper-plane fa-2x text-warning"></i>
                         </div>
                         </div>
                    </div>
               </div>
          </div>
          <!-- End Card Jumlah Laporan Terkirim -->

          <!-- Card Jumlah Laporan Ditolak -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Laporan Ditolak
                              </div>
                              <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalLaporanDitolak }}</div>
                                   </div>
                              </div>
                              @if ($totalLaporanDitolak > 0)
                              <div class="row mt-3">
                                   <div class="col">
                                        <a href="{{ url('/laporan?status=10') }}" class="btn btn-secondary btn-sm">Detail &rarr;</a>
                                   </div>
                              </div>
                              @endif
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-times-circle fa-2x text-danger"></i>
                         </div>
                         </div>
                    </div>
               </div>
          </div>
          <!-- End Card Jumlah Laporan Ditolak -->

          <!-- Card Jumlah Laporan Direalisasikan -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Laporan Direalisasikan
                              </div>
                              <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalLaporanDirealisasikan }}</div>
                                   </div>
                              </div>
                              @if ($totalLaporanDirealisasikan > 0)
                              <div class="row mt-3">
                                   <div class="col">
                                        <a href="{{ url('/laporan?status=8') }}" class="btn btn-secondary btn-sm">Detail &rarr;</a>
                                   </div>
                              </div>
                              @endif
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-hammer fa-2x text-secondary"></i>
                         </div>
                         </div>
                    </div>
               </div>
          </div>
          <!-- End Card Jumlah Laporan Direalisasikan -->

          <!-- Card Jumlah Laporan Selesai -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laporan Selesai
                              </div>
                              <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalLaporanSelesai }}</div>
                                   </div>
                              </div>
                              @if ($totalLaporanSelesai > 0)
                              <div class="row mt-3">
                                   <div class="col">
                                        <a href="{{ url('/laporan?status=9') }}" class="btn btn-secondary btn-sm">Detail &rarr;</a>
                                   </div>
                              </div>
                              @endif
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-check-circle fa-2x text-success"></i>
                         </div>
                         </div>
                    </div>
               </div>
          </div>
          <!-- End Card Jumlah Laporan Selesai -->

          <!-- Card Jumlah Semua Laporan -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Laporan Anda
                              </div>
                              <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{  $totalLaporan }}</div>
                                   </div>
                              </div>
                              @if ( $totalLaporan > 0)
                              <div class="row mt-3">
                                   <div class="col">
                                        <a href="{{ url('/laporan?status=1') }}" class="btn btn-secondary btn-sm">Detail &rarr;</a>
                                   </div>
                              </div>
                              @endif
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-file-alt fa-2x text-primary"></i>
                         </div>
                         </div>
                    </div>
               </div>
          </div>
          <!-- End Card Jumlah Semua Laporan -->
     </div>
     <!-- End Card -->

     <!-- Content Row -->
     <div class="row">

          <!-- Area Chart -->
          <div class="col">
               <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                         <h6 class="m-0 font-weight-bold text-light">Cara Pelaporan</h6>
                         <div class="dropdown no-arrow">
                         <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                              aria-labelledby="dropdownMenuLink">
                              <div class="dropdown-header">Dropdown Header:</div>
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a>
                         </div>
                         </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                         <h3>Di sini akan berisi about sipid dan tata cara pelaporan di sipid</h3>
                    </div>
               </div>
          </div>
     </div>
@endsection
