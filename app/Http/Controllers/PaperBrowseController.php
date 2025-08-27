<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\PastPaper;

class PaperBrowseController extends Controller
{
    public function subjects(string $level)
    {
        abort_unless(in_array($level, ['OL','AL'], true), 404);

        $subjects = Subject::where('level', $level)
            ->orderBy('name')
            ->get();

        return view('papers.subjects', compact('level','subjects'));
    }

    public function list(Subject $subject, string $level)
    {
        abort_unless(in_array($level, ['OL','AL'], true), 404);

        if ($subject->level !== $level) {
            abort(404);
        }

        $papers = PastPaper::whereBelongsTo($subject)
            ->where('is_published', true)
            ->when(request('year'), fn($q,$y)=>$q->where('year',$y))
            ->when(request('type'), fn($q,$t)=>$q->where('type',$t))
            ->when(request('session'), fn($q,$s)=>$q->where('session',$s))
            ->orderByDesc('year')->orderBy('session')->orderBy('type')
            ->paginate(24)->withQueryString();

        $years    = PastPaper::whereBelongsTo($subject)->pluck('year')->unique()->sortDesc()->values();
        $types    = ['Syllabus','Notes'];
        $sessions = ['Feb/Mar','May/Jun','Oct/Nov','OnDemand'];

        return view('papers.list', [
            'level'    => $level,
            'subject'  => $subject,
            'papers'   => $papers,
            'years'    => $years,
            'types'    => $types,
            'sessions' => $sessions,
        ]);
    }
}
