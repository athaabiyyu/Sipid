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
@endsection
