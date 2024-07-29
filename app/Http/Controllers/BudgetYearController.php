<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetYear;

class BudgetYearController extends Controller
{
    public function index()
    {   
        
        $budget_years = BudgetYear::all();
        return view('budget_years.index', compact('budget_years'));
    }

    public function create()
    {
        $budget_years = BudgetYear::all();
        return view('budget_years.create',compact('budget_years'));
    }

    

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new BudgetYear instance with the validated data
        BudgetYear::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('budget_years.index')->with('success', 'BudgetYear created successfully!');
    }

    public function edit($id)
    {
        $budget_year = BudgetYear::findOrFail($id);
        return view('budget_years.edit', compact('budget_year'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the BudgetYear instance and update it with the validated data
        $budget_year = BudgetYear::findOrFail($id);
        $budget_year->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('budget_years.index')->with('success', 'BudgetYear updated successfully!');
    }

    public function destroy($id)
    {
        $budget_year = BudgetYear::findOrFail($id);
        $budget_year->delete();
        return redirect()->route('budget_years.index')->with('success', 'BudgetYear deleted successfully!');
    }
}
