<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line for the Auth facade
use App\Models\Car;
use App\Models\Land;
use App\Models\User;
use App\Models\Building;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
     }
     
    public function index() 
    {
        $totalCars = Car::count();
        $totalLands = Land::count();
        $totalBuildings = Building::count();

        // $password = '10101010';
        // $hashedPassword = '$2y$12$$2y$12$amIG6tdVNVYgjTcrDnUayuaqtgPay0fPMbSByqQUxLICPtm9TIi0y';
        // if (Hash::check($password, $hashedPassword)) {
        //     // Passwords match
            
        // $totalLands = "correct";
        //     exit();
        // } else {
        //     // Passwords do not match
            
        // $totalLands = "not correct";
        //     exit();
        // }

        return view('home.index', compact('totalCars','totalLands','totalBuildings'));
    }

    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect non-authenticated users to the login page
        }

        $id = Auth::user()->id;
        $profile = User::findOrFail($id);
        return view('home.show')->with('profile', $profile);
    }
}
