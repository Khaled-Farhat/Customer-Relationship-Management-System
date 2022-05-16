@extends('layouts.control-panel')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="mt-1 mb-4">@yield('title')</h1>
            <hr>
            <form class="mt-4" method="POST" action="@yield('action')">
                @csrf
                @yield('method')
                @yield('input-fields')
                @yield('submit-button')
            </form>
        </div>
    </div>
@endsection
