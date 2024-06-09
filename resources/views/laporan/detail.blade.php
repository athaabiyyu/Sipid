@extends('laporan.layouts.main')
@section('content')
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Halaman Detail Laporan</h1>
          <a class="btn btn-sm btn-success" href="{{ url('laporan') }}">Kembali</a>
     </div>

     <!-- Session Pesan -->
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
     <!-- End Session Pesan -->

     <div class="card mb-4 py-2 border-left-primary">
          <div class="card-body">

               <!-- Detail Id Laporan-->
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Laporan ID</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <h6>{{ $detailLaporan->laporan_id }}</h6>
                    </div>
               </div>
               <!-- End Detail Id Laporan-->

               <!-- Detail Nama Infrastruktur -->
               <hr class="border-2">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Nama Infrastruktur</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <h6>{{ $detailLaporan->infrastruktur->infrastruktur_nama }}</h6>
                    </div>
               </div>
               <!-- End Detail Nama Infrastruktur -->

               <!-- Detail Tgl Laporan-->
               <hr class="border-2">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Tanggal Laporan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <h6>{{ \Carbon\Carbon::parse($detailLaporan->tgl_laporan)->format('d-m-Y') }}</h6>
                    </div>
               </div>
               <!-- End Detail Tgl Laporan-->

               <!-- Detail Bukti Laporan-->
               <hr class="border-2">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Bukti Laporan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">

                         @foreach ($detailLaporan->buktiLaporan as $bukti)
                         @if ($bukti->type != 'bukti_realisasi' && $bukti->type != 'bukti_selesai')
                              <!-- Hanya tampilkan bukti realisasi -->
                              <img src="{{ asset('storage/' . $bukti->file_path) }}" alt="Bukti Laporan"
                                   class="img-fluid rounded mb-2 report-image" data-bs-toggle="modal"
                                   data-bs-target="#imageModal" data-bs-src="{{ asset('storage/' . $bukti->file_path) }}">
                         @endif
                         @endforeach
                    </div>
               </div>
               <!-- Modal untuk zoom bukti -->
               <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                         <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title" id="imageModalLabel">Bukti</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body text-center">
                              <img id="modalImage" src="" alt="Bukti Laporan" class="img-fluid rounded">
                         </div>
                         </div>
                    </div>
               </div>
               <!-- End Modal untuk zoom bukti -->
               <!-- End Detail Bukti Laporan-->

               <!-- Detail Deskripsi Laporan -->
               <hr class="border-2">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Deskripsi Laporan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <h6>{{ $detailLaporan->deskripsi_laporan }}</h6>
                    </div>
               </div>
               <!-- End Detail Deskripsi Laporan -->

               <!-- Detail Lokasi Laporan -->
               <hr class="border-2">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Lokasi Kerusakan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <h6>{{ $detailLaporan->alamat_laporan }}</h6>
                    </div>
               </div>
               <!-- End Detail Lokasi Laporan -->

               @if ($detailLaporan->status->status_id == 8)
                    <!-- Detail Bukti Realisasi-->
                    <hr class="border-2">
                    <div class="row">
                         <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Bukti Realisasi</h6>
                         </div>
                         <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                         </div>
                         <div class="col-md-9 col-sm-8">
                         @foreach ($detailLaporan->buktiLaporan as $bukti)
                              @if ($bukti->type == 'bukti_realisasi')
                                   <!-- Hanya tampilkan bukti realisasi -->
                                   <img src="{{ asset('storage/' . $bukti->file_path) }}" alt="Bukti Laporan"
                                        class="img-fluid rounded mb-2 report-image" data-bs-toggle="modal"
                                        data-bs-target="#imageModal" data-bs-src="{{ asset('storage/' . $bukti->file_path) }}">
                              @endif
                         @endforeach
                         </div>
                    </div>
                    <!-- Modal untuk zoom bukti -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h5 class="modal-title" id="imageModalLabel">Bukti Realisasi</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-center">
                                   <img id="modalImage" src="" alt="Bukti Laporan" class="img-fluid rounded">
                              </div>
                         </div>
                         </div>
                    </div>
                    <!-- End Modal untuk zoom bukti -->
                    <!-- End Detail Bukti Realisasi-->
               @elseif ($detailLaporan->status->status_id == 9)
                    <!-- Detail Bukti Selesai-->
                    <hr class="border-2">
                    <div class="row">
                         <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Bukti Selesai</h6>
                         </div>
                         <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                         </div>
                         <div class="col-md-9 col-sm-8">
                         @foreach ($detailLaporan->buktiLaporan as $bukti)
                              @if ($bukti->type == 'bukti_selesai')
                                   <!-- Hanya tampilkan bukti realisasi -->
                                   <img src="{{ asset('storage/' . $bukti->file_path) }}" alt="Bukti Laporan"
                                        class="img-fluid rounded mb-2 report-image" data-bs-toggle="modal"
                                        data-bs-target="#imageModal"
                                        data-bs-src="{{ asset('storage/' . $bukti->file_path) }}">
                              @endif
                         @endforeach
                         </div>
                    </div>
                    <!-- Modal untuk zoom bukti -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                         aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h5 class="modal-title" id="imageModalLabel">Bukti Selesai</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-center">
                                   <img id="modalImage" src="" alt="Bukti Selesai" class="img-fluid rounded">
                              </div>
                         </div>
                         </div>
                    </div>
                    <!-- End Modal untuk zoom bukti -->
                    <!-- End Detail Bukti Realisasi-->
               @endif

               <!-- Detail Status Laporan -->
               <hr class="border-2">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Status Pelaporan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         @if ($detailLaporan->status->status_id == 1)
                         <a href="#" class="btn btn-sm btn-primary btn-icon-split">
                              <span class="icon text-white-50">
                                   <i class="fas fa-paper-plane"></i>
                              </span>
                              <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                         </a>
                         @elseif($detailLaporan->status->status_id == 3)
                         <a href="#" class="btn btn-sm btn-info btn-icon-split">
                              <span class="icon text-white-50">
                                   <i class="fas fa-eye"></i>
                              </span>
                              <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                         </a>
                         @elseif($detailLaporan->status->status_id == 4)
                         <a href="#" class="btn btn-sm btn-info btn-icon-split">
                              <span class="icon text-white-50">
                                   <i class="fas fa-certificate"></i>
                              </span>
                              <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                         </a>
                         @elseif($detailLaporan->status->status_id == 6)
                         <a href="#" class="btn btn-sm btn-warning btn-icon-split">
                              <span class="icon text-white-50">
                                   <i class="fas fa-paper-plane"></i>
                              </span>
                              <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                         </a>
                         @elseif($detailLaporan->status->status_id == 7)
                         <a href="#" class="btn btn-sm btn-success btn-icon-split">
                              <span class="icon text-white-50">
                                   <i class="fas fa-eye"></i>
                              </span>
                              <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                         </a>
                         @elseif($detailLaporan->status->status_id == 8)
                         <a href="#" class="btn btn-sm btn-dark btn-icon-split">
                              <span class="icon text-white-50">
                                   <i class="fas fa-hammer"></i>
                              </span>
                              <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                         </a>
                         @elseif($detailLaporan->status->status_id == 9)
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
                    </div>
               </div>
               <!-- End Detail Status Laporan -->

               <!--Tombol-->
               <hr class="border-2">
               <div class="d-flex justify-content-start mb-3 ">
                    @if ($detailLaporan->status->status_id == 1)
                         <a class="btn btn-sm btn-warning px-3"
                         href="{{ route('laporan.editLaporan', $detailLaporan->laporan_id) }}">Edit</a>
                    @endif
               </div>
               <!--End Tombol-->
          </div>
     </div>

     <style>
          .report-image {
               width: 200px;
               height: 150px;
               object-fit: cover;
               cursor: pointer;
          }
     </style>
     <script>
          // JS Modal Image Bukti
          document.addEventListener('DOMContentLoaded', function() {
               var imageModal = document.getElementById('imageModal');
               var modalImage = document.getElementById('modalImage');

               imageModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget;
                    var src = button.getAttribute('data-bs-src');
                    modalImage.src = src;
               });
          });
     </script>
@endsection
