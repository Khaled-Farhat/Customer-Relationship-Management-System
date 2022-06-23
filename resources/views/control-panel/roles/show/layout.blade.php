@extends('layouts.show')

@section('heading')
  @include('control-panel.roles.show.partials.info', [
      'role' => $role,
  ])
@endsection

@section('subnav')
  @include('control-panel.roles.show.partials.sidenav', [
      'activeRoleNav' => $activeRoleNav,
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
