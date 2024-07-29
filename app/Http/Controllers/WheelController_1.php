<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wheel;

class WheelController extends Controller
{
    public function index()
    {   
        
        $wheels = Wheel::all();
        return view('wheels.index', compact('wheels'));
    }


    public function create()
{
    return view('wheels.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new Wheel instance with the validated data
        Wheel::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('wheels.index')->with('success', 'Wheel created successfully!');
    }

    public function edit($id)
    {
        $wheel = Wheel::findOrFail($id);
        return view('wheels.edit', compact('wheel'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the Wheel instance and update it with the validated data
        $wheel = Wheel::findOrFail($id);
        $wheel->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('wheels.index')->with('success', 'wheel updated successfully!');
    }

    public function destroy($id)
    {
        $wheel = Wheel::findOrFail($id);
        $wheel->delete();
        return redirect()->route('wheels.index')->with('success', 'wheel deleted successfully!');
    }
}
