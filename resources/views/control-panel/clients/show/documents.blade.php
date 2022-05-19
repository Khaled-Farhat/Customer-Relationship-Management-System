@extends('control-panel.clients.show.layout', [
    'client' => $client,
    'activeClientNav' => 'documents',
])

@include('layouts.documents.index', [
    'action' => route('clients.documents.store', $client),
    'documents' => $documents,
])
