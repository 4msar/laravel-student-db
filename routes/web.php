<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/students', 'StudentController@index')->name('students');
Route::get('/students/view/{id}', ['uses' =>'StudentController@show'])->name('viewStudents');
Route::get('/students/edit/{id}', ['uses' =>'StudentController@edit'])->name('editStudents');
Route::get('/students/add', 'StudentController@create')->name('addStudent');
Route::post('/students/save', 'StudentController@store')->name('saveStudent');
Route::post('/students/update/{id}', ['uses' => 'StudentController@update'])->name('updateStudent');
Route::get('/students/delete/{id}', ['uses' => 'StudentController@destroy'])->name('deleteStudent');

