<?php

namespace App\Http\Controllers;

use App\Models\Sap;
use App\Models\SapProperty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Setting;
use Validator;
use Auth;
use Config;

class SapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $saps = Sap::paginate(15);

        $users = User::all();

        
        return view('saps.list', compact('saps', 'users'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('POST')) {
            $this->validate($request, [
                'provisional_date' => 'date_format:"Y-m-d H:i:s"|required',
                'notes' => 'max:100'
            ]);

            $sap = Sap::create([
                'lead_id' => $request->input('lead_id'),
                'product' => $request->input('product'),
                'status' => 'pending',
                'notes' => $request->input('notes'),
                'appointment_at' => $request->input('provisional_date')
            ]);

            return redirect(url('/leads/' . $sap->lead_id . '/saps'));
        }
        return '';
    }

    public function cancel(Sap $sap, $product)
    {
        $sap->delete();
        return redirect(url('/leads/' . $sap->lead_id . '/saps'));
    }

    public function show(Sap $sap)
    {            
        return view('saps.' . $sap->product . '.view-sap', compact('sap'));
    }

    public function property(Request $request, Sap $sap)
    {
        $property = $sap->property; 

        $lead = $sap->lead;

        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [
                'title' => ['required', Rule::in(array_keys(Config::get('crm.english_honorifics')))],
                'first_name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'address_1' => 'required|max:100',
                'address_2' => 'max:100',
                'address_3' => 'max:100',
                'town' => 'required|max:65',
                'county' => ['required', Rule::in(array_keys(Setting::get('counties')))],
                'postcode' => 'required|max:8',
                'email' => 'required|email|max:255',
                'landline_phone' => 'max:15',
                'mobile_phone' => 'max:15',

                'property_type' => ['required', Rule::in(array_keys(Setting::get('property_types')))],
                'boiler_type' => ['required', Rule::in(array_keys(Setting::get('boiler_types')))],
                'scaffolding_access' => 'required|in:good,average,poor',
                'year_built' => 'required|numeric',

                'loft_access' => 'required|in:good,average,poor',

                'electricity_spend' => 'required|numeric',
                'gas_spend' => 'required|numeric',
                'kw_usage' => 'required|numeric',
                'gas_saving' => 'required|numeric',
                'energy_provider' => ['required', Rule::in(array_keys(Setting::get('energy_providers')))]
            ]);

            if ($validator->fails()) return ["errors" => $validator->errors()];

            $req_data = $request->all();

            $req_data['sap_id'] = $sap->id;

            if (!$property) {
                $sap->update(['sap_step'=>1]);
                return SapProperty::create($req_data);
            }

            $sap->update(['sap_step'=>1]);
            $property->update($request->all());
            return ["success" => true];
        }else{

            return view('saps.property', compact('sap', 'property', 'lead'));
        }
        
    }

    public function system(Request $request, Sap $sap)
    {         
  
        $system = $sap->system; 

        if ($request->isMethod('POST')) {
            
            $validation_rules = Config::get('crm.products.' . $sap->product . '.system_validation');
            
            $validator = Validator::make($request->all(), $validation_rules);
            if ($validator->fails()) return ["errors" => $validator->errors()];

            $req_data = $request->all();

            $req_data['sap_id'] = $sap->id;            
            
            if (!$system){
                $sap->update(['sap_step'=>2]);                
                $temp_rooms = $req_data['rooms'];
                $req_data['rooms'] = json_encode($temp_rooms);

                return $sap->system()->create($req_data);                            
            }
            // var_dump($request->all());

            $sap->update(['sap_step'=>2]);

            switch ($system->product) {
                case 'solar-pv':
                    $system->update($request->all());
                    break;
                case 'hybrid-boiler':
                    $request_save = $request->all();
                    $temp_rooms = $request_save['rooms'];
                    $request_save['rooms'] = json_encode($temp_rooms);
                    $system->update($request_save);
                    break;
                default:
                    # code...
                    break;
            }                            
            return ["success" => true];
        }

        return view('saps.' . $sap->product . '.system', compact('sap', 'system'));
    }

    public function cash_flow(Sap $sap)
    {
        
        if($sap->sap_step < 3) $sap->update(['sap_step'=>3]);
        $system = $sap->system;

        return view('saps.' . $sap->product . '.cash-flow', compact('sap', 'system'));
    }

    public function summary(Request $request, Sap $sap)
    {
        if($sap->sap_step < 4) $sap->update(['sap_step'=>4]);
        return view('saps.' . $sap->product . '.summary', compact('sap'));
    }
}
