@extends('layouts.base')
@section('title', 'Lecture Profile - Sahla Mansoor')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/lecturer-profile.css') }}">
@endpush

@section('content')
  <section class="hero-section">
    <div class="overlay-text">Lecture Profile</div>
  </section>

  <section class="lecturer-profile wrapper">
    <div class="profile-card">
      <img src="{{ asset('images/4489ba241c9d7e0c1da1978d2e7f9d55.jpg') }}" alt="Sahla Mansoor" class="lecturer-photo">
      <div class="lecturer-details">
        <h2>Sahla Mansoor</h2>
        <p>
          A calm yet a very persuading character, Sahla Mansoor is a world prize winner for Mathematics at the London Edexcel curriculum and has completed her global Accounting degree through the Association of Certified Chartered Accountants,
          proving her skill with numbers. She has also won Sri Lankan Prize Winner for Performance Management (ACCA), Sri Lankan Prize Winner for Advanced Financial Management (ACCA) and NCC High Achiever at Gateway school of Computing.
          This level of achievement is remarkable.
        </p>
        <p>
          She has continued teaching for the past 5 years and is still enthusiastic about every lecture that she conducts. Teaching has been her passion more than it being a profession.
          She has always worked towards making the most complicated thing look easy and possible. Catering to the individual needs of every student and making them believe that they are nothing less than capable.
          Her goal is to contribute to the success journey of her students, turning negatives into positives.
        </p>
        <a href="#" class="schedule-btn">📅 Schedule Meeting</a>
      </div>
    </div>
  </section>
@endsection
