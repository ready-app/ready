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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user): RedirectResponse {
        if ($user->dreate()) {
            return redirect()->route('admin.index')->with('success', 'User deleted');
        }
        return redirect()->route('admin.index')->with('error', 'Failed to delete user');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse {
        if ($user->update($request->validated())) {
            return redirect()->route('admin.index')->with('success', 'User updated');
        }
        return redirect()->route('admin.index')->with('error', 'Failed to update user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user): RedirectResponse {
        if ($user->delete()) {
            return redirect()->route('admin.index')->with('success', 'User deleted');
        }
        return redirect()->route('admin.index')->with('error', 'Failed to delete user');
    }
}
