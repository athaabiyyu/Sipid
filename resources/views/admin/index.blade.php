@extends('admin.layouts.main')

@section('content')
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     </div>

     <!-- Card -->
     <div class="row">          
          <!-- Card Jumlah Laporan yang Masuk -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-primary shadow h-100">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laporan yang Masuk
                              </div>
                              <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalLaporan }}</div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-envelope fa-2x text-primary"></i>
                         </div>
                         </div>
                    </div>
                    <div id="terkirim-footer" class="card-footer p-0">
                         @if ($totalLaporan > 0)
                              <div class="card-footer bg-white p-0 ">
                                   <div class="row">
                                        <div class="col">
                                        <a href="{{ route('admin.rekap_laporan', ['status' => 1]) }}" class="text-primary d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
                                             <h6 class="mb-0 ml-2 font-weight-bold">Detail</h6>
                                             <i class="fas fa-arrow-right mr-2"></i>
                                        </a>
                                        </div>
                                   </div>
                              </div>
                         @endif
                    </div>
               </div>
          </div>
          <!-- End Card Jumlah Laporan yang Masuk -->

          <!-- Card Jumlah Laporan yang Sedang Diverifikasi -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-info shadow h-100">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Laporan Sedang Diverifikasi
                              </div>
                              <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalLaporanSedangDiverifikasi }}</div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-eye fa-2x text-info"></i>
                         </div>
                         </div>
                    </div>
                    <div id="sedangDiverifikasi-footer" class="card-footer p-0">
                         @if ($totalLaporanSedangDiverifikasi > 0)
                              <div class="card-footer bg-white p-0 ">
                                   <div class="row">
                                        <div class="col">
                                        <a href="{{ route('admin.rekap_laporan', ['status' => 3]) }}" class="text-info d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
                                             <h6 class="mb-0 ml-2 font-weight-bold">Detail</h6>
                                             <i class="fas fa-arrow-right mr-2"></i>
                                        </a>
                                        </div>
                                   </div>
                              </div>
                         @endif
                    </div>
               </div>
          </div>
          <!-- End Card Jumlah Laporan yang Sedang Diverifikasi -->

          <!-- Card Jumlah Laporan yang Diverifikasi -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-info shadow h-100">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Laporan Diverifikasi
                              </div>
                              <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalLaporanDiverifikasi }}</div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-certificate fa-2x text-info"></i>
                         </div>
                         </div>
                    </div>
                    <div id="diverifikasi-footer" class="card-footer p-0">
                         @if ($totalLaporanDiverifikasi > 0)
                              <div class="card-footer bg-white p-0 ">
                                   <div class="row">
                                        <div class="col">
                                        <a href="{{ route('admin.rekap_laporan', ['status' => 4]) }}" class="text-info d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
                                             <h6 class="mb-0 ml-2 font-weight-bold">Detail</h6>
                                             <i class="fas fa-arrow-right mr-2"></i>
                                        </a>
                                        </div>
                                   </div>
                              </div>
                         @endif
                    </div>
               </div>
          </div>
          <!-- End Card Jumlah Laporan yang Diverifikasi -->

          <!-- Card Jumlah Laporan yang Diklirim ke RW -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-warning shadow h-100">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Laporan Dikirim ke Rw
                              </div>
                              <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalLaporanDikirimKeRw }}</div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-paper-plane fa-2x text-warning"></i>
                         </div>
                         </div>
                    </div>
                    <div id="dikirimRW-footer" class="card-footer p-0">
                         @if ($totalLaporanDikirimKeRw > 0)
                              <div class="card-footer bg-white p-0 ">
                                   <div class="row">
                                        <div class="col">
                                        <a href="{{ route('admin.rekap_laporan', ['status' => 6]) }}" class="text-warning d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
                                             <h6 class="mb-0 ml-2 font-weight-bold">Detail</h6>
                                             <i class="fas fa-arrow-right mr-2"></i>
                                        </a>
                                        </div>
                                   </div>
                              </div>
                         @endif
                    </div>
               </div>
          </div>
          <!-- End Card Jumlah Laporan yang Dikrim ke RW -->

          <!-- Card Jumlah Laporan yang Direalisasikan -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-dark shadow h-100">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Laporan Direalisasikan
                              </div>
                              <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalLaporanDirealisasikan }}</div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-hammer fa-2x text-dark"></i>
                         </div>
                         </div>
                    </div>
                    <div id="direalisasikan-footer" class="card-footer p-0">
                         @if ($totalLaporanDirealisasikan > 0)
                              <div class="card-footer bg-white p-0 ">
                                   <div class="row">
                                        <div class="col">
                                        <a href="{{ route('admin.rekap_laporan', ['status' => 8]) }}" class="text-dark d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
                                             <h6 class="mb-0 ml-2 font-weight-bold">Detail</h6>
                                             <i class="fas fa-arrow-right mr-2"></i>
                                        </a>
                                        </div>
                                   </div>
                              </div>
                         @endif
                    </div>
               </div>
          </div>
          <!-- End Card Jumlah Laporan yang Direalisasikan -->

          <!-- Card Jumlah Laporan Selesai -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-success shadow h-100">
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
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-check-circle fa-2x text-success"></i>
                         </div>
                         </div>
                    </div>
                    <div id="selesai-footer" class="card-footer p-0">
                         @if ($totalLaporanSelesai > 0)
                              <div class="card-footer bg-white p-0 ">
                                   <div class="row">
                                        <div class="col">
                                        <a href="{{ route('admin.rekap_laporan', ['status' => 9]) }}" class="text-success d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
                                             <h6 class="mb-0 ml-2 font-weight-bold">Detail</h6>
                                             <i class="fas fa-arrow-right mr-2"></i>
                                        </a>
                                        </div>
                                   </div>
                              </div>
                         @endif
                    </div>
               </div>
          </div>
          <!-- End Card Jumlah Laporan Selesai -->
     </div>
     <!-- End Card -->


     <style>
          .card-footer a:hover {
              color: white !important;
              text-decoration: none;
              border-radius: 0.25rem; /* Optional: Add border-radius to match design */
          }
          #terkirim-footer a:hover {
              background-color: #4e73df; /* Bootstrap primary color */
          }
          #diverifikasi-footer a:hover {
              background-color: #36b9cc; /* Bootstrap info color */
          }
          #dikirimRW-footer a:hover {
              background-color: #f6c23e; /* Bootstrap info color */
          }
          #sedangDiverifikasi-footer a:hover {
              background-color: #36b9cc; /* Bootstrap success color */
          }
          #direalisasikan-footer a:hover {
              background-color: #5a5c69; /* Custom dark color */
          }
          #selesai-footer a:hover {
              background-color: #1cc88a; /* Bootstrap success color */
          }
     </style>
@endsection
