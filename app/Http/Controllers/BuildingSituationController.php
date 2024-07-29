<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingSituation;

class BuildingSituationController extends Controller
{
    public function index()
    {
        $building_situations = BuildingSituation::all();
        return view('building_situations.index', compact('building_situations'));
    }

    public function create()
    {   
        $building_situations = BuildingSituation::all();
        return view('building_situations.create', compact('building_situations'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new BuildingSituation instance with the validated data
        BuildingSituation::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('building_situations.create')->with('success', 'BuildingSituation created successfully!');
    }

    public function edit($id)
    {   
        $building_situation = BuildingSituation::findOrFail($id);
        return view('building_situations.edit', compact('building_situation'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the BuildingSituation instance and update it with the validated data
        $building_situation = BuildingSituation::findOrFail($id);
        $building_situation->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('building_situations.create')->with('success', 'BuildingSituation updated successfully!');
    }

    public function destroy($id)
    {
        $building_situation = BuildingSituation::findOrFail($id);
        $building_situation->delete();
        return redirect()->route('building_situations.create')->with('success', 'BuildingSituation deleted successfully!');
    }
}
