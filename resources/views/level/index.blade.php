@extends('layouts.indexCRUD')

@section('addData-button')
     <div class="col-2">
          <a class="btn btn-sm btn-success" href="{{ route('level.create') }}">+ Add New Data</a>
     </div>
@endsection

@section('head-table')
     <th scope="col">Level ID</th>
     <th scope="col">Level Kode</th>
     <th scope="col">Level Nama</th>
     <th scope="col">Aksi</th>
@endsection

@section('body-table')
     @foreach ($levelData as $level)
          <tr class="text-center">
               <th>{{ $level->level_id }}</th>
               <td>{{ $level->level_kode }}</td>
               <td>{{ $level->level_nama }}</td>
               <td>
                    <form action="{{ route('level.destroy', $level->level_id) }}" method="POST">
                         <a class="btn btn-warning btn-sm" href="{{ route('level.show', $level->level_id) }}">Detail</a>
                         <a class="btn btn-primary btn-sm" href="{{ route('level.edit', $level->level_id) }}">Edit</a>
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger btn-sm"
                         onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
               </td>
          </tr>
     @endforeach
@endsection
