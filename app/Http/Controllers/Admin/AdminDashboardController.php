<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // quick stats
        $total     = Meeting::count();
        $pending   = Meeting::where('status','pending')->count();
        $approved  = Meeting::where('status','approved')->count();
        $rejected  = Meeting::where('status','rejected')->count();

        // latest pending
        $latestPending = Meeting::with(['user','lecturer'])
            ->where('status','pending')
            ->orderBy('scheduled_at')
            ->limit(8)
            ->get();

        return view('admin.dashboard', compact('total','pending','approved','rejected','latestPending'));
    }
}
