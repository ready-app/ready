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

    public function create() {
        return Redirect::to('course.index');
    }



    public function update($id) {
        $course = Course::find($id);
        $course->name = Input::get('name');

        return Redirect::to('course.index');
    }

  
    public function destroy(User $user): RedirectResponse {
        $course = Course::find($id);
        $course -> delete();

        return Redirect::to('assignment.index');
    }
}
