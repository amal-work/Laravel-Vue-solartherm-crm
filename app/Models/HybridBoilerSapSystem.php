<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use Config;
class HybridBoilerSapSystem extends Model
{

    protected $fillable = [
        'sap_id',
        'gas_pipe_upgrad_22',
        'hybrid_boiler_type',
        'rhi_tariff',
        'rooms'          
    ];

    protected $casts = [
        
    ];    

}

