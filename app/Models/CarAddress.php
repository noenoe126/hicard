<?php

namespace App\Models;
use App\Http\CarController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarAddress extends Model
{
    use HasFactory;

    protected $fillable = [
     'car_address',
     'car_id',
     'status',
     'created_user',
     'car_user_dept'
     
    ];
    
}
