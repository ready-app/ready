<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportCourseController extends Controller {
    public function index() {
        return inertia("ImportCoursePage");
    }
}
