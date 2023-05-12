<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SapProperty extends Model
{
    protected $fillable = [
        'sap_id',
        'title',
        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'address_3',
        'town',
        'county',
        'postcode',
        'email',
        'landline_phone',
        'mobile_phone',
        'property_type',
        'boiler_type',
        'scaffolding_access',
        'year_built',
        'loft_access',
        'electricity_spend',
        'gas_spend',
        'kw_usage',
        'gas_saving',
        'energy_provider'
    ];
}
