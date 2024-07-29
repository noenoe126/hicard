<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Caruser extends Model
{
    use HasFactory;

    
    protected $fillable = [
     'car_id',
     'staff_id',
     'start_date',
     'create_by',
     'update_by', 
     
    ];

    
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    // If there is a relationship with a Staff model, define it like this
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    
    
}
