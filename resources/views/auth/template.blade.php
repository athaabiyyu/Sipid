<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>{{ $title }}</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <!-- Custom fonts for this template-->
     <link href="{{ asset('sbAdmin_Template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

     <!-- Custom styles for this template-->
     <link href="{{ asset('sbAdmin_Template/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
     <div class="container">
          @yield('content')
     </div>


     <!-- Bootstrap core JavaScript-->
     <script src="{{ asset('sbAdmin_Template/vendor/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('sbAdmin_Template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

     <!-- Core plugin JavaScript-->
     <script src="{{ asset('sbAdmin_Template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

     <!-- Custom scripts for all pages-->
     <script src="{{ asset('sbAdmin_Template/js/sb-admin-2.min.js') }}"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
