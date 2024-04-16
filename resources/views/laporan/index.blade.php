@extends('layouts.indexCRUD')

@section('addData-button')
     <div class="col-2">
          <a class="btn btn-sm btn-success" href="{{ route('laporan.create') }}">+ Add New Data</a>
     </div>
@endsection

@section('head-table')
     <th scope="col">Laporan ID</th>
     <th scope="col">Nama Pelapor</th>
     <th scope="col">Nama Infrastruktur</th>
     <th scope="col">Bukti Laporan</th>
     <th scope="col">Tanggal Laporan</th>
     <th scope="col">Deskripsi Laporan</th>
     <th scope="col">Status Laporan</th>
     <th scope="col">Aksi</th>
@endsection

@section('body-table')
     @foreach ($laporanData as $laporan)
          <tr class="text-center">
               <th>{{ $laporan->laporan_id }}</th>
               <td>{{ $laporan->user->user_nama }}</td>
               <td>{{ $laporan->infrastruktur->infrastruktur_nama }}</td>
               <td>{{ $laporan->bukti_laporan }}</td>
               <td>{{ $laporan->tgl_laporan }}</td>
               <td>{{ substr($laporan->deskripsi_laporan, 0, 5) }}...</td>
               <td>{{ $laporan->status->status_nama }}</td>
               <td>
                    <form action="{{ route('laporan.destroy', $laporan->laporan_id) }}" method="POST">
                         <a class="btn btn-warning btn-sm" href="{{ route('laporan.show', $laporan->laporan_id) }}">Detail</a>
                         <a class="btn btn-primary btn-sm" href="{{ route('laporan.edit', $laporan->laporan_id) }}">Edit</a>
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger btn-sm"
                         onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
               </td>
          </tr>
     @endforeach
@endsection
