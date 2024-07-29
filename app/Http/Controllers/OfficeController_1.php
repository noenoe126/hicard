<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::all();
        return view('offices.index', compact('offices'));
    }

    public function create()
    {   
        $offices = Office::all();
        return view('offices.create', compact('offices'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new Office instance with the validated data
        Office::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('offices.create')->with('success', 'office created successfully!');
    }

    public function edit($id)
    {   
        $office = Office::findOrFail($id);
        return view('offices.edit', compact('office'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the Office instance and update it with the validated data
        $office = Office::findOrFail($id);
        $office->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('offices.create')->with('success', 'Office updated successfully!');
    }

    public function destroy($id)
    {
        $office = Office::findOrFail($id);
        $office->delete();
        return redirect()->route('offices.create')->with('success', 'Office deleted successfully!');
    }
}
