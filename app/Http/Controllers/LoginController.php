<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function index() {
        return inertia('LoginPage');
    }

    public function login(Request $request) {
        $creds = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($creds)) {
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
