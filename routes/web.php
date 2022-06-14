<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ImportcourseController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/schedule', [ScheduleController::class, 'index']);
Route::get('/import', [ImportcourseController::class, 'index']);
Route::get('/coursework', [CourseworkController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
