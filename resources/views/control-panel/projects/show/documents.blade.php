@extends('control-panel.projects.show.layout', [
    'project' => $project,
    'activeProjectNav' => 'documents',
])

@include('layouts.documents.index', [
    'action' => route('projects.documents.store', $project),
    'documents' => $documents,
])
