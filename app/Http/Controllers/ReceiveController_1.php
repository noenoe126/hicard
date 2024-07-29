<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receive;

class ReceiveController extends Controller
{
    public function index()
    {   
        
        $receives = Receive::all();
        return view('receives.index', compact('receives'));
    }


    public function create()
{
    return view('receives.create');
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new Receive instance with the validated data
        Receive::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('receives.index')->with('success', 'Receive created successfully!');
    }

    public function edit($id)
    {
        $receive = Receive::findOrFail($id);
        return view('receives.edit', compact('receive'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the Receive instance and update it with the validated data
        $receive = Receive::findOrFail($id);
        $receive->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('receives.index')->with('success', 'Receive updated successfully!');
    }

    public function destroy($id)
    {
        $receive = Receive::findOrFail($id);
        $receive->delete();
        return redirect()->route('receives.index')->with('success', 'Receive deleted successfully!');
    }
}
