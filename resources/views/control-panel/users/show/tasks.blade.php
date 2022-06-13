@extends('control-panel.users.show.layout', [
    'user' => $user,
    'activeUserNav' => 'tasks',
])

@section('button')
  <x-buttons.anchor :href="route('tasks.create')" content="Create task" color="success" class="mb-2" />
@endsection

@section('table')
  <x-tasks.table :tasks="$tasks" />
@endsection
