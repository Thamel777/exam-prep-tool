@extends('layouts.base')
@section('title', 'Lecture Profile - '.$lecturer->name)

@push('head')
  <link rel="stylesheet" href="{{ asset('css/lecturer-profile.css') }}">
@endpush

@section('content')
  <section class="hero-section">
    <div class="overlay-text">Lecture Profile</div>
  </section>

  <section class="lecturer-profile wrapper">
    <div class="profile-card">
      <img src="{{ asset('images/'.$lecturer->photo_path) }}"
           alt="{{ $lecturer->name }}"
           class="lecturer-photo">

      <div class="lecturer-details">
        <h2>{{ $lecturer->name }}</h2>
        @if($lecturer->title) <p><strong>{{ $lecturer->title }}</strong></p> @endif
        @if($lecturer->subject) <p>{{ $lecturer->subject }}</p> @endif

        @if($lecturer->bio)
          <p>{!! nl2br(e($lecturer->bio)) !!}</p>
        @endif

        <a href="{{ route('meetings.create', ['lecturer' => $lecturer->id]) }}"
           class="schedule-btn">📅 Schedule Meeting</a>
      </div>
    </div>
  </section>
@endsection
