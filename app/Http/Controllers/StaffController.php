<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Department;
use App\Models\Position;

class StaffController extends Controller
{
    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        $deptName = Department::find($staff->dept_id)->name;
        $positionName = Position::find($staff->position_id)->name;

        return View::make('staffs.show', compact('staff', 'deptName','positionName'));
    }

    public function index()
    {  
        $staffs = Staff::with('department', 'position')->get();
       // dd($staffs); // Add this line to inspect the data
        $departments = Department::all();
        $positions = Position::all();
        return view('staffs.index', compact('staffs','departments','positions'));
    }


    
    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('staffs.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'dept_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'nrc_no' => 'required|string',
            'status' => 'required|boolean',
        ]);

        // Create a new staff instance with the validated data
        $staff = new Staff();
        $staff->name = $validatedData['name'];
        $staff->dept_id = $validatedData['dept_id'];
        $staff->position_id = $validatedData['position_id'];
        $staff->nrc_no = $validatedData['nrc_no'];
        $staff->status = $validatedData['status'];
        $staff->save();

        // Redirect back to the index page with a success message
        return redirect()->route('staffs.index')->with('success', 'Staff created successfully!');
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        $departments = Department::all();
        $positions = Position::all();
        return view('staffs.edit', compact('staff', 'departments', 'positions'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'dept_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'nrc_no' => 'required|string',
            'status' => 'required|boolean',
        ]);

        // Find the staff instance and update it with the validated data
        $staff = Staff::findOrFail($id);
        $staff->name = $validatedData['name'];
        $staff->dept_id = $validatedData['dept_id'];
        $staff->position_id = $validatedData['position_id'];
        $staff->nrc_no = $validatedData['nrc_no'];
        $staff->status = $validatedData['status'];
        $staff->save();

        // Redirect back to the index page with a success message
        return redirect()->route('staffs.index')->with('success', 'Staff updated successfully!');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return redirect()->route('staffs.index')->with('success', 'Staff deleted successfully!');
    }
}
