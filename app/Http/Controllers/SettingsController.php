<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\NameChangeRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Services\UserService;
class SettingsController extends Controller {

    protected UserService $userService;


    public function index() {
        return inertia("SettingsPage");
    }

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function updateName(NameChangeRequest $request) {
        // $user = Auth::user();
        // $user->name = $request->name;
        // if ($user->save()) {
        //     return redirect()->route('settings.index')->with('success', 'Name updated');
        // }
        // return redirect()->route('settings.index')->with('error', 'Failed to update name');
        $this->userService->updateName($request->validated());
        return redirect()->route('settings.index')->with('success', 'Name updated');
    }

    public function updatePassword(PasswordChangeRequest $request) {
        // $user = Auth::user();
        // if ($user->updatePassword($request->new_password)) {
        //     return redirect()->route('settings.index')->with('success', 'Password updated');
        // }
        // return redirect()->route('settings.index')->with('error', 'Failed to update password');
        $this->userService->updatePassword($request->validated());
        return redirect()->route('settings.index')->with('success', 'Password updated');
    }
}
