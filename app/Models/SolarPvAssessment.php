<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolarPvAssessment extends Model
{
    protected $fillable = [
        'lead_id',
        'homeowner',
        'under_65',
        'boiler_fuel',
        'electricity_spend',
        'occupation',
        'partner',
        'partner_occupation',
        'household_income_over_20k',
        'property_type',
        'property_occupants',
        'property_year_built',
        'property_roof_pitch',
        'property_roof_underfelt',
        'property_roof_obstructions',
        'property_roof_facing',
        'property_bedrooms',
        'property_loft_insulation',
        'property_cavity_walls',
        'property_listed',
        'property_conservation_area',
        'building_work_planned',
        'planning_to_move',
        'bad_credit'
    ];
    public function lead(){
        return $this->belongsTo(Lead::class);
    }
}
