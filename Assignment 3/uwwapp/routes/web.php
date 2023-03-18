<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScheduleController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () { // This is the default route (the homepage)
    return view('uww');
});

Route::get('/coursesbysubject/{subject}', [CourseController::class, 'coursesbysubject']);

Route::get('/coursesbysubject', [CourseController::class, 'allcourses']);

Route::get('/schedule', [ScheduleController::class, 'scheduleOfAllClasses']);

Route::get('/schedule/{subject}', [ScheduleController::class, 'schedulebysubject']);