@extends('layouts.templateCRUD')

@section('content')
     <div class="row align-items-center my-5">
          <div class="col-10">
               <h2>CRUD User</h2>
          </div>
          @yield('addData-button')
     </div>

     <table class="table table-bordered">
          <thead>
               <tr class="text-center">
                    @yield('head-table')
               </tr>
          </thead>
          <tbody>
               @yield('body-table')
          </tbody>
     </table>
@endsection
