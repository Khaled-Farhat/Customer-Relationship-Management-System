@extends('layouts.index')

@section('heading')
  <x-projects.table-actions />
@endsection

@section('table')
  <x-projects.table :projects="$projects" />
@endsection
