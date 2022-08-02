<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller {
    public function index() {
        return inertia('admin/AdminPage');
    }
}
