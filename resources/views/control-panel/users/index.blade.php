@extends('layouts.index')

@section('heading')
  <x-buttons.anchor :href="route('users.create')" content="Create user" color="success" />
@endsection

@section('table')
  <x-users.table :users="$users" />
@endsection
