<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Carremark;
use App\Models\User;


class RemarkController extends Controller
{
    /**
     * Display a listing of the remarks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all remarks from the database
        $remarks = Carremark::all();
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
            'remark' => 'required',
        ]);

        // Create a new remark instance and save it to the database
        Carremark::create([
            'remark' => $request->input('remark'),
            'carid' => $request->input('carid'),
            'created_user' => $request->input('created_user'),
        ]);

        $carid =  $request->input('carid');
        // Redirect the user back to the index page with a success message
        return redirect()->route('cars.show', $carid)->with('success', 'Remark created successfully!');
    }

    public function destroy(Request $request)
    {
        $remarks = Carremark::findOrFail($request->input('id'));
        $remarks->delete();
        $carid =  $request->input('carid');
        return redirect()->route('cars.show', $carid)->with('success', 'Remark deleted successfully!');
    }
   
}
