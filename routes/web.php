<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\InstructorDashboardController;
use App\Http\Controllers\StudentDashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web', 'verified'])->name('dashboard');

/**
 * -----------------------------------------
 * Student Routes
 * -----------------------------------------
*/
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:student'], 'prefix' => 'student','as' => 'student.'], function(){
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
});


/**
 * -----------------------------------------
 * Instructor Routes
 * -----------------------------------------
*/
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:instructor'], 'prefix' => 'instructor', 'as' => 'instructor.'], function(){
    Route::get('/dashboard', [InstructorDashboardController::class, 'index'])->name('dashboard');
});


Route::get('/', [FrontendController::class, 'index'])->name('home');


// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth:admin', 'verified'])->name('admin.dashboard');


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

