<?php
/**
 * Created by PhpStorm.
 * User: david.okosun
 * Date: 08/02/2018
 * Time: 10:39
 */

namespace App\Helpers;


class SolarCashFlowHelper
{
    public $system_annual_drop = 0.007;
    public $energy_inflation = 0.02;
    public $fit_inflation = 0.05;
    public $system = [];

    function __construct($system_info) {
        $this->system = $system_info;
    }

    public function units_generated($year)
    {
        return $this->system['annual_system_output'] * ((100 - $year*$this->system_annual_drop) / 100);
    }

    public function units_used($year)
    {
        return $this->units_generated($year) * ($this->system['solar_usage_percentage'] / 100);
    }

    public function units_exported($year)
    {
        return $this->units_generated($year) * ((100-$this->system['solar_usage_percentage']) / 100);
    }

    public function inflated_unit_cost($year)
    {
        return $this->system['electricity_rate'] * ((1+$this->energy_inflation) ** $year);
    }

    public function inflated_fit_payment($year)
    {
        return $this->units_generated($year) * (($this->system['government_fit_rate']/100) * ((1+$this->fit_inflation) ** $year));
    }

    public function value_electricity_generated($year)
    {
        return ($this->inflated_unit_cost($year)/100) * $this->units_generated($year);
    }

    public function inflated_export_unit($year)
    {
        return $this->system['government_fit_rate'] * ((1+$this->fit_inflation) ** $year);
    }

    public function inflated_export($year)
    {
        return ($this->inflated_export_unit($year)/100) * $this->units_exported($year);
    }

    public function savings_payments($year)
    {
        return $this->inflated_fit_payment($year) + $this->value_electricity_generated($year) + $this->inflated_export($year);
    }

    public function annual_total_revenue($years)
    {
        $total = 0;
        for($i=1; $i<=$years; $i++)
        {
            $total += $this->savings_payments($i);
        }
        return $total;
    }

    public function annual_total_fit($years)
    {
        $total = 0;
        for($i=1; $i<=$years; $i++)
        {
            $total += $this->inflated_fit_payment($i);
        }
        return $total;
    }

    public function annual_total_energy_cost($years, $energy_usage)
    {
        $total = 0;
        for($i=1; $i<=$years; $i++)
        {
            $total += $this->inflated_unit_cost($i) * $energy_usage;
        }
        return $total;
    }
    public function annual_total_export($years)
    {
        $total = 0;
        for($i=1; $i<=$years; $i++)
        {
            $total += $this->inflated_export($i);
        }
        return $total;
    }

    public function net_cash_flow($year)
    {
        return -$this->system['system_cost']+$this->annual_total_revenue($year);
    }

    public function get_panels_total()
    {
        $total = 0;
        for($i=0; $i < sizeof($this->system['panels']); $i++)
        {
            $total += $this->system['panels'][$i]['count'];
        }
        return $total;
    }


}