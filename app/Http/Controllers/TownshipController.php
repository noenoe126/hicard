<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Township;

class TownshipController extends Controller
{
    public function index()
    {   
        
        $townships = Township::all();
        return view('townships.index', compact('townships'));
    }


    public function create()
{
    return view('townships.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new Township instance with the validated data
        Township::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('townships.index')->with('success', 'Township created successfully!');
    }

    public function edit($id)
    {
        $township = Township::findOrFail($id);
        return view('townships.edit', compact('township'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the Township instance and update it with the validated data
        $township = Township::findOrFail($id);
        $township->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('townships.index')->with('success', 'Township updated successfully!');
    }

    public function destroy($id)
    {
        $township = Township::findOrFail($id);
        $township->delete();
        return redirect()->route('townships.index')->with('success', 'Township deleted successfully!');
    }
}
