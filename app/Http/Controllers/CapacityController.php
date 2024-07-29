<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacity;

class CapacityController extends Controller
{
    public function index()
    {   
        
        $capacities = Capacity::all();
        return view('capacities.index', compact('capacities'));
    }


    public function create()
{
    return view('capacities.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new Capacity instance with the validated data
        Capacity::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('capacities.index')->with('success', 'Capacity created successfully!');
    }

    public function edit($id)
    {
        $capacity = Capacity::findOrFail($id);
        return view('capacities.edit', compact('capacity'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the Capacity instance and update it with the validated data
        $capacity = Capacity::findOrFail($id);
        $capacity->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('capacities.index')->with('success', 'Capacity updated successfully!');
    }

    public function destroy($id)
    {
        $capacity = Capacity::findOrFail($id);
        $capacity->delete();
        return redirect()->route('capacities.index')->with('success', 'Capacity deleted successfully!');
    }
}
