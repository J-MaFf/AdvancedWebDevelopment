<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Schedule;

class ScheduleController extends Controller
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
        $schedules = DB::table("schedules")->paginate(20);
        $id = Auth::id();
        return view("schedules.index", [
            "schedules" => $schedules,
            "id" => $id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("schedules.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define validation rules
        $request->validate([
            "subject" => "required",
            "number" => "required",
            "section" => "required",
            "days" => "required",
            "time" => "required",
            "location" => "required",
            "instructor" => "required",
        ]);

        // Save the data
        DB::insert(
            'insert into `schedules` (subject, number, section, days, time, location, instructor)
        values (:subject, :number, :section, :days, :time, :location, :instructor) ',
            [
                "subject" => $request->subject,
                "number" => $request->number,
                "section" => $request->section,
                "days" => $request->days,
                "time" => $request->time,
                "location" => $request->location,
                "instructor" => $request->instructor,
            ]
        );

        // Return to the list of schedules
        return to_route("schedules.index")->with("status", "Schedule added successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        return view("schedules.show", ["schedule" => $schedule]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        return view("schedules.edit", ["schedule" => $schedule]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        // Define validation rules
        $request->validate([
            "subject" => "required",
            "number" => "required",
            "section" => "required",
            "days" => "required",
            "time" => "required",
            "location" => "required",
            "instructor" => "required",
        ]);

        // Update the data
        DB::update(
            "update `schedules` set 
                subject = :subject,
                number = :number,
                section = :section, 
                days = :days, 
                time = :time, 
                location = :location, 
                instructor = :instructor
                WHERE id = :id",
            [
                "subject" => $request->subject,
                "number" => $request->number,
                "section" => $request->section,
                "days" => $request->days,
                "time" => $request->time,
                "location" => $request->location,
                "instructor" => $request->instructor,
                "id" => $schedule->id,
            ]
        );

        // Return to the list of schedules
        return to_route("schedules.index")->with("status", "Schedule updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
