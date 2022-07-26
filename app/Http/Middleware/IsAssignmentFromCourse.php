<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAssignmentFromCourse {

    public function process(Request $request, Closure $next) {
        if (!$request->assignment()->course()) {
            return redirect()->route('home.index');
        }
        return $next($request);
    }
}