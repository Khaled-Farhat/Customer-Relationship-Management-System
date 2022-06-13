@extends('layouts.index')

@section('heading')
  <x-buttons.anchor :href="route('tasks.create')" content="Create task" color="success" />
@endsection

@section('table')
  <x-tasks.table :tasks="$tasks" />
@endsection
