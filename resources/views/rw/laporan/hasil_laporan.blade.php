@extends('rw.layouts.main')

@section('content')
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Halaman Hasil Laporan</h1>
          <a class="btn btn-sm btn-success" href="{{url('/rw') }}">Kembali</a>
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

     <!-- Hasil Keputusan -->
     <div id="keputusanTable" class="card shadow mb-4">
          <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
               <h6 class="m-0 font-weight-bold text-light">Hasil Keputusan</h6>
          </div>
          <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                         <thead>
                              <tr class="text-center">
                                   <th>Alternatif</th>
                                   <th>Lokasi Kerusakan</th>
                                   <th>Total Nilai Utility</th>
                                   <th>Rangking</th>
                                   <th>Aksi</th>
                              </tr>
                         </thead>
                         <tbody class="text-center">
                              @php
                                   // Initialize an array to store total utility data
                                   $totalUtilities = [];
                                   $groupedData = $dataMatrik->groupBy('laporan_id');

                                   // Loop through the grouped data to calculate total utility for each alternative
                                   $count = 0;
                                   foreach ($groupedData as $laporan_id => $matrikGroup) {
                                   $laporan = $matrikGroup->first()->laporan;
                                   if ($laporan->status->status_kode == 'STS06' || $laporan->status->status_kode == 'STS07') {
                                        $count++;
                                        $totalUtility = 0;
                                        foreach ($dataKriteria as $kriteria) {
                                             $matrik = $matrikGroup->firstWhere('kriteria_id', $kriteria->kriteria_id);
                                             $nilai = $matrik ? $matrik->matrik_nilai : 0;
                                             // Cari nilai minimum dan maksimum dari setiap kolom kriteria
                                             $minValue = $dataMatrik->where('kriteria_id', $kriteria->kriteria_id)->min('matrik_nilai');
                                             $maxValue = $dataMatrik->where('kriteria_id', $kriteria->kriteria_id)->max('matrik_nilai');

                                             // Cek apakah nilai minimum dan maksimum sama
                                             if ($minValue === $maxValue) {
                                                  // Atur nilai utility ke nilai default atau berikan pesan
                                                  $utility = 0; // Nilai default
                                                  // Atau berikan pesan
                                                  // throw new Exception("Nilai minimum dan maksimum sama, pembagian oleh nol tidak dapat dilakukan.");
                                             } else {
                                                  // Hitung nilai utility berdasarkan atribut benefit
                                                  $utility = ($kriteria->kriteria_attribut == 'Benefit') ? 
                                                       (($nilai - $minValue) / ($maxValue - $minValue)) * 100 : 
                                                       (($maxValue - $nilai) / ($maxValue - $minValue)) * 100 ;
                                             }

                                             // Hitung nilai utility dengan bobot
                                             $weightedUtility = $utility * $kriteria->kriteria_bobot;
                                             $totalUtility += $weightedUtility;
                                        }
                                        // Collect data into the totalUtilities array
                                        $totalUtilities[] = [
                                             'alternatif' => "A{$count} - {$laporan->infrastruktur->infrastruktur_nama}",
                                             'lokasi' => $laporan->alamat_laporan,
                                             'totalUtility' => $totalUtility,
                                             'laporan_id' => $laporan_id,
                                        ];
                                   }
                                   }

                                   // Sort the totalUtilities array by totalUtility in descending order
                                   usort($totalUtilities, function($a, $b) {
                                   return $b['totalUtility'] <=> $a['totalUtility'];
                                   });

                                   // Variable to keep track of ranking
                                   $ranking = 1;
                              @endphp
                              @foreach ($totalUtilities as $data)
                                   <tr>
                                   <td>{{ $data['alternatif'] }}</td>
                                   <td>{{ $data['lokasi'] }}</td>
                                   <td>{{ number_format($data['totalUtility'] / 100, 3, ',', '.') }}</td>
                                   <td>{{ $ranking }}</td>
                                   <td class="text-center">
                                        <a class="btn btn-info btn-sm btn-icon-split mb-2" href="{{ route('rw.detail_hasil',  $data['laporan_id']) }}">
                                             <span class="icon text-white-50">
                                                 <i class="fas fa-info-circle"></i>
                                             </span>
                                             <span class="text">Detail</span>
                                         </a>
                                   </td>
                                   </tr>
                                   @php
                                   $ranking++;
                                   @endphp
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
     <!-- End Hasil Keputusan -->

     @php
          // Mengelompokkan laporan berdasarkan status dan mengurutkannya berdasarkan status_id terkecil
          $statusGroups = $statusDirealisasikan->groupBy('status.status_id')->sortKeys();
     @endphp

     @foreach ($statusGroups as $statusId => $laporanGroup)
     @php
          $statusName = $laporanGroup->first()->status->status_nama;
          $tableId = 'dataTable' . $statusId;
          $cardId = 'cardStatus' . $statusId;
     @endphp
          <!-- Rekap Laporan - Dengan Status Direalisasikan  -->
          <div class="card shadow mb-4">
               <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Rekap Laporan - Dengan Status {{ $statusName }}</h6>
               </div>
               <div class="card-body">
                    <div class="table-responsive">
                         <table class="table table-bordered" width="100%" cellspacing="0">
                              <thead class="text-center">
                                   <tr class="text-center">
                                        <th>#</th>
                                        <th>Nama Alternatif/Infrastruktur</th>
                                        <th>Lokasi Kerusakan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @foreach($laporanGroup as $laporan)
                                        <tr class="text-center">
                                             <td>{{ $loop->iteration }}</td>
                                             <td>{{ $laporan->infrastruktur->infrastruktur_nama }}</td>
                                             <td>{{ $laporan->alamat_laporan }}</td>
                                             <td>
                                                  @if ($laporan->status->status_id == 8)
                                                  <a href="#" class="btn btn-sm btn-dark btn-icon-split">
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
                                                  @if ($laporan->status->status_id == 6 || $laporan->status->status_id == 7 || $laporan->status->status_id == 8)
                                                      <a class="btn btn-info btn-sm btn-icon-split mb-2" href="{{ route('rw.detail_realisasi', $laporan->laporan_id) }}">
                                                          <span class="icon text-white-50">
                                                              <i class="fas fa-info-circle"></i>
                                                          </span>
                                                          <span class="text">Detail</span>
                                                      </a>
                                                  @elseif($laporan->status->status_id == 9)
                                                      <a class="btn btn-info btn-sm btn-icon-split mb-2" href="{{ route('rw.detail_selesai', $laporan->laporan_id) }}">
                                                          <span class="icon text-white-50">
                                                              <i class="fas fa-info-circle"></i>
                                                          </span>
                                                          <span class="text">Detail</span>
                                                      </a>
                                                  @endif
                                              </td>
                                              
                                        </tr>
                                   @endforeach
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
          <!-- End Rekap Laporan - Dengan Status Direalisasikan  -->
     @endforeach
     
@endsection
