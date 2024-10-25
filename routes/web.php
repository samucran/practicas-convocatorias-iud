<?php

use App\Http\Controllers\ProfileController;

//
use App\Http\Controllers\facultyController;
use App\Http\Controllers\identityController;
use App\Http\Controllers\modalityController;
use App\Http\Controllers\agencyController;
use App\Http\Controllers\localityController;
use App\Http\Controllers\programController;
use App\Http\Controllers\convocationController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\studentController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // rutas de los controladores:
    Route::resource('/dashboard/faculty', facultyController::class);
    Route::resource('/dashboard/identity', identityController::class);
    Route::resource('/dashboard/modality', modalityController::class);
    Route::resource('/dashboard/agency', agencyController::class);
    Route::resource('/dashboard/locality', localityController::class);
    Route::resource('/dashboard/program', programController::class);
    Route::resource('/dashboard/convocation', convocationController::class);
    Route::resource('/dashboard/file', fileController::class);
    Route::resource('/dashboard/student', studentController::class);
});

require __DIR__.'/auth.php';
