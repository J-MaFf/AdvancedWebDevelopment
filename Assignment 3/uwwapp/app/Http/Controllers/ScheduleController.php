<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{

    public function schedulebysubject(Request $request){
        // This is the SQL statement that is used to select the subject from the dropdown menu
        $subjects = DB::select("SELECT subject FROM subjects ORDER by subject");
        $names = DB::select("SELECT full_name FROM subjects ORDER by subject");

        /*  If you use Eloquent ORM, then you may use the following statement:
            $subjects = Subject::select('subject', number', 'title', 'credits')->orderBy('subject')->get();
        */

        // Read the subject using the URL parameter
        $subject = $request->subject;
        

        $courses = [];
        if (isset($subject)) {
            $courses = DB::select('SELECT subject, number, section, time, instructor, location FROM schedules WHERE subject = ? ORDER by number', [$subject]);
            $full_name = DB::select('SELECT full_name FROM subjects WHERE subject = ?', [$subject]);
            /* Eloquent ORM statement
                $courses = Course::select('subject', 'number', 'title', 'credits')->where('subject', $subject)->orderBy('number')->get();
            */
        }
        $buttonText = $subject . ": " . $full_name[0]->full_name;
        
        return view('schedule', ['subjects' => $subjects, 'names' => $names, 'subject' => $subject, 'full_name' => $full_name, 'courses' => $courses, 'buttonText' => $buttonText]);
    }

    public function scheduleOfAllClasses(){
        // This is the SQL statement that is used to select the subject from the dropdown menu
        $subjects = DB::select("SELECT subject FROM subjects ORDER by subject");
        $names = DB::select("SELECT full_name FROM subjects ORDER by subject");

        /*  If you use Eloquent ORM, then you may use the following statement:
            $subjects = Subject::select('subject', number', 'title', 'credits')->orderBy('subject')->get();
        */

        $courses = DB::select('SELECT subject, number, section, time, instructor, location FROM schedules ORDER BY subject, number');

        $buttonText = "Select Subject";

        return view('schedule', ['subjects' => $subjects, 'names' => $names, 'subject' => '', 'courses' => $courses, 'buttonText' => $buttonText]);

    }
}
