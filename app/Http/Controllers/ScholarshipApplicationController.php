<?php

// app/Http/Controllers/ScholarshipApplicationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScholarshipApplication;

class ScholarshipApplicationController extends Controller
{
    public function create()
    {
        return view('student.create_application');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:100',
            'student_email' => 'nullable|email|max:100',
            'course' => 'required|string|max:100',
            'year_level' => 'required|integer|min:1|max:4',
        ]);

        ScholarshipApplication::create($request->all());

        return redirect()->route('applications.index')->with('success', 'Application submitted successfully!');
    }

    // Show admin create form
    public function adminCreate()
    {
        return view('admin.create_application');
    }

    // Handle admin form submission
    public function adminStore(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:100',
            'student_email' => 'nullable|email|max:100',
            'course' => 'required|string|max:100',
            'year_level' => 'required|integer|min:1|max:4',
            'status' => 'required|in:Pending,Approved,Rejected',
            'remarks' => 'nullable|string',
        ]);

        ScholarshipApplication::create($request->all());

        return redirect()->back()->with('success', 'Application added successfully!');
    }

    public function index()
    {
        $applications = ScholarshipApplication::all();
        return view('applications.index', compact('applications'));
    }

    // Show edit form
    public function edit($id)
    {
        $application = ScholarshipApplication::findOrFail($id);
        return view('applications.edit', compact('application'));
    }

    // Handle update
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_name' => 'required|string|max:100',
            'student_email' => 'nullable|email|max:100',
            'course' => 'required|string|max:100',
            'year_level' => 'required|integer|min:1|max:4',
            'status' => 'required|in:Pending,Approved,Rejected',
            'remarks' => 'nullable|string',
        ]);

        $application = ScholarshipApplication::findOrFail($id);
        $application->update($request->all());

        return redirect()->route('applications.index')->with('success', 'Application updated successfully!');
    }

    public function destroy($id)
    {
        $application = ScholarshipApplication::findOrFail($id);
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully!');
    }
}
