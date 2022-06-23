@extends('layouts.form')

@section('title')
  Create role
@endsection

@section('action')
  {{ route('roles.store') }}
@endsection

@section('input-fields')
  @include('control-panel.roles.partials.input-fields', [
      'role' => null,
      'permissions' => $permissions,
  ])
@endsection

@section('submit-button')
  <x-buttons.submit content="Create" color="success" />
@endsection
