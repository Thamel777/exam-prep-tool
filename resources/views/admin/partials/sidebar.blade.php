<nav class="menu">
  <a class="menu-brand" href="{{ route('admin.dashboard') }}">
    <span class="logo">⚙️</span> <span class="t">Dashboard</span>
  </a>

  <div class="menu-section">Meetings</div>
  <a class="menu-link {{ request()->routeIs('admin.meetings.index') && request('status','pending')==='pending' ? 'active' : '' }}"
     href="{{ route('admin.meetings.index',['status'=>'pending']) }}">
    <span>Pending</span>
  </a>
  <a class="menu-link {{ request()->routeIs('admin.meetings.index') && request('status')==='approved' ? 'active' : '' }}"
     href="{{ route('admin.meetings.index',['status'=>'approved']) }}">
    <span>Approved</span>
  </a>
  <a class="menu-link {{ request()->routeIs('admin.meetings.index') && request('status')==='rejected' ? 'active' : '' }}"
     href="{{ route('admin.meetings.index',['status'=>'rejected']) }}">
    <span>Rejected</span>
  </a>

  {{-- Future sections add later --}}
  <div class="menu-section">Management</div>
  <a class="menu-link disabled"><span>Lecturers (soon)</span></a>
  <a class="menu-link disabled"><span>Users (soon)</span></a>
</nav>
