@extends('control-panel.users.show.layout', [
    'user' => $user,
    'activeUserNav' => 'tasks',
])

@section('button')
  <x-tasks.tasks-table-actions />
@endsection

@section('table')
  <x-tasks.table :tasks="$tasks" />
@endsection
