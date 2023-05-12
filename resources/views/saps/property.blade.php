@extends('layouts.main')

@section('content')
    @include('saps._top_bar', ["sap_step"=>$sap->sap_step])
    <form class="property" role="form">
        <div class="card customer-details">
            <div class="card-header">
                Customer Details
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-2">
                        <!-- First Name -->
                        <div class="form-group">
                            {{ Form::label('title', 'Title') }}
                            {{ Form::select('title', Config::get('crm.english_honorifics'), null, array(
                                'id'                => 'title',
                                'class'             => 'form-control',
                                'required'          => '',
                                'maxlength'         => '100',
                                'v-model'           => 'title'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
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
                                'id'            => 'town',
                                'class'         => 'form-control',
                                'required'      => '',
                                'maxlength'     => '100',
                                'v-model'       => 'town'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- County -->
                        <div class="form-group">
                            {{ Form::label('county', 'County') }}
                            {{ Form::select('county', Setting::get('counties'), 'london',
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

        <div class="row">
            <div class="col-md-4">
                <div class="card property-info">
                    <div class="card-header">
                        Property Info
                    </div>

                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Property type -->
                                <div class="form-group">
                                    {{ Form::label('property_type', 'Property Type') }}
                                    {{ Form::select('property_type', Setting::get('property_types'), null,
                                        array(
                                            'id'      => 'property_type',
                                            'class'   => 'form-control',
                                            'required' => '',
                                            'v-model'   => 'property_type'
                                    )) }}
                                    <div class="help-block with-errors"></div>
                                </div>

                                <!-- Boiler Type -->
                                <div class="form-group">
                                    {{ Form::label('boiler_type', 'Boiler Type') }}
                                    {{ Form::select('boiler_type', Setting::get('boiler_types'), null,
                                        array(
                                            'id'      => 'boiler_type',
                                            'class'   => 'form-control',
                                            'required' => '',
                                            'v-model'   => 'boiler_type'
                                    )) }}
                                    <div class="help-block with-errors"></div>
                                </div>

                                <!-- Scaffolding access -->
                                <div class="form-group">
                                    {{ Form::label('scaffolding_access', 'Scaffolding access') }}
                                    {{ Form::select('scaffolding_access', array(          
                                            'good'        => 'Good',
                                            'average'     => 'Average',
                                            'poor'        => 'Poor'
                                            ), null,
                                        array(
                                            'id'      => 'scaffolding_access',
                                            'class'   => 'form-control',
                                            'required' => '',
                                            'v-model'   => 'scaffolding_access'
                                    )) }}
                                    <div class="help-block with-errors"></div>
                                </div>

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
                                <div class="form-group">
                                    {{ Form::label('loft_access', 'Loft Access') }}
                                    {{ Form::select('loft_access', array(
                                            'good'      => 'Good',
                                            'average'   => 'Average',
                                            'poor'      => 'Poor'
                                            ), 'good',
                                        array(
                                            'id'       => 'loft_access',
                                            'class'    => 'form-control',
                                            'required' => '',
                                            'v-model'  => 'loft_access'
                                    )) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card loft">
                    <div class="card-header">
                        Energy Usage
                    </div>

                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <!-- kW Used -->
                                <div class="form-group">
                                    {{ Form::label('kw_usage', 'kW Used') }}
                                    {{ Form::text('kw_usage', null, array(
                                        'id'       => 'kw_usage',
                                        'class'    => 'form-control',
                                        'required' => '',
                                        'v-model'  => 'kw_usage'
                                    )) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
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
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Energy Provider -->
                                <div class="form-group">
                                    {{ Form::label('energy_provider', 'Energy Provider') }}
                                    {{ Form::select('energy_provider',Setting::get('energy_providers'), null, array(
                                        'id'       => 'energy_provider',
                                        'class'    => 'form-control',
                                        'required' => '',
                                        'v-model'  => 'energy_provider'
                                    )) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('saps._bottom_bar')
    </form>
@endsection

@section('custom_styles')

@endsection
@section('custom_script')
    <script>
        var app = new Vue({
            el: '#app',
            methods: {
                formSubmit: function (e) {
                    e.preventDefault();

                    $.ajax({
                        url: '{{Request::url()}}',
                        method: 'POST',
                        data: this.$data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }).done(function (response) {
                          
                        if (response.errors) {                            
                            $.each(response.errors, function (i, error) {
                                iziToast.error({message: error});
                            })
                        }                      
                        if (response.success) {                              ;
                            window.location.replace("{{url('/saps/'.$sap->id.'/system')}}");
                        }
                    });
                    
                }
            },
            data: {
                title: '{{$property['title']}}',
                first_name: '{{$property['first_name']}}',
                last_name: '{{$property['last_name']}}',
                address_1: '{{$property['address_1']}}',
                address_2: '{{$property['address_2']}}',
                address_3: '{{$property['address_3']}}',
                town: '{{$property['town']}}',
                county: '{{$property['county']}}',
                postcode: '{{$property['postcode']}}',
                email: '{{$property['email']}}',
                landline_phone: '{{$property['landline_phone']}}',
                mobile_phone: '{{$property['mobile_phone']}}',
                property_type: '{{$property['property_type']}}',
                boiler_type: '{{$property['boiler_type']}}',
                scaffolding_access: '{{$property['scaffolding_access']}}',
                year_built: '{{$property['year_built']}}',
                loft_access: '{{$property['loft_access']}}',
                electricity_spend: '{{$property['electricity_spend']}}',
                gas_spend: '{{$property['gas_spend']}}',
                kw_usage: '{{$property['kw_usage']}}',
                gas_saving: '{{$property['gas_saving']}}',
                energy_provider: '{{$property['energy_provider']}}'
            }

        });
        $('#app').validator()
            .on('valid.bs.validator', function (e) {
                $('#submitButton').prop('disabled', false);
            })
            .on('invalid.bs.validator', function (e) {
                $('#submitButton').prop('disabled', true);
            });
    </script>
@endsection