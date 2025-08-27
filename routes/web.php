<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MeetingApprovalController;

Route::view('/', 'pages.home')->name('home');

// Past paper pages
Route::view('/ol-papers', 'pages.ol-papers')->name('ol.papers');
Route::view('/al-papers', 'pages.al-papers')->name('al.papers');

// Quiz pages
Route::view('/ol-quiz', 'pages.ol-quiz')->name('ol.quiz');
Route::view('/al-quiz', 'pages.al-quiz')->name('al.quiz');

// Timetable and other pages
Route::view('/exam-timetable', 'pages.timetable')->name('exam.timetable');
Route::view('/lecturer-panel', 'pages.lecturers')->name('lecturer.panel');

Route::view('/checklist', 'pages.checklist')->name('checklist');
Route::view('/timeline', 'pages.timeline')->name('timeline');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Panel (list)
Route::get('/lecturer-panel', [LecturerController::class, 'index'])
    ->name('lecturer.panel');

// Profile (dynamic)
Route::get('/lecturer/{slug}', [LecturerController::class, 'show'])
    ->name('lecturer.show');

// Meeting routes
Route::middleware('auth')->group(function () {
    Route::get('/timeline', [MeetingController::class, 'index'])->name('timeline');
    Route::get('/meetings/request', [MeetingController::class, 'create'])->name('meetings.create');
    Route::post('/meetings', [MeetingController::class, 'store'])->name('meetings.store');
    Route::post('/meetings/{meeting}/cancel', [MeetingController::class, 'cancel'])->name('meetings.cancel');
});


// Admin routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', function () {
        if (! auth()->user()->is_admin) return redirect()->route('home');
        return app(AdminDashboardController::class)->index();
    })->name('dashboard');

    Route::get('/meetings', function () {
        if (! auth()->user()->is_admin) return redirect()->route('home');
        return app(MeetingApprovalController::class)->index(request());
    })->name('meetings.index');

    Route::post('/meetings/{meeting}/approve', function (\App\Models\Meeting $meeting) {
        if (! auth()->user()->is_admin) return redirect()->route('home');
        return app(MeetingApprovalController::class)->approve($meeting);
    })->name('meetings.approve');

    Route::post('/meetings/{meeting}/reject', function (\Illuminate\Http\Request $request, \App\Models\Meeting $meeting) {
        if (! auth()->user()->is_admin) return redirect()->route('home');
        return app(MeetingApprovalController::class)->reject($request, $meeting);
    })->name('meetings.reject');
});

require __DIR__.'/auth.php';
