<?php

namespace App\Http\Controllers;
use App\Models\Land;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Landremark;
use App\Models\User;


class LandRemarkController extends Controller
{
    /**
     * Display a listing of the remarks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all remarks from the database
        $landremarks = Landremark::all();
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
            'landremark' => 'required',
        ]);

        // Create a new remark instance and save it to the database
        Landremark::create([
            'landremark' => $request->input('landremark'),
            'landid' => $request->input('landid'),
            'created_user' => $request->input('created_user'),
        ]);

        $landid =  $request->input('landid');
        // Redirect the user back to the index page with a success message
        return redirect()->route('lands.show', $landid)->with('success', 'Remark created successfully!');
    }

    

    public function destroy(Request $request)
    {
        $landremarks = Landremark::findOrFail($request->input('id'));
        $landremarks->delete();
        $landid =  $request->input('landid');
        return redirect()->route('lands.show', $landid)->with('success', 'Remark deleted successfully!');
    }
}
