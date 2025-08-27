<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Admin')</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  @stack('head')
</head>
<body class="admin">
  <header class="admin-header">
    <div class="wrap">
      <div class="brand">Admin</div>
      <div class="spacer"></div>
      <a class="btn btn-light" href="{{ route('home') }}">← Back to site</a>
      <form action="{{ route('logout') }}" method="POST" style="margin-left:8px;">
        @csrf
        <button class="btn btn-danger" type="submit">Logout</button>
      </form>
    </div>
  </header>

  <main class="admin-main">
    <div class="wrap">
      @if(session('notice'))
        <div class="flash">{{ session('notice') }}</div>
      @endif
      @yield('content')
    </div>
  </main>
</body>
</html>
