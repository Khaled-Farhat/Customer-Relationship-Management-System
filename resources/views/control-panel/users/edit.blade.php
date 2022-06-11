@extends('layouts.form')

@section('title')
  Edit user
@endsection

@section('action')
  {{ route('users.update', $user) }}
@endsection

@section('method')
  @method('PUT')
@endsection

@section('input-fields')
  @include('control-panel.users.partials.input-fields', [
      'user' => $user,
  ])
@endsection

@section('submit-button')
  <x-buttons.submit content="Edit" color="warning" />
@endsection
