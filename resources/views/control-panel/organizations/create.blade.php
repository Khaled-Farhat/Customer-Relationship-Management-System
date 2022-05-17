@extends('layouts.form')

@section('title')
  Create organization
@endsection

@section('action')
  {{ route('organizations.store') }}
@endsection

@section('input-fields')
  @include('control-panel.organizations.partials.input-fields', [
      'organization' => null,
  ])
@endsection

@section('submit-button')
  <x-buttons.submit content="Create" color="success" />
@endsection
