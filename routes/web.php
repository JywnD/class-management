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

Route::prefix('form-teacher')->group(function () {
    Route::get('/', 'FormTeacherController@index')->name('student-list');
    Route::get('/create-student', 'FormTeacherController@createStudent')->name('create-student');
    Route::post('/create-student', 'FormTeacherController@storeStudent')->name('store-student');
    Route::delete('/student/{id}', 'FormTeacherController@deleteStudent')->name('delete-student');

    Route::get('/teacher', 'FormTeacherController@indexSubTeacher')->name('teacher-list');
    Route::get('/create-teacher', 'FormTeacherController@createSubTeacher')->name('create-teacher');
    Route::post('/create-teacher', 'FormTeacherController@storeSubTeacher')->name('store-teacher');
    Route::delete('/teacher/{id}', 'FormTeacherController@deleteSubTeacher')->name('delete-teacher');

    Route::get('/course', 'FormTeacherController@indexCourse')->name('course-list');
    Route::get('/create-course', 'FormTeacherController@createCourse')->name('create-course');
    Route::post('/create-course', 'FormTeacherController@storeCourse')->name('store-course');
    Route::delete('/course/{id}', 'FormTeacherController@deleteCourse')->name('delete-course');
});

Route::get('/sub-teacher', 'SubTeacherController@index')->name('subTeacher');
Route::get('/student', 'StudentController@index')->name('student');

Auth::routes();
