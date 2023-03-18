<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CourseController;

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

Route::get('/', function () {
    return view('default');
});
// How to add a new route
//          URL         Controller
Route::get('/welcome', [WelcomeController::class, 'index']);

// The following route shows all courses of a given subject using SQL. In this case, COMPSCI
Route::get('/coursesbysubjectUsingSQL', [CourseController::class, 'coursesbysubjectUsingSQL']);

// The following route shows all courses of a given subject using Eloquent ORM. In this case, all subjects
Route::get('/coursesBySubjectUsingEloquentORM', [CourseController::class, 'coursesBySubjectUsingEloquentORM']);