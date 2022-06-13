@extends('control-panel.clients.show.layout', [
    'client' => $client,
    'activeClientNav' => 'projects',
])

@section('button')
  <x-projects.table-actions class="mb-2" />
@endsection

@section('table')
  <x-projects.table :projects="$projects" />
@endsection
