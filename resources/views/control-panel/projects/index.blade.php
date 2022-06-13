@extends('layouts.index')

@section('heading')
  <x-projects.project-table-actions />
@endsection

@section('table')
  <x-projects.table :projects="$projects" />
@endsection
