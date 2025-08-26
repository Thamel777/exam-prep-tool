@extends('layouts.base')
@section('title', 'Lecture Panel')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/lecturers.css') }}">
@endpush

@section('content')
  {{-- Hero / Banner --}}
  <section class="banner">
    <div class="overlay">
      <h1>Lecture Panel</h1>
    </div>
  </section>

  {{-- Cards --}}
  <section class="lecture-panel">
    <div class="container">
      <div class="lecturers-grid">

        {{-- Lecturer 1 --}}
        <div class="lecturer-card highlight">
          <a href="{{ route('lecturer.rimas') }}">
            <img src="{{ asset('images/689e5b2971577d707becb97405ede951.jpg') }}" alt="Rimas Essa">
          </a>
          <div class="info">
            <h3>Rimas Essa</h3>
            <p>ACCA Affiliate<br>Accounting<br><strong>Lecturer/Director</strong></p>
          </div>
        </div>

        {{-- Lecturer 2 --}}
        <div class="lecturer-card highlight">
          <a href="{{ route('lecturer.sahla') }}">
            <img src="{{ asset('images/4489ba241c9d7e0c1da1978d2e7f9d55.jpg') }}" alt="Sahla Mansoor">
          </a>
          <div class="info">
            <h3>Sahla Mansoor</h3>
            <p>ACCA<br>Mathematics<br><strong>Lecturer</strong></p>
          </div>
        </div>

        {{-- Lecturer 3 --}}
        <div class="lecturer-card highlight">
          <a href="{{ route('lecturer.shakeel') }}">
            <img src="{{ asset('images/1efa6eb23b8179f35f1920fcf47ca2b9.jpg') }}" alt="Shakeel Laleel">
          </a>
          <div class="info">
            <h3>Shakeel Laleel</h3>
            <p>Bachelor of Medicine and Surgery<br>Biology<br><strong>Lecturer</strong></p>
          </div>
        </div>

        {{-- Lecturer 4 --}}
        <div class="lecturer-card highlight">
          <a href="{{ route('lecturer.michelle') }}">
            <img src="{{ asset('images/2345f10bb948c5665ef91f6773b3e455.jpg') }}" alt="Michelle Thomasz">
          </a>
          <div class="info">
            <h3>Michelle Thomasz</h3>
            <p>BA in Education (USA)<br>Graduate English Teacher<br><strong>English Language Lecturer</strong></p>
          </div>
        </div>

        {{-- Lecturer 5 --}}
        <div class="lecturer-card highlight">
          <a href="{{ route('lecturer.sameer') }}">
            <img src="{{ asset('images/d524813536b71639999ba12bdb3621a8.jpg') }}" alt="Sameer Anis">
          </a>
          <div class="info">
            <h3>Sameer Anis</h3>
            <p>PGD in Business Administration (UoW)<br>Business Studies<br><strong>Lecturer/Director</strong></p>
          </div>
        </div>

        {{-- Lecturer 6 --}}
        <div class="lecturer-card highlight">
          <a href="{{ route('lecturer.sandamali') }}">
            <img src="{{ asset('images/bf9b9eff4d46d7eb96b60cb09c0cc7e3.jpg') }}" alt="Sandamali Ekanayake">
          </a>
          <div class="info">
            <h3>Sandamali Ekanayake</h3>
            <p>BSc(Hons) in Computing and Information Systems<br><strong>Computer Science Lecturer</strong></p>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
