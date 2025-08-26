@extends('layouts.base')
@section('title', 'Lecture Profile - Sandamali Ekanayake')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/lecturer-profile.css') }}">
@endpush

@section('content')
  <section class="hero-section">
    <div class="overlay-text">Lecture Profile</div>
  </section>

  <section class="lecturer-profile wrapper">
    <div class="profile-card">
      <img src="{{ asset('images/bf9b9eff4d46d7eb96b60cb09c0cc7e3.jpg') }}" alt="Sandamali Ekanayake" class="lecturer-photo">
      <div class="lecturer-details">
        <h2>Sandamali Ekanayake</h2>
        <p>
          Sandamali Ekanayake is an expert in computer science, considering her passion and experience. She has completed her BSc (Hons) in Computing and Information Systems - London Metropolitan University (UK), BTEC Edexcel - HNC & HND. Former Computer Science Lecturer/Internal Verifier (BTEC Edexcel – HNC & HND) and has been a coordinator & chief examiner at a leading international school (Lyceum) in the past years.
        </p>
        <p>
          She has gained through teaching for more than 12 years allowing her students to improve and grow along with pushing them towards perfection. This has been her key motive with understanding and identifying their capabilities, so she can help them better as this is one of her most admired efforts. She has also maintained a 90% pass rate throughout these years and produced a prize consecutively from the years 2011 to 2014 and in the year 2016 and many more. This shows the effort she puts in every student of hers regardless of their background knowledge in the subject.
        </p>
        <a href="#" class="schedule-btn">📅 Schedule Meeting</a>
      </div>
    </div>
  </section>
@endsection
