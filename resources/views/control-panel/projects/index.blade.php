@extends('layouts.index')

@section('heading')
  <x-buttons.anchor :href="route('projects.create')" content="Create project" color="success" />
@endsection

@section('table')
  <x-projects.table :projects="$projects" />
@endsection
