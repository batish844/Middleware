<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckGraduate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // Middleware handle method to manage graduate and non-graduate access
    public function handle(Request $request, Closure $next, $Role): Response
    {
        //For session feature
        // $student = session('students');

        // Retrieve the currently authenticated student from the 'students' guard
        $student = Auth::guard('students')->user();

        if ($student) {
            // Check if the student is a graduate
            if ($student->is_graduate && $Role == 'graduate') {
                // Allow request to proceed if student is a graduate
                return $next($request);
            }

            // Check if the student is not a graduate
            if (!$student->is_graduate && $Role == 'non-graduate') {
                return $next($request);
            }

            // Redirect unauthenticated users to login page with an error message
            return redirect('/login')->withErrors(['name' => 'Unauthorized action']);
        }
    }
}
