<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StateDivision;

class StateDivisionController extends Controller
{
    public function index()
    {   
        
        $state_divisions = StateDivision::all();
        return view('state_divisions.index', compact('state_divisions'));
    }


    public function create()
{
    return view('state_divisions.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new StateDivision instance with the validated data
        StateDivision::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('state_divisions.index')->with('success', 'StateDivision created successfully!');
    }

    public function edit($id)
    {
        $state_division = StateDivision::findOrFail($id);
        return view('state_divisions.edit', compact('state_division'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the StateDivision instance and update it with the validated data
        $state_division = StateDivision::findOrFail($id);
        $state_division->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('state_divisions.index')->with('success', 'StateDivision updated successfully!');
    }

    public function destroy($id)
    {
        $state_division = StateDivision::findOrFail($id);
        $state_division->delete();
        return redirect()->route('state_divisions.index')->with('success', 'StateDivision deleted successfully!');
    }
}
