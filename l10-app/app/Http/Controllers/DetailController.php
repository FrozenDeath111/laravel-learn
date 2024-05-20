<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Detail;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teachers = Teacher::all();
        $courses = Course::all();
        $details = Detail::all();
        return view("details", [
            "teachers" => $teachers,
            "courses" => $courses,
            "details" => $details,
        ]);
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
        if($request["student_id"] != null && $request["selected_course_id"] != null){
            $details = new Detail();

            $details->student_id = $request["student_id"];
            $details->selected_course_id = $request["selected_course_id"];

            if($details->save()){
                // $teachers = Teacher::all();
                // $countDetails = Detail::all();
                // foreach($teachers as $teacher){
                //     $count=0;
                //     foreach($countDetails as $detail){
                //         if($teacher['course_id']==$detail['selected_course_id']){
                //             $count++;
                //         }
                //     }
                //     $teacher['student_count']=$count;
                //     $teacher->save();
                // }
                // return redirect("/details");

                $courses = Course::all();

                foreach($courses as $course){
                    $count = count($course->detail);
                    $teacher = Teacher::where("course_id", $course['id'])->first();
                    $teacher['student_count']=$count;
                    $teacher->save();
                }
                return redirect("/details");

            } else{
                return response()->json([
                    "error" => "Data no saved",
                    "code" => 400,
                ]);
            }
        } else {
            return response()->json([
                "error" => "Input field should not be empty",
                "code" => 400,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $courses = Course::all();
        $data = array();
        $data_inner = array();
        foreach($courses as $course){
            foreach($course->detail as $d){
                $teacher = Teacher::find( $d["selected_course_id"] );
                $data_inner[] = [
                    "teacher_name" => $teacher['name'],
                    "course_id"=>$d['selected_course_id'],
                    "student_id"=>$d['student_id'],
                ];
            }
            $data[] = $data_inner;
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail $detail)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail $detail)
    {
        //
    }

    public function multiselect_index(){
        $courses = Course::all();
        $details = Detail::all();
        return view('multiselect',[
            'courses'=> $courses,
            "details" => $details,
        ]);
    }

    public function multiselect_store(Request $request){
        if($request['student_id'] == null){
            return response()->json([
                "error" => "null entry",
                "code" => 400,
            ]);
        }

        if(count($request['options']) != 3){
            return response()->json([
                "error" => "not enough",
                "code" => 400,
            ]);
        } else {
            foreach($request["options"] as $option){
                $details = new Detail();
                $details->student_id = $request['student_id'];
                $details->selected_course_id = $option;
                $details->save();
            }
        }
        return redirect('/multiselect');
    }
}
