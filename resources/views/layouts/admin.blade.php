<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Admin')</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  @stack('head')
</head>
<body class="admin has-sidebar">

  {{-- Top bar --}}
  <header class="admin-topbar">
    <button id="sidebarToggle" class="icon-btn" aria-label="Toggle sidebar">☰</button>
    <div class="brand">Admin</div>
    <div class="spacer"></div>
    <a class="btn btn-light" href="{{ route('home') }}">← Back to site</a>
    <form action="{{ route('logout') }}" method="POST" style="margin-left:8px;">
      @csrf
      <button class="btn btn-danger" type="submit">Logout</button>
    </form>
  </header>

  {{-- Sidebar --}}
  <aside id="sidebar" class="admin-sidebar">
    @include('admin.partials.sidebar')
  </aside>

  {{-- Main content --}}
  <main class="admin-content">
    <div class="wrap">
      @if(session('notice'))
        <div class="flash">{{ session('notice') }}</div>
      @endif
      @yield('content')
    </div>
  </main>

  <script>
    const btn = document.getElementById('sidebarToggle');
    const sb  = document.getElementById('sidebar');
    btn?.addEventListener('click', () => {
      document.body.classList.toggle('sidebar-collapsed');
    });
  </script>
</body>
</html>
