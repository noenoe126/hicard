<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Caruser;
use App\Models\Car;
use App\Models\Staff;
use Carbon\Carbon;


class CarUserController extends Controller
{
    
        public function index()
    {
        $carusers = Caruser::with('staff')->get();

        return view('carusers.index', compact('carusers'));
    }

    public function show($id)
    {   
        
        $caruser = Caruser::findOrFail($id);
        
        
        return view('carusers.show', compact('caruser'));
    }
        
    
    public function create()
    {
        $carusers = Caruser::all();
        $staffs = Staff::all();
        return view('carusers.create', compact('carusers','staffs'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'car_id' => 'required|integer',
            'staff_id' => 'required|integer',
            'start_date' => 'required|date_format:d-m-Y',
            'create_by' =>'required|string',
            
            
        ]);
            
            
            // Create a new car instance with the validated data
            $caruser = new Caruser();
            $caruser->staff_id = $validatedData['staff_id'];
            $caruser->car_id = $validatedData['car_id'];
            $caruser->create_by = $validatedData['create_by'];
            
            // Convert the start_date from dd-mm-yyyy to yyyy-mm-dd
            $caruser->start_date = Carbon::createFromFormat('d-m-Y', $request->input('start_date'))->format('Y-m-d');
           
            
            // Check if 'end_date' is present in the request and set it
            
            if ($request->has('end_date') && !empty($request->input('end_date'))) {
                $caruser->end_date = Carbon::createFromFormat('d-m-Y', $request->input('end_date'))->format('Y-m-d');
            } else {
                $caruser->end_date = null;
            }
            $caruser->save();

        return redirect()->route('cars.show',$validatedData['car_id'])->with('success', 'Caruser created successfully!');
    }  

    public function edit($id)
    {
        $caruser = Caruser::findOrFail($id);
        $staffs = Staff::all();
        return view('carusers.edit', compact('caruser','staffs'));
    }

    public function update(Request $request, $id)
    {
        
        // Validate the incoming request data
        $validatedData = $request->validate([

            'staff_id' => 'required|integer',
            'start_date' => 'required|date_format:d-m-Y',    
               
            
        ]);
        
        
        
         // Find the car instance and update it with the validated data
        $caruser = Caruser::findOrFail($id);

        // Convert the start_date from dd-mm-yyyy to yyyy-mm-dd
        $caruser->start_date= Carbon::createFromFormat('d-m-Y', $request->input('start_date'))->format('Y-m-d');

         // Check if 'end_date' is present in the request and set it
         if ($request->has('end_date')) {
            $caruser->end_date  = $request->input('end_date') ? Carbon::createFromFormat('d-m-Y', $request->input('end_date'))->format('Y-m-d') : null;
        }

        
        // Ensure dates are formatted correctly for MySQL
            $car_id =  $request->input('car_id');
            $validatedData['start_date'] = \Carbon\Carbon::createFromFormat('d-m-Y', $validatedData['start_date'])->format('Y-m-d');
            $validatedData['end_date'] = isset($validatedData['end_date']) ? \Carbon\Carbon::createFromFormat('d-m-Y', $validatedData['end_date'])->format('Y-m-d') : null;
            
            $caruser->update($validatedData);

            // Redirect back to the index page with a success message
            
            return redirect()->route('cars.show', $car_id,)->with('success', 'Caruser updated successfully!');
    }


    public function destroy(Request $request, $id)
    {
        $caruser = Caruser::findOrFail($id);
        $caruser->delete();
        $car_id = $request->input('car_id');
        return redirect()->route('cars.show', $car_id)->with('success', 'Caruser deleted successfully!');
    }
   
}