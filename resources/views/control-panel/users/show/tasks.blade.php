@extends('control-panel.users.show.layout', [
    'user' => $user,
    'activeUserNav' => 'tasks',
])

@section('button')
  <x-tasks.table-actions class="mb-2" />
@endsection

@section('table')
  <x-tasks.table :tasks="$tasks" />
@endsection
