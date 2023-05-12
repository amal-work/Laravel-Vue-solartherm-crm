<form method="post" action="{{url('leads/'.$lead->id.'/info')}}">
    <fieldset disabled="disabled">
        {{ csrf_field() }}
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Customer information</li>
        </ol>
        <div if="info_customer">
            <div class="row">
                <div class="col-sm-6">
                    {{ Form::bsText('first_name','First name', $lead->first_name) }}
                </div>
                <div class="col-sm-6">
                    {{ Form::bsText('last_name','Last name', $lead->last_name) }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    {{ Form::bsText('landline_phone','Landline phone number', $lead->landline_phone) }}
                </div>
                <div class="col-sm-6">
                    {{ Form::bsText('mobile_phone','Mobile phone number', $lead->mobile_phone) }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {{ Form::bsText('email','Email address', $lead->email) }}
                </div>
            </div>
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Customer Address</li>
        </ol>
        <div id="info_address">
            <div class="row">
                <div class="col-sm-12">
                    {{ Form::bsText('postcode','Postcode', $lead->address->postcode) }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    {{ Form::bsText('address_1','Address 1', $lead->address->address_1) }}
                </div>
                <div class="col-sm-4">
                    {{ Form::bsText('address_2','Address 2', $lead->address->address_2) }}
                </div>
                <div class="col-sm-4">
                    {{ Form::bsText('address_3','Address 3', $lead->address->address_3) }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    {{ Form::bsText('town','Town', $lead->address->town) }}
                </div>
                <div class="col-sm-6">
                    {{ Form::bsText('county','County', $lead->address->county) }}
                </div>
            </div>
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Property information</li>
        </ol>
        <div id="info_property">
            <div class="row">
                <div class="col-sm-6">
                    {{ Form::bsSelect('property_type','Type', [
                        'flat'=>'Flat',
                        'detached'=>'Detached',
                        'semi_detached'=>"Semi-detached",
                        'terraced'=>"Terraced",
                        'end_of_terrace'=>"End of Terrace",
                        'cottage'=>"Cottage",
                        'bungalow'=>"Bungalows"
                    ], $lead->findAttribute('property_type'))}}
                </div>
                <div class="col-sm-6">
                    {{ Form::bsText('property_year_built','Year built', $lead->findAttribute('property_year_built')) }}
                </div>
                <div class="col-sm-6">
                    {{ Form::bsNumber('property_bedrooms','Bedrooms', $lead->findAttribute('property_bedrooms')) }}
                </div>
                <div class="col-sm-6">
                    {{ Form::bsNumber('property_bathrooms','Bathrooms', $lead->findAttribute('property_bathrooms')) }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    {{ Form::bsSelect('boiler_fuel','Boiler fuel', ['gas'=>'Gas', 'electricity'=>'Electricity', 'oil'=>'Oil'], $lead->findAttribute('boiler_fuel')) }}
                </div>
                <div class="col-sm-4">
                    {{ Form::bsSelect('boiler_type', 'Boiler type', ['combi'=>'Combi', 'system'=>'System', 'conventional'=>'Conventional'], $lead->findAttribute('boiler_type')) }}
                </div>
                <div class="col-sm-4">
                    {{ Form::bsNumber('boiler_age', 'Boiler age', $lead->findAttribute('boiler_age')) }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    {{ Form::bsNumber('electricity_spend', 'Electricity spend', $lead->findAttribute('electricity_spend')) }}
                </div>
                <div class="col-sm-6">
                    {{ Form::bsNumber('gas_spend', 'Gas spend', $lead->findAttribute('gas_spend')) }}
                </div>
            </div>
        </div>
    </fieldset>
</form>