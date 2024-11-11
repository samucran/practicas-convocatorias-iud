<?php

use App\Http\Controllers\ProfileController;

// llamado a los controladores
use App\Http\Controllers\facultyController;
use App\Http\Controllers\identityController;
use App\Http\Controllers\modalityController;
use App\Http\Controllers\agencyController;
use App\Http\Controllers\localityController;
use App\Http\Controllers\programController;
use App\Http\Controllers\convocationController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\convocationRelationController;
use App\Http\Controllers\curriculumController;
use App\Http\Controllers\recognitionController;
use App\Http\Controllers\referenceController;
use App\Http\Controllers\languageLevelController;
use App\Http\Controllers\workExperienceController;
use App\Http\Controllers\complementaryStudyController;
use App\Http\Controllers\studyController;

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
    Route::resource('/dashboard/convocationRelation', convocationRelationController::class);
    Route::resource('/dashboard/curriculum', curriculumController::class);
    Route::resource('/dashboard/recognition', recognitionController::class);
    Route::resource('/dashboard/reference', referenceController::class);
    Route::resource('/dashboard/languageLevel', languageLevelController::class);
    Route::resource('/dashboard/workExperience', workExperienceController::class);
    Route::resource('/dashboard/complementaryStudy', complementaryStudyController::class);
    Route::resource('/dashboard/study', studyController::class);
});

require __DIR__.'/auth.php';
