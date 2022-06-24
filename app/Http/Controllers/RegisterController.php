<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStoreRequest;
use App\Services\UserService;

class RegisterController extends Controller {
    protected UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function index() {
        return inertia("RegisterPage");
    }

    public function store(RegisterStoreRequest $request) {
        $this->userService->createNewUser($request->validated());

        return redirect()->route('login');
    }
}
