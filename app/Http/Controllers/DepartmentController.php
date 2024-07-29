<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {   
        
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }


    public function create()
{
    return view('departments.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new manufacturer instance with the validated data
        Department::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('departments.index')->with('success', 'Department created successfully!');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the department instance and update it with the validated data
        $department = Department::findOrFail($id);
        $department->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('departments.index')->with('success', 'Department updated successfully!');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully!');
    }
}
