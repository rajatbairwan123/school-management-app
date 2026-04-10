<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SectionController;


Route::get('/', function () {
    return redirect('/doonschool/login'); // default school
});


Route::prefix('{school}')
    ->middleware(['school'])
    ->group(function () {

        Route::middleware(['auth'])->group(function () {

            // Dashboard
            Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('dashboard');

            // Profile
            Route::get('/profile', [ProfileController::class, 'edit'])
                ->name('profile.edit');

            Route::patch('/profile', [ProfileController::class, 'update'])
                ->name('profile.update');

            Route::delete('/profile', [ProfileController::class, 'destroy'])
                ->name('profile.destroy');

            // Students
            Route::resource('students', StudentController::class);

            // Classes
            Route::resource('classes', SchoolClassController::class);

            // Sections
            Route::resource('sections', SectionController::class);
        });
    });


Route::get('/get-sections/{id}', [StudentController::class, 'getSections']);

require __DIR__ . '/auth.php';
