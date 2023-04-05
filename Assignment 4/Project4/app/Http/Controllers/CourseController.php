<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = DB::table("courses")->paginate(20);
        return view("courses.index", ["courses" => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("courses.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define validation rules
        $request->validate([
            "subject" => "required|max:30",
            "number" => "required",
            "title" => "required",
            "description" => "required",
            "credits" => "required",
        ]);

        // Save the data
        DB::insert(
            'insert into `courses` (subject, number, title, description, credits, prereq)
        values (:subject, :number, :title, :description, :credits, :prereq) ',
            [
                "subject" => $request->subject,
                "number" => $request->number,
                "title" => $request->title,
                "description" => $request->description,
                "credits" => $request->credits,
                "prereq" => $request->prereq,
            ]
        );

        // Return to the list of courses
        return to_route("courses.index")->with("status", "Course added successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view("courses.show", ["course" => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view("courses.edit", ["course" => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // Define validation rules
        $request->validate([
            "subject" => "required|max:30",
            "number" => "required",
            "title" => "required",
            "description" => "required",
            "credits" => "required",
        ]);

        // Update edited data
        DB::update(
            'update `courses` set
               subject = :subject,
               number = :number,
               title = :title,
               description = :description,
               credits = :credits,
               prereq = :prereq
               WHERE id = :id ',
            [
                "subject" => $request->subject,
                "number" => $request->number,
                "title" => $request->title,
                "description" => $request->description,
                "credits" => $request->credits,
                "prereq" => $request->prereq,
                "id" => $course->id,
            ]
        );

        return to_route("courses.show", $course)->with("status", "Course updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Remove the selected course
        DB::delete("delete from courses where id = :id", ["id" => $id]);

        // Return to the list of courses
        return to_route("courses.index")->with("status", "Course deleted successfully");
    }
}
