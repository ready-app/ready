<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\NameChangeRequest;
use App\Http\Requests\PasswordChangeRequest;

class SettingsController extends Controller {
    public function index() {
        return inertia("SettingsPage");
    }

    public function updateName(NameChangeRequest $request) {
        $user = Auth::user();
        $user->name = $request->name;
        if ($user->save()) {
            return redirect()->route('settings.index')->with('success', 'Name updated');
        }
        return redirect()->route('settings.index')->with('error', 'Failed to update name');
    }

    public function updatePassword(PasswordChangeRequest $request) {
        $user = Auth::user();
        if ($user->updatePassword($request->new_password)) {
            return redirect()->route('settings.index')->with('success', 'Password updated');
        }
        return redirect()->route('settings.index')->with('error', 'Failed to update password');
    }
}
