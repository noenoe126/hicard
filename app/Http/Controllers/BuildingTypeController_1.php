<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingType;

class BuildingTypeController extends Controller
{
    public function index()
    {
        $building_types = BuildingType::all();
        return view('building_types.index', compact('building_types'));
    }

    public function create()
    {   
        $building_types = BuildingType::all();
        return view('building_types.create', compact('building_types'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new buildingType instance with the validated data
        BuildingType::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('building_types.create')->with('success', 'BuildingType created successfully!');
    }

    public function edit($id)
    {   
        $building_type = BuildingType::findOrFail($id);
        return view('building_types.edit', compact('building_type'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the buildingType instance and update it with the validated data
        $building_type = BuildingType::findOrFail($id);
        $building_type->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('building_types.create')->with('success', 'BuildingType updated successfully!');
    }

    public function destroy($id)
    {
        $building_type = BuildingType::findOrFail($id);
        $building_type->delete();
        return redirect()->route('building_types.create')->with('success', 'BuildingType deleted successfully!');
    }
}
