@extends('layouts.base')
@section('title', 'Lecture Panel')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/lecturers.css') }}">
@endpush

@section('content')
  <section class="banner">
    <div class="overlay"><h1>Lecture Panel</h1></div>
  </section>

  <section class="lecture-panel">
    <div class="container">
      <div class="lecturers-grid">
        @forelse($lecturers as $lect)
          <div class="lecturer-card highlight">
            <a href="{{ route('lecturer.show', $lect->slug) }}">
              <img src="{{ asset('images/'.$lect->photo_path) }}" alt="{{ $lect->name }}">
            </a>
            <div class="info">
              <h3><a href="{{ route('lecturer.show', $lect->slug) }}">{{ $lect->name }}</a></h3>
              <p>
                @if($lect->title) {{ $lect->title }}<br> @endif
                @if($lect->subject) {{ $lect->subject }}<br> @endif
                <strong>Lecturer</strong>
              </p>
            </div>
          </div>
        @empty
          <p>No lecturers found.</p>
        @endforelse
      </div>
    </div>
  </section>
@endsection
