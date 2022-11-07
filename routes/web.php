<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BillingController;

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



    Route::get('registration', function () {
        return view("auth.registration");
    })->name('register');


    Route::get('', function () {
        return view("auth.login");
    })->name('login');;


    
    Route::get('course', function () {
        return view('course.add');
    })->name("addCourse");;

    Route::get('course/list', function () {
        return view('course.list');
    })->name("listCourse");

    Route::get('course/update', function () {
        return view('course.update');
    });;


    Route::get('teacher', function () {
        return view('teacher.add');
    })->name("addTeacher");;

    Route::get('teacher/list', function () {
        return view('teacher.list');
    })->name("listTeacher");

    Route::get('teacher/update', function () {
        return view('teacher.update');
    });;



    Route::get('course/teacher', function () {
        return view('course_teacher.add');
    })->name("addTeacherCourse");;

    Route::get('course/teacher/list', function () {
        return view('course_teacher.list');
    })->name("listTeacherCourse");

    Route::get('course/teacher/update', function () {
        return view('course_teacher.update');
    });;








Route::get('add-bill', [BillingController::class, 'addBill'])->name('add.bill');
Route::post('post-bill', [BillingController::class, 'postBill'])->name('bill.post'); 


