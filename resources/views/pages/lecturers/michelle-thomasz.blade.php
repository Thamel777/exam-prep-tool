@extends('layouts.base')
@section('title', 'Lecture Profile - Michelle Thomasz')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/lecturer-profile.css') }}">
@endpush

@section('content')
  <section class="hero-section">
    <div class="overlay-text">Lecture Profile</div>
  </section>

  <section class="lecturer-profile wrapper">
    <div class="profile-card">
      <img src="{{ asset('images/2345f10bb948c5665ef91f6773b3e455.jpg') }}" alt="Michelle Thomasz" class="lecturer-photo">
      <div class="lecturer-details">
        <h2>Michelle Thomasz</h2>
        <p>
          Michelle Thomasz is a very calm and composed lecturer and is always conveying her efforts in the most comprehensive manner. She is a Graduate English Teacher from Sri Lanka with an Associate degree in early childhood education - USA and has completed her BA in Education – USA. Her motive towards building the language skills in her students has kept her going for several years in the field of teaching. An annual 100% pass rate has proven all her investments in every student and has demonstrated her efforts.
        </p>
        <p>
          She possesses a talent to develop inspiring lessons for her students to learn from and grow into better individuals with a wider perspective in the areas of English language & literature. Michelle is always motivated to teach and is constantly taking time out of her class hours to personally contact the students to make sure they have understood the relevant topic before starting another. This has made her connect with every student on another level.
        </p>
        <a href="#" class="schedule-btn">📅 Schedule Meeting</a>
      </div>
    </div>
  </section>
@endsection
