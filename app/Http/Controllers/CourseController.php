<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    public function create(Request $request) {
        if(Course::create($request->validated())){
            return redirect()->route('course.index')->with('success', 'Course is successfully created');
        }
        return redirect()->route('course.index')->with('error', 'Failed to create course');
    }



    public function update(Request $request,Course $course) {
        if($course->update($request->validated())){
            return redirect()->route('course.index')->with('success', 'Course is successfully updated');
        }
        return redirect()->route('course.index')->with('error', 'Failed to update course');
    }

  
    public function destroy($id){
        $course = Course::find($id);
        $course -> delete();

        return redirect()->route('course.index');
    }
}
