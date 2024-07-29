<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FuelType;

class FuelTypeController extends Controller
{
    public function index()
    {   
        
        $fuel_types = FuelType::all();
        return view('fuel_types.index', compact('fuel_types'));
    }


    public function create()
{
    return view('fuel_types.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new FuelType instance with the validated data
        FuelType::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('fuel_types.index')->with('success', 'FuelType created successfully!');
    }

    public function edit($id)
    {
        $fuel_type = FuelType::findOrFail($id);
        return view('fuel_types.edit', compact('fuel_type'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the FuelType instance and update it with the validated data
        $fuel_type = FuelType::findOrFail($id);
        $fuel_type->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('fuel_types.index')->with('success', 'FuelType updated successfully!');
    }

    public function destroy($id)
    {
        $fuel_type = FuelType::findOrFail($id);
        $fuel_type->delete();
        return redirect()->route('fuel_types.index')->with('success', 'FuelType deleted successfully!');
    }
}
