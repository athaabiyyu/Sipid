@extends('layouts.indexCRUD')

@section('addData-button')
     <div class="col-2">
          <a class="btn btn-sm btn-success" href="{{ route('infrastruktur.create') }}">+ Add New Data</a>
     </div>
@endsection

@section('head-table')
     <th scope="col">ID Infrastruktur</th>
     <th scope="col">Kode Infrastruktur</th>
     <th scope="col">Nama Infrastruktur</th>
@endsection

@section('body-table')
     @foreach ($infrastrukturData as $infrastruktur)
          <tr class="text-center">
               <th>{{ $infrastruktur->infrastruktur_id }}</th>
               <td>{{ $infrastruktur->infrastruktur_kode }}</td>
               <td>{{ $infrastruktur->infrastruktur_nama }}</td>
               <td>
                    <form action="{{ route('infrastruktur.destroy', $infrastruktur->infrastruktur_id) }}" method="POST">
                         <a class="btn btn-warning btn-sm" href="{{ route('infrastruktur.show', $infrastruktur->infrastruktur_id) }}">Detail</a>
                         <a class="btn btn-primary btn-sm" href="{{ route('infrastruktur.edit', $infrastruktur->infrastruktur_id) }}">Edit</a>
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger btn-sm"
                         onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
               </td>
          </tr>
     @endforeach
@endsection
