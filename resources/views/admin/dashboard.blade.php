@extends('layouts.admin')
@section('title','Admin Dashboard')

@section('content')
  <h1>Dashboard</h1>

  <div class="cards">
    <div class="card"><h3>Total Meetings</h3><div style="font-size:28px;font-weight:800">{{ $total }}</div></div>
    <div class="card"><h3>Pending</h3><div style="font-size:28px;font-weight:800">{{ $pending }}</div></div>
    <div class="card"><h3>Approved</h3><div style="font-size:28px;font-weight:800">{{ $approved }}</div></div>
    <div class="card"><h3>Rejected</h3><div style="font-size:28px;font-weight:800">{{ $rejected }}</div></div>
  </div>

  <div class="grid-2">
    <div class="card">
      <h3>Pending (Next 8)</h3>
      <table class="table">
        <thead><tr><th>Student</th><th>Lecturer</th><th>When</th><th>Title</th><th>Actions</th></tr></thead>
        <tbody>
          @forelse($latestPending as $m)
            <tr>
              <td>{{ $m->user->name }}</td>
              <td>{{ $m->lecturer->name }}</td>
              <td>{{ $m->scheduled_at?->format('M d, Y h:i A') }}</td>
              <td>{{ $m->title }}</td>
              <td class="actions">
                <form method="POST" action="{{ route('admin.meetings.approve', $m) }}">@csrf
                  <button class="btn btn-primary">Approve</button>
                </form>
                <form method="POST" action="{{ route('admin.meetings.reject', $m) }}">@csrf
                  <input type="hidden" name="reason" value="Not available">
                  <button class="btn btn-outline">Reject</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5">No pending meetings.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="card">
      <h3>Quick Links</h3>
      <p><a class="btn btn-light" href="{{ route('admin.meetings.index',['status'=>'pending']) }}">Review Pending</a></p>
      <p><a class="btn btn-light" href="{{ route('admin.meetings.index',['status'=>'approved']) }}">View Approved</a></p>
      <p><a class="btn btn-light" href="{{ route('admin.meetings.index',['status'=>'rejected']) }}">View Rejected</a></p>
    </div>
  </div>
@endsection
