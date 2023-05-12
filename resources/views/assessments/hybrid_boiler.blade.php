@extends('layouts.main')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-block">
            <form action="{{$assessment?url('assessments/hybrid-boiler/'.$assessment->id):url('assessments/add')}}" method="post">
                <input type="hidden" name="product" value="hybrid-boiler">
                <input type="hidden" name="lead_id" value="{{$assessment?$assessment->lead_id:Request::get('lead_id')}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::bsSelect('homeowner','Are you a homeowner?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->homeowner:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('under_65','Under 65 years old?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->under_65:'') }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::bsSelect('boiler_fuel','How do you heat your home?', ['gas'=>'Gas', 'electricity'=>'Electricity', 'oil'=>'Oil'], $assessment?$assessment->boiler_fuel:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsText('gas_spend','How much do you spend on you Gas?', $assessment?$assessment->gas_spend:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('boiler_type', 'What type of boiler is it?', ['combi'=>'Combi', 'system'=>'System', 'conventional'=>'Conventional'], $assessment?$assessment->boiler_type:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsText('boiler_age', 'How old is your boiler?', $assessment?$assessment->boiler_age:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsText('boiler_location', 'Where is your boiler located?', $assessment?$assessment->boiler_location:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('occupation', 'Current occupation', ['full_time'=>'Working full time', 'part_time'=>'Working part time', 'retired'=>'Retired'], $assessment?$assessment->occupation:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('partner', 'Are you married/living with a partner?', ['no'=>'No', 'married'=>'Married', 'living'=>'Living with a partner'], $assessment?$assessment->partner:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('partner_occupation', 'Occupation of your partner?', ['na'=> 'N/A', 'unemployed'=>'Unemployed', 'working'=>'Working', 'retired'=>'Retired'], $assessment?$assessment->partner_occupation:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('household_income_over_20k', 'Is your household annual income over 20K per year?', ['n'=>'No', 'y'=>'Yes'], $assessment?$assessment->household_income_over_20k:'') }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::bsSelect('property_type','What type of property is it?', [
                            'flat'=>'Flat',
                            'detached'=>'Detached',
                            'semi_detached'=>"Semi-detached",
                            'terraced'=>"Terraced",
                            'end_of_terrace'=>"End of Terrace",
                            'cottage'=>"Cottage",
                            'bungalow'=>"Bungalows",
                        ], $assessment?$assessment->property_type:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsNumber('property_occupants', 'How many adults live at the property?', $assessment?$assessment->property_occupants:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsNumber('property_year_built','When was the property built?', $assessment?$assessment->property_year_built:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('property_loft_room','Do you have a loft room?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->property_loft_room:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsNumber('property_loft_room_built','When was it built?', $assessment?$assessment->property_loft_room_built:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsNumber('property_bedrooms','How many bedrooms do you have?', $assessment?$assessment->property_bedrooms:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('property_loft_insulation','Do you have loft insulation?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->property_loft_insulation:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('property_cavity_walls','Do you have cavity walls?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->property_cavity_walls:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('property_extension','Do you have an extension?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->property_extension:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('property_conservatory','Do you have a conservatory?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->property_extension:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('property_has_solar','Do you have solar panels?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->property_has_solar:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('property_listed','Is the property listed?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->property_listed:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('property_conservation_area','Is the property in a conservation area?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->property_conservation_area:'') }}

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::bsSelect('building_work_planned','Do you have any building work planned in the next 12 months?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->building_work_planned:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('planning_to_move','Are you thinking of moving in the next 5 years?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->planning_to_move:'') }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::bsSelect('bad_credit','Do you have bad credit (CCJs/ IVAs etc)?', ['y'=>'Yes', 'n'=>'No'], $assessment?$assessment->bad_credit:'') }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="{{$assessment?'Save changes': 'Submit'}}" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection