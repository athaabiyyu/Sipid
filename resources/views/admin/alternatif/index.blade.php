@extends('admin.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Alternatif dan Hasil Perhitungan</h1>
        <a class="btn btn-sm btn-success ml-auto" href="{{ route('admin.kriteria.index') }}">Kembali</a>
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
    
    <!-- Keterangan Alternatif  -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3 bg-info" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample" style="color: white">
            <h6 class="m-0 font-weight-bold text-light">Keterangan Tabel Alternatif</h6>
        </a>
        <div class="collapse" id="collapseCardExample">
            <div class="card-body">
                <div>
                    <p>
                        <strong class="text-info">Untuk memunculkan data alternatif, </strong>
                        maka anda harus mengubah status pelaporan menjadi
                        <strong class="text-info">'Diverifikasi'</strong> agar data laporan menjadi data alternatif.

                    </p>
                </div>
                <a href="{{ route('admin.rekap_laporan') }}" class="btn btn-info btn-sm mb-2">Ubah Status</a>
            </div>
        </div>
    </div>
    <!-- Keterangan Alternatif  -->

    <!-- Tabel Penilaian Kriteria -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardTable" class="d-block card-header py-3 bg-info" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardTable" style="color: white">
            <h6 class="m-0 font-weight-bold text-light">Keterangan Penilaian Kriteria </h6>
        </a>
        
        <div class="collapse" id="collapseCardTable">
            <div class="card-body">
                <div class="row">
                    @foreach ($dataPenilaian->groupBy('kriteria_id') as $kriteriaId => $penilaians)
                        @php
                            $kriteriaName = $kriteriaNames[$kriteriaId] ?? 'Kriteria Lain';
                        @endphp
                        <div class="col-md-12">
                            <h6 class="m-0 font-weight-bold mb-2 mt-4 text-center">Kriteria {{ $kriteriaName }} (C{{ $loop->iteration }})</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable{{ $kriteriaId }}" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Level</th>
                                            <th>Deskripsi</th>
                                            <th>Skor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penilaians as $penilaian)
                                            <tr>
                                                <td class="text-center">{{ $penilaian->level_keparahan }}</td>
                                                <td>{{ $penilaian->deskripsi_penilaian_kriteria }}</td>
                                                <td class="text-center">{{ $penilaian->skor_penilaian_kriteria }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>
    <!-- End Tabel Penilaian Kriteria -->

    <!-- Tabel Alternatif  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Tabel Alternatif</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Nama Alternatif/Infrastruktur</th>
                            <th>Lokasi Kerusakan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php $count = 0; @endphp
                        @foreach ($dataAlternatif as $alternatif)
                            @if ($alternatif->status->status_kode == 'STS04' ||'STS05' || 'STS06' || 'STS07')
                                @php $count++; @endphp
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $alternatif->infrastruktur->infrastruktur_nama }}</td>
                                    <td>{{ $alternatif->alamat_laporan }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm m-2 btn-icon-split" data-bs-toggle="modal"
                                            data-bs-target="#inlineForm{{ $alternatif->laporan_id }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Isi Nilai</span>
                                        </button>
                                    </td>
                                </tr>                    

                                <!-- Modal Isi Nilai -->
                                <div class="modal fade" id="inlineForm{{ $alternatif->laporan_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="m-0 font-weight-bold text-primary">Isi Nilai Alternatif</h6>
                                                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.alternatif.updateNilai', ['id' => $alternatif->laporan_id]) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <label>Nama Alternatif:</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="{{ $alternatif->infrastruktur->infrastruktur_nama }}" readonly>
                                                        <input type="hidden" name="laporan_id" value="{{ $alternatif->laporan_id }}">
                                                    </div>
                                                    @foreach ($dataKriteria as $index => $kriteria)
                                                        <label>{{ $kriteria->kriteria_nama }}:</label>
                                                        <div class="form-group">
                                                            <input type="hidden" name="kriteria_id[]" value="{{ $kriteria->kriteria_id }}">
                                                            <select name="matrik_nilai[]" class="form-control" required>
                                                                <option value="">Pilih Nilai...</option>
                                                                @php
                                                                    // Ambil data penilaian sesuai dengan kriteria saat ini
                                                                    $penilaianKriteria = $dataPenilaian->where('kriteria_id', $kriteria->kriteria_id);
                                                                @endphp
                                                                @foreach ($penilaianKriteria as $penilaian)
                                                                    <option value="{{ $penilaian->skor_penilaian_kriteria }}">{{ $penilaian->level_keparahan }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if($errors->has('matrik_nilai.' . $index))
                                                                <div class="text-danger">
                                                                    {{ $errors->first('matrik_nilai.' . $index) }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach 
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
                                 <!-- End Modal Isi Nilai -->
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Tabel Alternatif  -->

    <!-- Tabel Matriks -->
    <div id="matrikTable" class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Matrik Keputusan (X)</h6>
            <a class="btn btn-sm btn-success ml-auto" href="{{ route('admin.kriteria.index') }}">Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableMatriks" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Alternatif</th>
                            @foreach ($dataKriteria as $kriteria)
                                <th>{{ $kriteria->kriteria_kode }}</th>
                            @endforeach
                            <th>Aksi</th>
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
                                if ($laporan->status->status_kode == 'STS04' || $laporan->status->status_kode == 'STS05' || $laporan->status->status_kode == 'STS06' || $laporan->status->status_kode == 'STS07') {
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
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm m-2 btn-icon-split" data-bs-toggle="modal"
                                        data-bs-target="#editForm{{ $laporan_id }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="text">Edit Nilai</span>
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- Modal Edit Nilai -->
                            <div class="modal fade" id="editForm{{ $laporan_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="m-0 font-weight-bold text-primary">Edit Nilai Alternatif</h6>
                                            <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.alternatif.updateNilai', ['id' => $laporan_id]) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <label>Nama Alternatif:</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ $laporan->infrastruktur->infrastruktur_nama }}" readonly>
                                                    <input type="hidden" name="laporan_id" value="{{ $laporan_id }}">
                                                </div>
                                                @foreach ($dataKriteria as $index => $kriteria)
                                                    @php
                                                        $matrik = $matrikGroup->firstWhere('kriteria_id', $kriteria->kriteria_id);
                                                        $nilai = $matrik ? $matrik->matrik_nilai : '';
                                                        // Ambil data penilaian sesuai dengan kriteria saat ini
                                                        $penilaianKriteria = $dataPenilaian->where('kriteria_id', $kriteria->kriteria_id);
                                                    @endphp
                                                    <label>{{ $kriteria->kriteria_nama }}:</label>
                                                    <div class="form-group">
                                                        <input type="hidden" name="kriteria_id[]" value="{{ $kriteria->kriteria_id }}">
                                                        <select name="matrik_nilai[]" class="form-control" required>
                                                            <option value="">Pilih Nilai...</option>
                                                            @foreach ($penilaianKriteria as $penilaian)
                                                                <option value="{{ $penilaian->skor_penilaian_kriteria }}" @if($nilai == $penilaian->skor_penilaian_kriteria) selected @endif>{{ $penilaian->level_keparahan }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('matrik_nilai.' . $index))
                                                            <div class="text-danger">
                                                                {{ $errors->first('matrik_nilai.' . $index) }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
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
                            <!-- End Modal Edit Nilai -->

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Tabel Matriks  -->

    <!-- Tabel Utility -->
    <div id="utilityTable" class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Nilai Utility dan Nilai Keseluruhan Utility</h6>
            <a class="btn btn-sm btn-success ml-auto" href="{{ route('admin.kriteria.index') }}">Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Alternatif</th>
                            @foreach ($dataKriteria as $kriteria)
                                <th>Utility {{ $kriteria->kriteria_kode }}</th>
                            @endforeach
                            <th>Total Nilai Utility</th>
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
                                if ($laporan->status->status_kode == 'STS04' || $laporan->status->status_kode == 'STS05' || $laporan->status->status_kode == 'STS06' || $laporan->status->status_kode == 'STS07') {
                                    $count++;
                                } else {
                                    continue;
                                }
                                $totalUtility = 0;
                            @endphp
                            <tr>
                                <td>A{{ $count }} - {{ $laporan->infrastruktur->infrastruktur_nama }}</td>
                                @foreach ($dataKriteria as $kriteria)
                                    @php
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
                                    @endphp
                                    <td>{{ number_format($utility / 100, 3, '.', ',') }}</td>
                                @endforeach
                                <td>{{ number_format($totalUtility / 100, 3, '.', ',') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Tabel Utility -->

    <!-- Hasil Keputusan -->
    <div id="hasil-keputusan" class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Hasil Keputusan</h6>
            <form action="{{ route('admin.alternatif.updateAllStatus') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-warning btn-sm">Kirim ke RW </button>
            </form>
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
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                            // Initialize an array to store total utility data
                            $totalUtilities = [];

                            // Loop through the grouped data to calculate total utility for each alternative
                            $count = 0;
                            foreach ($groupedData as $laporan_id => $matrikGroup) {
                                $laporan = $matrikGroup->first()->laporan;
                                if ($laporan->status->status_kode == 'STS04' || $laporan->status->status_kode == 'STS05' || $laporan->status->status_kode == 'STS06' || $laporan->status->status_kode == 'STS07') {
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
                                        'totalUtility' => $totalUtility
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

    <!-- Pesan Erorr Validasi Modal Isi Nilai -->
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var modalId = '#inlineForm{{ $count }}';
                var modal = new bootstrap.Modal(document.querySelector(modalId));
                modal.show();
            });
        </script>
    @endif
    <!-- End Pesan Erorr Validasi Modal Isi Nilai -->

        <style>
            .dataTables_wrapper .dataTables_paginate {
                margin-top: 10px !important; /* Menambahkan jarak antara tabel dan fitur pagination */
            }
        </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
@endsection
