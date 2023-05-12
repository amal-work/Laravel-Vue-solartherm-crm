<?php

namespace App\Console\Commands;

use App\Models\Lead;
use App\Models\LeadAllocation;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AssignLeads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assignleads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign leads to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $settings = Settings::where('key','=','leadallocation')->offset(0)->limit(1)->get()->pluck('value'); // Get Settings from table about lead allocation.
        $Data = json_decode($settings[0]); // Convert JSON data to array.
        $Source = $Data->source; // Get Only Source settings Array.
        $Postcode = $Data->postcode; // Get Only Source settings Array.

        foreach($Data as $object => $d)
        {
            if($object == 'source')
            {
                // Leads Allocation With Source ID Condition.
                foreach($Source as $key=>$v)
                {
                    $allocatedleads = LeadAllocation::get()->pluck('lead_id');
                    $RemainLeadsuser = Lead::whereNotIn('id', $allocatedleads)->where('source_id',$v->source_id)->get(); // Get Leads For Allocation To Users
                    foreach($RemainLeadsuser as $value)
                    {
                        $allocate = new LeadAllocation();
                        $allocate->lead_id = $value->id;
                        $allocate->user_id = $v->user_id;
                        $allocate->type = 'Lead Type';
                        $allocate->save();
                    }
                }

            }elseif($object == 'postcode')
            {
                // Leads Allocation with PostCode Condition.
                $totalassignedleadsquery = DB::Select('SELECT GROUP_CONCAT(id) as allocatedleads from lead_allocations'); // Get All Allocated Leads
                $totalassignedleads = $totalassignedleadsquery[0]->allocatedleads;
                // Assign blank value if still a single lead is not assign to any user.
                if(!isset($totalassignedleads)){
                    $totalassignedleads = "''";
                }
                foreach($Postcode as $K => $Code)
                {
                    $start = strlen($Code->postcode) + 1; // PostCode Expression Start Point
                    // Query To Get Count leads that are still not assign and that matches to particular postcode expression
                    $totalleadsquery = DB::Select("SELECT COUNT(leads.id) as totalremainleads FROM leads as leads INNER JOIN addresses as ad ON leads.address_id = ad.id WHERE ad.postcode LIKE '".$Code->postcode."%' AND SUBSTRING(ad.postcode, ".$start.", 1) REGEXP '[[:digit:]]' AND leads.id NOT IN (".$totalassignedleads.") AND ad.postcode IS NOT NULL");
                    $totalremainleads = $totalleadsquery[0]->totalremainleads;
                    // Get number of leads assign to the user based on his/her percentage as defined in setting.
                    $leads_assign = floor(($totalremainleads*$Code->percentage)/100);
                    // Get Uopdated leads that are already allocated.
                    $allocatedleadsQuery = DB::Select('SELECT GROUP_CONCAT(id) as allocatedleads from lead_allocations');
                    $allocatedleads = $allocatedleadsQuery[0]->allocatedleads;
                    // Assign blank value if still a single lead is not assign to any user.
                    if(!isset($allocatedleads)){
                        $allocatedleads = "''";
                    }
                    // Get Leads Data For assignment to the user.
                    $Data = DB::Select("SELECT leads.*,ad.postcode FROM leads as leads INNER JOIN addresses as ad ON leads.address_id = ad.id WHERE ad.postcode LIKE '".$Code->postcode."%' AND SUBSTRING(ad.postcode, ".$start.", 1) REGEXP '[[:digit:]]' AND leads.id NOT IN (".$allocatedleads.") AND ad.postcode IS NOT NULL LIMIT $leads_assign");
                    foreach($Data as $value)
                    {
                        $allocate = new LeadAllocation();
                        $allocate->lead_id = $value->id;
                        $allocate->user_id = $Code->user_id;
                        $allocate->type = 'Lead Type';
                        $allocate->save();
                    }
                }
            }
        }
        echo "\e[01;32m Leads Assign Successfully...\e[0m \n";
    }
}
