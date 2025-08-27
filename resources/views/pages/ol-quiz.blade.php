@extends('layouts.base')
@section('title', 'O/L MCQ Quiz')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
@endpush

@section('content')
  <section class="hero">
    <h2>O/L Test Your Knowledge with MCQs</h2>
  </section>

  <section class="subjects wrapper">
    <div class="subject-card">
      <a href="#"><img src="{{ asset('images/acc-course.jpg') }}" alt="Accounting"></a>
      <h3>Accounting</h3>
    </div>
    <div class="subject-card">
      <a href="#"><img src="{{ asset('images/bio-course.jpg') }}" alt="Biology"></a>
      <h3>Biology</h3>
    </div>
    <div class="subject-card">
      <a href="#"><img src="{{ asset('images/bs-course.jpg') }}" alt="Business Studies"></a>
      <h3>Business Studies</h3>
    </div>
    <div class="subject-card">
      <a href="#"><img src="{{ asset('images/c8d4bfee165592ade90e026b24d25864.jpg') }}" alt="Mathematics"></a>
      <h3>Mathematics</h3>
    </div>
    <div class="subject-card">
      <a href="#"><img src="{{ asset('images/ict-course.jpg') }}" alt="Computer Science"></a>
      <h3>Computer Science</h3>
    </div>
    <div class="subject-card">
      <a href="#"><img src="{{ asset('images/eng-course.jpg') }}" alt="English"></a>
      <h3>English</h3>
    </div>
  </section>
@endsection
