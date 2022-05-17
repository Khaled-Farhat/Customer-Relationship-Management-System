@extends('layouts.control-panel')

@section('content')
  <div class="row">
    <div class="col-12 pe-0">
      @include('control-panel.organizations.show.partials.info', [
          'organization' => $organization,
      ])
    </div>
  </div>
  <div class="row pe-0 mt-3">
    <div class="col-2">
        @include('control-panel.organizations.show.partials.sidenav', [
            'activeOrganizationNav' => $activeOrganizationNav,
        ])
    </div>
    <div class="col-10 px-0">
      @yield('button')
      <div class="card">
        <div class="card-body py-1">
          @yield('table')
        </div>
      </div>
    </div>
  </div>
@endsection
