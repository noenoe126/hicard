<?php

namespace App\Models;
use App\Http\CarController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carremark extends Model
{
    use HasFactory;

    protected $fillable = [
     'remark',
     'carid',
     'created_user',
     
     
    ];
    
}
