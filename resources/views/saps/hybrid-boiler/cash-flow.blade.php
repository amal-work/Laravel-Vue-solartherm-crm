<?php $cash_flow = new SolarCashFlowHelper($sap->system->toArray());
 ?>
@extends('layouts.main')

@section('content')
    @include('saps._top_bar', ["sap_step"=>$sap->sap_step])
    
    <div class="card energy_generation_calculation">
        <div class="card-header">
            Boiler Information
        </div>

        <div class="card-block">
            <div class="row">
                <div class="col-md-4">
                    <!-- Battery -->
                    <div class="form-group">                            
                        {{ Form::label('gas_pipe_upgrade_22', '22mm Gas Pipe Upgrade') }}
                        <input type="text" name="" readonly="" value="{{$system->gas_pipe_upgrad_22}}" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Battery Usage Percent -->
                    <div class="form-group">
                        {{ Form::label('hybrid_boiler_type', 'Hybrid Boiler Type') }}                                
                        <input type="text" name="" readonly="" value="{{$system->hybrid_boiler_type}}" class="form-control">                            
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Chop Clock -->
                    <div class="form-group">
                        {{ Form::label('rhi_tariff', 'RHI Tariff') }}
                        <input type="text" name="" readonly="" value="{{$system->rhi_tariff}}" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card total-heat-container">
        <div class="card curent-trends">
            <div class="card-header">
                What if current trends continue?
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive-sm table-bordered">
                            <tbody>
                                <tr>
                                    <td>T1 (Internal temperature - <sup>o</sup>C)</td>
                                    <td>{{$system['temperature_in']}}</td>
                                    <td><i aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Internal temperature" class="fa fa-info-circle fa-lg"></i></td>
                                </tr>
                                <tr>
                                    <td>Internal temperature - <sup>o</sup>C</td>
                                    <td>{{$system['temperature_outer']}}</td>
                                    <td><i aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Internal temperature" class="fa fa-info-circle fa-lg"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">U (overall heat transfer coefficient - W/(m2K))</div>
                <div class="card-block">
                    $100
                </div>
            </div>        
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">A (total area - m 2)</div>
                <div class="card-block">
                    $100
                </div>
            </div>        
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Q (Heat transfer - W)</div>
                <div class="card-block">
                    $0.80
                </div>
            </div>        
        </div>
    </div> 

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Boiler replacement Cost</div>
                <div class="card-block">
                    $100
                </div>
            </div>        
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Chemical Clean</div>
                <div class="card-block">
                    $100
                </div>
            </div>        
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Projected Savings & RHI Income</div>
                <div class="card-block">
                    $0.80
                </div>
            </div>        
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><span class="badge badge-primary">Assesor:</span></div>
                <div class="card-block">
                    Oskar
                </div>
            </div>        
        </div>        
    </div>     
    @include('saps._bottom_bar')
@endsection

@section('custom_script')
    <script>
        var app = new Vue({
            el: '#app',
            methods: {
                formSubmit: function () {
                    window.location.replace("{{url('/saps/'.$sap->id.'/summary')}}");
                }
            }
        });
    </script>
@endsection