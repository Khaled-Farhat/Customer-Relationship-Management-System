@extends('layouts.index')

@section('heading')
  <x-tasks.table-actions />
@endsection

@section('table')
  <x-tasks.table :tasks="$tasks" />
@endsection
