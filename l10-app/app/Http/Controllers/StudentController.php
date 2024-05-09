<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();
        return $students;
    }

    public function show_many($id){
        $student = Student::find($id);

        $info = array();

        foreach($student->courses as $course){
            $info[] = [
                "student" => Student::find($course->pivot->student_id),
                "course" => Course::find($course->pivot->course_id),
            ];
        }

        return $info;
    }

    public function show_one($id){
        $student = Student::find($id)->studinfo;
        return $student;
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
        //
        $student = Student::create($request->all());
        if( $student ) {
            return redirect()->route("stud-index");
        }

        return "unsuccessful";
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student, $id)
    {
        //
        $student = Student::find($id);
        return $student;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //
        $student = Student::find($id);
        $student->name = $request->name;
        
        if($student->save()) {
            return $student;
        }

        return "error while put";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $student = Student::find($id);
        $student->name = $request->name;
        if($student->save()) {
            return $student;
        }

        return "error while patch";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //
        $student = Student::find($id);
        if($student->delete()) {
            $students = Student::all();
            return $students;
        }

        return "error while delete";
    }
}
