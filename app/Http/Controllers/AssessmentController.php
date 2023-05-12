<?php

namespace App\Http\Controllers;
use App\Models\HybridBoilerAssessment;
use App\Models\SolarPvAssessment;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class AssessmentController extends Controller
{
    private $solar_pv_assessment_rules = [
        'homeowner' => 'in:y,n',
        'under_65' => 'in:y,n',
        'boiler_fuel' => 'in:gas,electricity,oil',
        'electricity_spend' => 'required|max:255',
        'occupation' => 'in:full_time,part_time,retired',
        'partner' => 'in:no,married,living',
        'partner_occupation' => 'in:na,unemployed,working,retired',
        'household_income_over_20k' => 'in:y,n',
        'property_type' => 'in:flat,detached,semi_detached,terraced,end_of_terrace,cottage,bungalow',
        'property_occupants' => 'required|max:255',
        'property_year_built' => 'required|max:255',
        'property_roof_pitch' => 'in:flat,pitched',
        'property_roof_underfelt' => 'in:y,n',
        'property_roof_obstructions' => 'required|max:255',
        'property_roof_facing' => 'required|max:255',
        'property_bedrooms' => 'required|max:255',
        'property_loft_insulation' => 'in:y,n',
        'property_cavity_walls' => 'in:y,n',
        'property_listed' => 'in:y,n',
        'property_conservation_area' => 'in:y,n',
        'building_work_planned' => 'in:y,n',
        'planning_to_move' => 'in:y,n',
        'bad_credit' => 'in:y,n'
    ];

    private $hybrid_boiler_assessment_rules = [
        'homeowner' => 'in:y,n',
        'under_65' => 'in:y,n',
        'boiler_fuel' => 'in:gas,electricity,oil',
        'gas_spend' => 'required|max:255',
        'boiler_type' => 'in:combi,system,conventional',
        'boiler_age' => 'required|max:255',
        'boiler_location' => 'required|max:255',
        'occupation' => 'in:full_time,part_time,retired',
        'partner' => 'in:no,married,living',
        'partner_occupation' => 'in:na,unemployed,working,retired',
        'household_income_over_20k' => 'in:y,n',
        'property_type' => 'in:flat,detached,semi_detached,terraced,end_of_terrace,cottage,bungalow',
        'property_occupants' => 'required|max:255',
        'property_year_built' => 'required|max:255',
        'property_loft_room' => 'in:y,n',
        'property_loft_room_built' => 'required|max:255',
        'property_bedrooms' => 'required|max:255',
        'property_loft_insulation' => 'in:y,n',
        'property_cavity_walls' => 'in:y,n',
        'property_extension' => 'in:y,n',
        'property_conservatory' => 'in:y,n',
        'property_has_solar' => 'in:y,n',
        'property_listed' => 'in:y,n',
        'property_conservation_area' => 'in:y,n',
        'building_work_planned' => 'in:y,n',
        'planning_to_move' => 'in:y,n',
        'bad_credit' => 'in:y,n'
    ];
    public function index(Request $request){
        $users = User::all();

        // Solar PV assessments
        $solar_assessments = SolarPvAssessment::query();
        if ($request->has('name')) {
            $solar_assessments->whereHas('lead', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('name') . '%');
            });
        }

        if ($request->has('postcode')) {
            $solar_assessments->whereHas('lead', function ($q) use ($request) {
                $q->where('postcode', 'like', '%' . $request->input('postcode') . '%');
            });
        }

        if ($request->has('phone')) {
            $solar_assessments->whereHas('lead', function ($q) use ($request) {
                $q->where('phone', 'like', '%' . $request->input('phone') . '%');
            });
        }

        $assessments = $solar_assessments->paginate(15);
        return view('assessments.list', compact('users', 'assessments'));
    }

    public function add(Request $request)
    {
        $product = $request->input('product');

        if ($request->isMethod('POST')) {
            if ($product == 'solar-pv') {
                Validator::validate($request->all(), $this->solar_pv_assessment_rules);

                SolarPvAssessment::create($request->all());
                return redirect('leads/'.$request->input('lead_id').'/assessment');
            }

            if ($product == 'hybrid-boiler') {
                Validator::validate($request->all(), $this->hybrid_boiler_assessment_rules);

                HybridBoilerAssessment::create($request->all());
                return redirect('leads/'.$request->input('lead_id').'/assessment');
            }
        }

        $assessment = [];

        if ($product == 'solar-pv') return view('assessments.solar_pv', compact('assessment'));
        if ($product == 'hybrid-boiler') return view('assessments.hybrid_boiler', compact('assessment'));

        return "Invalid product";
    }

    public function solar_pv(Request $request, SolarPvAssessment $assessment)
    {
        if($request->isMethod('POST'))
        {
            Validator::validate($request->all(), $this->solar_pv_assessment_rules);
            $assessment->update($request->all());
        }

        return view('assessments.solar_pv', compact('assessment'));
    }

    public function hybrid_boiler(Request $request, HybridBoilerAssessment $assessment)
    {
        if($request->isMethod('POST'))
        {
            Validator::validate($request->all(), $this->hybrid_boiler_assessment_rules);
            $assessment->update($request->all());
        }

        return view('assessments.hybrid_boiler', compact('assessment'));
    }
}
