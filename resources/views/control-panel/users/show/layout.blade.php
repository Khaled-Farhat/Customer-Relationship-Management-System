@extends('layouts.show')

@section('heading')
  @include('control-panel.users.show.partials.info', [
      'user' => $user,
  ])
@endsection

@section('subnav')
  @include('control-panel.users.show.partials.sidenav', [
      'activeUserNav' => $activeUserNav,
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
