@extends('user.template')

@section('content')
     <div class="row align-items-center my-5">
          <div class="col-10">
               <h2>CRUD User</h2>
          </div>
          <div class="col-2">
               <a class="btn btn-sm btn-success" href="{{ route('user.create') }}">+ Add New Data</a>
          </div>
     </div>

     <table class="table table-bordered">
          <thead>
               <tr class="text-center">
                    <th scope="col">User ID</th>
                    <th scope="col">Level ID</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Password</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
               </tr>
          </thead>
          <tbody>
               @foreach ($userData as $user)
                    <tr class="text-center">
                         <th>{{ $user->user_id }}</th>
                         <td>{{ $user->level->level_id }}</td>
                         <td>{{ $user->user_nik }}</td>
                         <td>{{ $user->user_nama }}</td>
                         <td>{{ substr($user->user_password, 0, 4) }}...</td>

                         <td>{{ $user->user_foto }}</td>
                         <td>
                              <form action="{{ route('user.destroy', $user->user_id) }}" method="POST">
                                   <a class="btn btn-warning btn-sm" href="{{ route('user.show', $user->user_id) }}">Detail</a>
                                   <a class="btn btn-primary btn-sm" href="{{ route('user.edit', $user->user_id) }}">Edit</a>
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                              </form>
                         </td>
                    </tr>
                    
               @endforeach
          </tbody>
     </table>
@endsection
