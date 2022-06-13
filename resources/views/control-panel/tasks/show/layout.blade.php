@extends('layouts.show')

@section('heading')
  @include('control-panel.tasks.show.partials.info', [
      'task' => $task,
  ])
@endsection

@section('subnav')
  @include('control-panel.tasks.show.partials.sidenav', [
      'activeTaskNav' => $activeTaskNav,
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
