@extends('layouts.control-panel')

@section('content')
  <div class="card-group">
    @foreach ($statistics as $entity => $count)
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $count }}</h4>
            <p class="card-text"><small class="text-muted">{{ $entity }}</small></p>
        </div>
      </div>
    @endforeach
  </div>
@endsection
