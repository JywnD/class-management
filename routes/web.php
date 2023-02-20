<?php

use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        if (Auth::user()->hasRole('superadministrator')) {
            return redirect('/form-teacher');
        }

        if (Auth::user()->hasRole('administrator')) {
            return redirect('/sub-teacher');
        }

        if (Auth::user()->hasRole('user')) {
            return redirect('/student');
        }
    } else {
        return view('auth.login');
    }
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

Route::prefix('sub-teacher')->group(function () {
    Route::get('/', 'SubTeacherController@index')->name('teacher.courses');
    Route::get('/course-detail/{id}', 'SubTeacherController@detailCourse')->name('teacher.course-detail');
    Route::post('/edit-course', 'SubTeacherController@editCourse')->name('teacher.edit-course');
});

Route::prefix('student')->group(function () {
    Route::get('/', 'StudentController@index')->name('student');
    Route::post('/register-course', 'StudentController@registerCourse')->name('student.register-course');
    Route::get('/course-detail/{courseId}', 'StudentController@courseDetail')->name('student.course-detail');
    Route::get('/courses', 'StudentController@showCourses')->name('student.courses');
    Route::get('/marks', 'StudentController@showMarks')->name('student.marks');
});

Auth::routes();
