@extends('layouts.base')
@section('title', 'A/L MCQ Quiz')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
@endpush

@section('content')
  <section class="hero">
    <h2>A/L Test Your Knowledge with MCQs</h2>
  </section>

  <section class="subjects wrapper">
    <div class="subject-card"><a href="#"><img src="{{ asset('images/acc-course.jpg') }}" alt="Accounting"><p>ACCOUNTING</p></a></div>
    <div class="subject-card"><a href="#"><img src="{{ asset('images/bio-course.jpg') }}" alt="Biology"><p>BIOLOGY</p></a></div>
    <div class="subject-card"><a href="#"><img src="{{ asset('images/bs-course.jpg') }}" alt="Business Studies"><p>BUSINESS STUDIES</p></a></div>
    <div class="subject-card"><a href="#"><img src="{{ asset('images/c8d4bfee165592ade90e026b24d25864.jpg') }}" alt="Mathematics"><p>MATHEMATICS</p></a></div>
    <div class="subject-card"><a href="#"><img src="{{ asset('images/ict-course.jpg') }}" alt="Computer Science"><p>COMPUTER SCIENCE</p></a></div>
    <div class="subject-card"><a href="#"><img src="{{ asset('images/eng-course.jpg') }}" alt="English"><p>ENGLISH</p></a></div>
  </section>
@endsection
