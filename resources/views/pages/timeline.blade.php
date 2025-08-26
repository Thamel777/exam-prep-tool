@extends('layouts.base')
@section('title', 'My Timeline')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/meetings.css') }}">
@endpush

@section('content')
<section class="wrapper two-col" style="padding:28px 0;">
  <div class="col-left">
    <div class="timeline-header">
      <h1>My Timeline</h1>
      <a class="btn" href="{{ route('meetings.create') }}">+ Request Meeting</a>
    </div>

    @if(session('notice'))
      <div class="flash flash-warning">{{ session('notice') }}</div>
    @endif

    @forelse($meetings as $m)
      <article class="meeting-item">
        <div class="when">
          <div class="date">{{ optional($m->scheduled_at)->format('M d, Y') }}</div>
          <div class="time">{{ optional($m->scheduled_at)->format('h:i A') }}</div>
        </div>

        <div class="details">
          <h3 class="title">{{ $m->title ?? 'Meeting' }}</h3>
          <div class="meta">
            <span class="lecturer">👩‍🏫 {{ $m->lecturer->name ?? 'Lecturer' }}</span>
            <span class="badge
              {{ $m->status === 'approved' ? 'badge-approved' : '' }}
              {{ $m->status === 'pending'  ? 'badge-pending'  : '' }}
              {{ $m->status === 'rejected' ? 'badge-rejected' : '' }}
              {{ $m->status === 'cancelled'? 'badge-cancelled': '' }}">
              {{ ucfirst($m->status ?? 'pending') }}
            </span>
          </div>

          @if(!empty($m->description))
            <p class="desc">{{ $m->description }}</p>
          @endif

          @if(in_array($m->status, ['pending','approved']) && optional($m->scheduled_at)->isFuture())
            <div class="actions">
              <form method="POST" action="{{ route('meetings.cancel', $m) }}">
                @csrf
                <button type="submit" class="btn btn-outline">Cancel</button>
              </form>
            </div>
          @endif
        </div>
      </article>
    @empty
      <div class="empty">
        <p>No meetings yet.</p>
        <a class="btn" href="{{ route('meetings.create') }}">Request your first meeting</a>
      </div>
    @endforelse
  </div>

  <aside class="col-right">
    <div class="calendar-card">
      <div class="cal-header">
        <a class="cal-nav" href="{{ route('timeline', ['month' => $prevMonth]) }}">&laquo;</a>
        <div class="cal-title">{{ $monthStart->format('F Y') }}</div>
        <a class="cal-nav" href="{{ route('timeline', ['month' => $nextMonth]) }}">&raquo;</a>
      </div>

      <div class="cal-grid cal-weekdays">
        <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
      </div>

      @php
        $firstDW = (int)$monthStart->copy()->dayOfWeek;         // 0 Sun … 6 Sat
        $daysInMonth = (int)$monthStart->daysInMonth;
        $cursor = $monthStart->copy(); // day=1
      @endphp

      <div class="cal-grid cal-days">
        {{-- leading blanks --}}
        @for ($i = 0; $i < $firstDW; $i++)
          <div class="cal-cell cal-empty"></div>
        @endfor

        {{-- days --}}
        @for ($d = 1; $d <= $daysInMonth; $d++)
          @php
            $dateStr = $cursor->format('Y-m-d');
            $has = isset($meetingsByDate[$dateStr]);
            // Pick a status class: prefer approved > pending > rejected > cancelled if mixed
            $statusClass = '';
            if ($has) {
              $statuses = $meetingsByDate[$dateStr]->pluck('status')->unique()->all();
              if (in_array('approved',$statuses,true))   $statusClass = 'has-approved';
              elseif (in_array('pending',$statuses,true))$statusClass = 'has-pending';
              elseif (in_array('rejected',$statuses,true))$statusClass = 'has-rejected';
              elseif (in_array('cancelled',$statuses,true))$statusClass = 'has-cancelled';
            }
          @endphp

          <div class="cal-cell {{ $statusClass }}">
            <span class="day">{{ $d }}</span>
            @if($has)
              <span class="dot"></span>
            @endif
          </div>

          @php $cursor->addDay(); @endphp
        @endfor
      </div>

      <div class="cal-legend">
        <span><i class="dot dot-approved"></i> Approved</span>
        <span><i class="dot dot-pending"></i> Pending</span>
        <span><i class="dot dot-rejected"></i> Rejected</span>
        <span><i class="dot dot-cancelled"></i> Cancelled</span>
      </div>
    </div>
  </aside>
</section>
@endsection
