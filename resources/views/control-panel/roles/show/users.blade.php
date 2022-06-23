@extends('control-panel.roles.show.layout', [
    'organiztion' => $role,
    'activeRoleNav' => 'users',
])

@section('button')
  <x-buttons.anchor :href="route('users.create')" content="Create user" color="success" class="mb-2" />
@endsection

@section('table')
  <x-users.table :users="$users" />
@endsection
