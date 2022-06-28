<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller {
    public function index() {
        return inertia("SettingsPage");
    }
    
    public function changePassword(Request $request) {
        $request->validate([
            'password' => 'required|confirmed'
        ]);

        auth()->user()->update(['password' => bcrypt($request->password)]);

        return back()->with('status', 'Your password has been updated!');
    }
}


