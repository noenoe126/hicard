<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Building;
use App\Models\Type;
use App\Models\Organization;
use App\Models\Office;
use App\Models\StateDivision;
use App\Models\Township;
use App\Models\LiveBuilding;
use App\Models\BuildingType;
use App\Models\BuildingFact;
use App\Models\BuildingSituation;
use App\Models\OwnType;
use App\Models\Fund;


use App\Models\Buildingremark;

class BuildingController extends Controller
{

    public function show($id)
    {
    $building = Building::findOrFail($id);
    //$typeName = Type::find($building->type_id)->name;
    $organizationName = Organization::find($building->organization_id)->name;
    $officeName = Office::find($building->office_id)->name;
    $stateDivisionName = StateDivision::find($building->state_division_id)->name;
    $townshipName = Township::find($building->township_id)->name;
    $liveBuildingName = LiveBuilding::find($building->live_building_id)->name;
    $buildingTypeName = BuildingType::find($building->building_type_id)->name;
    $buildingFactName = BuildingFact::find($building->building_fact_id)->name;
    $buildingSituationName = BuildingSituation::find($building->building_situation_id)->name;
    $ownTypeName = OwnType::find($building->own_type_id)->name;
    $fundName = Fund::find($building->fund_id)->name;

    $buildingremarks = Buildingremark::where('buildingid', $id)->get();
    
    return View::make('buildings.show', compact('building', 'buildingremarks',  'organizationName','officeName','stateDivisionName', 'townshipName', 
                        'liveBuildingName', 'buildingTypeName','buildingFactName', 'buildingSituationName', 'ownTypeName', 'fundName'));

    }

    public function index()
    {
       
        $buildings = Building::all();
        $types = Type::all();
        $organizations = Organization::all();
        $offices = Office::all();
        $state_divisions = StateDivision::all();
        $townships = Township::all();
        $live_buildings = LiveBuilding::all();
        $building_types = BuildingType::all();
        $building_facts = BuildingFact::all();
        $building_situations = BuildingSituation::all();
        $own_types = OwnType::all();
        $funds = Fund::all();

        return view('buildings.index', compact('buildings','types', 'organizations','offices', 'state_divisions', 'townships','live_buildings','building_types',
                                                    'building_facts', 'building_situations', 'own_types', 'funds'));
    }

     
     public function create()
    {
        $buildings = Building::all();
        $types = Type::all();
        $organizations = Organization::all();
        $offices = Office::all();
        $state_divisions = StateDivision::all();
        $townships = Township::all();
        $live_buildings = LiveBuilding::all();
        $building_types = BuildingType::all();
        $building_facts = BuildingFact::all();
        $building_situations = BuildingSituation::all();
        $own_types = OwnType::all();
        $funds = Fund::all();

        return view('buildings.create', compact('buildings','types', 'organizations','offices', 'state_divisions', 'townships', 'live_buildings', 'building_types',
                                                    'building_facts', 'building_situations', 'own_types', 'funds'));
        
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'organization_id' => 'required|string',
            'office_id' => 'required|string',
            'state_division_id' => 'required|string',
            'township_id' => 'required|string',
            'address' => 'required|string',
            'live_building_id' => 'required|string',
            'building_type_id' => 'required|string',
            'building_fact_id' => 'required|string',
            'current_use' => 'required',
            'use_period' => 'required|string',
            'cost' => 'required|numeric',
            'building_old' => 'required|string',
            'building_situation_id' => 'required|string',
            'own_list' => 'required',
            'own_type_id' => 'required|string',
            'fund_id' => 'required|string',
            'history' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            //'name' => 'string',
            'type_id' => 'string',
            'construction' => 'numeric',
            'completed' => 'numeric',
            
        ]);
           


            if (!empty($request->photo)) {
                $photoPath = time() . $request->file('photo')->getClientOriginalName();
                $request->photo->move('uploads/car_photos/', $photoPath);
            }else { 
                $photoPath ='unavailable_image.png';
            }
            
            // Create a new car instance with the validated data
            $building = new Building();
            $building->organization_id = $validatedData['organization_id'];
            $building->office_id = $validatedData['office_id'];
            $building->state_division_id = $validatedData['state_division_id'];
            $building->township_id = $validatedData['township_id'];
            $building->address = $validatedData['address'];
            $building->live_building_id = $validatedData['live_building_id'];
            $building->building_type_id = $validatedData['building_type_id'];
            $building->building_fact_id = $validatedData['building_fact_id'];
            $building->current_use = $validatedData['current_use'];
            $building->construction = $validatedData['construction'];
            $building->use_period = $validatedData['use_period'];
            $building->cost = $validatedData['cost'];
            $building->building_old = $validatedData['building_old'];
            $building->building_situation_id = $validatedData['building_situation_id'];
            $building->own_list = $validatedData['own_list'];
            $building->own_type_id = $validatedData['own_type_id'];
            $building->fund_id = $validatedData['fund_id'];
            $building->history = $validatedData['history'];

            
            $building->photo = $photoPath; // Save the path to the uploaded photo
            
            
            $building->save();
        
        // Create a new car instance with the validated data
        //Car::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('buildings.index')->with('success', 'Building created successfully!');
    }
    
    public function edit($id)
    {
        $building = Building::findOrFail($id);
        $types = Type::all();
        $organizations = Organization::all();
        $offices = Office::all();
        $state_divisions = StateDivision::all();
        $townships = Township::all();
        $live_buildings = LiveBuilding::all();
        $building_types = BuildingType::all();
        $building_facts = BuildingFact::all();
        $building_situations = BuildingSituation::all();
        $own_types = OwnType::all();
        $funds = Fund::all();

        return view('buildings.edit', compact('building','types', 'organizations','offices', 'state_divisions','townships', 'live_buildings',
                                                'building_types', 'building_facts', 'building_situations', 'own_types', 'funds'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'organization_id' => 'required|string',
            'office_id' => 'required|string',
            'state_division_id' => 'required|string',
            'township_id' => 'required|string',
            'address' => 'required|string',
            'live_building_id' => 'required|string',
            'building_type_id' => 'required|string',
            'building_fact_id' => 'required|string',
            'current_use' => 'required',
            'construction' => 'required|numeric',
            'use_period' => 'required|string',
            'cost' => 'required|numeric',
            'building_old' => 'required|string',
            'building_situation_id' => 'required|string',
            'own_list' => 'required',
            'own_type_id' => 'required|string',
            'fund_id' => 'required|string',
            'history' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'name' => 'string',
            'type_id' => 'string',
            'completed' => 'numeric',
            
        ]);
        if ($request->hasFile('photo')) {
            // Move the uploaded file
            $imageName = time() . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('uploads/car_photos/', $imageName);
            $validatedData['photo'] = $imageName;
        }
         // Find the car instance and update it with the validated data
        $building = Building::findOrFail($id);
        $building->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('buildings.index')->with('success', 'Building updated successfully!');
    }

    public function destroy($id)
    {
        $building = Building::findOrFail($id);
        $building->delete();
        return redirect()->route('buildings.index')->with('success', 'Building deleted successfully!');
    }
    
}