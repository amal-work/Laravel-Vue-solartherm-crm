<?php $cash_flow = new SolarCashFlowHelper($sap->system->toArray());
 ?>
@extends('layouts.main')

@section('content')
    @include('saps._top_bar', ["sap_step"=>$sap->sap_step])
    <div class="card curent-trends">
        <div class="card-header">
            What if current trends continue?
        </div>

        <div class="card-block">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-responsive-sm">
                        <tbody>
                        <tr>
                            <td>Cost of System and Installation</td>
                            <td>£{{number_format($sap->system->system_cost, 2)}}</td>
                            <td><i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                   data-placement="right" title="The cost of the system"></i></td>
                        </tr>
                        <tr>
                            <td>Estimate Units Produced by the PV panels per annum</td>
                            <td>{{$sap->system->annual_system_output}}kWh</td>
                            <td><i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                   data-placement="right"
                                   title="The uplifted production by 15% because it is a SolarEdge optimised system"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Government F.I.T Payment for ALL Units Produced</td>
                            <td>£{{number_format($sap->system->annual_system_output * $sap->system->government_fit_rate/100, 2)}}</td>
                            <td><i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                   data-placement="right"
                                   title="The current fit rate guaranteed for 20 years and is tax free and linked to the RPI"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Average current cost per kWh to customer</td>
                            <td>{{$sap->system->electricity_rate}}p/kWh</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Export Tariff</td>
                            <td>{{$sap->system->electricity_export_rate}}p/kWh</td>
                            <td><i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                   data-placement="right"
                                   title="The current rate paid by the government exported by to the grid. It will be assumed this will be 50% of production unless the customer has a smart meter."></i>
                            </td>
                        </tr>
                        <tr>
                            <td>% of Electricity generated that the consumer expects to use</td>
                            <td>{{$sap->system->solar_usage_percentage}}%</td>
                            <td><i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                   data-placement="right"
                                   title="The percentage of energy being used against production from the solar panel."></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Annual Percentage Inflation on PV Units Used</td>
                            <td>12.50%</td>
                            <td><i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                   data-placement="right" title="Costs/Savings"></i></td>
                        </tr>
                        <tr>
                            <td>Annual Retail Price Increase</td>
                            <td>2.50%</td>
                            <td><i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                   data-placement="right" title="Applied o the FITs Paid"></i></td>
                        </tr>
                        <tr>
                            <td>Annual Efficiency Losses</td>
                            <td>0.70%</td>
                            <td><i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                   data-placement="right"
                                   title="Percentage degradation on previous year's output, 1% p.a would degrade the output by approx 22% after 25 years"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Total Potential Income over 20 years</td>
                            <td>£{{number_format($cash_flow->annual_total_revenue(20), 2)}}</td>
                            <td><i class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                                   data-placement="left"
                                   title="System itself generates this sum before the cost of the system is paid off."></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p>The performance of solar PV systems is impossible to predict with certainty due to the
                        variable conditions of solar radiation from location to location and from time to time of
                        the year. Your roof design, pitch, overshading have been taken into account by using a
                        combination of bespoke software and satellite imagery.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card annual-breakdown">
        <div class="card-header">
            Annual Breakdown
        </div>

        <div class="card-block">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-responsive">
                        <thead>
                        <th>Year</th>
                        <th>Units Made from Panels</th>
                        <th>Units Assumed to be Used</th>
                        <th>Units Assumed to be Exported</th>
                        <th>Inflated 'Cost' of Units</th>
                        <th>Expected FITS Payment</th>
                        <th>Value of Electricity Generated</th>
                        <th>Inflated 'Cost' of Exports</th>
                        <th>Export Tariff Generated</th>
                        <th>Annual Savings &amp; Payments</th>
                        <th>Cumulative Net Cashflow</th>
                        </thead>
                        <tbody>
                        @foreach(range(1,20) as $yr)
                            <tr>
                                <td>{{$yr}}</td>
                                <td>{{round($cash_flow->units_generated($yr))}}</td>
                                <td>{{round($cash_flow->units_used($yr))}}</td>
                                <td>{{round($cash_flow->units_exported($yr))}}</td>
                                <td>{{number_format($cash_flow->inflated_unit_cost($yr), 2)}}p</td>
                                <td>£{{number_format($cash_flow->inflated_fit_payment($yr), 2)}}</td>
                                <td>£{{number_format($cash_flow->value_electricity_generated($yr), 2)}}</td>
                                <td>{{round($cash_flow->inflated_export_unit($yr), 2)}}p</td>
                                <td>£{{number_format($cash_flow->inflated_export($yr), 2)}}</td>
                                <td>£{{number_format($cash_flow->savings_payments($yr), 2)}}</td>
                                <td>£{{number_format($cash_flow->net_cash_flow($yr), 2)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card notes">
        <div class="card-header">
            Notes
        </div>

        <div class="card-block">
            <ul>
                <li>No allowances made for cost of maintenance - replacement inverter etc.</li>
                <li>The Government F.I.T subsidies end after 20 years. All F.I.T's are paid as Tax Free!</li>
                <li>F.I.T "Production" payments (16.0p) for Total Production will increase annually by the Retail
                    Price Index - guaranteed.
                </li>
            </ul>
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