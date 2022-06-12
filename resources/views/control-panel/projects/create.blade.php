@extends('layouts.form')

@section('title')
  Create project
@endsection

@section('action')
  {{ route('projects.store') }}
@endsection

@section('input-fields')
  @include('control-panel.projects.partials.input-fields', [
      'project' => null,
  ])
@endsection

@section('submit-button')
  <x-buttons.submit content="Create" color="success" />
@endsection
