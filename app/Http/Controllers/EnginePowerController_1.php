<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnginePower;

class EnginePowerController extends Controller
{
    public function index()
    {   
        
        $engine_powers = EnginePower::all();
        return view('engine_powers.index', compact('engine_powers'));
    }


    public function create()
{
    return view('engine_powers.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new EnginePower instance with the validated data
        EnginePower::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('engine_powers.index')->with('success', 'EnginePower created successfully!');
    }

    public function edit($id)
    {
        $engine_power = EnginePower::findOrFail($id);
        return view('engine_powers.edit', compact('engine_power'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the EnginePower instance and update it with the validated data
        $engine_power = EnginePower::findOrFail($id);
        $engine_power->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('engine_powers.index')->with('success', 'EnginePower updated successfully!');
    }

    public function destroy($id)
    {
        $engine_power = EnginePower::findOrFail($id);
        $engine_power->delete();
        return redirect()->route('engine_powers.index')->with('success', 'EnginePower deleted successfully!');
    }
}
