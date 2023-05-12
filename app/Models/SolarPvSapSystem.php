<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use Config;
class SolarPvSapSystem extends Model
{
    protected $fillable = [
        'sap_id',
        'battery',
        'battery_usage',
        'chop_cloc',
        'panels',
        'inverter_type',
        'aframes',
        'voltage_optimiser',
        'solar_usage_percentage',
        'black_framed_panels',
        'government_fit_rate',
        'electricity_export_rate',
        'electricity_rate',
        'system_cost',
        'annual_system_output',
        'monitoring_device',
        'hot_water_controller',
    ];

    protected $casts = [
        'panels' => 'array',
    ];

    public function getProductsAttribute()
    {
        $product_list = [];
        $product_list[] = ["Solar PV Panels", 10];
        $product_list[] = [Config::get('crm.products.solar-pv.inverter_types.'.$this->inverter_type), 1];
        $product_list[] = ["A-frames", $this->aframes];
        if($this->battery =='y') $product_list[] = ["Storage battery", 1];
        if($this->chop_cloc =='y') $product_list[] = ["Chop-Cloc", 1];
        if($this->voltage_optimiser =='y') $product_list[] = ["Voltage optimiser", 1];
        if($this->monitoring_device =='y') $product_list[] = ["Solar monitoring device", 1];
        if($this->hot_water_controller =='y') $product_list[] = ["Hot water controller", 1];

        return $product_list;
    }
    public function getServicesAttribute()
    {
        return Config::get('crm.products.solar-pv.services_included');
    }

}

