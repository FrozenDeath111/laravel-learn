<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ReguserController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\SecureStore;
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

Route::get('/', [GeneralController::class,'index']);

Route::get('/form', function () {
    return view('formpage');
});

Route::get('/login', [GeneralController::class,'login']);
Route::get('/logout', [GeneralController::class,'logout']);

Route::post('/login-user', [GeneralController::class,'login_check']);

Route::get('/show-stud', [StudentController::class,'index'])->name('stud-index');
Route::get('/show-stud/{id}', [StudentController::class,'show']);
Route::put('/edit-name/{id}', [StudentController::class,'edit']);
Route::patch('/update-name/{id}', [StudentController::class,'update']);
Route::delete('/delete/{id}', [StudentController::class,'destroy']);
// Route::get('/show-stud/{id}', [StudentController::class,'show_many']);
// Route::get('/show-one/{id}', [StudentController::class,'show_one']);
Route::post('/store-stud', [StudentController::class,'store']);
Route::post('/store-secure', [StudentController::class,'store'])->middleware(SecureStore::class);

Route::get('/show-course', [CourseController::class,'index'])->name('course-index');
Route::get('/show-course/{id}', [CourseController::class,'show_many']);
Route::post('/store-course', [CourseController::class,'store']);

Route::get('/store', [EmployeeController::class,'store'])->name('store');
Route::get('/show', [EmployeeController::class,'index'])->name('show');

// Register section
Route::get('/show-reg', [ReguserController::class,'show']);
Route::post('/register', [ReguserController::class,'store']);
Route::post('/login', [ReguserController::class,'index']);

//Student Course
Route::get('/details', [DetailController::class,'index']);
Route::get('/chk', [DetailController::class,'show']);
Route::post('/detail-post', [DetailController::class,'store']);
Route::get('/multiselect', [DetailController::class,'multiselect_index']);
Route::post('/multiselect-store', [DetailController::class,'multiselect_store']);
