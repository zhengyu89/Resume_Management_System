<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TalentSearchController;
use Illuminate\Support\Facades\Route;

// Dashboard 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserResumeController;
use App\Http\Controllers\UserDocumentController;
use App\Http\Controllers\UserEducationController;
use App\Http\Controllers\UserWorkExperienceController;
use App\Http\Controllers\UserLanguageController;
use App\Http\Controllers\AdminController;

// add page c&p this one
Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/talent_search', [TalentSearchController::class, 'index'])->name('talent_search');

Route::get('/FAQ', function () {
    return view('FAQ');
})->name('FAQ');

Route::get('profile/{id}', [DashboardController::class, 'profile'])->name('profile');

Route::middleware(['auth', 'verified'])->prefix('dashboard/profile')->name('dashboard.')->group(function () {
    // Dashboard Home
    Route::get('/{id}', [DashboardController::class, 'show'])->name('show');
    Route::delete('/', [DashboardController::class, 'destroy'])->name('destroy');

    // Resource Routes
    Route::resource('resume', UserResumeController::class);
    Route::resource('documents', UserDocumentController::class);
    Route::resource('educations', UserEducationController::class);
    Route::resource('workExperiences', UserWorkExperienceController::class);
    Route::resource('languages', UserLanguageController::class);
});

// Admin Dashboard Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Language Management
    Route::post('/languages', [AdminController::class, 'addLanguage'])->name('admin.languages.add');
    Route::delete('/languages/{language}', [AdminController::class, 'deleteLanguage'])->name('admin.languages.delete');

    // Study Field Management
    Route::post('/study-fields', [AdminController::class, 'addStudyField'])->name('admin.study-fields.add');
    Route::delete('/study-fields/{studyField}', [AdminController::class, 'deleteStudyField'])->name('admin.study-fields.delete');

    // User Management
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
});

require __DIR__ . '/auth.php';
