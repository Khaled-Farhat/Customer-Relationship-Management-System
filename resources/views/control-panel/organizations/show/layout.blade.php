@extends('layouts.show')

@section('heading')
  @include('control-panel.organizations.show.partials.info', [
      'organization' => $organization,
  ])
@endsection

@section('subnav')
  @include('control-panel.organizations.show.partials.sidenav', [
      'activeOrganizationNav' => $activeOrganizationNav,
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
