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

          <!-- Card Jumlah Laporan Terverifikasi -->
          <div class="col-xl-4 col-md-6 mb-5">
               <div class="card border-left-info shadow h-100 py-2">
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
                              @if ($totalLaporanDiverifikasi > 0)
                              <div class="row mt-3">
                                   <div class="col">
                                        <a href="{{ url('/laporan?status=4') }}" class="btn btn-secondary btn-sm">Detail &rarr;</a>
                                   </div>
                              </div>
                              @endif
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-certificate fa-2x text-info"></i>
                         </div>
                         </div>
                    </div>
               </div>
          </div>
          <!-- End Card Jumlah Laporan Terverifikasi -->

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
@endsection
