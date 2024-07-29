<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index()
    {   
        
        $grades = Grade::all();
        return view('grades.index', compact('grades'));
    }


    public function create()
{
    return view('grades.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new Grade instance with the validated data
        Grade::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('grades.index')->with('success', 'Grade created successfully!');
    }

    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the Grade instance and update it with the validated data
        $grade = Grade::findOrFail($id);
        $grade->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('grades.index')->with('success', 'Grade updated successfully!');
    }

    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully!');
    }
}
