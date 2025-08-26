<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;

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

// Lecturer profiles
Route::prefix('lecturer')->name('lecturer.')->group(function () {
    Route::view('/rimas-essa', 'pages.lecturers.rimas-essa')->name('rimas');
    Route::view('/sahla-mansoor', 'pages.lecturers.sahla-mansoor')->name('sahla');
    Route::view('/shakeel-laleel', 'pages.lecturers.shakeel-laleel')->name('shakeel');
    Route::view('/michelle-thomasz', 'pages.lecturers.michelle-thomasz')->name('michelle');
    Route::view('/sameer-anis', 'pages.lecturers.sameer-anis')->name('sameer');
    Route::view('/sandamali-ekanayake', 'pages.lecturers.sandamali-ekanayake')->name('sandamali');
});


// Admin routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', function () {
        if (! auth()->user()->is_admin) {
            return redirect()->route('home')->with('notice', 'Admins only.');
        }
        return app(AdminDashboardController::class)->index();
    })->name('dashboard');
});

require __DIR__.'/auth.php';
