<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/form-teacher', 'FormTeacherController@index')->name('formTeacher');
Route::get('/sub-teacher', 'SubTeacherController@index')->name('subTeacher');
Route::get('/student', 'StudentController@index')->name('student');

Auth::routes();
