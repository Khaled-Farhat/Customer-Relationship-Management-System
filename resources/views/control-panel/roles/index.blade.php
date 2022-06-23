@extends('layouts.index')

@section('heading')
  <x-buttons.anchor :href="route('roles.create')" content="Create role" color="success" />
@endsection

@section('table')
  <x-roles.table :roles="$roles" />
@endsection
