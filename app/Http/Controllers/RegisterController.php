<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    public function index() {
        return inertia("RegisterPage");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
            'TOS_And_Privacy' => 'required|accepted'
        ], [
            'TOS_And_Privacy.accepted' => 'You must agree to the Terms of Service and Privacy Policy'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => \Hash::make($validated['password'])
        ]);

        return redirect()->route('login');
    }
}
