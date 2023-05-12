<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sap extends Model
{
    use SoftDeletes;

    protected $fillable = ['lead_id', 'sap_step', 'product', 'data', 'status', 'appointment_at', 'notes'];

    protected $dates = ['deleted_at'];

    public function lead()
    {
        return $this->belongsTo('App\Models\Lead');
    }

    public function property()
    {
        return $this->hasOne('App\Models\SapProperty', 'sap_id');
    }

    public function system()
    {
        switch ($this->product) {
            case 'solar-pv':
                return $this-> hasOne('App\Models\SolarPvSapSystem', 'sap_id');
                break;
            case 'hybrid-boiler':
                return $this-> hasOne('App\Models\HybridBoilerSapSystem', 'sap_id');
                break;
        }     
        return $this->hasOne('App\Models\SolarPvSapSystem', 'sap_id');
    }


    public function hybridSystem()
    {
        return $this->hasOne('App\Models\HybridBoilerSapSystem', 'sap_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
