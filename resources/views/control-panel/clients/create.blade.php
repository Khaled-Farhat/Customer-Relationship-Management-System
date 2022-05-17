@extends('layouts.form')

@section('title')
  Create client
@endsection

@section('action')
  {{ route('clients.store') }}
@endsection

@section('input-fields')
  @include('control-panel.clients.partials.input-fields', [
      'client' => null,
      'organizations' => $organizations,
  ])
@endsection

@section('submit-button')
  <x-buttons.submit content="Create" color="success" />
@endsection
