@extends('admin.layouts.main')

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

     <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
               <h6 class="m-0 font-weight-bold text-light">Matrik Keputusan (X)</h6>
               <button type="button" class="btn btn-success btn-sm m-2" data-bs-toggle="modal" data-bs-target="#inlineForm">
                    Isi Nilai Alternatif
               </button>
          </div>

          <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                              <tr class="text-center">
                                   <th>Alternatif</th>
                                   @foreach ($dataKriteria as $kriteria)
                                        <th>{{ $kriteria->kriteria_kode}}</th>
                                   @endforeach
                                   <th>Aksi</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach ($dataAlternatif as $alternatif)
                              <tr>
                                   <th>A{{ $loop->iteration }} - {{ $alternatif->infrastruktur->infrastruktur_nama}} </th>
                              </tr>
                              @endforeach
                         </tbody>
                     </table>
               </div>
          </div>
     </div>

     <div class="modal fade" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h6 class="m-0 font-weight-bold text-primary">Isi Nilai Alternatif</h6>
                         <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST">
                         @csrf
                         <div class="modal-body">
                              <label>Nama Alternatif:</label>
                              <div class="form-group">
                                   <select class="form-control form-select" name="id_alternative">
                                        @foreach ($dataAlternatif as $alternatif)
                                             <option value="{{ $alternatif->laporan_id }}">{{ $alternatif->infrastruktur->infrastruktur_nama }}</option>
                                        @endforeach
                                   </select>
                              </div>
                              <label>Kriteria:</label>
                              <div class="form-group">
                                   <select class="form-control form-select" name="id_criteria">
                                        @foreach ($dataKriteria as $kriteria)
                                             <option value="{{ $kriteria->kriteria_id }}">{{ $kriteria->kriteria_kode }} - {{ $kriteria->kriteria_nama }}</option>
                                        @endforeach
                                   </select>
                              </div>
                              <label>Nilai:</label>
                              <div class="form-group">
                                   <input type="text" name="value" placeholder="Nilai..." class="form-control" required>
                              </div>
                         </div>
                         <div class="modal-footer">
                              <div class="d-flex justify-content-start">
                                  <button type="button" class="btn btn-danger btn-sm me-auto" data-bs-dismiss="modal">Tutup</button>
                              </div>
                              <div class="d-flex justify-content-end">
                                  <button type="submit" name="submit" class="btn btn-sm btn-primary ms-auto">Simpan</button>
                              </div>
                         </div>    
                    </form>
               </div>
          </div>
     </div>

     
@endsection

@push('modals')

@endpush
