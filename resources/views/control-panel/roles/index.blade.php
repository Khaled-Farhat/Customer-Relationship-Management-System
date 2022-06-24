@extends('layouts.index')

@section('heading')
  <x-roles.table-actions />
@endsection

@section('table')
  <x-roles.table :roles="$roles" />
@endsection
