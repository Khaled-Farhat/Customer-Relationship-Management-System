@extends('control-panel.organizations.show.layout', [
    'organiztion' => $organization,
    'activeOrganizationNav' => 'clients',
])

@section('button')
  <x-clients.table-actions />
@endsection

@section('table')
  <x-clients.table :clients="$clients" />
@endsection
