@extends('layouts.base')
@section('title', 'Admin Dashboard')

@section('content')
  <section class="wrapper" style="padding:32px 0;">
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}. This is the admin-only area.</p>

    {{-- Example: add quick links or stats here --}}
    <div style="margin-top:24px;">
      <ul>
        <li><a href="{{ route('home') }}">Back to Home</a></li>
        <li><a href="{{ route('lecturer.panel') }}">Manage Lecturers</a></li>
        <li><a href="{{ route('exam.timetable') }}">Manage Timetables</a></li>
      </ul>
    </div>
  </section>
@endsection
