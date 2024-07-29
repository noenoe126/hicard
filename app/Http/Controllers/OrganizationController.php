<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return view('organizations.index', compact('organizations'));
    }

    public function create()
    {   
        $organizations = Organization::all();
        return view('organizations.create', compact('organizations'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new Organization instance with the validated data
        Organization::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('organizations.create')->with('success', 'Organization created successfully!');
    }

    public function edit($id)
    {   
        $organization = Organization::findOrFail($id);
        return view('organizations.edit', compact('organization'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the Organization instance and update it with the validated data
        $organization = Organization::findOrFail($id);
        $organization->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('organizations.create')->with('success', 'Organization updated successfully!');
    }

    public function destroy($id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();
        return redirect()->route('organizations.create')->with('success', 'Organization deleted successfully!');
    }
}
