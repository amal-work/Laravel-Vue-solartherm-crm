@extends('layouts.main')

@section('content')
    @include('saps._top_bar', ["sap_step"=>$sap->sap_step])

    <form class="system" role="form" data-toggle="validator">
        <div class="card array_configuration">
            <div class="card-header">
                Solar Array Configuration
            </div>

            <div class="card-block">
                <div class="row">
                    <table class="table table-striped table-responsive" id="array-config">
                        <thead>
                        <th>Panels</th>
                        <th>Power</th>
                        <th>Total kWp</th>
                        <th>Pitch</th>
                        <th>Orientation</th>
                        <th>Yield kWh</th>
                        <th>Shading Factor</th>
                        <th>Total kWh</th>
                        <th>{{ Form::button('+', array('class' => 'btn btn-success', 'id' => 'add', 'v-on:click'=>'addSolarArray')) }}</th>
                        </thead>

                        <tbody>
                            <tr is="panels" v-for="array in panels" :array="array"></tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-3 push-9 text-right">
                        <p>System Total: @{{ system_total }} kWh</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="card energy_generation_calculation">
            <div class="card-header">
                System Design
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Battery -->
                        <div class="form-group">
                            {{ Form::label('battery', 'Battery') }}
                            {{ Form::select('battery', array(
                                    'y'   => 'Yes',
                                    'n'    => 'No'
                                    ), null,
                                array(
                                    'id'       => 'battery',
                                    'class'    => 'form-control',
                                    'required' => '',
                                    'v-model'  => 'battery'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-4" v-if="battery=='y'">
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
                                    'y'   => 'Yes',
                                    'n'    => 'No'
                                    ), null,
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

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('inverter_type', 'Inverter type') }}
                            {{ Form::select('inverter_type', array(
                                    'standard'   => 'Standard Single Inverter',
                                    'solaredge'   => 'SolarEdge System - Up to 15% uplift + Monitoring',
                                    'tigo'   => 'Tigo System - Up to 15% uplift',
                                    ), null,
                                array(
                                    'id'       => 'inverter_type',
                                    'class'    => 'form-control',
                                    'required' => '',
                                    'v-model'  => 'inverter_type'
                            )) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {{ Form::label('aframes', 'A Frames') }}
                        {{ Form::number('aframes', 0, array(
                            'min'       => '0',
                            'step'      => 'any',
                            'id'        => 'aframes',
                            'class'     => 'form-control',
                            'required'  => '',
                            'v-model'   => 'aframes'
                        )) }}
                    </div>

                    <div class="col-md-3">
                        <!-- Black Framed Panels -->
                        <div class="form-group">
                            {{ Form::label('black_framed_panels', 'Black Framed Panels') }}
                            {{ Form::select('black_framed_panels', array(
                                    'y'   => 'Yes',
                                    'n'    => 'No'
                                    ), 'y',
                                array(
                                    'id'       => 'black_framed_panels',
                                    'class'    => 'form-control',
                                    'required' => '',
                                    'v-model'  => 'black_framed_panels'
                            )) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('voltage_optimiser', 'Voltage Optimiser') }}
                            {{ Form::select('voltage_optimiser', array(
                                    'y'   => 'Yes',
                                    'n'    => 'No'
                                    ), null,
                                array(
                                    'id'       => 'voltage_optimiser',
                                    'class'    => 'form-control',
                                    'required' => '',
                                    'v-model'  => 'voltage_optimiser'
                            )) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('monitoring_device', 'Monitoring device') }}
                            {{ Form::select('monitoring_device', array(
                                    'y'   => 'Yes',
                                    'n'    => 'No'
                                    ), null,
                                array(
                                    'id'       => 'monitoring_device',
                                    'class'    => 'form-control',
                                    'required' => '',
                                    'v-model'  => 'monitoring_device'
                            )) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('hot_water_controller', 'Hot water controller') }}
                            {{ Form::select('hot_water_controller', array(
                                    'y'   => 'Yes',
                                    'n'    => 'No'
                                    ), null,
                                array(
                                    'id'       => 'hot_water_controller',
                                    'class'    => 'form-control',
                                    'required' => '',
                                    'v-model'  => 'hot_water_controller'
                            )) }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-md-7 col-md-2">
                        {{ Form::label('system_cost', 'System cost:', ['class'=>'col-form-label']) }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::number('system_cost', 0, array(
                            'min'       => '0',
                            'step'      => '1',
                            'id'        => 'system_cost',
                            'class'     => 'form-control',
                            'required'  => '',
                            'v-model'   => 'system_cost'
                        )) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Calculations
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            {{ Form::label('solar_usage_percentage', '% of generated energy used') }}
                            {{ Form::number('solar_usage_percentage', null, array(
                                'id'      => 'solar_usage_percentage',
                                'class'   => 'form-control',
                                'required' => '',
                                'v-model'  => 'solar_usage_percentage'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">
                                Production
                            </div>

                            <div class="card-block">
                                @{{ system_total }} kWh
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <span>X</span>
                    </div>

                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">
                                Gov. FIT Rate
                            </div>

                            <div class="card-block">
                                {{ Form::number('government_fit_rate', Setting::get('government_fit_rate'), array(
                                    'min'       => '0',
                                    'step'      => 'any',
                                    'id'        => 'government_fit_rate',
                                    'class'     => 'form-control',
                                    'v-model'   => 'government_fit_rate',
                                    'required'  => ''
                                )) }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1 push-3">
                        <span>=</span>
                    </div>

                    <div class="col-md-2 push-3">
                        <div class="card">
                            <div class="card-header">
                                F.I.T Tariff
                            </div>

                            <div class="card-block">
                                £@{{ (system_total * (government_fit_rate/100)).toFixed(2) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">
                                Production
                            </div>

                            <div class="card-block">
                                @{{ system_total }} kWh
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <span>X</span>
                    </div>

                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">
                                % Export
                            </div>

                            <div class="card-block">
                                @{{ 100-solar_usage_percentage }}%
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <span>X</span>
                    </div>

                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">
                                Export Rate
                            </div>

                            <div class="card-block">
                                {{ Form::number('electricity_export_rate', 0, array(
                                    'min'       => '0',
                                    'step'      => 'any',
                                    'id'        => 'electricity_export_rate',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'v-model'   => 'electricity_export_rate',
                                )) }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <span>=</span>
                    </div>

                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">
                                Export Tariff
                            </div>

                            <div class="card-block">
                                £@{{ (system_total * ((100-solar_usage_percentage)/100) * (electricity_export_rate/100)).toFixed(2)
                                }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">
                                Production
                            </div>

                            <div class="card-block">
                                @{{ system_total }} kWh
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <span>X</span>
                    </div>

                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">
                                Usage
                            </div>

                            <div class="card-block">
                                @{{ solar_usage_percentage }}%
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <span>X</span>
                    </div>

                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">
                                Energy Rate
                            </div>

                            <div class="card-block">
                                {{ Form::number('electricity_rate', 0, array(
                                    'min'       => '0',
                                    'step'      => 'any',
                                    'id'        => 'electricity_rate',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'v-model'   => 'electricity_rate'

                                )) }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <span>=</span>
                    </div>

                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">
                                Energy Tariff
                            </div>

                            <div class="card-block">
                                £@{{ (system_total * (solar_usage_percentage/100) * (electricity_rate/100)).toFixed(2) }}
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
    <script type="text/x-template" id="panels-template">
        <tr>
            <td>
                <!-- Panels -->
                <div class="form-group">
                    <input type="number" step="1" min="0" class="form-control" @change="update_kwp()"
                           v-model="array.count">
                    <div class="help-block with-errors"></div>
                </div>
            </td>

            <td>
                <!-- Power -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="number" step="1" min="0" class="form-control" @change="update_kwp()"
                               v-model="array.power">
                        <div class="input-group-addon">W</div>
                    </div>
                    <div class="help-block with-errors"></div>
                </div>
            </td>

            <td>
                <!-- Total kWp -->
                <div class="form-group">
                    <input type="number" step="1" class="form-control" @change="update_kwh()" v-model="array.total_kwp"
                           disabled>
                    <div class="help-block with-errors"></div>
                </div>
            </td>

            <td>
                <!-- Pitch -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="number" step="1" class="form-control" @change="update_yield()"
                               v-model="array.pitch">
                        <div class="input-group-addon">%</div>
                    </div>
                    <div class="help-block with-errors"></div>
                </div>
            </td>

            <td>
                <!-- Orientation (°) -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="number" step="1" class="form-control" @change="update_yield()"
                               v-model="array.orientation">
                        <div class="input-group-addon">°</div>
                    </div>
                    <div class="help-block with-errors"></div>
                </div>
            </td>

            <td>
                <!-- Yield kWh -->
                <div class="form-group">
                    <input type="number" step="1" class="form-control" @change="update_kwh()" v-model="array.yield"
                           disabled>
                    <div class="help-block with-errors"></div>
                </div>
            </td>

            <td>
                <!-- Shading Factor -->
                <div class="form-group">
                    <input type="number" step="0.1" class="form-control" min="0" @change="update_kwh()" max="1"
                           v-model="array.shading_factor">
                    <div class="help-block with-errors"></div>
                </div>
            </td>

            <td>
                <!-- 	Total kWH -->
                <div class="form-group">
                    <input type="number" step="1" class="form-control" v-model="array.total_kwh" disabled>
                    <div class="help-block with-errors"></div>
                </div>
            </td>

            <td>
                {{ Form::button('-', array('class' => 'btn btn-danger remove', 'v-on:click'=> 'remove')) }}
            </td>
        </tr>
    </script>
    <script>
        Vue.component('panels', {
            props: ['array'],
            template: '#panels-template',
            methods: {
                update_yield: function () {
                    var array = this.array;
                    $.get('{{url('api/yield')}}?inclination=' + array.pitch + '&orientation=' + array.orientation + '&zone=2')
                        .done(function (response) {
                            array.yield = response;
                        });

                },
                update_kwp: function () {
                    console.log('update kwp');
                    console.log(this.array);
                    this.array.total_kwp = this.array.count * this.array.power;
                },
                update_kwh: function () {
                    this.array.total_kwh = (this.array.total_kwp * this.array.yield * this.array.shading_factor) / 1e3;
                },
                remove: function () {
                    console.log(this.array);
                    var panels_array = this.$parent.panels;
                    panels_array.splice(panels_array.indexOf(this.array), 1);
                }
            }

        });

        var app = new Vue({
            el: '#app',
            methods: {
                formSubmit: function (e) {
                    e.preventDefault();
                    this.$data.annual_system_output = this.system_total;
                    $.ajax({
                        url: '{{Request::url()}}',
                        method: 'POST',
                        data: this.$data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }).done(function (response) {
                        console.log(response);
                        if (response.errors) {
                            $.each(response.errors, function (i, error) {
                                iziToast.error({message: error});
                            })
                        }
                        if (response.success) window.location.replace("{{url('/saps/'.$sap->id.'/cash-flow')}}");
                    });
                },
                addSolarArray: function () {
                    this.panels.push({
                        'count': 0,
                        'power': 0,
                        'pitch': 0,
                        'orientation': 0,
                        'shading_factor': 0,
                        'total_kwp': 0,
                        'total_kwh': 0
                    });
                }
            },
            data: {
                battery: '{{$system['battery']}}',
                battery_usage: '{{$system['battery_usage']}}',
                solar_usage_percentage: '{{$system['solar_usage_percentage']}}',
                chop_cloc: '{{$system['chop_cloc']}}',
                panels: @if($system['panels'])
                <?php echo json_encode($system['panels']) ?>,
                @else
                    [{
                    'count': 0,
                    'power': 0,
                    'pitch': 0,
                    'orientation': 0,
                    'shading_factor': 0,
                    'total_kwp': 0,
                    'total_kwh': 0
                }],
                @endif
                aframes: '{{$system['aframes']}}',
                inverter_type: '{{$system['inverter_type']}}',
                voltage_optimiser: '{{$system['voltage_optimiser']}}',
                black_framed_panels: '{{$system['black_framed_panels']}}',
                government_fit_rate: {{Setting::get('government_fit_rate', 0)}},
                electricity_export_rate: {{Setting::get('electricity_export_rate', 0)}},
                electricity_rate: {{Setting::get('electricity_default_rate', 0)}},
                system_cost: '{{$system['system_cost']}}',
                monitoring_device: '{{$system['monitoring_device']}}',
                hot_water_controller: '{{$system['hot_water_controller']}}',
            },
            computed: {
                system_total: function () {
                    if (!this.panels) {
                        return 0;
                    }
                    return this.panels.reduce(function (total, value) {
                        console.log(total);
                        return total + Number(value.total_kwh);
                    }, 0);
                }
            }
        });
    </script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection