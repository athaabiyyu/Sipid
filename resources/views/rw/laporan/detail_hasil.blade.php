
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
                         <h6>{{ $detailLaporan->laporan_id }}</h6>
                    </div>
               </div>
               <hr class="border-2">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Nama Pelapor</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <h6>{{ $detailLaporan->user->user_nama }}</h6>
                    </div>
               </div>
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
                    <img src="{{ asset('storage/' . $bukti->file_path) }}" alt="Bukti Laporan"
                         class="img-fluid rounded mb-2 report-image"
                         data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-src="{{ asset('storage/' . $bukti->file_path) }}">
                    @endforeach
               </div>
               </div>
               <!-- Modal untuk zoom bukti -->
               <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title" id="imageModalLabel">Bukti Laporan</h5>
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
               
               <hr class="border-2">
               <div class="row mb-4">
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
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Lokasi</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <h6>{{ $detailLaporan->alamat_laporan }}</h6>
                    </div>
               </div>
               <hr class="border-2">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Status Laporan</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <h6>
                              @if ($detailLaporan->status->status_id == 1)
                                   <a href="#" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                             <i class="fas fa-paper-plane"></i>
                                        </span>
                                        <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                                   </a>
                              @elseif($detailLaporan->status->status_id == 2)
                                   <a href="#" class="btn btn-sm btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                             <i class="fas fa-eye"></i>
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
                                   <a href="#" class="btn btn-sm btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                             <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                                   </a>
                              @elseif($detailLaporan->status->status_id == 5)
                                   <a href="#" class="btn btn-sm btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                             <i class="fas fa-calculator"></i>
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
                                   <a href="#" class="btn btn-sm btn-success btn-icon-split">
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
                         </h6>
                    </div>
               </div>
               <hr class="border-2">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Detail Penilaian</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <h6>
                              <div class="table-responsive">
                                   <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                             <tr class="text-center">
                                                  <th>Kategori</th>
                                                  <th>Deskripsi</th>
                                                  <th>Skor</th>
                                             </tr>
                                        </thead>
                                        <tbody class="text-center">
                                             
                                        </tbody>
                                   </table>
                              </div>
                         </h6>
                    </div>
               </div>
               <hr class="border-2">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Ubah Status</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <form id="statusForm{{ $detailLaporan->detailLaporan_id }}"
                         action="{{ route('rw.ubah_status', $detailLaporan->laporan_id) }}" method="POST">
                         @csrf
                         <div class="btn-group">
                              @php
                              $btnClass = 'btn-primary'; // Default class, you can adjust if needed based on the logic
                              switch ($detailLaporan->status_id) {
                                   case 1:
                                   case 2:
                                   case 3:
                                   case 4:
                                   case 5:
                                   case 6:
                                   case 7:
                                   case 8:
                                   case 9:
                                        $btnClass = 'btn-primary';
                                        break;
                                   default:
                                        $btnClass = 'btn-default'; // If there's a default or another class you want to use
                                        break;
                              }
                              @endphp

                              <button type="button"
                                   class="btn btn-sm dropdown-toggle {{ $btnClass }}"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ $detailLaporan->status->status_nama ?? 'Pilih Status' }}
                              </button>

                              <div class="dropdown-menu">
                                   @if(in_array($detailLaporan->status->status_id, [7]))
                                        <a class="dropdown-item" href="#"
                                             onclick="event.preventDefault(); document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').status.value = 8; document.getElementById('statusForm{{ $detailLaporan->detailLaporan_id }}').submit();">Direalisasikan
                                        </a>
                                   @endif
                              </div>
                         </div>
                         <input type="hidden" name="status" value="{{ $detailLaporan->status_id }}">
                         </form>
                    </div>
               </div>
               <hr class="border-2">
               <a class="btn btn-sm btn-secondary ml-auto" href="{{ url('rw/hasil_laporan') }}">Kembali</a>
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
          // JS Modal Bukti Pelaporan
          document.addEventListener('DOMContentLoaded', function () {
          var imageModal = document.getElementById('imageModal');
          var modalImage = document.getElementById('modalImage');
     
          imageModal.addEventListener('show.bs.modal', function (event) {
               var button = event.relatedTarget;
               var src = button.getAttribute('data-bs-src');
               modalImage.src = src;
          });
          });
     </script>
@endsection

