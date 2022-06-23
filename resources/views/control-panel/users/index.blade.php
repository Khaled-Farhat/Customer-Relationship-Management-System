@extends('layouts.index')

@section('heading')
    <x-users.table-actions />
@endsection

@section('table')
  <x-users.table :users="$users" />
@endsection
