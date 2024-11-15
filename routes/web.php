<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [StudentController::class, 'login'])->name('login');
//Using authentication of laravel along with our middleware
Route::middleware(['auth:students', 'check_graduate:graduate'])->group(function () {
    Route::get('/graduate', function () {
        return view('graduate');
    })->name('graduate.page');
});

// Group routes for non-graduate access
Route::middleware(['auth:students', 'check_graduate:non-graduate'])->group(function () {
    Route::get('/non-graduate', function () {
        return view('non-graduate');
    })->name('non-graduate.page');
});
//using the session
// Route::get('/graduate', function () {
//     return view('graduate');
// })->name('graduate.page')->middleware('check.graduate');
// Route::get('/non-graduate', function () {
//     return view('non-graduate');
// })->name('non-graduate.page')->middleware('check.graduate');
Route::get('/logout', [StudentController::class, 'logout'])->name('logout');
