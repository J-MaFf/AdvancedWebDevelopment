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

// The following route 
Route::get('/coursesbysubject', [CourseController::class, 'coursesbysubject']);
