@extends('layouts.base')

@section('title', 'Save My Exam - Home')

@section('content')
<section class="hero">
  <h2>Welcome to Save My Exam</h2>
  <p>Find your O/L and A/L past papers, timetables, and exam resources – all in one place.</p>
  <div class="buttons">
    <a href="{{ route('ol.papers') }}" class="btn">Browse O/L Papers</a>
    <a href="{{ route('al.papers') }}" class="btn">Browse A/L Papers</a>
  </div>
</section>
@endsection
