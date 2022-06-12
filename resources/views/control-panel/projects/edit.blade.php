@extends('layouts.form')

@section('title')
  Edit project
@endsection

@section('action')
  {{ route('projects.update', $project) }}
@endsection

@section('method')
  @method('PUT')
@endsection

@section('input-fields')
  @include('control-panel.projects.partials.input-fields', [
      'project' => $project,
  ])
@endsection

@section('submit-button')
  <x-buttons.submit content="Edit" color="warning" />
@endsection
