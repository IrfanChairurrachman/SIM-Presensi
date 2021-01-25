<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AbsenceController::class, 'index']);
Route::post('/', [AbsenceController::class, 'store']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AbsenceController::class, 'adminindex'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/mhs', [StudentController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/mk', [CourseController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/absen/isi', [AbsenceController::class, 'create']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/mhs/isi', [StudentController::class, 'create']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/mk/isi', [CourseController::class, 'create']);

Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/absen/isi', [AbsenceController::class, 'adminstore']);
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/mhs/isi', [StudentController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/mk/isi', [CourseController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/mhs/{student}', [StudentController::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/mk/{course}', [CourseController::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/{absence}', [AbsenceController::class, 'edit']);

Route::middleware(['auth:sanctum', 'verified'])->delete('/dashboard/{id}', [AbsenceController::class, 'destroy']);
Route::middleware(['auth:sanctum', 'verified'])->delete('/dashboard/mhs/{id}', [StudentController::class, 'destroy']);
Route::middleware(['auth:sanctum', 'verified'])->delete('/dashboard/mk/{id}', [CourseController::class, 'destroy']);

Route::middleware(['auth:sanctum', 'verified'])->patch('/dashboard/{absence}', [AbsenceController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->patch('/dashboard/mhs/{student}', [StudentController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->patch('/dashboard/mk/{course}', [CourseController::class, 'update']);

