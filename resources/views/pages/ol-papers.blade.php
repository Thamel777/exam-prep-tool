@extends('layouts.base')
@section('title', 'Past Papers - Cambridge O/L')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/past-papers.css') }}">
@endpush

@section('content')
  <section class="hero">
    <h2>Past Papers for Cambridge O Level Subjects</h2>
  </section>

  <section class="subjects wrapper">
    <div class="subject-card">
      <a href="#">
        <img src="{{ asset('images/acc-course.jpg') }}" alt="Accounting">
        <h3>Accounting</h3>
      </a>
    </div>

    <div class="subject-card">
      <a href="#">
        <img src="{{ asset('images/bio-course.jpg') }}" alt="Biology">
        <h3>Biology</h3>
      </a>
    </div>

    <div class="subject-card">
      <a href="#">
        <img src="{{ asset('images/bs-course.jpg') }}" alt="Business Studies">
        <h3>Business Studies</h3>
      </a>
    </div>

    <div class="subject-card">
      <a href="#">
        <img src="{{ asset('images/c8d4bfee165592ade90e026b24d25864.jpg') }}" alt="Mathematics">
        <h3>Mathematics</h3>
      </a>
    </div>

    <div class="subject-card">
      <a href="#">
        <img src="{{ asset('images/ict-course.jpg') }}" alt="Computer Science">
        <h3>Computer Science</h3>
      </a>
    </div>

    <div class="subject-card">
      <a href="#">
        <img src="{{ asset('images/eng-course.jpg') }}" alt="English">
        <h3>English</h3>
      </a>
    </div>
  </section>
@endsection
