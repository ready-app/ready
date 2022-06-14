<?php

use App\Http\Controllers\AuthController;
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
Route::get('/login', [AuthController::class, 'loginPage']);
Route::get('/registration', [AuthController::class, 'registrationPage']);
Route::get('/schedule', [AuthController::class, 'schedulePage']);
Route::get('/import', [AuthController::class, 'import_coursePage']);
Route::get('/coursework', [AuthController::class, 'courseworkPage']);
Route::get('/home', [AuthController::class, 'homePage']);
