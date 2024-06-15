@extends(auth()->user()->level_id == 3 ? 'laporan.layouts.main' : 'admin.layouts.main')

@section('content')
    <div class="container mx-auto mt-10 flex flex-col items-center">
        <div class="mb-6">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Halaman Trend Pelaporan</h1>
                <a class="btn btn-sm btn-success" href="{{ auth()->user()->level_id == 3 ? route('laporan.dashboard') : route('admin') }}">Kembali</a>
            </div>
            <div class="p-6 bg-white rounded shadow mx-4 mb-4">
                {!! $trenChart->container() !!}
            </div>
        </div>
        <div class="mb-6">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Google Data Studio Report</h1>
            </div>
            <iframe 
                width="1000" 
                height="750" 
                src="https://lookerstudio.google.com/embed/reporting/acd9f9fd-f4db-419c-9900-e52153b46a28/page/uKj2D" 
                frameborder="0" 
                style="border:0" 
                allowfullscreen 
                sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox">
            </iframe>
        </div>
    </div>

    <script src="{{ $trenChart->cdn() }}"></script>
    {!! $trenChart->script() !!}
@endsection
