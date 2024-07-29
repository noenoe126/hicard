<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {   
        
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    // public function create()
    // {
    //     $manufacturers = Manufacturer::all();
    //     return view('manufacturers.create',compact('manufacturers'));
    // }

    public function create()
{
    return view('locations.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new manufacturer instance with the validated data
        Location::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('locations.index')->with('success', 'Location created successfully!');
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the manufacturer instance and update it with the validated data
        $location = Location::findOrFail($id);
        $location->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('locations.index')->with('success', 'Location updated successfully!');
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully!');
    }
}
