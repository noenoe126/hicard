<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Car;
use App\Models\Staff;
use App\Models\Carremark;
use App\Models\CarAddress;
use App\Models\Manufacturer;
use App\Models\CarModel;
use App\Models\Make;
//use App\Models\Wheel;
use App\Models\VehicleType;
//use App\Models\EnginePower;
//use App\Models\Capacity;
use App\Models\FuelType;
use App\Models\Township;
use App\Models\StateDivision;
use App\Models\Grade;
use App\Models\Receive;
use App\Models\BudgetYear;
use Illuminate\Support\Facades\DB;


//use App\Models\Location;
use App\Models\Caruser;

class CarController extends Controller
{
    public function index()
    {
    
    $cars = Car::with(['manufacturer', 'model','wheel','build_type','engine_power','capacity','fuel_type','township','state_division','grade','receive'])->get();
    $car_addresses = CarAddress::all();
    $car_user_depts = CarAddress::all();
    
    return view('cars.index', compact('cars','car_addresses','car_user_depts'));

    }
    
    public function show($id)
    {   
        
       // $car = Car::findOrFail($id);
       $car = Car::with(['carusers.staff.department', 'carusers.staff.position'])->findOrFail($id);
       // Sort carusers by created_at in descending order
        $car->carusers = $car->carusers->sortByDesc('created_at');
        $staffs = Staff::all();
        $manufacturerName = Manufacturer::find($car->manufacturer_id)->name;
        $buildTypeName = VehicleType::find($car->build_type_id)->name;
        $fuelTypeName = FuelType::find($car->fuel_type_id)->name;
        $townshipName = Township::find($car->township_id)->name;
        $stateDivisionName = StateDivision::find($car->state_division_id)->name;
        $gradeName = Grade::find($car->grade_id)->name;
        $receiveName = Receive::find($car->receive_id)->name;
        $BudgetyrName = BudgetYear::find($car->budget_year_id)->name;


        //$locationName = Location::find($car->location_id)->name;
        $modelName = CarModel::find($car->model_id)->name;
       // $makeName = Make::find($car->make_id)->name;
        $remarks = Carremark::where('carid', $id)->orderBy('created_at', 'desc')->get();
        $carusers = Caruser::where('car_id', $id)->orderBy('created_at', 'desc')->get();
       
        $car_addresses = CarAddress::where('car_id', $id)->orderBy('created_at', 'desc')->get();
        $car_address_count = $car_addresses->count();
        
        
        return view('cars.show', compact('car','manufacturerName','buildTypeName','modelName','staffs','remarks','car_addresses','carusers','fuelTypeName','townshipName','stateDivisionName','gradeName','receiveName','car_address_count','BudgetyrName'));
    }
        
    
    public function create()
    {
        $cars = Car::all();
        //$manufacturers = Manufacturer::findOrFail($request->input('manufacturer_id'));
        $manufacturers = Manufacturer::all();
       // $wheels = Wheel::all();
        $build_types = VehicleType::all();
        //$engine_powers = EnginePower::all();
       // $capacities = Capacity::all();
        $fuel_types = FuelType::all();
        $townships = Township::all();
        $state_divisions = StateDivision::all();
        $grades = Grade::all();
        $receives = Receive::all();
        $budget_years = BudgetYear::all();

        //$locations = Location::all();
        $models = CarModel::all();
        $makes = Make::all();
        return view('cars.create', compact('manufacturers','cars','models','makes','build_types','fuel_types','townships','state_divisions','grades','receives','budget_years'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'plate_number' => 'required|string',
            'manufacturer_id' => 'required|string',
            'model_id' => 'required|string',
            'make_id' => '',
            'build_type_id' => 'required|string',
            'year' => 'required|string',
            
            'wheel' => 'required|numeric',
            'engine_power' => 'required|numeric',
            'capacity' => 'required|numeric',
            'weight' => 'required|numeric',
            'fuel_type_id' => 'required|string',
            'body_no' => 'required|string',
            'engine_no' => 'required|string',
            'proc_date' => 'required|string',
            'license_exp' => 'required|date',
            'township_id' => 'required|string',
           'state_division_id' => 'required|string',
            'vehicle_use' => 'required|string',
            'condition' => 'required|string',
            'grade_id' => 'required|string',
            'budget_year_id' => 'required|string',
            'receive_id' => 'required|string',
            'mileage' => '',
            'color' => '',
            'licence' => '',
            //'fuel_type' => 'required|string',
            //'location_id' => '|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            //'build_type' => 'required|string',
            
        ]);
            


            if (!empty($request->photo)) {
                $photoPath = time() . $request->file('photo')->getClientOriginalName();
                $request->photo->move('uploads/car_photos/', $photoPath);
            }else { 
                $photoPath ='unavailable_image.png';
            }
            
            
            // Create a new car instance with the validated data
            $car = new Car();
            $car->plate_number = $validatedData['plate_number'];
            $car->manufacturer_id = $validatedData['manufacturer_id'];
            $car->model_id= $validatedData['model_id'];
            //$car->make_id = $validatedData['make_id'];
            $car->build_type_id = $validatedData['build_type_id'];
            $car->year = $validatedData['year'];
            $car->wheel = $validatedData['wheel'];
            $car->engine_power = $validatedData['engine_power'];
            $car->capacity = $validatedData['capacity'];
            $car->weight = $validatedData['weight'];
            $car->fuel_type_id = $validatedData['fuel_type_id'];
            
            $car->body_no = $validatedData['body_no'];
            $car->engine_no = $validatedData['engine_no'];
            $car->proc_date = $validatedData['proc_date'];
            $car->license_exp = $validatedData['license_exp'];
            $car->township_id = $validatedData['township_id'];
            $car->state_division_id = $validatedData['state_division_id'];
           $car->vehicle_use = $validatedData['vehicle_use'];
            $car->condition = $validatedData['condition'];

            $car->grade_id = $validatedData['grade_id'];
            $car->budget_year_id = $validatedData['budget_year_id'];
            $car->receive_id = $validatedData['receive_id'];
           // $car->mileage = $validatedData['mileage'];
            //$car->color = $validatedData['color'];
           // $car->licence = $validatedData['licence'];
            //$car->fuel_type = $validatedData['fuel_type'];
            //$car->location_id = $validatedData['location_id'];
          
          $car->photo = $photoPath; // Save the path to the uploaded photo
            
            
            $car->save();
        
        // Create a new car instance with the validated data
        //Car::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('cars.index')->with('success', 'Car created successfully!');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $manufacturers = Manufacturer::all();
       // $wheels = Wheel::all();
        $build_types = VehicleType::all();
        //$engine_powers = EnginePower::all();
       // $capacities = Capacity::all();
        $fuel_types = FuelType::all();
        $townships = Township::all();
        $state_divisions = StateDivision::all();
        $grades = Grade::all();
        $receives = Receive::all();
        $budget_years = BudgetYear::all();
        //$locations = Location::all();
        $models = CarModel::all();
        $makes = Make::all();
        return view('cars.edit', compact('car', 'manufacturers','models','makes','build_types','fuel_types','townships','state_divisions','grades','receives','budget_years'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'plate_number' => 'required|string',
            'manufacturer_id' => 'required|string',
            'model_id' => 'required|string',
            'make_id' => '',
            'build_type_id' => 'required|string',
            'year' => 'required|string',
            
            'wheel' => 'required|numeric',
            'engine_power' => 'required|numeric',
            'capacity' => 'required|numeric',
            'weight' => 'required|numeric',
            'fuel_type_id' => 'required|string',
            'body_no' => 'required|string',
            'engine_no' => 'required|string',
            'proc_date' => 'required|string',
            'license_exp' => 'required|string',
            'township_id' => 'required|string',
            'state_division_id' => 'required|string',
            'vehicle_use' => 'required|string',
            'condition' => 'required|string',
            'grade_id' => 'required|string',
            'budget_year_id' => 'required|string',
            'receive_id' => 'required|string',
            'mileage' => '',
            'color' => '',
            'licence' => '',
            //'fuel_type' => '|string',
            'location_id' => '|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            
        ]);
        if ($request->hasFile('photo')) {
            // Move the uploaded file
            $imageName = time() . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('uploads/car_photos/', $imageName);
            $validatedData['photo'] = $imageName;
        }
         // Find the car instance and update it with the validated data
        $car = Car::findOrFail($id);
        $car->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }

