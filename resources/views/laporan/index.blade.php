@extends('laporan.layouts.main')

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
     
     @php
          // Mengelompokkan laporan berdasarkan status dan mengurutkannya berdasarkan status_id terkecil
          $statusGroups = $dataLaporan->groupBy('status.status_id')->sortKeys();
     @endphp

     @foreach ($statusGroups as $statusId => $laporanGroup)
     @php
          $statusName = $laporanGroup->first()->status->status_nama;
          $tableId = 'dataTable' . $statusId;
          $cardId = 'cardStatus' . $statusId;
     @endphp
     <div class="card shadow mb-4" id="{{ $cardId }}">
          <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
               <h6 class="m-0 font-weight-bold text-light">Riwayat Laporan - Dengan Status {{ $statusName }}</h6>
          </div>
          <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered" id="{{ $tableId }}" width="100%" cellspacing="0">
                         <thead>
                         <tr class="text-center">
                         <th>#</th>
                         <th>Nama Infrastruktur</th>
                         <th>Tanggal</th>
                         <th>Deskripsi</th>
                         <th>Status</th>
                         <th>Aksi</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach ($laporanGroup as $laporan)
                         <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $laporan->infrastruktur->infrastruktur_nama }}</td>
                         <td>{{ \Carbon\Carbon::parse($laporan->tgl_laporan)->format('d-m-Y') }}</td>
                         <td>{{ substr($laporan->deskripsi_laporan, 0, 30) }}...</td>
                         <td class="text-center">
                              @if ($laporan->status->status_id == 1)
                              <a href="#" class="btn btn-sm btn-primary btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-paper-plane"></i>
                                   </span>
                                   <span class="text">{{ $laporan->status->status_nama }}</span>
                              </a>
                              @elseif($laporan->status->status_id == 2)
                              <a href="#" class="btn btn-sm btn-warning btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-eye"></i>
                                   </span>
                                   <span class="text">{{ $laporan->status->status_nama }}</span>
                              </a>
                              @elseif($laporan->status->status_id == 3)
                              <a href="#" class="btn btn-sm btn-info btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-eye"></i>
                                   </span>
                                   <span class="text">{{ $laporan->status->status_nama }}</span>
                              </a>
                              @elseif($laporan->status->status_id == 4)
                              <a href="#" class="btn btn-sm btn-success btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                   </span>
                                   <span class="text">{{ $laporan->status->status_nama }}</span>
                              </a>
                              @elseif($laporan->status->status_id == 5)
                              <a href="#" class="btn btn-sm btn-success btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-calculator"></i>
                                   </span>
                                   <span class="text">{{ $laporan->status->status_nama }}</span>
                              </a>
                              @elseif($laporan->status->status_id == 6)
                              <a href="#" class="btn btn-sm btn-warning btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-paper-plane"></i>
                                   </span>
                                   <span class="text">{{ $laporan->status->status_nama }}</span>
                              </a>
                              @elseif($laporan->status->status_id == 7)
                              <a href="#" class="btn btn-sm btn-success btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-eye"></i>
                                   </span>
                                   <span class="text">{{ $laporan->status->status_nama }}</span>
                              </a>
                              @elseif($laporan->status->status_id == 8)
                              <a href="#" class="btn btn-sm btn-success btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-hammer"></i>
                                   </span>
                                   <span class="text">{{ $laporan->status->status_nama }}</span>
                              </a>
                              @elseif($laporan->status->status_id == 9)
                              <a href="#" class="btn btn-sm btn-success btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                   </span>
                                   <span class="text">{{ $laporan->status->status_nama }}</span>
                              </a>
                              @else
                              <a href="#" class="btn btn-sm btn-danger btn-icon-split">
                                   <span class="icon text-white-50">
                                        <i class="fas fa-times"></i>
                                   </span>
                                   <span class="text">{{ $laporan->status->status_nama }}</span>
                              </a>
                              @endif
                         </td>
                         <td class="text-center">
                              <a class="btn btn-info btn-sm" href="{{ url('laporan/detail', $laporan->laporan_id) }}">Detail</a>
                              @if ($laporan->status->status_id == 1 )
                              <a class="btn btn-sm btn-danger" href="{{ route('laporan.hapusLaporan', $laporan->laporan_id) }}">Hapus</a>
                              @endif
                         </td>
                         </tr>
                         @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
     @endforeach

     <style>
          .dataTables_wrapper .dataTables_paginate {
               margin-top: 10px !important; /* Menambahkan jarak antara tabel dan fitur pagination */
          }
     </style>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
     <script>
          $(document).ready(function() {
               @foreach ($statusGroups as $statusId => $laporanGroup)
               $('#dataTable{{ $statusId }}').DataTable({
                    "paging": true,
                    "searching": true,
                    "lengthChange": true,
                    "info": true,
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 25, 50, 100] // Menambahkan opsi 5 pada lengthMenu
               });
               @endforeach
               
               // Check if the URL contains the status parameter and scroll to the corresponding card header
               const urlParams = new URLSearchParams(window.location.search);
               const statusId = urlParams.get('status');
               if (statusId) {
                    $('html, body').animate({
                         scrollTop: $('#cardStatus' + statusId).offset().top
                    }, 500);
               }
          });
     </script>
@endsection
