<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LiveBuilding;

class LiveBuildingController extends Controller
{
    public function index()
    {
        $live_buildings = LiveBuilding::all();
        return view('live_buildings.index', compact('live_buildings'));
    }

    public function create()
    {   
        $live_buildings = LiveBuilding::all();
        return view('live_buildings.create', compact('live_buildings'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new livebuilding instance with the validated data
        LiveBuilding::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('live_buildings.create')->with('success', 'LiveBuilding created successfully!');
    }

    public function edit($id)
    {   
        $live_building = LiveBuilding::findOrFail($id);
        return view('live_buildings.edit', compact('live_building'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the livebuilding instance and update it with the validated data
        $live_building = LiveBuilding::findOrFail($id);
        $live_building->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('live_buildings.create')->with('success', 'LiveBuilding updated successfully!');
    }

    public function destroy($id)
    {
        $live_building = LiveBuilding::findOrFail($id);
        $live_building->delete();
        return redirect()->route('live_buildings.create')->with('success', 'LiveBuilding deleted successfully!');
    }
}
