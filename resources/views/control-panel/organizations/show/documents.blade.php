@extends('control-panel.organizations.show.layout', [
    'organization' => $organization,
    'activeOrganizationNav' => 'documents',
])

@include('layouts.documents.index', [
    'action' => route('organizations.documents.store', $organization),
    'documents' => $documents,
])
