@extends('admin.layouts.main')

@section('content')
    
    <!-- Keterangan Alternatif  -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3 bg-danger" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample" style="color: white">
            <h6 class="m-0 font-weight-bold text-light">Keterangan Alternatif</h6>
        </a>

        <div class="collapse" id="collapseCardExample">
            <div class="card-body">
                <div>
                    <p>
                        <strong class="text-danger">Untuk memunculkan data alternatif, </strong>
                        maka anda harus mengubah status pelaporan menjadi
                        <strong class="text-danger">'Dalam Proses'</strong> agar data laporan menjadi data alternatif.

                    </p>
                </div>
                <a href="{{ route('admin.rekap_laporan') }}" class="btn btn-success btn-sm mb-2">Ubah Status</a>
            </div>
        </div>
    </div>
    <!-- Keterangan Alternatif  -->

    <!-- Tabel Penilaian Kriteria -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardTable" class="d-block card-header py-3 bg-primary" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardTable" style="color: white">
            <h6 class="m-0 font-weight-bold text-light">Tabel Penilaian Kriteria </h6>
        </a>

        <div class="collapse" id="collapseCardTable">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="m-0 font-weight-bold mb-2 text-center">Kriteria Tingkat Keparahan (C1)</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Level Keparahan</th>
                                        <th>Deskripsi</th>
                                        <th>Skor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Rendah</td>
                                        <td>Kerusakan minor yang tidak mempengaruhi fungsi utama infrastruktur. Perbaikan
                                            bisa
                                            ditunda.
                                            Contoh: retakan kecil pada permukaan jalan, cat mengelupas.</td>
                                        <td class="text-center">1</td>
                                    </tr>
                                    <tr>
                                        <td>Sedang</td>
                                        <td>Kerusakan yang mulai mempengaruhi fungsi tetapi belum menyebabkan kegagalan
                                            total.
                                            Memerlukan perhatian dalam waktu dekat. Contoh: lubang sedang di jalan,
                                            kerusakan ringan
                                            pada struktur bangunan.</td>
                                        <td class="text-center">2</td>
                                    </tr>
                                    <tr>
                                        <td>Tinggi</td>
                                        <td>Kerusakan signifikan yang mengurangi fungsi utama infrastruktur dan membutuhkan
                                            perbaikan
                                            segera. Contoh: lubang besar di jalan yang mengganggu lalu lintas, kerusakan
                                            parah pada
                                            struktur bangunan yang bisa membahayakan keselamatan.</td>
                                        <td class="text-center">3</td>
                                    </tr>
                                    <tr>
                                        <td>Sangat Tinggi</td>
                                        <td>Kerusakan sangat parah yang menyebabkan kegagalan fungsi total atau mengancam
                                            keselamatan
                                            publik. Memerlukan tindakan darurat. Contoh: runtuhnya sebagian jalan atau
                                            jembatan,
                                            kerusakan struktural serius pada bangunan yang bisa menyebabkan runtuhnya
                                            bangunan.</td>
                                        <td class="text-center">4</td>
                                    </tr>
                                    <tr>
                                        <td>Kritis</td>
                                        <td>Kerusakan yang menyebabkan keadaan darurat atau bencana, membutuhkan tindakan
                                            darurat
                                            segera
                                            untuk menghindari korban atau kerugian yang lebih besar. Contoh: jembatan yang
                                            runtuh,
                                            bangunan yang ambruk.</td>
                                        <td class="text-center">5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h6 class="m-0 font-weight-bold mt-4 mb-2 text-center">Kriteria Biaya Perbaikan (C2)</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable2" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Deskripsi</th>
                                        <th>Skor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Biaya perbaikan lebih dari 5 juta</td>
                                        <td class="text-center">1</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya perbaikan lebih dari 4 juta, kurang dari 5 juta</td>
                                        <td class="text-center">2</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya perbaikan lebih dari 3 juta, kurang dari 4 juta</td>
                                        <td class="text-center">3</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya perbaikan lebih dari 2 juta, kurang dari 3 juta</td>
                                        <td class="text-center">4</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya perbaikan lebih dari 1 juta, kurang dari 2 juta</td>
                                        <td class="text-center">4</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya perbaikan kurang dari 1 juta</td>
                                        <td class="text-center">5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h6 class="m-0 font-weight-bold mt-4 mb-2 text-center">Kriteria Banyak Laporan (C3)</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable3" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Deskripsi</th>
                                        <th>Skor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kurang dari 3 laporan</td>
                                        <td class="text-center">1</td>
                                    </tr>
                                    <tr>
                                        <td>4 - 6 laporan</td>
                                        <td class="text-center">2</td>
                                    </tr>
                                    <tr>
                                        <td>7 - 9 laporan</td>
                                        <td class="text-center">3</td>
                                    </tr>
                                    <tr>
                                        <td>10 - 12 laporan</td>
                                        <td class="text-center">4</td>
                                    </tr>
                                    <tr>
                                        <td>Lebih dari 13 laporan</td>
                                        <td class="text-center">5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h6 class="m-0 font-weight-bold mt-4 mb-2 text-center">Kriteria Waktu Perbaikan (C4)</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable3" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Deskripsi</th>
                                        <th>Skor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Waktu perbaikan lebih dari 30 hari</td>
                                        <td class="text-center">1</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu perbaikan 21 - 30 hari</td>
                                        <td class="text-center">2</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu perbaikan 11 - 20 hari</td>
                                        <td class="text-center">3</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu perbaikan 6 - 10 hari</td>
                                        <td class="text-center">4</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu perbaikan kurang dari 5 hari</td>
                                        <td class="text-center">5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h6 class="m-0 font-weight-bold mt-4 mb-2 text-center">Kriteria Dampak Sosial (C5)</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable4" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Deskripsi</th>
                                        <th>Skor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Dampak minimal pada masyarakat, tidak ada gangguan berarti</td>
                                        <td class="text-center">1</td>
                                    </tr>
                                    <tr>
                                        <td>Dampak kecil pada masyarakat, gangguan ringan</td>
                                        <td class="text-center">2</td>
                                    </tr>
                                    <tr>
                                        <td>Dampak sedang pada masyarakat, beberapa gangguan</td>
                                        <td class="text-center">3</td>
                                    </tr>
                                    <tr>
                                        <td>Dampak besar pada masyarakat, gangguan signifikan</td>
                                        <td class="text-center">4</td>
                                    </tr>
                                    <tr>
                                        <td>Dampak sangat besar pada masyarakat, gangguan sangat parah</td>
                                        <td class="text-center">5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Tabel Penilaian Kriteria -->

    <!-- Tabel Alternatif  -->
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
                            @if ($alternatif->status->status_kode == 'STS04')
                                @php $count++; @endphp
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>A{{ $count }}</td>
                                    <td>{{ $alternatif->infrastruktur->infrastruktur_nama }}</td>
                                    <td>{{ $alternatif->alamat_laporan }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm m-2" data-bs-toggle="modal"
                                            data-bs-target="#inlineForm{{ $count }}">
                                            Isi Nilai
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="inlineForm{{ $count }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
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
                                                    @foreach ($dataKriteria as $kriteria)
                                                        @php
                                                            // Cari nilai matrik untuk kriteria ini
                                                            $matrik = $alternatif->matrik->where('kriteria_id', $kriteria->kriteria_id)->first();
                                                            $nilai = $matrik ? $matrik->matrik_nilai : '';
                                                        @endphp
                                                        <label>{{ $kriteria->kriteria_nama }}:</label>
                                                        <div class="form-group">
                                                            <input type="hidden" name="kriteria_id[]" value="{{ $kriteria->kriteria_id }}">
                                                            <input type="number" name="matrik_nilai[]" value="{{ old('matrik_nilai[]', $nilai) }}" placeholder="Nilai..." class="form-control" required>
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
                                if ($laporan->status->status_kode == 'STS04') {
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
                                    <button type="button" class="btn btn-warning btn-sm m-2" data-bs-toggle="modal"
                                        data-bs-target="#inlineForm{{ $count }}">
                                        Edit Nilai
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Tabel Matriks -->

    <!-- Tabel Utility -->
    <div id="utilityTable" class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Nilai Utility dan Nilai Keseluruhan Utility</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                if ($laporan->status->status_kode == 'STS04') {
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
                                        // Hitung nilai utility
                                        $c_max = 5; // Nilai maksimum kriteria
                                        $c_min = 0; // Nilai minimum kriteria
                                        $utility = $c_max * (($c_max - $nilai) / ($c_max - $c_min));
                                        // Hitung nilai utility dengan bobot
                                        $weightedUtility = $utility * $kriteria->kriteria_bobot;
                                        $totalUtility += $weightedUtility;
                                    @endphp
                                    <td>{{ $utility }}</td>
                                @endforeach
                                <td>{{ $totalUtility }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Tabel Utility -->

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
                                if ($laporan->status->status_kode == 'STS04') {
                                    $count++;
                                    $totalUtility = 0;
                                    foreach ($dataKriteria as $kriteria) {
                                        $matrik = $matrikGroup->firstWhere('kriteria_id', $kriteria->kriteria_id);
                                        $nilai = $matrik ? $matrik->matrik_nilai : 0;
                                        // Hitung nilai utility
                                        $c_max = 5; // Nilai maksimum kriteria
                                        $c_min = 0; // Nilai minimum kriteria
                                        $utility = $c_max * (($c_max - $nilai) / ($c_max - $c_min));
                                        // Hitung nilai utility dengan bobot
                                        $weightedUtility = $utility * $kriteria->kriteria_bobot;
                                        $totalUtility += $weightedUtility;
                                    }
                                    // Collect data into the totalUtilities array
                                    $totalUtilities[] = [
                                        'alternatif' => "A{$count} - {$laporan->infrastruktur->infrastruktur_nama}",
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
                                <td>{{ $data['totalUtility'] }}</td>
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



@endsection
