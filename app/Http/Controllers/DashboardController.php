<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve total number of cars
        $totalCars = Car::count();
        $totalLands = Land::count();
       // $password = '10101010';
        //$hashedPassword = '$2y$12$$2y$12$amIG6tdVNVYgjTcrDnUayuaqtgPay0fPMbSByqQUxLICPtm9TIi0y';
        
        
        // You can retrieve more data as needed

        // Pass data to the dashboard view
        return view('dashboard', compact('totalCars','totalLands'));
        
    }

    




    
}
