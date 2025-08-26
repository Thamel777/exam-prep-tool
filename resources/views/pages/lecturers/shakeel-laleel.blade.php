@extends('layouts.base')
@section('title', 'Lecture Profile - Shakeel Laleel')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/lecturer-profile.css') }}">
@endpush

@section('content')
  <section class="hero-section">
    <div class="overlay-text">Lecture Profile</div>
  </section>

  <section class="lecturer-profile wrapper">
    <div class="profile-card">
      <img src="{{ asset('images/1efa6eb23b8179f35f1920fcf47ca2b9.jpg') }}" alt="Shakeel Laleel" class="lecturer-photo">
      <div class="lecturer-details">
        <h2>Shakeel Laleel</h2>
        <p>
          Would you believe it? We have a bona fide Doctor in the house! Dr Shakeel Jaleel completed his schooling in the Middle East and attended medical school in Sri Lanka, having graduated from the Faculty of Medicine, University of Kelaniya, in 2019. His experience in medical school certainly serves as a boon as he is able to relate the subject of Biology to students in ways that would help them assimilate knowledge in practical ways. His teaching involves PowerPoint presentations, dissections of real organs, real life examples of how the Biology syllabus relates to patients he has treated and patients whom students would come across as potential doctors.
        </p>
        <p>
          Also, he has a personal set of human bones from college that he uses to help students understand body structures better. How awesome and scary is that? He currently works for the Emergency Treatment Unit at the National Hospital of Sri Lanka, Colombo and intends to expand his teaching to the areas of Pre Medicine and Medicine. He manoeuvres through his life as a medical practitioner and teacher through this simple motto - treat all lives as one: a good human makes a good doctor.
        </p>
        <a href="#" class="schedule-btn">📅 Schedule Meeting</a>
      </div>
    </div>
  </section>
@endsection
