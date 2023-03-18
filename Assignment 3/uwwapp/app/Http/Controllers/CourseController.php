<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function coursesbysubject(Request $request)
    {
        // This is the SQL statement that is used to select the subject from the dropdown menu
        $subjects = DB::select("SELECT subject FROM subjects ORDER by subject");

        /*  If you use Eloquent ORM, then you may use the following statement:
            $subjects = Subject::select('subject', number', 'title', 'credits')->orderBy('subject')->get();
        */
        // Read the subject using the URL parameter
        $subject = $request->subject;

        $courses = [];
        if (isset($subject)) {
            $courses = DB::select('SELECT subject, number, title, credits FROM courses WHERE subject = ? ORDER by number', [$subject]);

            /* Eloquent ORM statement
                $courses = Course::select('subject', 'number', 'title', 'credits')->where('subject', $subject)->orderBy('number')->get();
            */
        }
        $buttonText = $subject;
        
        return view('course', ['subjects' => $subjects, 'subject' => $subject, 'courses' => $courses, 'buttonText' => $buttonText]);
        
    }

    // Show all courses
    public function allcourses()
    {
        $subjects = DB::select("SELECT subject FROM subjects ORDER by subject");
        $courses = DB::select('SELECT subject, number, title, credits FROM courses ORDER BY subject, number');
        $buttonText = 'All Courses';
        return view('course', ['subjects' => $subjects, 'subject' => '', 'courses' => $courses, 'buttonText' => $buttonText]);
    }
}
