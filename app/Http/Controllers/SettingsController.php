<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use App\Http\Requests\NameChangeRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Services\UserService;

class SettingsController extends Controller {
    protected UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function index() {
        return inertia("SettingsPage");
    }

    public function updateName(NameChangeRequest $request): RedirectResponse {
        if ($this->userService->updateName($request->user(), $request->validated())) {
            return redirect()->route('settings.index')->with('success', 'Name updated');
        }
        return redirect()->route('settings.index')->with('error', 'Failed to update name');
    }

    public function updatePassword(PasswordChangeRequest $request): RedirectResponse {
        if ($this->userService->updatePassword($request->user(), $request->validated())) {
            return redirect()->route('settings.index')->with('success', 'Password updated');
        }
        return redirect()->route('settings.index')->with('error', 'Failed to update password');
    }
}
