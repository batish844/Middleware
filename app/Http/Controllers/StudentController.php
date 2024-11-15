<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    //Using Laravel's Auth 
    public function login(Request $request)
    {
        // Validate that the 'name' field is required and must be a string
        $request->validate([
            'name' => 'required|string'
        ]);
    
        // Retrieve the first student with the given name from the 'students' table
        $student = Student::where('name', $request->name)->first();
    
        if ($student) {
            // Log in the student using the 'students' guard
            Auth::guard('students')->login($student);
    
            // Check if the logged-in student is a graduate
            if ($student->is_graduate) {
                // If the student is a graduate, load the 'graduate' view with student data(this will return the view without changing the route)
                return redirect()->route('graduate.page');
            }
    
            // Redirect non-graduate students to a specific page
            return redirect()->route('non-graduate.page');
        }
    
        // Redirect back with an error message if the student is not found
        return redirect()->back()->withErrors(['name' => 'Student not found']);
    }
    
    public function loginn(Request $request)
    {
        // Validate that the 'name' field is required and must be a string
        $request->validate([
            'name' => 'required|string'
        ]);
    
        // Retrieve the first student with the given name from the 'students' table
        $student = Student::where('name', $request->name)->first();
    
        if ($student) {
            // Store the student data in session manually
            session(['student' => $student]);
    
            // Check if the student is a graduate
            if ($student->is_graduate) {
                // Redirect graduates to the graduate page
                return redirect()->route('graduate.page');
            }
    
            // Redirect non-graduates to the non-graduate page
            return redirect()->route('non-graduate.page');
        }
    
        // Redirect back with an error message if the student is not found
        return redirect()->back()->withErrors(['name' => 'Student not found']);
    }
    
    public function logout(Request $request)
    {
        // Log out the authenticated student using the 'students' guard
        Auth::guard('students')->logout();
    
        // Invalidate the current session to clear stored data
        $request->session()->invalidate();
    
        // Regenerate the session token for security
        $request->session()->regenerateToken();
    
        // Redirect to the login page after logging out
        return redirect('/login');
    }
    


   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
