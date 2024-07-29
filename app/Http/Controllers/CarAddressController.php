<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CarAddress;
use App\Models\User;


class CarAddressController extends Controller
{   
    public function show($carId)
{
    $car = Car::orderBy('created_at', 'desc')->findOrFail($carId);
    $car_addresses = $car->addresses; // Assuming you have a relationship defined

    return view('car.show', compact('car', 'car_addresses'));
}

    /**
     * Display a listing of the car_addresses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all car_addresses from the database
        $car_addresses = CarAddress::all();
        // Return a view and pass the car_addresses data to it
        //return view('cars.show', compact('car_addresses'));
    }

    /**
     * Show the form for creating a new car_addresses.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view for creating a new car_addresses
        //return view('car_addresses.create');
    }

    /**
     * Store a newly created car_addresses in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'car_address' => 'required',
            'car_user_dept' => 'required',
        ]);

        // Update the status of other car address rows for this car_id to 0
        CarAddress::where('car_id', $request->car_id)->update(['status' => 0]);
        
        // Create a new car_addresses instance and save it to the database
        CarAddress::create([
            'car_address' => $request->input('car_address'),
            'car_id' => $request->input('car_id'),
            'status' => 1,
            'created_user' => $request->input('created_user'),
            'car_user_dept' => $request->input('car_user_dept'),
            
        ]);

        $car_id =  $request->input('car_id');
        // Redirect the user back to the index page with a success message
        return redirect()->route('cars.show', $car_id)->with('success', 'Car_address created successfully!');
    }

    

    public function destroy(Request $request)
    {
        $car_addresses = CarAddress::findOrFail($request->input('id'));
        $car_addresses->delete();
        $car_id =  $request->input('car_id');
        return redirect()->route('cars.show', $car_id,)->with('success', 'Car_address deleted successfully!');
    }

    public function edit($id)
    {
        $car_address = CarAddress::findOrFail($id);
        return view('cars.show', compact('car_address'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'car_address' => 'required',
            'car_user_dept' => 'required',
            
            
        ]);
        
         // Find the car instance and update it with the validated data
        $caraddress = CarAddress::findOrFail($id);
        $caraddress->update($validatedData);

        $car_id =  $request->input('car_id');
        // Redirect the user back to the index page with a success message
        return redirect()->route('cars.show', $car_id)->with('success', 'Car_address Updated successfully!');
    }
}
