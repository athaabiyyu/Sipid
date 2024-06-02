@extends('laporan.layouts.main')

@section('content')
<div class="container mx-auto mt-10 flex justify-center">
    <div class="p-6 bg-white rounded shadow mx-4">
        {!! $chart->container() !!}
    </div>
    <div class="p-6 bg-white rounded shadow mx-4">
        {!! $donut->container() !!}
    </div>
</div>
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
<script src="{{ $donut->cdn() }}"></script>
{{ $donut->script() }}
@endsection
