@extends('layouts.control-panel')

@section('content')
  <div class="row pe-3 mb-3">
    <div class="col-12 pe-0">
      @yield('heading')
    </div>
  </div>
  <div class="row pe-3">
    <div class="col-2">
      @yield('subnav')
    </div>
    <div class="col-10 px-0">
      @yield('subcontent')
    </div>
  </div>
@endsection
