@extends('layouts.main')

@section('content')

    @include('saps._top_bar', ["sap_step"=>1])
    <form class="property" role="form" data-toggle="validator">
        <div class="card customer-details">
            <div class="card-header">
                Customer Details
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-4">
                        <!-- First Name -->
                        <div class="form-group">
                            {{ Form::label('first_name', 'First Name') }}
                            {{ Form::text('first_name', null, array(
                                'id'                => 'first_name',
                                'class'             => 'form-control',
                                'required'          => '',
                                'maxlength'         => '100',
                                'v-model'           => 'first_name'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Last Name -->
                        <div class="form-group">
                            {{ Form::label('last_name', 'Last Name') }}
                            {{ Form::text('last_name', null, array(
                                'id'                => 'last_name',
                                'class'             => 'form-control',
                                'required'          => '',
                                'maxlength'         => '100',
                                'v-model'           => 'last_name'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Address 1 -->
                        <div class="form-group">
                            {{ Form::label('address_1', 'Address 1') }}
                            {{ Form::text('address_1', null, array(
                                'id'                => 'address_1',
                                'class'             => 'form-control',
                                'required'          => '',
                                'maxlength'         => '100',
                                'v-model'           => 'address_1'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Address 2 -->
                        <div class="form-group">
                            {{ Form::label('address_2', 'Address 2') }}
                            {{ Form::text('address_2', null, array(
                                'id'        => 'address_2',
                                'class'     => 'form-control',
                                'maxlength' => '100',
                                'v-model'   => 'address_2'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Address 3 -->
                        <div class="form-group">
                            {{ Form::label('address_3', 'Address 3') }}
                            {{ Form::text('address_3', null, array(
                                'id'          => 'address_3',
                                'class'       => 'form-control',
                                'maxlength'   => '100',
                                'v-model'     => 'address_3'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Town -->
                        <div class="form-group">
                            {{ Form::label('town', 'Town') }}
                            {{ Form::text('town', null, array(
                                'id'                => 'town',
                                'class'             => 'form-control',
                                'required'          => '',
                                'maxlength'         => '100',
                                'v-model'           => 'town'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- County -->
                        <div class="form-group">
                            {{ Form::label('county', 'County') }}
                            {{ Form::select('county', Setting::get('counties', 'london'), 'london',
                                array(
                                    'id'      => 'county',
                                    'class'   => 'form-control',
                                    'v-model' => 'county'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Postcode -->
                        <div class="form-group">
                            {{ Form::label('postcode', 'Postcode') }}
                            {{ Form::text('postcode', null, array(
                                'id'        => 'postcode',
                                'class'     => 'form-control',
                                'required'  => '',
                                'maxlength' => '8',
                                'v-model'   => 'postcode'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Email -->
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, array(
                                'id'        => 'email',
                                'class'     => 'form-control',
                                'required'  => '',
                                'maxlength' => '255',
                                'v-model'   => 'email'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Landline Phone -->
                        <div class="form-group">
                            {{ Form::label('landline_phone', 'Landline Number') }}
                            {{ Form::text('landline_phone', null, array(
                                'id'        => 'landline_phone',
                                'class'     => 'form-control',
                                'maxlength' => '15',
                                'v-model'   => 'landline_phone'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Mobile Phone -->
                        <div class="form-group">
                            {{ Form::label('mobile_phone', 'Mobile Number') }}
                            {{ Form::text('mobile_phone', null, array(
                                'id'        => 'mobile_phone',
                                'class'     => 'form-control',
                                'maxlength' => '16',
                                'v-model'   => 'mobile_phone'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card property-info">
            <div class="card-header">
                Property Info
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Property type -->
                        <div class="form-group">
                            {{ Form::label('property_type', 'Property Type') }}
                            {{ Form::select('property_type', array(          
                                    'house'          => 'House',
                                    'bungalow'       => 'Bungalow',
                                    'detached'       => 'Detached',
                                    'semi-detached'  => 'Semi-detached',
                                    'terraced'       => 'Terraced'
                                    ), 'house',
                                array(
                                    'id'      => 'property_type',
                                    'class'   => 'form-control',
                                    'required' => '',
                                    'v-model'   => 'property_type'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Boiler Type -->
                        <div class="form-group">
                            {{ Form::label('boiler_type', 'Boiler Type') }}
                            {{ Form::select('boiler_type', array(          
                                    'combi'             => 'Combi',
                                    'aga_rayburn'       => 'Aga Rayburn',
                                    'press_immersion'   => 'Press Immersion',
                                    'gas'               => 'Gas',
                                    'oil'               => 'Oil',
                                    'electric'          => 'Electric',
                                    'log_burner_open'   => 'Log Burner Open',
                                    'fire_propane'      => 'Fire Propane'
                                    ), 'free_standing',
                                array(
                                    'id'      => 'boiler_type',
                                    'class'   => 'form-control',
                                    'required' => '',
                                    'v-model'   => 'boiler_type'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Scaffolding access -->
                        <div class="form-group">
                            {{ Form::label('scaffolding_access', 'Scaffolding access') }}
                            {{ Form::select('scaffolding_access', array(          
                                    'good'        => 'Good',
                                    'average'     => 'Average',
                                    'poor'        => 'Poor'
                                    ), 'good',
                                array(
                                    'id'      => 'scaffolding_access',
                                    'class'   => 'form-control',
                                    'required' => '',
                                    'v-model'   => 'scaffolding_access'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Year built -->
                        <div class="form-group">
                            {{ Form::label('year_built', 'Year built') }}
                            {{ Form::selectRange('year_built', date("Y"), 1800, date("Y"), array(
                                'id'      => 'year_built',
                                'class'   => 'form-control',
                                'v-model' => 'year_built'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card loft">
            <div class="card-header">
                Loft
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Electricity spend -->
                        <div class="form-group">
                            {{ Form::label('electricity_spend', 'Electricity spend') }}
                            {{ Form::text('electricity_spend', null, array(
                                'id'       => 'electricity_spend',
                                'class'    => 'form-control',
                                'required' => '',
                                'v-model'  => 'electricity_spend'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Gas spend -->
                        <div class="form-group">
                            {{ Form::label('gas_spend', 'Gas spend') }}
                            {{ Form::text('gas_spend', null, array(
                                'id'       => 'gas_spend',
                                'class'    => 'form-control',
                                'required' => '',
                                'v-model'  => 'gas_spend'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- KW Used -->
                        <div class="form-group">
                            {{ Form::label('kw_usage', 'KW Used') }}
                            {{ Form::text('kw_usage', null, array(
                                'id'       => 'kw_usage',
                                'class'    => 'form-control',
                                'required' => '',
                                'v-model'  => 'kw_usage'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Solar Usage -->
                        <div class="form-group">

                            {{ Form::label('solar_usage_percentage', 'Solar Usage') }}
                            {{ Form::text('solar_usage_percentage', null, array(
                                'id'      => 'solar_usage_percentage',
                                'class'   => 'form-control',
                                'required' => '',
                                'v-model'  => 'solar_usage_percentage'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Gas Saving -->
                        <div class="form-group">
                            {{ Form::label('gas_saving', 'Gas Saving') }}
                            {{ Form::text('gas_saving', null, array(
                                'id'       => 'gas_saving',
                                'class'    => 'form-control',
                                'required' => '',
                                'v-model'  => 'gas_saving'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Energy Provider -->
                        <div class="form-group">
                            {{ Form::label('energy_provider', 'Energy Provider') }}
                            {{ Form::text('energy_provider', null, array(
                                'id'       => 'energy_provider',
                                'class'    => 'form-control',
                                'required' => '',
                                'v-model'  => 'energy_provider'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Battery -->
                        <div class="form-group">
                            {{ Form::label('battery', 'Battery') }}
                            {{ Form::text('battery', null, array(
                                'id'       => 'battery',
                                'class'    => 'form-control',
                                'required' => '',
                                'v-model'  => 'battery'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Battery Usage Percent -->
                        <div class="form-group">
                            {{ Form::label('battery_usage', 'Battery Usage Percent') }}
                            {{ Form::text('battery_usage', null, array(
                                'id'       => 'battery_usage',
                                'class'    => 'form-control',
                                'required' => '',
                                'v-model'  => 'battery_usage'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Chop Clock -->
                        <div class="form-group">
                            {{ Form::label('chop_cloc', 'Chop Clock') }}
                            {{ Form::select('chop_cloc', array(
                                    'yes'   => 'Yes',
                                    'no'    => 'No'
                                    ), 'yes',
                                array(
                                    'id'       => 'chop_cloc',
                                    'class'    => 'form-control',
                                    'required' => '',
                                    'v-model'  => 'chop_cloc'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <button class="btn btn-danger">P&amp;M</button>
                <button class="btn btn-primary pull-right" v-on:click="propertySubmit">Complete Property</button>
            </div>
        </div>
    </form>
@endsection

@section('custom_styles')

@endsection
@section('custom_script')
    {{--  <script>
        var app = new Vue({
            el: '#app',
            methods: {
                propertySubmit: function () {
                    $.ajax({
                        url: '{{Request::url()}}',
                        method: 'POST',
                        data: this.$data
                    }).done(function (msg) {
                        console.log(msg);
                    });
                }
            },
            data: {!! $sap->data!!},

        });
    </script>  --}}

@endsection