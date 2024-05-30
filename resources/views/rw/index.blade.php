@extends('rw.layouts.main')

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

     <!-- Card Components -->
     <div class="row">

          <!-- Card Jumlah Laporan yang Dikirim ke RW -->
          <div class="col-xl-4 col-md-6 mb-4">
               <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Laporan Menunggu Keputusan RW</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLaporanDikirimKeRw }}</div>
                                   @if ($totalLaporanDikirimKeRw > 0)
                                        <div class="row mt-3">
                                             <div class="col">
                                                  <a href="{{ route('rw.hasil_laporan', ['status' => 7]) }}" class="btn btn-secondary btn-sm">Detail &rarr;</a>
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
          <!-- End Card Jumlah Laporan yang Dikirim ke RW -->

          <!-- Card Jumlah Laporan Direalisasikan -->
          <div class="col-xl-4 col-md-6 mb-4">
               <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Laporan Direalisasikan</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLaporanDirealisasikan }}</div>
                                   @if ($totalLaporanDirealisasikan > 0)
                                        <div class="row mt-3">
                                             <div class="col">
                                                  <a href="{{ route('rw.hasil_laporan', ['status' => 8]) }}" class="btn btn-secondary btn-sm">Detail &rarr;</a>
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
          <div class="col-xl-4 col-md-6 mb-4">
               <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laporan Selesai</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLaporanSelesai }}</div>
                                   @if ($totalLaporanSelesai > 0)
                                        <div class="row mt-3">
                                             <div class="col">
                                                  <a href="{{ route('rw.hasil_laporan', ['status' => 9]) }}" class="btn btn-secondary btn-sm">Detail &rarr;</a>
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

     </div>
     <!-- End Card Components -->

     <!-- Content Row -->
     <div class="row">
          <!-- Area Chart -->
          <div class="col">
               <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                         <h6 class="m-0 font-weight-bold text-light">Cara Pelaporan</h6>
                         <div class="dropdown no-arrow"></div>
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
                                   <strong>Klik "Submit"</strong> untuk mengirim laporan Anda.
                              </li>
                         </ul>
                    </div>
               </div>
          </div>
     </div>
     <!-- End Content Row -->
@endsection
