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

Route::get('/', function () {
    return redirect()->route('students.index');
})->name('dashboard');
Route::resource('/college-expenses' , 'CollegeExpensesController', ['except' => 'edit' , 'update' , 'destroy']);
Route::get('/studentPrint/{id}' , 'StudentController@studentPrint')->name('studentPrint');
Route::resource('/students' , 'StudentController' , ['except' => ['create']]);
Route::resource('/courses' , 'CoursesController' , ['except' => ['create' , 'show']]);
Route::resource('/fees' , 'FeesController' , ['except' => ['create']]);