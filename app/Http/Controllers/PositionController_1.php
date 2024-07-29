<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function index()
    {   
        
        $positions = Position::all();
        return view('positions.index', compact('positions'));
    }


    public function create()
{
    return view('positions.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new position instance with the validated data
        Position::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('positions.index')->with('success', 'Position created successfully!');
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the department instance and update it with the validated data
        $position = Position::findOrFail($id);
        $position->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('positions.index')->with('success', 'Position updated successfully!');
    }

    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Position deleted successfully!');
    }
}
