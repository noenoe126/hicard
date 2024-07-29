<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Make;

class MakeController extends Controller
{
    public function index()
    {   
        
        $makes = Make::all();
        return view('makes.index', compact('makes'));
    }

    public function create()
    {
        $makes = Make::all();
        return view('makes.create',compact('makes'));
    }

    

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new Model instance with the validated data
        Make::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('makes.index')->with('success', 'Make created successfully!');
    }

    public function edit($id)
    {
        $make = Make::findOrFail($id);
        return view('makes.edit', compact('make'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the make instance and update it with the validated data
        $make = Make::findOrFail($id);
        $make->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('makes.index')->with('success', 'Make updated successfully!');
    }

    
    public function destroy($id)
    {
        $make = Make::findOrFail($id);
        $make->delete();
        return redirect()->route('makes.index')->with('success', 'Make deleted successfully!');
    }
}
