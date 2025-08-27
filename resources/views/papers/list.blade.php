@extends('layouts.base')
@section('title', $subject->name.' - '.($level==='OL'?'O/L':'A/L').' Past Papers')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/papers.css') }}">
@endpush

@section('content')
<section class="banner"><div class="overlay"><h1>{{ $subject->name }} — {{ $level==='OL'?'O/L':'A/L' }}</h1></div></section>

<section class="wrapper">
  <form method="GET" class="filters">
    <select name="year">
      <option value="">Year</option>
      @foreach($years as $y)
        <option value="{{ $y }}" @selected(request('year')==$y)>{{ $y }}</option>
      @endforeach
    </select>
    <select name="session">
      <option value="">Session</option>
      @foreach($sessions as $s)
        <option @selected(request('session')==$s)>{{ $s }}</option>
      @endforeach
    </select>
    <select name="type">
      <option value="">Type</option>
      @foreach($types as $t)
        <option @selected(request('type')==$t)>{{ $t }}</option>
      @endforeach
    </select>
    <button class="btn">Filter</button>
    <a class="btn btn-outline" href="{{ url()->current() }}">Reset</a>
  </form>

  <div class="paper-list">
    @forelse($papers as $p)
      <div class="paper-row">
        <div class="meta">
          <div class="title">{{ $p->title }}</div>
          <div class="sub">{{ $p->year }} • {{ $p->session }} • {{ $p->type }} @if($p->variant) • Var {{ $p->variant }} @endif</div>
        </div>
        <div class="actions">
           <a class="btn" href="{{ route('papers.download',$p) }}">Download</a>
        </div>
      </div>
    @empty
      <p>No papers found.</p>
    @endforelse
  </div>

  <div class="pagination">{{ $papers->links() }}</div>
</section>
@endsection
