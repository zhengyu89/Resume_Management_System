<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TalentSearchController;
use Illuminate\Support\Facades\Route;

// add page c&p this one
Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/talent_search', [TalentSearchController::class, 'index'])->name('talent_search');

Route::get('/FAQ', function () {
    return view('FAQ');
})->name('FAQ');

Route::get('/dashboard', [ProfileController::class, 'showProfile'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
