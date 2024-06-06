@extends('laporan.layouts.main')

@section('content')

     <!--Judul Halaman-->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     </div>
     <!--End Judul Halaman-->

     <!-- Card -->
     <div class="row">
          <!-- Card Jumlah Laporan Terkirim -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-primary shadow h-100 ">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laporan Terkirim
                              </div>
                              <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalLaporanTerkirim }}</div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-paper-plane fa-2x text-primary"></i>
                         </div>
                         </div>
                    </div>
                    <div id="terkirim-footer" class="card-footer p-0">
                         @if ($totalLaporanTerkirim > 0)
                              <div class="card-footer bg-white p-0 ">
                                   <div class="row">
                                        <div class="col">
                                        <a href="{{ url('/laporan?status=1') }}" class="text-primary d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
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
          <!-- End Card Jumlah Laporan Terkirim -->
          
          <!-- Card Jumlah Laporan Terverifikasi -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-info shadow h-100">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Laporan Terverifikasi
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
                                        <a href="{{ url('/laporan?status=4') }}" class="text-info d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
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
          <!-- End Card Jumlah Laporan Terverifikasi -->

          <!-- Card Jumlah Laporan Ditolak -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-danger shadow h-100">
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
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-times-circle fa-2x text-danger"></i>
                         </div>
                         </div>
                    </div>
                    <div id="ditolak-footer" class="card-footer p-0">
                         @if ($totalLaporanDitolak > 0)
                              <div class="card-footer bg-white p-0 ">
                                   <div class="row">
                                        <div class="col">
                                        <a href="{{ url('/laporan?status=10') }}" class="text-danger d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
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
          <!-- End Card Jumlah Laporan Ditolak -->

          <!-- Card Jumlah Laporan Direalisasikan -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-secondary shadow h-100">
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
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-hammer fa-2x text-secondary"></i>
                         </div>
                         </div>
                    </div>
                    <div id="direalisasikan-footer" class="card-footer p-0">
                         @if ($totalLaporanDirealisasikan  > 0)
                              <div class="card-footer bg-white p-0 ">
                                   <div class="row">
                                        <div class="col">
                                        <a href="{{ url('/laporan?status=8') }}" class="text-secondary d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
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
          <!-- End Card Jumlah Laporan Direalisasikan -->

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
                         @if ($totalLaporanSelesai  > 0)
                              <div class="card-footer bg-white p-0 ">
                                   <div class="row">
                                        <div class="col">
                                        <a href="{{ url('/laporan?status=9') }}" class="text-success d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
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
                       
                        
                         </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                         <ul class="list-unstyled">
                              <li class="mb-3">
                                   <i class="fas fa-arrow-right mr-2"></i>
                                   <strong>Klik "Buat Laporan"</strong> pada sidebar untuk masuk ke halaman pembuatan laporan.
                              </li>
                              <li class="mb-3">
                                   <i class="fas fa-arrow-right mr-2"></i>
                                   <strong>Pilih "Infrastruktur"</strong> yang ingin dilaporkan (jaringan listrik, jalan, saluran air, dll).
                              </li>
                              <li class="mb-3">
                                   <i class="fas fa-arrow-right mr-2"></i>
                                   <strong>Upload "Bukti Laporan"</strong> berupa foto infrastruktur yang rusak.
                              </li>
                              <li class="mb-3">
                                   <i class="fas fa-arrow-right mr-2"></i>
                                   <strong>Isi "Isi Laporan"</strong> dengan detail kerusakan dan informasi terkait lainnya.
                              </li>
                              <li class="mb-3">
                                   <i class="fas fa-arrow-right mr-2"></i>
                                   <strong>Isi "Lokasi Kerusakan"</strong> untuk menyebutkan lokasi infrastruktur yang rusak.
                              </li>
                              <li class="mb-3">
                                   <i class="fas fa-arrow-right mr-2"></i>
                                   <strong>Klik "Kirim"</strong> untuk mengirim laporan yang telah kita tulis
                              </li>
                         </ul>
                        
                    </div>
               </div>
          </div>
     </div>

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
      
          #ditolak-footer a:hover {
              background-color: #e74a3b; /* Bootstrap danger color */
          }
      
          #direalisasikan-footer a:hover {
              background-color: #5a5c69; /* Custom dark color */
          }
      
          #selesai-footer a:hover {
              background-color: #1cc88a; /* Bootstrap success color */
          }
     </style>
      
@endsection
