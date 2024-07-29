<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;

class ModelController extends Controller
{
    public function index()
    {   
        
        $models = CarModel::all();
        return view('models.index', compact('models'));
    }

    public function create()
    {
        $models = CarModel::all();
        return view('models.create',compact('models'));
    }

    

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new Model instance with the validated data
        CarModel::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('models.index')->with('success', 'Model created successfully!');
    }

    public function edit($id)
    {
        $model = CarModel::findOrFail($id);
        return view('models.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Find the model instance and update it with the validated data
        $model = CarModel::findOrFail($id);
        $model->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('models.index')->with('success', 'Model updated successfully!');
    }

    public function destroy($id)
    {
        $model = CarModel::findOrFail($id);
        $model->delete();
        return redirect()->route('models.index')->with('success', 'Model deleted successfully!');
    }
}
