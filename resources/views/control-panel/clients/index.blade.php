@extends('layouts.index')

@section('heading')
  <x-buttons.anchor :href="route('clients.create')" content="Create client" color="success" />
@endsection

@section('table')
  <x-clients.table :clients="$clients" showOrganization="true" />
@endsection
