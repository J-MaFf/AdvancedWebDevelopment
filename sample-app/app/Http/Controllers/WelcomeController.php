<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import WelcomeModel class into WelcomeController class
use App\Models\WelcomeModel;

class WelcomeController extends Controller
{
    public function index() {
        // create an instance of the WelcomeModel class
        $model = new WelcomeModel();
        // retrieve name and course from the WelcomeModel class
        $name = $model->getName();
        $course = $model->getCourse();
        // pass name and course to the greeting view
        return view('greeting', ['name' => $name, 'course' => $course]);
      }
}
