@extends('rw.layouts.main')

@section('content')
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Halaman Detail Laporan</h1>
          <a class="btn btn-sm btn-success" href="{{ route('rw.hasil_laporan') }}">Kembali</a>
     </div>

     <!-- Session Pesan Sukses -->
     @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Berhasil!</strong> {{ session('success') }}.
               <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
     @endif
     <!-- Session Pesan Sukses -->

     <!-- Session Pesan Erorr -->
     @if (session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Upss!</strong> {{ session('error') }}.
               <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
     @endif
     <!-- END Session Pesan Erorr -->

     <div class="card mb-4 py-2 border-left-primary">
          <div class="card-body">
               <!-- Id Laporan -->
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
               <!-- End Id Laporan -->

               <!-- Nama Pelapor -->
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
               <!-- End Nama Pelapor -->

               <!-- Nama Infrastrukur -->
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
               <!-- End Nama infrastruktur -->

               <!-- Tanggal Laporan -->
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
               <!-- End Tanggal Laporan -->

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
                         @if ($bukti->type != 'bukti_realisasi')
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

               <!-- Deskirpsi Laporan -->
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
               <!-- End Deskripsi Laporan -->

               <!-- Lokasi -->
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
               <!-- End Lokasi -->

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
                              <img src="{{ asset('storage/' . $bukti->file_path) }}" alt="Bukti Realisasi"
                                   class="img-fluid rounded mb-2 report-image" data-bs-toggle="modal"
                                   data-bs-target="#imageModal" data-bs-src="{{ asset('storage/' . $bukti->file_path) }}">
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

               <!-- Status Laporan -->
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
                         <a href="#" class="btn btn-sm btn-dark btn-icon-split">
                              <span class="icon text-white-50">
                                   <i class="fas fa-hammer"></i>
                              </span>
                              <span class="text">{{ $detailLaporan->status->status_nama }}</span>
                         </a>
                         </h6>
                    </div>
               </div>
               <!-- End Status Laporan -->

               <!-- Ubah Status -->
               <hr class="border-2">
               <div class="row">
                    <div class="col-md-2 col-sm-3">
                         <h6 class="d-inline-block mb-0">Ubah Status</h6>
                    </div>
                    <div class="col-md-1 col-sm-1">
                         <span class="d-inline-block">:</span>
                    </div>
                    <div class="col-md-9 col-sm-8">
                         <button id="editStatusBtn" class="btn btn-sm btn-primary">Ubah Status</button>
                         <!-- Form hidden untuk pengiriman data -->
                         <form id="editStatusForm" action="{{ route('rw.edit_statusSelesai', $detailLaporan->laporan_id) }}"
                         method="POST" enctype="multipart/form-data" style="display:none;">
                         @csrf
                         @method('PUT')
                         <input type="hidden" name="status" id="statusInput">
                         <input type="file" name="bukti_selesai[]" id="buktiSelesaiInput" multiple>
                         </form>
                    </div>
               </div>
               <!-- End Ubah Status -->
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
          document.addEventListener('DOMContentLoaded', function() {
               var imageModal = document.getElementById('imageModal');
               var modalImage = document.getElementById('modalImage');

               imageModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget;
                    var src = button.getAttribute('data-bs-src');
                    modalImage.src = src;
               });
          });

          document.getElementById('editStatusBtn').addEventListener('click', function() {
               Swal.fire({
                    confirmButtonColor: '#4e73df',
                    cancelButtonColor: '#858796',
                    html: 
                    `
                         <h2 style="text-align: center;">Ubah Status</h2>
                         <p style="text-align: center;">Masukkan bukti foto realisasi jika ingin merubah status</p>
                         <input type="file" id="buktiSelesaiFile" class="swal2-input mb-3" multiple required>
                         <select id="statusSelect" class="swal2-input mb-3">
                              <option value="9">Selesai</option>
                              <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                         </select>
                    `,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ubah',
                    cancelButtonText: 'Batal',
                    preConfirm: () => {
                         const status = Swal.getPopup().querySelector('#statusSelect').value;
                         const buktiFiles = Swal.getPopup().querySelector('#buktiSelesaiFile').files;
                         if (!status) {
                              Swal.showValidationMessage(`Please select a status`);
                         }
                         if (!buktiFiles || buktiFiles.length === 0) {
                              Swal.showValidationMessage(`Harap mengupload bukti foto bahwa laporan selesai terlebih dahulu`);
                         }
                         return { status: status, buktiFiles: buktiFiles };
                    }
               }).then((result) => {
                    if (result.isConfirmed) {
                         const form = document.getElementById('editStatusForm');
                         document.getElementById('statusInput').value = result.value.status;

                         // Tambahkan file bukti ke form
                         const buktiInput = document.getElementById('buktiSelesaiInput');
                         buktiInput.files = result.value.buktiFiles;

                         // Kirim form
                         form.submit();
                    }
               });
          });
     </script>
@endsection
