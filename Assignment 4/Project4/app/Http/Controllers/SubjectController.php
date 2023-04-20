<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = DB::table("subjects")->paginate(20);

        $id = Auth::id();
        return view("subjects.index", ["subjects" => $subjects, "id" => $id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("subjects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define validation rules
        $request->validate([
            "id" => "required",
            "subject" => "required",
            "full_name" => "required",
        ]);

        // save the data
        DB::insert("insert into `subjects` (id, subject, full_name) values (:id, :subject, :full_name)", [
            "id" => $request->id,
            "subject" => $request->subject,
            "full_name" => $request->full_name,
        ]);

        // Return the list of subjects
        return to_route("subjects.index")->with("status", "Subject created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        return view("subjects.show", ["subject" => $subject]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view("subjects.edit", ["subject" => $subject]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        // Define validation rules
        $request->validate([
            "subject" => "required",
            "full_name" => "required",
        ]);

        // save the data
        DB::update("update `subjects` set subject = :subject, full_name = :full_name WHERE id = :id", [
            "subject" => $request->subject,
            "full_name" => $request->full_name,
            "id" => $subject->id,
        ]);

        // Return the list of subjects
        return to_route("subjects.show", $subject)->with("status", "Subject updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete("delete from `subjects` where id = :id", ["id" => $id]);
        return to_route("subjects.index")->with("status", "Subject deleted successfully");
    }
}
