<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType;

class VehicleTypeController extends Controller
{
    public function index()
    {   
        
        $vehicle_types = VehicleType::all();
        return view('vehicle_types.index', compact('vehicle_types'));
    }


    public function create()
{
    return view('vehicle_types.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new VehicleType instance with the validated data
        VehicleType::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('vehicle_types.index')->with('success', 'VehicleType created successfully!');
    }

    public function edit($id)
    {
        $vehicle_type = VehicleType::findOrFail($id);
        return view('vehicle_types.edit', compact('vehicle_type'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the VehicleType instance and update it with the validated data
        $vehicle_type = VehicleType::findOrFail($id);
        $vehicle_type->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('vehicle_types.index')->with('success', 'VehicleType updated successfully!');
    }

    public function destroy($id)
    {
        $vehicle_type = VehicleType::findOrFail($id);
        $vehicle_type->delete();
        return redirect()->route('vehicle_types.index')->with('success', 'VehicleType deleted successfully!');
    }
}
