<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller {
    public function index() {
        return inertia("SettingsPage");
    }
    
    public function changePassword(PasswordRequest $request) {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        
        $user = Auth::user();
        if (\Hash::check($request->old_password, $user->password)) {
            $user->password = \Hash::make($request->password);
            $user->save();
            return redirect()->route('settings')->with('success', 'Password changed successfully!');
        } else {
            return redirect()->route('settings')->with('error', 'Old password is incorrect!');
        }
    }
}


