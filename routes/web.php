<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ImportCourseController;
use App\Http\Controllers\CourseworkController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/import', [ImportCourseController::class, 'index'])->name('import.index');
    Route::get('/coursework', [CourseworkController::class, 'index'])->name('coursework.index');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});


Route::get('course/{id}', function ($id) {
    return $id;
});
