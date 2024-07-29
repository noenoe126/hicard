<?php

namespace App\Models;
use App\Http\BuildingController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buildingremark extends Model
{
    use HasFactory;

    protected $fillable = [
     'buildingremark',
     'buildingid',
     'created_user',
     
     
    ];
    
}
