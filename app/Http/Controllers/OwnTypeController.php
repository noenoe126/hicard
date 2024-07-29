<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OwnType;

class OwnTypeController extends Controller
{
    public function index()
    {
        $own_types = OwnType::all();
        return view('own_types.index', compact('own_types'));
    }

    public function create()
    {   
        $own_types = OwnType::all();
        return view('own_types.create', compact('own_types'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new OwnType instance with the validated data
        OwnType::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('own_types.create')->with('success', 'OwnType created successfully!');
    }

    public function edit($id)
    {   
        $own_type = OwnType::findOrFail($id);
        return view('own_types.edit', compact('own_type'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the OwnType instance and update it with the validated data
        $own_type = OwnType::findOrFail($id);
        $own_type->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('own_types.create')->with('success', 'OwnType updated successfully!');
    }

    public function destroy($id)
    {
        $own_type = OwnType::findOrFail($id);
        $own_type->delete();
        return redirect()->route('own_types.create')->with('success', 'OwnType deleted successfully!');
    }
}
