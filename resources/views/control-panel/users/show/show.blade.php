@extends('layouts.show')

@section('heading')
  @include('control-panel.users.show.partials.info', [
      'user' => $user,
  ])
@endsection
