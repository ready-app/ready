<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create(){
        return Redirect::to('assignment.index');
    }


    public function findAssignmentByCourse($course_id)
    {
        $assignments_list = Assignment::where('course_id', $course_id)->get();
        foreach ($assignment as $assignments_list) {
            $assignment->name=$assignments_list->assignment->name;
        }
        return response()->json(['data'=>$assignment]);
    }

    public function findAssignmentByUser($user_id)
    {
        $assignments_list = Assignment::where('uesr_id', $user_id)->get();
        foreach ($assignment as $assignments_list) {
            $assignment->name=$assignments_list->assignment->name;
        }
        return response()->json(['data'=>$assignment]);
    }


    public function show($id)
    {
        $assignment = Assignment::find($id);

        //return View::make('')->with('assignment', $assignment);
    }



    public function update($id){
        $assignment = Assignment::find($id);
        $assignment->name = Input::get('name');
        $assignment->due_at = Input::get('due_at');

        return Redirect::to('assignment.index');
    }

  
    public function destroy($id){
        $assignment = Assignment::find($id);
        $assignment -> delete();

        return Redirect::to('assignment.index');
    }
}
