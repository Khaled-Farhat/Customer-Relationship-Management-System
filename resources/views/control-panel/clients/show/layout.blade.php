@extends('layouts.show')

@section('heading')
  @include('control-panel.clients.show.partials.info', [
      'client' => $client,
  ])
@endsection

@section('subnav')
  @include('control-panel.clients.show.partials.sidenav', [
      'activeClientNav' => $activeClientNav,
  ])
@endsection

@section('subcontent')
  @yield('button')
  <div class="card">
    <div class="card-body py-1">
      @yield('table')
    </div>
  </div>
@endsection
