<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingFact;

class BuildingFactController extends Controller
{
    public function index()
    {
        $building_facts = BuildingFact::all();
        return view('building_facts.index', compact('building_facts'));
    }

    public function create()
    {   
        $building_facts = BuildingFact::all();
        return view('building_facts.create', compact('building_facts'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new BuildingFact instance with the validated data
        BuildingFact::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('building_facts.create')->with('success', 'BuildingFact created successfully!');
    }

    public function edit($id)
    {   
        $building_fact = BuildingFact::findOrFail($id);
        return view('building_facts.edit', compact('building_fact'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the BuildingFact instance and update it with the validated data
        $building_fact = BuildingFact::findOrFail($id);
        $building_fact->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('building_facts.create')->with('success', 'BuildingFact updated successfully!');
    }

    public function destroy($id)
    {
        $building_fact = BuildingFact::findOrFail($id);
        $building_fact->delete();
        return redirect()->route('building_facts.create')->with('success', 'BuildingFact deleted successfully!');
    }
}
