<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportcourseController extends Controller {
    public function index() {
        return inertia("ImportCoursePage");
    }
}
