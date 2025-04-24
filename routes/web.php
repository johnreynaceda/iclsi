<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    switch (auth()->user()->user_type) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'teacher':
            return redirect()->route('teacher.dashboard');
        case 'parent':
            return redirect()->route('parent.dashboard');
        default:
            # code...
            break;
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('administrator')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/student-information', function () {
        return view('admin.student');
    })->name('admin.student');
    Route::get('/setting', function () {
        return view('admin.setting');
    })->name('admin.setting');
    Route::get('/report', function () {
        return view('admin.report');
    })->name('admin.report');
    Route::get('/grade-level', function () {
        return view('admin.gradeLevel.list');
    })->name('admin.grade_level');
    Route::get('/create/grade-level', function () {
        return view('admin.gradeLevel.create');
    })->name('admin.create-grade_level');
    Route::get('/teacher', function () {
        return view('admin.teacher.list');
    })->name('admin.teacher');
    Route::get('/events', function () {
        return view('admin.events');
    })->name('admin.events');
    Route::get('/reports', function () {
        return view('admin.reports');
    })->name('admin.reports');

});

Route::prefix('teacher')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('teacher.dashboard');
    })->name('teacher.dashboard');
    Route::get('/student', function () {
        return view('teacher.students');
    })->name('teacher.students');
    Route::get('/announcements', function () {
        return view('teacher.announcements');
    })->name('teacher.announcements');
    Route::get('/announcements/create', function () {
        return view('teacher.announcement-create');
    })->name('teacher.announcement-create');
    Route::get('/attendance', function () {
        return view('teacher.attendance');
    })->name('teacher.attendance');
});
Route::prefix('parent')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('parent.dashboard');
    })->name('parent.dashboard');
    Route::get('/attendance', function () {
        return view('parent.attendance');
    })->name('parent.attendance');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
