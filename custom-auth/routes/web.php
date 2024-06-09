<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GeneralController::class, 'index']);

Route::get('/student/login', [StudentController::class, 'loginForm']);
Route::post('/student/login', [StudentController::class, 'login']);
Route::get('/student/logout', [StudentController::class, 'logout'])->middleware('student');
Route::get('/student/register', [StudentController::class, 'registerForm']);
Route::post('/student/register', [StudentController::class, 'register']);
Route::get('/student/{id}', [StudentController::class, 'index'])->middleware('student');

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('admin');
Route::get('/admin/login', [AdminController::class, 'loginForm']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/register', [AdminController::class, 'register']);
Route::get('/admin/logout', [AdminController::class, 'logout']);
