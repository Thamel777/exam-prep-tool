@extends('layouts.base')
@section('title', ($level==='OL'?'O/L':'A/L').' Past Papers')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/papers.css') }}">
@endpush

@section('content')
<section class="banner"><div class="overlay"><h1>Past Papers for Cambridge {{ $level==='OL'?'O Level':'A Level' }} Subjects</h1></div></section>

<section class="wrapper">
  <div class="card-grid">
    @foreach($subjects as $s)
      <a class="card" href="{{ $level==='OL' ? route('ol.papers.list',$s->slug) : route('al.papers.list',$s->slug) }}">
        <img src="{{ $s->hero_image ? asset('images/'.$s->hero_image) : asset('images/subject-placeholder.jpg') }}" alt="{{ $s->name }}">
        <div class="card-body"><h3>{{ $s->name }}</h3></div>
      </a>
    @endforeach
  </div>
</section>
@endsection
