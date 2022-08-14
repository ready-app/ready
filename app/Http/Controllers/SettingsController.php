<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\NameChangeRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Services\UserService;
use App\Models\User;

class SettingsController extends Controller {
    protected UserService $userService;


    public function index() {
        return inertia("SettingsPage");
    }

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function updateName(NameChangeRequest $request) {
        if ($this->userService->updateName($request->user(), $request->validated())) {
            return redirect()->route('settings.index')->with('success', 'Name updated');
        }
    }

    public function updatePassword(PasswordChangeRequest $request) {
        if ($this->userService->updatePassword($request->user(), $request->validated())) {
            return redirect()->route('settings.index')->with('success', 'Password updated');
        }
    }
}
