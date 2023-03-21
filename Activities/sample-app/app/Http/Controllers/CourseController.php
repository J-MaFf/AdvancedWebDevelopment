<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* The DB Facade provides static methods for each type of SQL query:
    select( ), update( ), insert( ), delete( ), and statement( ).

    The DB::select(query, parameters) method allows us to execute
    queries with or without named parameters.
*/
use Illuminate\Support\Facades\DB;

use App\Models\Course; // This is the model class for the courses table

class CourseController extends Controller
{
    public function coursesbysubjectUsingSQL()
    {
        $courses = DB::select('select subject, number, title, credits from courses where subject = :subject', ["subject" => 'COMPSCI']);
        //dd($courses);
        foreach ($courses as $c) {
            echo $c->subject . " " . $c->number . "<br/>";
        }
    }

    public function coursesBySubjectUsingEloquentORM(){
        foreach(Course::all() as $c) {
            echo $c->subject." ".$c->number."<br/>";
        }
    }
}
