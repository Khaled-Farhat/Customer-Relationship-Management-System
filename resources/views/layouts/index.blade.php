@extends('layouts.control-panel')

@section('content')
    <div class="mb-2">
        @yield('heading')
    </div>
    <div class="card">
        <div class="card-body py-1">
            @yield('table')
        </div>
    </div>
@endsection
