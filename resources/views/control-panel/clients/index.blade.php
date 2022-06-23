@extends('layouts.index')

@section('heading')
  <x-clients.table-actions />
@endsection

@section('table')
  <x-clients.table :clients="$clients" showOrganization="true" />
@endsection
