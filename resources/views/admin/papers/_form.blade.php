<form method="POST" action="{{ $route }}" enctype="multipart/form-data" class="admin-form grid">
  @csrf
  @if($method !== 'POST') @method($method) @endif

  <h2 class="full">{{ $method==='POST' ? 'Upload New Paper' : 'Edit Paper' }}</h2>

  {{-- LEFT COLUMN --}}
  <div class="form-group half">
    <label>Subject</label>
    <select name="subject_id" required>
      <option value="">-- Select --</option>
      @foreach($subjects as $s)
        <option value="{{ $s->id }}" @selected(old('subject_id', $paper->subject_id ?? null) == $s->id)>
          {{ $s->name }} ({{ $s->level }})
        </option>
      @endforeach
    </select>
    @error('subject_id')<div class="flash">{{ $message }}</div>@enderror
  </div>

  <div class="form-group half">
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title',$paper->title ?? '') }}" required>
    @error('title')<div class="flash">{{ $message }}</div>@enderror
  </div>

  <div class="form-group half">
    <label>Year</label>
    <input type="number" name="year" value="{{ old('year',$paper->year ?? now()->year) }}" required>
    @error('year')<div class="flash">{{ $message }}</div>@enderror
  </div>

  <div class="form-group half">
    <label>Session</label>
    <select name="session" required>
      @foreach(['Feb/Mar','May/Jun','Oct/Nov','OnDemand'] as $s)
        <option @selected(old('session',$paper->session ?? '')==$s)>{{ $s }}</option>
      @endforeach
    </select>
    @error('session')<div class="flash">{{ $message }}</div>@enderror
  </div>

  <div class="form-group half">
    <label>Type</label>
    <select name="type" required>
      @foreach(['Syllabus','Notes'] as $t)
        <option @selected(old('type',$paper->type ?? '')==$t)>{{ $t }}</option>
      @endforeach
    </select>
    @error('type')<div class="flash">{{ $message }}</div>@enderror
  </div>

  <div class="form-group half">
    <label>Paper Code (optional)</label>
    <input type="text" name="paper_code" value="{{ old('paper_code',$paper->paper_code ?? '') }}">
  </div>

  <div class="form-group half">
    <label>Variant (optional)</label>
    <input type="text" name="variant" value="{{ old('variant',$paper->variant ?? '') }}">
  </div>

  {{-- RIGHT COLUMN --}}
  <div class="form-group half">
    <label>PDF File {{ $method==='POST' ? '(required)' : '(upload to replace)' }}</label>
    <input type="file" name="file" accept="application/pdf" {{ $method==='POST' ? 'required' : '' }}>
    @error('file')<div class="flash">{{ $message }}</div>@enderror
  </div>

  <div class="form-group half checkbox" style="align-self:center;">
    <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published',$paper->is_published ?? true) ? 'checked' : '' }}>
    <label for="is_published" style="margin:0;">Published</label>
  </div>

  {{-- FULL-WIDTH ACTIONS --}}
  <div class="btn-row full">
    <button class="btn btn-primary" type="submit">{{ $method==='POST' ? 'Upload' : 'Save changes' }}</button>
    <a class="btn btn-light" href="{{ route('admin.papers.index') }}">Cancel</a>
    @isset($paper)
      <span style="color:#6b7280;font-size:12px;margin-left:auto;">
        File size: {{ number_format(($paper->file_size ?? 0)/1024, 0) }} KB
      </span>
    @endisset
  </div>
</form>
