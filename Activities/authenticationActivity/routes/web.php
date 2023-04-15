<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;

use Illuminate\Support\Facades\Route;

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
const PROFILE = "/profile";

Route::resource("courses", CourseController::class)->middleware(["auth"]);

Route::get("/", function () {
    return view("welcome");
});

Route::get("/dashboard", function () {
    return view("dashboard");
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get(PROFILE, [ProfileController::class, "edit"])->name(
        "profile.edit"
    );
    Route::patch(PROFILE, [ProfileController::class, "update"])->name(
        "profile.update"
    );
    Route::delete(PROFILE, [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );
});

require __DIR__ . "/auth.php";
