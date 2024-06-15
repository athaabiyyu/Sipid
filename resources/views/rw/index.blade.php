@extends('rw.layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     </div>

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
               <div class="card border-left-warning shadow h-100">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Laporan Masuk dari Admin</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLaporanDikirimKeRw }}</div>
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
                                        <a href="{{ route('rw.hasil_laporan', ['status' => 6]) }}" class="text-warning d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
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
          <!-- End Card Jumlah Laporan yang Dikirim ke RW -->

          <!-- Card Jumlah Laporan Direalisasikan -->
          <div class="col-xl-4 col-md-6 mb-4">
               <div class="card border-left-dark shadow h-100">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Laporan Direalisasikan</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLaporanDirealisasikan }}</div>
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
                                        <a href="{{ route('rw.hasil_laporan', ['status' => 8]) }}" class="text-dark d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
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
          <div class="col-xl-4 col-md-6 mb-4">
               <div class="card border-left-success shadow h-100 ">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laporan Selesai</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLaporanSelesai }}</div>
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
                                        <a href="{{ route('rw.hasil_laporan', ['status' => 9]) }}" class="text-success d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
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
     <!-- End Card Components -->

    <!-- Content Row -->
<div class="row">
     <!-- Area Chart -->
     <div class="col">
          <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary" data-toggle="collapse" data-target="#collapseCard1">
                    <h6 class="m-0 font-weight-bold text-light">Tata Cara Ubah Hasil Keputusan</h6>
                    <div class="dropdown no-arrow"></div>
               </div>
               <!-- Card Body -->
               <div class="card-body collapse" id="collapseCard1">
                    <ul class="list-unstyled">
                         <li class="mb-3">
                              <i class="fas fa-arrow-right mr-2"></i>
                              <strong>Klik "Hasil Laporan"</strong> pada sidebar untuk masuk ke halaman Hasil laporan untuk menindaklanjuti laporan.
                         </li>
                         <li class="mb-3">
                              <i class="fas fa-arrow-right mr-2"></i>
                              <strong>Klik " Detail"</strong> untuk melihat laporan yang perlu disetujui, pastikan Anda telah benar-benar memeriksa hasil laporan tersebut sebelum diselesaikan.
                         </li>
                         <li class="mb-3">
                              <i class="fas fa-arrow-right mr-2"></i>
                              <strong>Ubah "Status Laporan"</strong> untuk merubah laporan yang ingin diselesaikan.
                         </li>
                         <li class="mb-3">
                              <i class="fas fa-arrow-right mr-2"></i>
                              <strong>Isi "Masukkan Foto"</strong> sebagai bukti telah selesainya laporan tersebut.
                         </li>
                         <li class="mb-3">
                              <i class="fas fa-arrow-right mr-2"></i>
                              <strong>Klik "Ubah atau Batal"</strong> untuk mengubah status dan membatalkan status.
                         </li>
                    </ul>
               </div>
          </div>
     </div>
</div>
<!-- End Content Row -->

<!-- Content Row -->
<div class="row">
     <!-- Area Chart -->
     <div class="col">
          <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary" data-toggle="collapse" data-target="#collapseCard2">
                    <h6 class="m-0 font-weight-bold text-light">Tata Cara Ubah Status Laporan Yang Sedang Direalisasikan</h6>
                    <div class="dropdown no-arrow"></div>
               </div>
               <!-- Card Body -->
               <div class="card-body collapse" id="collapseCard2">
                    <ul class="list-unstyled">
                         <li class="mb-3">
                              <i class="fas fa-arrow-right mr-2"></i>
                              <strong>Klik "Hasil Laporan"</strong> pada sidebar untuk masuk ke halaman Hasil laporan untuk menindaklanjuti laporan.
                         </li>
                         <li class="mb-3">
                              <i class="fas fa-arrow-right mr-2"></i>
                              <strong>Klik " Detail"</strong> untuk melihat laporan yang perlu disetujui, pastikan Anda telah benar-benar memeriksa hasil laporan tersebut sebelum direalisasikan.
                         </li>
                         <li class="mb-3">
                              <i class="fas fa-arrow-right mr-2"></i>
                              <strong>Ubah "Status Laporan"</strong> untuk merubah laporan yang ingin direalisasikan.
                         </li>
                         <li class="mb-3">
                              <i class="fas fa-arrow-right mr-2"></i>
                              <strong>Isi "Masukkan Foto"</strong> sebagai bukti telah merealisasikan laporan tersebut.
                         </li>
                         <li class="mb-3">
                              <i class="fas fa-arrow-right mr-2"></i>
                              <strong>Klik "Ubah atau Batal"</strong> untuk mengubah status dan membatalkan status.
                         </li>
                    </ul>
               </div>
          </div>
     </div>
</div>
<!-- End Content Row -->

 

     <style>
          .card {
          transition: transform 0.2s ease-in-out;
          }

          .card:hover {
          transform: scale(1.02);
          }

          .card-header {
          position: relative;
          }

          
          ul.list-unstyled li strong {
          color: #4e73df; /* Sesuaikan warna dengan tema Anda */
          }
          .card-footer a:hover {
              color: white !important;
              text-decoration: none;
              border-radius: 0.25rem; /* Optional: Add border-radius to match design */
          }
          #dikirimRW-footer a:hover {
              background-color: #f6c23e; /* Bootstrap info color */
          }
          #direalisasikan-footer a:hover {
              background-color: #5a5c69; /* Custom dark color */
          }
          #selesai-footer a:hover {
              background-color: #1cc88a; /* Bootstrap success color */
          }
     </style>
@endsection





