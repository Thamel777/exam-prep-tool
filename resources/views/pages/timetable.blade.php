@extends('layouts.base')
@section('title', 'Exam Timetable 2025')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/timetable.css') }}">
@endpush

@section('content')
  <section class="hero">
    <h2>Exam Timetable 2025</h2>
  </section>

  <section class="timetable wrapper">
    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Subject</th>
          <th>Time</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>March 1, 2025</td>
          <td>Accounting</td>
          <td>9:00 AM – 12:00 PM</td>
        </tr>
        <tr>
          <td>March 3, 2025</td>
          <td>Biology</td>
          <td>9:00 AM – 12:00 PM</td>
        </tr>
        <tr>
          <td>March 5, 2025</td>
          <td>Business Studies</td>
          <td>1:00 PM – 4:00 PM</td>
        </tr>
        <tr>
          <td>March 7, 2025</td>
          <td>Mathematics</td>
          <td>9:00 AM – 12:00 PM</td>
        </tr>
        <tr>
          <td>March 9, 2025</td>
          <td>Computer Science</td>
          <td>1:00 PM – 4:00 PM</td>
        </tr>
        <tr>
          <td>March 11, 2025</td>
          <td>English</td>
          <td>9:00 AM – 12:00 PM</td>
        </tr>
      </tbody>
    </table>
  </section>
@endsection
