@extends('control-panel.clients.show.layout', [
    'client' => $client,
    'activeClientNav' => 'documents',
])

@section('button')
  <x-documents.upload-document :action="route('clients.documents.store', $client)" class="mb-2" />
@endsection

@section('table')
    <x-documents.table :documents="$documents" />
@endsection
