<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;

class FundController extends Controller
{
    public function index()
    {
        $funds = Fund::all();
        return view('funds.index', compact('funds'));
    }

    public function create()
    {   
        $funds = Fund::all();
        return view('funds.create', compact('funds'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new Fund instance with the validated data
        Fund::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('funds.create')->with('success', 'Fund created successfully!');
    }

    public function edit($id)
    {   
        $fund = Fund::findOrFail($id);
        return view('funds.edit', compact('fund'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the Fund instance and update it with the validated data
        $fund = Fund::findOrFail($id);
        $fund->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('funds.create')->with('success', 'Fund updated successfully!');
    }

    public function destroy($id)
    {
        $fund = Fund::findOrFail($id);
        $fund->delete();
        return redirect()->route('funds.create')->with('success', 'Fund deleted successfully!');
    }
}