    public function usingcarreport()
    {
        // Eager load the necessary relationships for all cars
        $cars = Car::with(['carusers.staff.department', 'carusers.staff.position'])->get();
    
        // Pass the 'cars' variable to the view
        return view('reports.usingcarreport', compact('cars'));
    }

    // public function carreport()
    // {
    
    // $cars = Car::with(['manufacturer', 'model','wheel','build_type','engine_power','capacity','fuel_type','township','state_division','grade','receive','budget_year'])->get();
    
    // $car_addresses = CarAddress::all();
    // $car_user_depts = CarAddress::all();
   
    
    // return view('reports.carreport', compact('cars','car_addresses','car_user_depts'));

    // }
    public function carreport(Request $request)
    {
        $plate_number = $request->input('plate_number');
        $manufacturer = $request->input('manufacturer');
        $model = $request->input('model');
        $build_type = $request->input('build_type');
        $year = $request->input('year');
        $wheel = $request->input('wheel');
        $engine_power = $request->input('engine_power');
        $capacity = $request->input('capacity');
        $weight = $request->input('weight');
        $fuel_type = $request->input('fuel_type');
        $body_no = $request->input('body_no');
        $engine_no = $request->input('engine_no');
        $proc_date = $request->input('proc_date');
        $license_exp = $request->input('license_exp');
        $township = $request->input('township');
        $state_division = $request->input('state_division');
        $vehicle_use = $request->input('vehicle_use');
        $condition = $request->input('condition');
        $grade = $request->input('grade');
        $budget_year = $request->input('budget_year');
        $receive = $request->input('receive');
        $carremarks = $request->input('carremarks');
    
        $cars = Car::with(['manufacturer', 'model', 'wheel', 'build_type', 'engine_power', 'capacity', 'fuel_type', 'township', 'state_division', 'grade', 'receive', 'budget_year', 'carremarks'])
            ->where(function($query) use ($plate_number, $manufacturer, $model, $build_type, $year, $wheel, $engine_power, $capacity, $weight, $fuel_type, $body_no, $engine_no, $proc_date, $license_exp, $township, $state_division, $vehicle_use, $condition, $grade, $budget_year, $receive, $carremarks) {
                if ($plate_number) {
                    $query->where('plate_number', 'like', "%$plate_number%");
                }
                if ($manufacturer) {
                    $query->whereHas('manufacturer', function($q) use ($manufacturer) {
                        $q->where('name', 'like', "%$manufacturer%");
                    });
                }
                if ($model) {
                    $query->whereHas('model', function($q) use ($model) {
                        $q->where('name', 'like', "%$model%");
                    });
                }
                if ($build_type) {
                    $query->whereHas('build_type', function($q) use ($build_type) {
                        $q->where('name', 'like', "%$build_type%");
                    });
                }
                if ($year) {
                    $query->where('year', $year);
                }
                if ($wheel) {
                    $query->where('wheel', $wheel);
                }
                if ($engine_power) {
                    $query->where('engine_power', $engine_power);
                }
                if ($capacity) {
                    $query->where('capacity', $capacity);
                }
                if ($weight) {
                    $query->where('weight', $weight);
                }
                if ($fuel_type) {
                    $query->whereHas('fuel_type', function($q) use ($fuel_type) {
                        $q->where('name', 'like', "%$fuel_type%");
                    });
                }
                if ($body_no) {
                    $query->where('body_no', 'like', "%$body_no%");
                }
                if ($engine_no) {
                    $query->where('engine_no', 'like', "%$engine_no%");
                }
                if ($proc_date) {
                    $query->where('proc_date', $proc_date);
                }
                if ($license_exp) {
                    $query->where('license_exp', $license_exp);
                }
                if ($township) {
                    $query->whereHas('township', function($q) use ($township) {
                        $q->where('name', 'like', "%$township%");
                    });
                }
                if ($state_division) {
                    $query->whereHas('state_division', function($q) use ($state_division) {
                        $q->where('name', 'like', "%$state_division%");
                    });
                }
                if ($vehicle_use) {
                    $query->where('vehicle_use', 'like', "%$vehicle_use%");
                }
                if ($condition) {
                    $query->where('condition', $condition);
                }
                if ($grade) {
                    $query->whereHas('grade', function($q) use ($grade) {
                        $q->where('name', 'like', "%$grade%");
                    });
                }
                if ($budget_year) {
                    $query->whereHas('budget_year', function($q) use ($budget_year) {
                        $q->where('name', 'like', "%$budget_year%");
                    });
                }
                if ($receive) {
                    $query->whereHas('receive', function($q) use ($receive) {
                        $q->where('name', 'like', "%$receive%");
                    });
                }
                if ($carremarks) {
                    $query->whereHas('carremarks', function($q) use ($carremarks) {
                        $q->where('remark', 'like', "%$carremarks%");
                    });
                }
            })
            ->get();
    
        $car_addresses = CarAddress::all();
        $car_user_depts = CarAddress::all();
    
        return view('reports.carreport', compact('cars', 'car_addresses', 'car_user_depts'));
    }
    


    public function totalcarreport()
    {
        // Execute the query
            $reportData = DB::table('car_addresses')
                    ->select(DB::raw('COUNT(*) as count, car_user_dept'))
                    ->where('status', 1)
                    ->groupBy('car_user_dept')
                    ->get();

    // Pass the data to the view
        return view('reports.totalcarreport', ['reportData' => $reportData]);

    }
    
}