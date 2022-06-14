<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller {
    public function loginPage() {
        return inertia('LoginPage');
    }
    public function registrationPage() {
        return inertia('RegistrationPage');
    }
    public function schedulePage() {
        return inertia('SchedulePage');
    }
    public function courseworkPage() {
        return inertia('CourseworkPage');
    }
    public function import_coursePage() {
        return inertia('Import_CoursePage');
    }
}
