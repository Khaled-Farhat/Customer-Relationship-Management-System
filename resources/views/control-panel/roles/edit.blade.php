@extends('layouts.form')

@section('title')
  Edit role
@endsection

@section('action')
  {{ route('roles.update', $role) }}
@endsection

@section('method')
  @method('PUT')
@endsection

@section('input-fields')
  @include('control-panel.roles.partials.input-fields', [
      'role' => $role,
  ])
@endsection

@section('submit-button')
  <x-buttons.submit content="Edit" color="warning" />
@endsection
