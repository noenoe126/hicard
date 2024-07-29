<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'dept_id',
    'position_id',
    'nrc_no',
    'status',
    ];

  
public function department()
{
    return $this->belongsTo(Department::class, 'dept_id');
}

public function position()
{
    return $this->belongsTo(Position::class, 'position_id');
}
    
}
