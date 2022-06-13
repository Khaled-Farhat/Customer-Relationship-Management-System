@extends('control-panel.organizations.show.layout', [
    'organiztion' => $organization,
    'activeOrganizationNav' => 'projects',
])

@section('button')
  <x-projects.table-actions class="mb-2" />@endsection

@section('table')
  <x-projects.table :projects="$projects" />
@endsection
