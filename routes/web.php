<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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

// Route::get('/', function () {
    // return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/students/view/{id}', [StudentController::class, 'show'])->name('viewStudents');
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('editStudents');
Route::get('/students/add', [StudentController::class, 'create'])->name('addStudent');
Route::post('/students/save', [StudentController::class, 'store'])->name('saveStudent');
Route::post('/students/update/{id}', [StudentController::class, 'update'])->name('updateStudent');
Route::get('/students/delete/{id}', [StudentController::class, 'destroy'])->name('deleteStudent');

