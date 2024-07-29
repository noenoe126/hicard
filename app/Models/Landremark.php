<?php

namespace App\Models;
use App\Http\LandController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landremark extends Model
{
    use HasFactory;

    protected $fillable = [
     'landremark',
     'landid',
     'created_user',
     
     
    ];
    
}
