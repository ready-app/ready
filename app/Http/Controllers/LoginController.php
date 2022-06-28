<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function index() {
        return inertia('LoginPage');
    }

    public function login(UserLoginRequest $request) {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.index'));
        }

        return back()->withErrors([
            'overall' => 'Login failed'
        ]);
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('home.index');
    }
}
