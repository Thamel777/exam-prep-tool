@extends('layouts.admin')
@section('title','Meeting Requests')

@section('content')
  <h1>Meeting Requests</h1>

  @if(session('notice'))
    <div class="flash">{{ session('notice') }}</div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th>Student</th><th>Lecturer</th><th>When</th><th>Title</th><th>Status</th><th style="width:220px;">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse($meetings as $m)
        <tr>
          <td>{{ $m->user->name }}</td>
          <td>{{ $m->lecturer->name }}</td>
          <td>{{ $m->scheduled_at?->format('M d, Y h:i A') }}</td>
          <td>{{ $m->title }}</td>
          <td><span class="badge badge-{{ $m->status }}">{{ ucfirst($m->status) }}</span></td>
          <td class="actions">
            @if($m->status === 'pending')
              <form method="POST" action="{{ route('admin.meetings.approve', $m) }}">@csrf
                <button class="btn btn-primary">Approve</button>
              </form>
              <form method="POST" action="{{ route('admin.meetings.reject', $m) }}">@csrf
                <input type="hidden" name="reason" value="Not available">
                <button class="btn btn-outline">Reject</button>
              </form>
            @else
              —
            @endif
          </td>
        </tr>
      @empty
        <tr><td colspan="6">No meetings found.</td></tr>
      @endforelse
    </tbody>
  </table>

  <div style="margin-top:12px;">
    {{ $meetings->withQueryString()->links() }}
  </div>
@endsection
