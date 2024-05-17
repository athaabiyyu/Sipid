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

     <!-- Tabel Kriteria -->
     <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a href="#collapseCardExample" class="d-block card-header py-3 bg-danger" data-toggle="collapse" role="button"
               aria-expanded="true" aria-controls="collapseCardExample" style="color: white">
               <h6 class="m-0 font-weight-bold text-light">Keterangan Kriteria !!</h6>
          </a>

          <div class="collapse" id="collapseCardExample">
               <div class="card-body">
                    <div>
                         <strong class="text-danger">> {{ $dataKriteria[0]->kriteria_nama }}</strong>
                         <p>Seberapa parah masalah infrastruktur tersebut, misalnya, kerusakan fisik atau dampaknya terhadap
                         layanan publik.</p>
                    </div>
                    <div>
                         <strong class="text-danger">> {{ $dataKriteria[1]->kriteria_nama }}</strong>
                         <p>Biaya yang diperlukan untuk memperbaiki atau memperbarui infrastruktur yang rusak.</p>
                    </div>
                    <div>
                         <strong class="text-danger">> {{ $dataKriteria[2]->kriteria_nama }}</strong>
                         <p>Seberapa banyak laporan yang dilaporkan.</p>
                    </div>
                    <div>
                         <strong class="text-danger">> {{ $dataKriteria[3]->kriteria_nama }} </strong>
                         <p>Lama waktu yang diperlukan untuk menyelesaikan perbaikan atau pemeliharaan infrastruktur.</p>
                    </div>
                    <div>
                         <strong class="text-danger">> {{ $dataKriteria[4]->kriteria_nama }} </strong>
                         <p>Dampak infrastruktur rusak terhadap masyarakat sekitar, seperti gangguan dalam rutinitas sehari-hari
                         atau keamanan.</p>
                    </div>
               </div>
          </div>
     </div>
     <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
               <h6 class="m-0 font-weight-bold text-white">Tabel Kriteria</h6>
               <form class="form-inline">
                    <div class="input-group">
                         <input type="text" class="form-control" placeholder="Search..." aria-label="Search"
                         aria-describedby="search-addon">
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
                              <th>Kode Kriteria</th>
                              <th>Nama Kriteria</th>
                              <th>Bobot Kriteria</th>
                              <th>Attribut Kriteria</th>
                              <th>Aksi</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach ($dataKriteria as $kriteria)
                              <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $kriteria->kriteria_kode }}</td>
                                   <td>{{ $kriteria->kriteria_nama }}</td>
                                   <td>{{ $kriteria->kriteria_bobot }}</td>
                                   <td>{{ $kriteria->kriteria_attribut }}</td>
                                   <td class="text-center">
                                        <a href="{{ route('admin.kriteria.edit', $kriteria->kriteria_id) }}"
                                             class="btn btn-info btn-sm mb-2">Edit</a>
                                   </td>
                              </tr>
                         @endforeach
                         </tbody>
                    </table>
               </div>

               <div class="text-right">
                    <a href="{{ route('admin.alternatif.index') }}" class="btn btn-primary btn-sm">Selanjutnya</a>
               </div>
          </div>
     </div>
     <!-- End Tabel Kriteria -->


     <!-- Tabel Alternatif  -->
     <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a href="#collapseCardExample" class="d-block card-header py-3 bg-danger" data-toggle="collapse" role="button"
               aria-expanded="true" aria-controls="collapseCardExample" style="color: white">
               <h6 class="m-0 font-weight-bold text-light">Keterangan Alternatif !!</h6>
          </a>

          <div class="collapse" id="collapseCardExample">
               <div class="card-body">
                    <div>
                         <p>
                         <strong class="text-danger">Perlu diketahui, </strong>
                         tabel alternatif hanya mengambil 1 data laporan yang sama sesuai nama infrastrukur dan lokasi
                         kerusakannya.
                         <br><br>
                         <strong class="text-danger">Untuk memunculkan data alternatif, </strong>
                         maka anda harus mengubah status pelaporan menjadi
                         <strong class="text-danger">'Dalam Proses'</strong> agar data laporan menjadi data alternatif.

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
                         <input type="text" class="form-control" placeholder="Search..." aria-label="Search"
                         aria-describedby="search-addon">
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
                         <thead class="text-center">
                         <tr class="text-center">
                              <th>#</th>
                              <th>Kode</th>
                              <th>Nama Alternatif/Infrastruktur</th>
                              <th>Lokasi Laporan</th>
                              <th>Aksi</th>
                         </tr>
                         </thead>
                         <tbody class="text-center">
                         @php $count = 0; @endphp
                         @foreach ($dataAlternatif as $alternatif)
                              @if ($alternatif->status->status_kode == 'STS03')
                                   @php $count++; @endphp
                                   <tr>
                                        <td>{{ $count }}</td>
                                        <td>A{{ $count }}</td>
                                        <td>{{ $alternatif->infrastruktur->infrastruktur_nama }}</td>
                                        <td>{{ $alternatif->alamat_laporan }}</td>
                                        <td>
                                             <button type="button" class="btn btn-success btn-sm m-2" data-bs-toggle="modal"
                                             data-bs-target="#inlineForm{{ $count }}">
                                             Edit Nilai
                                             </button>
                                        </td>
                                   </tr>
                                   <!-- Modal -->
                                   <div class="modal fade" id="inlineForm{{ $count }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                             role="document">
                                             <div class="modal-content">
                                             <div class="modal-header">
                                                  <h6 class="m-0 font-weight-bold text-primary">Isi Nilai Alternatif</h6>
                                                  <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                                                       aria-label="Close"></button>
                                             </div>
                                             <form
                                                  action="{{ route('admin.kriteria.updateNilai', ['id' => $alternatif->laporan_id]) }}"
                                                  method="POST">
                                                  @csrf
                                                  <div class="modal-body">
                                                       <label>Nama Alternatif:</label>
                                                       <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                 value="{{ $alternatif->infrastruktur->infrastruktur_nama }}"
                                                                 readonly>
                                                            <input type="hidden" name="laporan_id"
                                                                 value="{{ $alternatif->laporan_id }}">
                                                       </div>
                                                       <label>Kriteria:</label>
                                                       <div class="form-group">
                                                            <select class="form-control form-select" name="kriteria_id">
                                                                 @foreach ($dataKriteria as $kriteria)
                                                                 <option value="{{ $kriteria->kriteria_id }}">
                                                                      {{ $kriteria->kriteria_kode }} -
                                                                      {{ $kriteria->kriteria_nama }}</option>
                                                                 @endforeach
                                                            </select>
                                                       </div>
                                                       
                                                       <label>Nilai:</label>
                                                       <div class="form-group">
                                                            <input type="number" name="matrik_nilai" placeholder="Nilai..."
                                                                 class="form-control" required>
                                                       </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                       <div class="d-flex justify-content-start">
                                                            <button type="button" class="btn btn-danger btn-sm me-auto"
                                                                 data-bs-dismiss="modal">Tutup</button>
                                                       </div>
                                                       <div class="d-flex justify-content-end">
                                                            <button type="submit" name="submit"
                                                                 class="btn btn-sm btn-primary ms-auto">Simpan</button>
                                                       </div>
                                                  </div>
                                             </form>

                                             </div>
                                        </div>
                                   </div>
                              @endif
                         @endforeach
                         </tbody>
                    </table>
               </div>
          </div>


     </div>
     <!-- End Tabel Alternatif  -->


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
                                   <th>{{ $kriteria->kriteria_kode }}</th>
                              @endforeach
                              <th>Nilai Alternatif</th>
                         </tr>
                         </thead>
                         <tbody class="text-center">
                              @php
                                   $count = 0;
                                   $groupedData = $dataMatrik->groupBy('laporan_id');
                              @endphp
                              @foreach ($groupedData as $laporan_id => $matrikGroup)
                                   @php
                                        $laporan = $matrikGroup->first()->laporan;
                                        if ($laporan->status->status_kode == 'STS03') {
                                             $count++;
                                        } else {
                                             continue;
                                        }
                                   @endphp
                                   <tr>
                                        <td>A{{ $count }} - {{ $laporan->infrastruktur->infrastruktur_nama }}</td>
                                        @foreach ($dataKriteria as $kriteria)
                                             @php
                                                  $matrik = $matrikGroup->firstWhere('kriteria_id', $kriteria->kriteria_id);
                                             @endphp
                                             <td>{{ $matrik ? $matrik->matrik_nilai : '0' }}</td>
                                        @endforeach
                                   </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
     <!-- End Tabel Matriks -->
@endsection
