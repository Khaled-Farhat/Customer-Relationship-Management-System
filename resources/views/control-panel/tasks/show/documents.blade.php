@extends('control-panel.tasks.show.layout', [
    'task' => $task,
    'activeTaskNav' => 'documents',
])

@include('layouts.documents.index', [
    'action' => route('tasks.documents.store', $task),
    'documents' => $documents,
])
