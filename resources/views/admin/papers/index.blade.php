@extends('layouts.admin')
@section('title','Past Papers')

@section('content')
  <h1>Past Papers</h1>

  <p><a class="btn btn-primary" href="{{ route('admin.papers.create') }}">+ Upload Paper</a></p>

  @if(session('notice')) <div class="flash">{{ session('notice') }}</div> @endif

  <table class="table">
    <thead><tr>
      <th>Title</th><th>Subject</th><th>Year</th><th>Session</th><th>Type</th><th>Published</th><th>Actions</th>
    </tr></thead>
    <tbody>
      @forelse($papers as $p)
        <tr>
          <td>{{ $p->title }}</td>
          <td>{{ $p->subject->name }} ({{ $p->subject->level }})</td>
          <td>{{ $p->year }}</td>
          <td>{{ $p->session }}</td>
          <td>{{ $p->type }}</td>
          <td>{{ $p->is_published ? 'Yes' : 'No' }}</td>
          <td class="actions">
            <a class="btn btn-light" href="{{ route('admin.papers.edit',$p) }}">Edit</a>
            <form method="POST" action="{{ route('admin.papers.destroy',$p) }}" onsubmit="return confirm('Delete this paper?')" style="display:inline">
              @csrf @method('DELETE')
              <button class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="7">No papers yet.</td></tr>
      @endforelse
    </tbody>
  </table>

  <div style="margin-top:12px">{{ $papers->links() }}</div>
@endsection
