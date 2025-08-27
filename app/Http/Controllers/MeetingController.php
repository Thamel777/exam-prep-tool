<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\Meeting;

class MeetingController extends Controller
{
    // Timeline for logged-in student
    public function index(Request $request)
    {
        // Month to show (YYYY-MM), default = current month
        $monthStr = $request->query('month', now()->format('Y-m'));
        [$year, $month] = explode('-', $monthStr);
        $monthStart = Carbon::createFromDate((int)$year, (int)$month, 1)->startOfMonth();
        $monthEnd   = $monthStart->copy()->endOfMonth();

        // All my meetings (for the left timeline list)
        $meetings = Meeting::with('lecturer')
            ->where('user_id', auth()->id())
            ->orderByDesc('scheduled_at')
            ->get();

        // Meetings in the selected month (for the calendar)
        $monthMeetings = $meetings->filter(fn ($m) =>
            $m->scheduled_at && $m->scheduled_at->between($monthStart, $monthEnd)
        );

        // Group by date string "YYYY-MM-DD"
        $meetingsByDate = $monthMeetings->groupBy(fn ($m) => $m->scheduled_at->toDateString());

        // Prev/next month strings
        $prevMonth = $monthStart->copy()->subMonth()->format('Y-m');
        $nextMonth = $monthStart->copy()->addMonth()->format('Y-m');

        return view('pages.timeline', compact(
            'meetings', 'meetingsByDate', 'monthStart', 'prevMonth', 'nextMonth'
        ));
    }

    // Show request form
    public function create(Request $request)
    {
        $lecturers = Lecturer::orderBy('name')->get(['id','name']);
        $prefillLecturerId = $request->integer('lecturer');
        return view('meetings.create', compact('lecturers','prefillLecturerId'));
    }

    // Save a new meeting request
    public function store(Request $request)
    {
        $data = $request->validate([
            'lecturer_id'   => ['required','exists:lecturers,id'],
            'title'         => ['required','string','max:120'],
            'scheduled_at'  => ['required','date','after:now'],
            'description'   => ['nullable','string','max:2000'],
            'duration_minutes' => ['nullable','integer','min:15','max:240'],
        ]);

        $data['user_id'] = auth()->id();
        $data['status']  = Meeting::PENDING;
        $data['duration_minutes'] = $data['duration_minutes'] ?? 60;

        Meeting::create($data);

        return redirect()->route('timeline')
            ->with('notice', 'Meeting request submitted. Waiting for admin approval.');
    }

    // (Optional) cancel by student
    public function cancel(Meeting $meeting)
    {
        abort_unless($meeting->user_id === auth()->id(), 403);
        if ($meeting->status === Meeting::APPROVED || $meeting->status === Meeting::PENDING) {
            $meeting->update(['status' => Meeting::CANCELLED]);
        }
        return back()->with('notice', 'Meeting cancelled.');
    }
}

