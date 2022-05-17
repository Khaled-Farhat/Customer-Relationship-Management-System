@extends('control-panel.organizations.show.layout', [
    'organiztion' => $organization,
    'activeOrganizationNav' => 'clients',
])

@section('button')
  <x-buttons.anchor :href="route('clients.create')" content="Create client" color="success" class="mb-2" />
@endsection

@section('table')
  <x-clients.table :clients="$clients" />
@endsection
