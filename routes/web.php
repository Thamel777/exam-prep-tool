<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\Admin\PaperController;
use App\Http\Controllers\PaperBrowseController;
use App\Http\Controllers\PaperDownloadController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MeetingApprovalController;

Route::view('/', 'pages.home')->name('home');

// Public past-paper browsing
Route::get('/ol-papers', [PaperBrowseController::class,'subjects'])
    ->defaults('level','OL')->name('ol.papers');

Route::get('/al-papers', [PaperBrowseController::class,'subjects'])
    ->defaults('level','AL')->name('al.papers');

Route::get('/ol-papers/{subject:slug}', [PaperBrowseController::class,'list'])
    ->defaults('level','OL')->name('ol.papers.list');

Route::get('/al-papers/{subject:slug}', [PaperBrowseController::class,'list'])
    ->defaults('level','AL')->name('al.papers.list');

// Paper download (with access control)
Route::get('/papers/{paper}/download', [PaperDownloadController::class,'download'])
    ->name('papers.download');


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

    Route::get('/papers',           [PaperController::class, 'index'])->name('papers.index');
    Route::get('/papers/create',    [PaperController::class, 'create'])->name('papers.create');
    Route::post('/papers',          [PaperController::class, 'store'])->name('papers.store');
    Route::get('/papers/{paper}/edit', [PaperController::class, 'edit'])->name('papers.edit');
    Route::put('/papers/{paper}',   [PaperController::class, 'update'])->name('papers.update');
    Route::delete('/papers/{paper}',[PaperController::class, 'destroy'])->name('papers.destroy');
});

require __DIR__.'/auth.php';
