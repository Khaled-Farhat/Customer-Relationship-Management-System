@extends('layouts.form')

@section('title')
  Create user
@endsection

@section('action')
  {{ route('users.store') }}
@endsection

@section('input-fields')
  @include('control-panel.users.partials.input-fields', [
      'user' => null,
  ])
@endsection

@section('submit-button')
  <x-buttons.submit content="Create" color="success" />
@endsection
