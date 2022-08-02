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
        return inertia("AdminPage");
    }

    public function create(User $user): RedirectResponse {
        if ($user->is_admin) {
            return redirect()->route('course.index')->with('success', 'Assignment created');
        }
        return redirect()->route('course.index')->with('error', 'User is not an admin');
    }



    public function update(User $user): RedirectResponse {
        if ($user->is_admin) {
            return redirect()->route('course.index')->with('success', 'Assignment updated');
        }
        return redirect()->route('course.index')->with('error', 'User is not an admin');
    }

  
    public function destroy(User $user): RedirectResponse {
        if ($user->delete()) {
            return redirect()->route('course.index')->with('success', 'Assignment deleted');
        }
        return redirect()->route('course.index')->with('error', 'User is not an admin');
    }
}
