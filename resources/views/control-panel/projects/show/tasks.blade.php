@extends('control-panel.projects.show.layout', [
    'project' => $project,
    'activeProjectNav' => 'tasks',
])

@section('button')
  <x-tasks.tasks-table-actions />
@endsection

@section('table')
  <x-tasks.table :tasks="$tasks" />
@endsection
