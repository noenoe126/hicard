<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Land;
use App\Models\Landremark;
class LandController extends Controller
{

    public function show($id)
    {
        $land = Land::findOrFail($id);
        $landremarks = Landremark::where('landid', $id)->get();
        
       // return view('lands.show')->with('land', $land);
        return view('lands.show', compact('land','landremarks'));
    }

    public function index()
    {
        $lands = Land::all();
        return view('lands.index', compact('lands'));
    }

     public function create()
     {
        $lands = Land::all();
         return view('lands.create', compact('lands'));
     }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'owner' => 'required|in:government_land,department_land',
            'area' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);
            // Handle file upload
            //$photoPath = $request->file('photo')->store('car_photos');


            if (!empty($request->photo)) {
                $photoPath = time() . $request->file('photo')->getClientOriginalName();
                $request->photo->move('uploads/land_photos/', $photoPath);
            } 
            
            // Create a new car instance with the validated data
            $land = new Land();
            $land->name = $validatedData['name'];
            $land->address = $validatedData['address'];
            $land->owner = $validatedData['owner'];
            $land->area = $validatedData['area'];
            $land->photo = $photoPath; // Save the path to the uploaded photo
            
            $land->save();
        
        // Create a new car instance with the validated data
        //Car::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('lands.index')->with('success', 'Land created successfully!');
    }

    public function edit($id)
    {
        $land = Land::findOrFail($id);
        
        return view('lands.edit', compact('land'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'owner' => 'required|in:government_land,department_land',
            'area' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);
        if ($request->hasFile('photo')) {
            // Move the uploaded file
            $imageName = time() . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('uploads/land_photos/', $imageName);
            $validatedData['photo'] = $imageName;
        }
         // Find the car instance and update it with the validated data
        $land = Land::findOrFail($id);
        $land->update($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('lands.index')->with('success', 'Land updated successfully!');
    }

    public function destroy($id)
    {
        $land = Land::findOrFail($id);
        $land->delete();
        return redirect()->route('lands.index')->with('success', 'Land deleted successfully!');
    }
}