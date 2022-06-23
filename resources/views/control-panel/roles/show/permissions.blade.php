@extends('control-panel.roles.show.layout', [
    'role' => $role,
    'activeRoleNav' => 'permissions',
])

@section('table')
  <x-permissions.table :permissions="$permissions" />
@endsection
