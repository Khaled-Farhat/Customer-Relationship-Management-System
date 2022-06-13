@extends('control-panel.projects.show.layout', [
    'project' => $project,
    'activeProjectNav' => 'tasks',
])

@section('button')
  <x-tasks.table-actions class="mb-2" />
@endsection

@section('table')
  <x-tasks.table :tasks="$tasks" />
@endsection
