@extends('control-panel.clients.show.layout', [
    'client' => $client,
    'activeClientNav' => 'projects',
])

@section('button')
  <x-buttons.anchor :href="route('projects.create')" content="Create project" color="success" class="mb-2" />
@endsection

@section('table')
  <x-projects.table :projects="$projects" />
@endsection
