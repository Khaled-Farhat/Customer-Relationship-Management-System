@extends('layouts.app', [
    'noTopNav' => true,
])

<div class="card m-4 p-5 text-center">
  <div class="card-body mx-auto">
    <h1 class="card-title mb-4">404 | Page not found</h1>
    <h6 class="card-subtitle text-muted mb-4">The page you were looking for does not exist</h6>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">Home</a>
  </div>
</div>
