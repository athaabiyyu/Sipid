<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('img/logo_title.png') }}">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbAdmin_Template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbAdmin_Template/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('sbAdmin_Template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    @stack('css')
</head>

<body id="page-top">
     <!-- Page Wrapper -->
     <div id="wrapper">
          <!-- Start Sidebar -->
          @include('admin.layouts.sidebar')
          <!-- End Sidebar -->

          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">

               <!-- Start Content -->
               <div id="content">
                    <!-- Start Header -->
                    @include('admin.layouts.headbar')
                    <!-- End Header -->

                    <!-- Start content -->
                    @include('admin.layouts.content')
                    <!-- End Content -->
               </div>
               <!-- End Content -->
               <!-- Start Footer -->
               @include('admin.layouts.footer')
               <!-- End Footer -->

          </div>
          <!-- End of Content Wrapper -->
     </div>

     <!-- End of Page Wrapper -->

     <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
     </a>

     <!-- Bootstrap core JavaScript-->
     <script src="{{ asset('sbAdmin_Template/vendor/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('sbAdmin_Template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

     <!-- Core plugin JavaScript-->
     <script src="{{ asset('sbAdmin_Template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

     <!-- Custom scripts for all pages-->
     <script src="{{ asset('sbAdmin_Template/js/sb-admin-2.min.js') }}"></script>

     <!-- Page level plugins -->
     <script src="{{ asset('sbAdmin_Template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
     <script src="{{ asset('sbAdmin_Template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

     <!-- Page level custom scripts -->
     <script src="{{ asset('sbAdmin_Template/js/demo/datatables-demo.js') }}"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     @stack('scripts')

     <!-- DataTables Initialization -->
     <script>
         $(document).ready(function() {
             $('#dataTable').DataTable(); // Ensure your table ID matches here
         });
     </script>
</body>

</html>
