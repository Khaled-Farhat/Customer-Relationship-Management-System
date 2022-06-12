@extends('control-panel.users.show.layout', [
    'user' => $user,
    'activeUserNav' => 'projects',
])

@section('button')
  <x-buttons.anchor :href="route('projects.create')" content="Create project" color="success" class="mb-2" />
@endsection

@section('table')
  <x-projects.table :projects="$projects" />
@endsection
