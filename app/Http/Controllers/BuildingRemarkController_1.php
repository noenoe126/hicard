<?php

namespace App\Http\Controllers;
use App\Models\Building;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Buildingremark;
use App\Models\User;


class BuildingRemarkController extends Controller
{
    /**
     * Display a listing of the remarks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all remarks from the database
        $buildingremark = Buildingremark::all();
        // Return a view and pass the remarks data to it
        //return view('cars.show', compact('remarks'));
    }

    /**
     * Show the form for creating a new remark.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view for creating a new remark
        //return view('remarks.create');
    }
    

    /**
     * Store a newly created remark in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'buildingremark' => 'required',
        ]);

        // Create a new remark instance and save it to the database
        Buildingremark::create([
            'buildingremark' => $request->input('buildingremark'),
            'buildingid' => $request->input('buildingid'),
            'created_user' => $request->input('created_user'),
        ]);

        $buildingid =  $request->input('buildingid');
        // Redirect the user back to the index page with a success message
        return redirect()->route('buildings.show', $buildingid)->with('success', 'Remark created successfully!');
    }

    // public function edit($id)
    // {
    //     $building = Building::findOrFail($id);
    //     $types = Type::all();
    //     return view('buildings.edit', compact('building','types'));
    // }

    // public function update(Request $request, $id)
    // {
    //     // Validate the incoming request data
    //     $validatedData = $request->validate([
    //         'buildingremark' => 'required|string',
    //         'buildingid' => 'required|string',
    //         'created_user' => 'required|string',    
    //     ]);
        
    //      // Find the car instance and update it with the validated data
    //     $remarks = Buildingremark::findOrFail($id);
    //     $remarks->update($validatedData);

    //     // Redirect back to the index page with a success message
    //     return redirect()->route('buildings.show')->with('success', 'Remark updated successfully!');
    // }
    
    public function destroy(Request $request)
    {
        $buildingremarks = Buildingremark::findOrFail($request->input('id'));
        $buildingremarks->delete();
        $buildingid =  $request->input('buildingid');
        return redirect()->route('buildings.show', $buildingid)->with('success', 'Remark deleted successfully!');
    }

    
    
}
