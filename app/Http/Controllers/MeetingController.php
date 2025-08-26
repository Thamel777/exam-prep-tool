<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;

class MeetingController extends Controller
{
    public function create(Request $request)
    {
        $lecturers = Lecturer::orderBy('name')->get(['id','name']);
        $prefillLecturerId = $request->integer('lecturer');
        return view('meetings.create', compact('lecturers','prefillLecturerId'));
    }

    public function store(Request $request)
    {
        // we’ll wire DB save later; for now just validate and redirect
        $request->validate([
            'lecturer_id'  => ['required','exists:lecturers,id'],
            'title'        => ['required','string','max:120'],
            'scheduled_at' => ['required','date','after:now'],
            'description'  => ['nullable','string','max:2000'],
        ]);

        return redirect()->route('timeline')->with('notice', 'Meeting request submitted (stub).');
    }
}
