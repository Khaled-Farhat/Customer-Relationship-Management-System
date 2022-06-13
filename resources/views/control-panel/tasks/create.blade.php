@extends('layouts.form')

@section('title')
  Create task
@endsection

@section('action')
  {{ route('tasks.store') }}
@endsection

@section('input-fields')
  @include('control-panel.tasks.partials.input-fields', [
      'task' => null,
  ])
@endsection

@section('submit-button')
  <x-buttons.submit content="Create" color="success" />
@endsection
