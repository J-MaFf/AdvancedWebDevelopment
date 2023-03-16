<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// First, we need to import the DB facade
use Illuminate\Support\Facades\DB;
/* The DB Facade provides static methods for each type of query:
    select( ), update( ), insert( ), delete( ), and statement( ).

    The DB::select(query, parameters) method allows us to execute
    queries with or without named parameters.

*/

class CourseController extends Controller
{
    /* The following method retrieves all the courses from the courses table
       and displays them in the browser.
    */
    public function coursesbysubject()
    {
        $courses = DB::select('select subject, number, title, credits from courses where subject = :subject', ["subject" => 'COMPSCI']);
        //dd($courses);
        foreach ($courses as $c) {
            echo $c->subject . " " . $c->number . "<br/>";
        }
    }
}
