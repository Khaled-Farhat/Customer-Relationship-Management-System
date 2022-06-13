@extends('control-panel.users.show.layout', [
    'user' => $user,
    'activeUserNav' => 'projects',
])

@section('button')
  <x-projects.table-actions class="mb-2" />@endsection

@section('table')
  <x-projects.table :projects="$projects" />
@endsection
