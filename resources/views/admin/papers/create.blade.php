@extends('layouts.admin')
@section('title','Upload Paper')

@section('content')
  @include('admin.papers._form', ['route' => route('admin.papers.store'), 'method' => 'POST'])
@endsection
