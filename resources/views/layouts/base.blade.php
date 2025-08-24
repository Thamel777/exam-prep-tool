<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('app.name', 'Save My Exam'))</title>

  {{-- Static CSS from /public/css --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  @stack('head')
</head>
<body>
  @include('partials.topbar')
  @include('partials.navbar')

  <main>
    @yield('content')
  </main>

  @include('partials.footer')

  @stack('scripts')
</body>
</html>
