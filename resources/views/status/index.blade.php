@extends('layouts.indexCRUD')

@section('addData-button')
     <div class="col-2">
          <a class="btn btn-sm btn-success" href="{{ route('status_laporan.create') }}">+ Add New Data</a>
     </div>
@endsection

@section('head-table')
     <th scope="col">Status ID</th>
     <th scope="col">Status Kode</th>
     <th scope="col">Status Nama</th>
     <th scope="col">Aksi</th>
@endsection

@section('body-table')
     @foreach ($statusData as $status)
          <tr class="text-center">
               <th>{{ $status->status_id }}</th>
               <td>{{ $status->status_kode }}</td>
               <td>{{ $status->status_nama }}</td>
               <td>
                    <form action="{{ route('status_laporan.destroy', $status->status_id) }}" method="POST">
                         <a class="btn btn-warning btn-sm" href="{{ route('status_laporan.show', $status->status_id) }}">Detail</a>
                         <a class="btn btn-primary btn-sm" href="{{ route('status_laporan.edit', $status->status_id) }}">Edit</a>
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger btn-sm"
                         onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
               </td>
          </tr>
     @endforeach
@endsection
