<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HybridBoilerAssessment extends Model
{
    protected $fillable = [
        'lead_id',
        'homeowner',
        'under_65',
        'boiler_fuel',
        'gas_spend',
        'boiler_type',
        'boiler_age',
        'boiler_location',
        'occupation',
        'partner',
        'partner_occupation',
        'household_income_over_20k',
        'property_type',
        'property_occupants',
        'property_year_built',
        'property_loft_room',
        'property_loft_room_built',
        'property_bedrooms',
        'property_loft_insulation',
        'property_cavity_walls',
        'property_extension',
        'property_conservatory',
        'property_has_solar',
        'property_listed',
        'property_conservation_area',
        'building_work_planned',
        'planning_to_move',
        'bad_credit'
    ];
}
