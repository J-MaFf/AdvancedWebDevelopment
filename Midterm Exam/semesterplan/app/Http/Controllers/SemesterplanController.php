<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Semesterplan;

use function PHPUnit\Framework\isEmpty;

class SemesterplanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // check if user is logged in
        if (!Auth::check()) {
            // return to login page
            return to_route("login");
        }

        $semesterplans = DB::table("semesterplans")->paginate(20);
        $id = Auth::id();

        // if semesterplan has no courses matching the user id, display message
        if (
            DB::table("semesterplans")
                ->where("user_id", $id)
                ->doesntExist()
        ) {
            return to_route("schedules.index")->with("status", "You have no semester plans. You can create one here.");
        }
        return view("semesterplans.index", ["semesterplans" => $semesterplans, "id" => $id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // prettier-ignore
        $schedule = DB::table("schedules")->where("id", $request->id)->first();

        // Check if the course is already in the semester plan for the user
        if (
            DB::table("semesterplans")
                ->where("user_id", Auth::id())
                ->where("course", $schedule->subject . " " . $schedule->number)
                ->exists()
        ) {
            return to_route("schedules.index")->with("status", "Course already exists in semester plan!");
        } elseif (
            // Check if the course is already in the semester plan for any user
            DB::table("semesterplans")
                ->where("course", $schedule->subject . " " . $schedule->number)
                ->exists()
        ) {
            // While course id is not unique, generate a new one and check again
            do {
                $schedule->id += 2500;
            } while (
                DB::table("semesterplans")
                    ->where("id", $schedule->id)
                    ->exists()
            );
        }
        // Save the data
        DB::insert(
            'insert into `semesterplans` (id, user_id, course, section, time, location, instructor) 
        values (:id, :user_id, :course, :section, :time, :location, :instructor) ',
            [
                "id" => $schedule->id,
                "user_id" => Auth::id(),
                "course" => $schedule->subject . " " . $schedule->number,
                "section" => $schedule->section,
                "time" => $schedule->time,
                "location" => $schedule->location,
                "instructor" => $schedule->instructor,
            ]
        );

        // Return to the list of courses
        return to_route("schedules.index")->with("status", "Course added to semester plan successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Semesterplan $semesterplan)
    {
        return view("semesterplans.show", ["semesterplan" => $semesterplan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Remove the selected course
        DB::delete("delete from semesterplans where id = :id", ["id" => $id]);

        // Return to the list of courses
        return to_route("semesterplans.index")->with("status", "Course removed from semester plan successfully");
    }
}
