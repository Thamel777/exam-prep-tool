@extends('layouts.base')
@section('title', 'Request a Meeting')

@section('content')
<section class="wrapper" style="padding:32px 0;">
  <h1>Request a Meeting</h1>

  <form method="POST" action="{{ route('meetings.store') }}" style="max-width:720px;margin-top:16px;">
    @csrf

    <label>Lecturer</label><br>
    <select name="lecturer_id" required>
      <option value="">-- Select Lecturer --</option>
      @foreach($lecturers as $l)
        <option value="{{ $l->id }}" @selected(old('lecturer_id', $prefillLecturerId) == $l->id)>{{ $l->name }}</option>
      @endforeach
    </select>
    @error('lecturer_id') <div style="color:#c00">{{ $message }}</div> @enderror
    <br><br>

    <label>Title</label><br>
    <input type="text" name="title" value="{{ old('title') }}" required style="width:100%;">
    @error('title') <div style="color:#c00">{{ $message }}</div> @enderror
    <br><br>

    <label>Date & Time</label><br>
    <input type="datetime-local" name="scheduled_at" value="{{ old('scheduled_at') }}" required>
    @error('scheduled_at') <div style="color:#c00">{{ $message }}</div> @enderror
    <br><br>

    <label>Description (optional)</label><br>
    <textarea name="description" rows="5" style="width:100%">{{ old('description') }}</textarea>
    @error('description') <div style="color:#c00">{{ $message }}</div> @enderror
    <br>

    <button class="btn" type="submit">Submit Request</button>
    <a class="btn" href="{{ route('lecturer.panel') }}" style="margin-left:8px;">Cancel</a>
  </form>
</section>
@endsection
