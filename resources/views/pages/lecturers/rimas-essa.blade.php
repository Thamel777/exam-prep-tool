@extends('layouts.base')
@section('title', 'Lecture Profile - Rimas Essa')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/lecturer-profile.css') }}">
@endpush

@section('content')
  <section class="hero-section">
    <div class="overlay-text">Lecture Profile</div>
  </section>

  <section class="lecturer-profile wrapper">
    <div class="profile-card">
      <img src="{{ asset('images/689e5b2971577d707becb97405ede951.jpg') }}" alt="Rimas Essa" class="lecturer-photo">
      <div class="lecturer-details">
        <h2>Rimas Essa</h2>
        <p>
          The Finance Director, lecturer, and the brains of our institution, Rimas Eesa is a vibrant teacher with excellent skills in both the field of Accounting and in guiding his students through his motivational and inspiring life lessons here at Platinum Business Academy, the institute of excellence. While completing his global professional degree in Accounting through the Association of Chartered Certified Accountants, he has continuously kept his passion for teaching alive for more than 11 years.
        </p>
        <p>
          Rimas has constantly found more entertaining methods to make sure his students are understanding all the numbers. Despite of the group classes that he conducts, Rimas has always made a point to clear any extra doubts that students have and / or any type of guidance they require in life. This exceptional quality has made him very popular among the students. Through his motivation, his students have obtained a 100% pass rate every year, and many have gone up to winning world prizes in this field.
        </p>
        <a href="#" class="schedule-btn">📅 Schedule Meeting</a>
      </div>
    </div>
  </section>
@endsection
