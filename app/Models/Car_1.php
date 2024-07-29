<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Remark;


class Car extends Model
{
    use HasFactory;

    
    protected $fillable = [
     'plate_number',
     'manufacturer_id',
     'model_id',
     'make_id', 
     'build_type_id', 
     'year', 
     'wheel', 
     'engine_power',
     'capacity', 
     'weight', 
     'fuel_type_id',
     'body_no', 
     'engine_no',
     'proc_date', 
     'license_exp', 
     'township_id',
     'state_division_id',
     'vehicle_use',
     'condition',
     'grade_id',
     
     'budget_year_id',
     'receive_id',
     'mileage',
     'color',
     'licence',
     'fuel_type',
     //'location_id',
     'photo',
    ];

    public function carusers()
    {
        return $this->hasMany(Caruser::class, 'car_id');
    }

    public function staff()
{
    return $this->belongsTo(Staff::class);
}

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function wheel()
    {
        return $this->belongsTo(Wheel::class);
    }

    public function build_type()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function engine_power()
    {
        return $this->belongsTo(EnginePower::class);
    }

    public function capacity()
    {
        return $this->belongsTo(Capacity::class);
    }

    public function fuel_type()
    {
        return $this->belongsTo(FuelType::class);
    }

    public function township()
    {
        return $this->belongsTo(Township::class);
    }

    public function state_division()
    {
        return $this->belongsTo(StateDivision::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function receive()
    {
        return $this->belongsTo(Receive::class);
    }

    public function budget_year()
    {
        return $this->belongsTo(BudgetYear::class);
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

   
public function carremarks() {
    return $this->hasMany(Carremark::class, 'carid');
}

    
}
