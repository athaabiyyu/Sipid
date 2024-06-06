@extends('admin.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Kriteria</h1>
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

    <!-- Keterangan Kriteria -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3 bg-info" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample" style="color: white">
            <h6 class="m-0 font-bobot-bold t font-weight-bold ext-light">Keterangan Kriteria</h6>
        </a>

        <div class="collapse" id="collapseCardExample">
            {{-- <div class="card-body">
                <div>
                    <strong class="text-info">- {{ $dataKriteria[0]->kriteria_nama }}</strong>
                    <p>Seberapa parah masalah infrastruktur tersebut, misalnya, kerusakan fisik atau dampaknya terhadap
                        layanan publik.</p>
                </div>
                <div>
                    <strong class="text-info">- {{ $dataKriteria[1]->kriteria_nama }}</strong>
                    <p>Biaya yang diperlukan untuk memperbaiki atau memperbarui infrastruktur yang rusak.</p>
                </div>
                <div>
                    <strong class="text-info">- {{ $dataKriteria[2]->kriteria_nama }}</strong>
                    <p>Seberapa banyak laporan yang dilaporkan.</p>
                </div>
                <div>
                    <strong class="text-info">- {{ $dataKriteria[3]->kriteria_nama }} </strong>
                    <p>Lama waktu yang diperlukan untuk menyelesaikan perbaikan atau pemeliharaan infrastruktur.</p>
                </div>
                <div>
                    <strong class="text-info">- {{ $dataKriteria[4]->kriteria_nama }} </strong>
                    <p>Dampak infrastruktur rusak terhadap masyarakat sekitar, seperti gangguan dalam rutinitas sehari-hari
                        atau keamanan.</p>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Keterangan Kriteria -->

    <!-- Tabel Kriteria --> 
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary">
            <h6 class="m-0 font-bobot-bold text-white font-weight-bold">Tabel Kriteria</h6>
            <a class="btn btn-sm btn-success ml-auto" href="{{ route('admin.kriteria.create') }}">+ Tambah Kriteria</a>
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
                    <tbody class="text-center"
                        @foreach ($dataKriteria as $kriteria)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kriteria->kriteria_kode }}</td>
                                <td>{{ $kriteria->kriteria_nama }}</td>
                                <td class="kriteria_bobot">{{ $kriteria->kriteria_bobot * 100 }}%</td>
                                <td>{{ $kriteria->kriteria_attribut }}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning btn-sm btn-icon-split" href="{{ route('admin.kriteria.edit', $kriteria->kriteria_id) }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <form id="delete-form-{{ $kriteria->kriteria_id }}" action="{{ route('admin.kriteria.destroy', $kriteria->kriteria_id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a class="btn btn-sm btn-danger btn-icon-split" href="javascript:void(0)" onclick="confirmDelete('{{ $kriteria->kriteria_id }}')">
                                        <span class="icon text-white-50">
                                             <i class="fas fa-times"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </a>
                                </td>                             
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin') }}" class="btn btn-secondary btn-sm">Kembali</a>
                <a href="#" class="btn btn-primary btn-sm" onclick="cekTotalBobot()">Selanjutnya</a>
            </div>            
        </div>
    </div>
    <!-- End Tabel Kriteria -->

    
    <script>
        // Sweet Alert Untuk Pengecekan Total Bobot
        function cekTotalBobot() {
            var totalBobot = 0;
            var bobotKriteria = document.querySelectorAll('.kriteria_bobot');

            bobotKriteria.forEach(function(bobot) {
                totalBobot += parseFloat(bobot.textContent);
            });

            if (totalBobot === 100) {
                window.location.href = "{{ route('admin.alternatif.index') }}";
            } else {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Total bobot kriteria harus sama dengan 100%. Silakan periksa kembali bobot kriterianya.',
                    icon: 'warning',
                    confirmButtonColor: '#4e73df',
                });
            }
        }

        // Sweet Alert - Hapus Laporan
        function confirmDelete(id) {
            Swal.fire({
                    title: 'Apakah anda ingin menghapusnya ?',
                    text: "Jika iya, maka kriteria akan dihapus",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4e73df',
                    cancelButtonColor: '#858796',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
        }
        // End Sweet Alert - Hapus Laporan
    </script>
@endsection
