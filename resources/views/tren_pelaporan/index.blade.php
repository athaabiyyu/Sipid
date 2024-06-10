@extends('laporan.layouts.main')

@section('content')
    <div class="container mx-auto mt-10 flex flex-col items-center">
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Bar Chart</h2>
            <div class="p-6 bg-white rounded shadow mx-4 mb-4">
                {!! $bar->container() !!}
            </div>
        </div>
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Google Data Studio Report</h2>
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

    <script src="{{ $bar->cdn() }}"></script>
    {{ $bar->script() }}
@endsection
