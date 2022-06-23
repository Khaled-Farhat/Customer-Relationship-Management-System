@extends('control-panel.roles.show.layout', [
    'organiztion' => $role,
    'activeRoleNav' => 'users',
])

@section('button')
  <x-users.table-actions />
@endsection

@section('table')
  <x-users.table :users="$users" />
@endsection
