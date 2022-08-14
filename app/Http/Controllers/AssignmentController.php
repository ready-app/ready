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


    public function create(Request $request){
        if(Assignment::create($request->validated())){
            return redirect()->route('assignment.index')->with('success', 'Assignment is successfully created');
        }
        return redirect()->route('assignment.index')->with('error', 'Failed to create assignment');
    }


    public function show(Assignment $assignment)
    {
        return redirect()->route('assignment.index');
    }



    public function update(Request $request,Assignment $assignment){

        if($assigment->update($request->validated())){
            return redirect()->route('assignment.index')->with('success', 'Assignment is successfully updated');
        }
        return redirect()->route('assignment.index')->with('error', 'Failed to update assignment');
    }


  
    public function destroy(Assignment $assignment){
        $assignment -> delete();

        return redirect()->route('assignment.index');
    }
}
