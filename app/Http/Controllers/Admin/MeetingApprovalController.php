<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingApprovalController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status','pending');

        $meetings = Meeting::with(['user','lecturer'])
            ->when($status, fn($q)=>$q->where('status',$status))
            ->orderBy('scheduled_at')
            ->paginate(12);

        return view('admin.meetings.index', compact('meetings','status'));
    }

    public function approve(Meeting $meeting)
    {
        $meeting->update([
            'status'      => 'approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
            'rejection_reason' => null,
        ]);
        return back()->with('notice','Meeting approved.');
    }

    public function reject(Request $request, Meeting $meeting)
    {
        $meeting->update([
            'status'      => 'rejected',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
            'rejection_reason' => $request->string('reason')->toString(),
        ]);
        return back()->with('notice','Meeting rejected.');
    }
}
