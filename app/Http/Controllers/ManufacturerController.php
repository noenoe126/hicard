<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    public function index()
    {   
        
        $manufacturers = Manufacturer::all();
        return view('manufacturers.index', compact('manufacturers'));
    }


    public function create()
{
    return view('manufacturers.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new manufacturer instance with the validated data
        Manufacturer::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer created successfully!');
    }

    public function edit($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        return view('manufacturers.edit', compact('manufacturer'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the manufacturer instance and update it with the validated data
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer updated successfully!');
    }

    public function destroy($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->delete();
        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer deleted successfully!');
    }
}
