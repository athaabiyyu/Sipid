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



     <!-- Tabel Alternatif  -->
     <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a href="#collapseCardExample" class="d-block card-header py-3 bg-danger" data-toggle="collapse"
          role="button" aria-expanded="true" aria-controls="collapseCardExample" style="color: white">
               <h6 class="m-0 font-weight-bold text-light">Keterangan Alternatif !!</h6>
          </a>
          
          <div class="collapse" id="collapseCardExample">
               <div class="card-body">
                    <div>
                         <p>
                              <strong class="text-danger">Perlu diketahui, </strong>
                              tabel alternatif hanya mengambil 1 data laporan yang sama sesuai nama infrastrukur dan lokasi kerusakannya.
                              <br><br>
                              <strong class="text-danger">Untuk memunculkan data alternatif, </strong>
                              maka anda harus mengubah status pelaporan menjadi 
                              <strong class="text-danger">'diproses'</strong> agar data laporan menjadi data alternatif.
                              
                         </p>
                    </div>
                    <a href="{{ route('admin.rekap_laporan') }}" class="btn btn-success btn-sm mb-2">Ubah Status</a>
               </div>
          </div>
     </div>

     <div class="card shadow mb-4">

          <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
               <h6 class="m-0 font-weight-bold text-white">Tabel Alternatif</h6>
               <form class="form-inline">
                    <div class="input-group">
                         <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-addon">
                         <div class="input-group-append">
                              <button class="btn btn-light" type="button">
                                   <i class="fas fa-search text-primary"></i>
                              </button>
                         </div>
                    </div>
               </form>
          </div>
           
          <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                         <tr class="text-center">
                              <th>#</th>
                              <th>Kode</th>
                              <th>Nama Alternatif/Infrastruktur</th>
                              <th>Lokasi Laporan</th>     
                         </tr>
                         </thead>
                         <tbody>
                         @foreach ($dataAlternatif as $alternatif)
                              @if($alternatif->status->status_kode == 'STS02') 
                                   <tr>                          
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">A{{ $loop->iteration }}</td>
                                        <td>{{ $alternatif->infrastruktur->infrastruktur_nama }}</td>
                                        <td>{{ $alternatif->lokasi->lokasi_laporan }}</td>
                                   </tr>
                              @endif
                         @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>


     <!-- Tabel Matriks -->
     <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
               <h6 class="m-0 font-weight-bold text-light">Matrik Keputusan (X)</h6>
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
                                   <th>Isi Nilai</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach ($dataAlternatif as $alternatif)
                              <tr>
                                   <th>A{{ $loop->iteration }} - {{ $alternatif->infrastruktur->infrastruktur_nama}} </th>
                                   <th class="text-center">1</th>
                                   <th class="text-center">2</th>
                                   <th class="text-center">3</th>
                                   <th class="text-center">4</th>
                                   <th class="text-center">5</th>
                                   <th class="text-center">
                                        <button type="button" class="btn btn-success btn-sm m-2" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                             +
                                        </button>
                                   </th>
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
