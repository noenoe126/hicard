<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'office_id',
        'state_division_id',
        'township',
        'address',
        'live_building_id',
        'building_type_id',
        'building_fact_id',
        'current_use',
        'construction',
        'use_period',
        'cost',
        'building_old',
        'building_situation_id',
        'own_list',
        'own_type_id',
        'fund_id',
        'history',
        'photo',

        'name',
        'type_id',
        'completed',
    
    ];

    protected $casts = [
        'cost' => 'decimal:2',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

    public function state_division()
    {
        return $this->belongsTo(StateDivision::class, 'state_division_id');
    }

    public function township()
    {
        return $this->belongsTo(Township::class, 'township_id');
    }

    public function live_building()
    {
        return $this->belongsTo(LiveBuilding::class, 'live_building_id');
    }

    public function building_type()
    {
        return $this->belongsTo(BuildingType::class, 'building_type_id');
    }

    public function building_fact()
    {
        return $this->belongsTo(BuildingFact::class, 'building_fact_id');
    }

    public function building_situation()
    {
        return $this->belongsTo(BuildingSituation::class, 'building_situation_id');
    }

    public function own_type()
    {
        return $this->belongsTo(OwnType::class, 'own_type_id');
    }
    
    public function fund()
    {
        return $this->belongsTo(Fund::class, 'fund_id');
    }
}
