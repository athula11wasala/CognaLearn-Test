<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiTokenController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherCourseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

#post
Route::post('/register', [ApiTokenController::class, 'register']);
Route::post('/login', [ApiTokenController::class, 'login']);


Route::group(['middleware' => 'auth:api'], function () {
  
    #post
    Route::post('/logout', [ApiTokenController::class, 'logout']);

    Route::group(['prefix'=>'customer','as'=>'customer'], function () {

        #get
        Route::get('/', [CustomerController::class, 'index']);
        Route::get('/show/{id}', [CustomerController::class, 'show']);
        
        #post
        Route::post('/add', [CustomerController::class, 'create']);
        
        #put
        Route::put('/update/{id}', [CustomerController::class, 'update']);

        #delete
        Route::delete('/delete/{id}', [CustomerController::class, 'destroy']);
         
    });

    Route::group(['prefix'=>'course','as'=>'course'], function () {

        #get
        Route::get('/', [CourseController::class, 'index']);
        Route::get('/show/{id}', [CourseController::class, 'show']);
        
        #post
        Route::post('/add', [CourseController::class, 'create']);
        
        #put
        Route::put('/update/{id}', [CourseController::class, 'update']);

        #delete
        Route::delete('/delete/{id}', [CourseController::class, 'destroy']);
         
    });


    Route::group(['prefix'=>'teacher','as'=>'teacher'], function () {

        #get
        Route::get('/', [TeacherController::class, 'index']);
        Route::get('/show/{id}', [TeacherController::class, 'show']);
        
        #post
        Route::post('/add', [TeacherController::class, 'create']);
        
        #put
        Route::put('/update/{id}', [TeacherController::class, 'update']);

        #delete
        Route::delete('/delete/{id}', [TeacherController::class, 'destroy']);
         
    });


    Route::group(['prefix'=>'course/teacher','as'=>'course/teacher'], function () {

        #get
        Route::get('/', [TeacherCourseController::class, 'index']);
        Route::get('/show/{id}', [TeacherCourseController::class, 'show']);
        
        #post
        Route::post('/add', [TeacherCourseController::class, 'create']);
        
        #put
        Route::put('/update/{id}', [TeacherCourseController::class, 'update']);

        #delete
        Route::delete('/delete/{id}', [TeacherCourseController::class, 'destroy']);
         
    });
    
});




