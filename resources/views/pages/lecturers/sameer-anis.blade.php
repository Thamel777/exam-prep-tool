@extends('layouts.base')
@section('title', 'Lecture Profile - Sameer Anis')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/lecturer-profile.css') }}">
@endpush

@section('content')
  <section class="hero-section">
    <div class="overlay-text">Lecture Profile</div>
  </section>

  <section class="lecturer-profile wrapper">
    <div class="profile-card">
      <img src="{{ asset('images/d524813536b71639999ba12bdb3621a8.jpg') }}" alt="Sameer Anis" class="lecturer-photo">
      <div class="lecturer-details">
        <h2>Sameer Anis</h2>
        <p>
          Sameer Anis is the perfectionist of this institute. In regard with his subject, Business Studies, he has always strived towards flawlessness and setting high performance standards, accompanied by critical self-evaluations. Regardless of his extensive knowledge his OCD will make him practice until perfect which thus makes him the best at whatever he does. Sameer Anis has been in the corporate industry for over three years which has given him the ability to convey his subject matters through real life experiences and examples that the students love to know about as it creates a visual representation that enhances understanding. Not just it, but he also has continued inspiring students for over more than eight years through his interactive teaching skills and his enthusiasm.
        </p>
        <p>
          Regardless of the hundreds of students that he teaches, he has made a place in the heart of every student through individual attention and motivation if needed. This has encouraged students to grow their capabilities and winning many island wide and worldwide prizes.
        </p>
        <a href="#" class="schedule-btn">📅 Schedule Meeting</a>
      </div>
    </div>
  </section>
@endsection
