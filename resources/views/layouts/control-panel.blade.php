<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <x-nav.topnav />
  <div class="container-fluid px-0">
  <div class="row mx-0 px-0">
    <x-nav.sidenav />
    <div class="col-2"></div>
    <div class="col-10 py-3">
        @yield('content')
    </div>
  </div>
  </div>

  @if (session()->has('success'))
    <x-alerts.toast color="success" :message="session('success')" />
  @endif

  @if (session()->has('error'))
    <x-alerts.toast color="danger" :message="session('error')" />
  @endif

  <script>
    @section('script')
      $(document).ready(function() {
        $('.toast').toast({
          "autohide": false
        }).toast('show');
      })
    @show
  </script>
</body>

</html>
