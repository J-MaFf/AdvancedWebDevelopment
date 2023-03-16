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

        $subjects = DB::select("select subject, full_name  from subjects order by subject");
        
        /*  If you use Eloquent ORM, then you may use the following statement:
            $subjects = Subject::select('subject', 'full_name')->orderby('subject')->get();
        */
        // Read the subject using the URL parameter
        $subject = $request->subject;
        
        $courses = [];
        if (isset($subject)) {
            $courses = DB::select("select subject, number, title, credits from courses where subject = :subject order by number", ['subject' => $subject]);
            /* Eloquent ORM statement
                $courses = Course::select('subject', 'number', 'title', 'credits')->where('subject', $subject)->orderBy('number')->get();
            */
        }

        return view('course', ['subject' => $subject, 'courses' => $courses, 'subjects' => $subjects]);
    }
}