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
        return inertia("AdminPage");
    }


    public function create(User $user): RedirectResponse {
        if ($user->is_admin) {
            return redirect()->route('assignment.index')->with('success', 'Assignment created');
        }
        return redirect()->route('assignment.index')->with('error', 'User is not an admin');
    }


    public function findAssignmentByCourse($course_id)
    {
        $assignments_list = Assignment::where('course_id', $course_id)->get();
        foreach ($assignment as $assignments_list) {
            $assignment->name=$assignments_list->assignment;
        }
        return response()->json(['data'=>$assignment]);
    }



    public function update(User $user): RedirectResponse {
        if ($user->is_admin) {
            return redirect()->route('assignment.index')->with('success', 'Assignment updated');
        }
        return redirect()->route('assignment.index')->with('error', 'User is not an admin');
    }

  
    public function destroy(User $user): RedirectResponse {
        if ($user->is_admin) {
            return redirect()->route('assignment.index')->with('success', 'Assignment deleted');
        }
        return redirect()->route('assignment.index')->with('error', 'User is not an admin');
    }
}
