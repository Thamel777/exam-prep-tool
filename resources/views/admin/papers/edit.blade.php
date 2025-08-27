@extends('layouts.admin')
@section('title','Edit Paper')

@section('content')
  <h1>Edit Paper</h1>
  @include('admin.papers._form', ['route' => route('admin.papers.update',$paper), 'method' => 'PUT'])
@endsection
