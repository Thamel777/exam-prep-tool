<?php

namespace App\Http\Controllers;
use App\Models\Lecturer;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    // List page (Lecture Panel)
    public function index()
    {
        $lecturers = Lecturer::orderBy('name')->get();
        return view('pages.lecturers.index', compact('lecturers'));
    }

    // Profile page
    public function show(string $slug)
    {
        $lecturer = Lecturer::where('slug', $slug)->firstOrFail();
        return view('pages.lecturers.show', compact('lecturer'));
    }
}
