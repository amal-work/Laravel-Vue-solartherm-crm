@extends('layouts.main')

@section('content')
    <form class="view-sap" role="form" data-toggle="validator">
        <div class="card sap-details">
            <div class="card-header">
                Sap {{request()->sap->id}}
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success pull-right">Edit Sap</button>
                        <table class="table table-striped table-responsive">
                            <tbody>
                                <tr>
                                    <td>Date</td>
                                    <td>@{{date}}</td>
                                </tr>
                                <tr>
                                    <td>Customer</td>
                                    <td>@{{first_name}} @{{last_name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>@{{email}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>@{{phone}}</td>
                                </tr>
                                <tr>
                                    <td>Mobile</td>
                                    <td>@{{mobile}}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>@{{address}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Method</td>
                                    <td>@{{payment_method}}</td>
                                </tr>
                                <tr>
                                    <td>Response</td>
                                    <td>@{{response}}</td>
                                </tr>
                                <tr>
                                    <td>Response Notes</td>
                                    <td>@{{response_notes}}</td>
                                </tr>
                                <tr>
                                    <td>Response Date</td>
                                    <td>@{{response_date}}</td>
                                </tr>
                                <tr>
                                    <td>Assessor</td>
                                    <td>@{{assessor}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card questionnaire">
            <div class="card-header">
                Questionnaire
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                        <img class="img-responsive pull-right" src="../../img/logo.png" />
                        <p>Dated: @{{date}} | Assessor: @{{assessor}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card customer-details">
                            <div class="card-header">
                                Customer Details
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>@{{first_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Last Name</td>
                                                    <td>@{{last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>@{{phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile</td>
                                                    <td>@{{mobile}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>@{{email}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>@{{address}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Town</td>
                                                    <td>@{{town}}</td>
                                                </tr>
                                                <tr>
                                                    <td>County</td>
                                                    <td>@{{county}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Postcode</td>
                                                    <td>@{{postcode}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Zone</td>
                                                    <td>@{{zone}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card property-information">
                            <div class="card-header">
                                Property Information
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Property Type</td>
                                                    <td>@{{property_type}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Bedrooms</td>
                                                    <td>@{{bedrooms}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Bathrooms</td>
                                                    <td>@{{bathrooms}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Electrical Usage</td>
                                                    <td>@{{electrical_usage}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Scaffold Access</td>
                                                    <td>@{{scaffold_access}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Boiler Type</td>
                                                    <td>@{{boiler_type}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Exposure</td>
                                                    <td>@{{exposure}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Year Built</td>
                                                    <td>@{{year_built}}</td>
                                                </tr>
                                                <tr>
                                                    <td>No. Sides</td>
                                                    <td>@{{no_sides}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Indoor/Outdoor Pool</td>
                                                    <td>@{{pool}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card appliance-usage">
                            <div class="card-header">
                                Electrical App Usage (per Week)
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Washing Machine: @{{washing_machine}}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <p>Dishwasher: @{{dishwasher}}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <p>Tumble Drier: @{{tumble_drier}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card number-of-appliances">
                            <div class="card-header">
                                Number of Appliances
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-4">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Hob</td>
                                                    <td>@{{hob}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Freezer</td>
                                                    <td>@{{freezer}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Computer</td>
                                                    <td>@{{computer}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Oven</td>
                                                    <td>@{{oven}}</td>
                                                </tr>
                                                <tr>
                                                    <td>TVs</td>
                                                    <td>@{{tvs}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Hot Tub</td>
                                                    <td>@{{hot_tub}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Fridge</td>
                                                    <td>@{{fridge}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ponds/Tanks</td>
                                                    <td>@{{ponds_tanks}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card loft">
                            <div class="card-header">
                                Loft
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>Tile Type: @{{tile_type}}</p>
                                    </div>

                                    <div class="col-md-2">
                                        <p>Loft Condition: @{{loft_condition}}</p>
                                    </div>

                                    <div class="col-md-2">
                                        <p>Inspected: @{{inspected}}</p>
                                    </div>

                                    <div class="col-md-2">
                                        <p>Access: @{{access}}</p>
                                    </div>

                                    <div class="col-md-2">
                                        <p>Lining: @{{lining}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Electric Spend (Yearly): @{{electric_spend}}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <p>Gas Spend (Yearly): @{{gas_spend}}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <p>KW Used: @{{kw_used}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Gas/Oil Saving: @{{gas_oil_saving}}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <p>Energy Provider: @{{energy_provider}}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <p>Annual Percentage Used: @{{percent_used}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card co2-assessment">
                            <div class="card-header">
                                CO<sub>2</sub> Assessment
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Gas Saving by Heating Water</td>
                                                    <td>@{{saving_by_heating_water}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Boiler Age</td>
                                                    <td>@{{boiler_age}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Boiler Servicing</td>
                                                    <td>@{{boiler_servicing}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Room Stat</td>
                                                    <td>@{{room_stat}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Radiator Stat</td>
                                                    <td>@{{radiator_stat}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Convector Rads</td>
                                                    <td>@{{convector_rads}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Loft Insulation</td>
                                                    <td>@{{loft_insulation}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Insulation Density</td>
                                                    <td>@{{insulation_density}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Energy Bulbs</td>
                                                    <td>@{{energy_bulbs}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Recycle</td>
                                                    <td>@{{recycle}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Double Glazing</td>
                                                    <td>@{{double_glazing}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Conservatory</td>
                                                    <td>@{{conservatory}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Roof Design</td>
                                                    <td>@{{roof_design}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Room Division</td>
                                                    <td>@{{room_division}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Curtain Density</td>
                                                    <td>@{{curtain_density}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Walls</td>
                                                    <td>@{{walls}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card single-inverter-90">
            <div class="card-header">
                Calculator Basic Single Inverter 90
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Market Average</td>
                                                    <td>@{{market_average}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Scheme</td>
                                                    <td>@{{scheme}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Gas (Yearly)</td>
                                                    <td>@{{gas}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Deposit</td>
                                                    <td>@{{deposit}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Months</td>
                                                    <td>@{{months}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Electric (Yearly)</td>
                                                    <td>@{{electric}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card array-configuration">
                            <div class="card-header">
                                Array Configuration
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-responsive">
                                            <thead>
                                                <th>Panels #</th>
                                                <th>Power</th>
                                                <th>Total KWp</th>
                                                <th>Pitch</th>
                                                <th>Orientation</th>
                                                <th>Yield KWh</th>
                                                <th>Shading Factor</th>
                                                <th>Total KWH</th>
                                            </thead>
                                            <tbody>
                                                <!--Loop this-->
                                                <tr>
                                                    <td>@{{panels}}</td>
                                                    <td>@{{power}}</td>
                                                    <td>@{{total_kwp}}</td>
                                                    <td>@{{pitch}}</td>
                                                    <td>@{{orientation}}</td>
                                                    <td>@{{yeild_kwh}}</td>
                                                    <td>@{{shading_factor}}</td>
                                                    <td>@{{total_kwh}}</td>
                                                </tr>
                                                <tr>
                                                    <td align="right" colspan="7">System Total</td>
                                                    <td>@{{system_total}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card energy-generation-and-calculation">
                            <div class="card-header">
                                Energy Generation and Calculation
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong>Standard Single Inverter PC Solar</strong> - The standard solar panel</p>
                                        <p><strong>Used Percentage:</strong> @{{used_percentage}}%</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <table class="table table-striped table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Production</td>
                                                    <td>@{{production}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Gov. FIT Rate</td>
                                                    <td>@{{gov_fit_rate}}</td>
                                                </tr>
                                                <tr>
                                                    <td>FIT Tariff</td>
                                                    <td>@{{fit_tariff}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-4">
                                        <table class="table table-striped table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Production</td>
                                                    <td>@{{production}}</td>
                                                </tr>
                                                <tr>
                                                    <td>% Export</td>
                                                    <td>@{{percent_export}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Export Rate</td>
                                                    <td>@{{export_rate}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Export Tariff</td>
                                                    <td>@{{export_tariff}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-4">
                                        <table class="table table-striped table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Production</td>
                                                    <td>@{{production}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Usage</td>
                                                    <td>@{{usage}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Energy Rate</td>
                                                    <td>@{{energy_rate}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Energy Tariff</td>
                                                    <td>@{{energy_tariff}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Total Calculated Output Value: @{{calculated_output_value}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Gas/Oil Saving: @{{gas_oil_saving}}</p>
                                        <p>Current KWH Usage: @{{current_kwh_usage}}</p>
                                    </div>

                                    <div class="col-md-6">
                                        <p>Mains optimiser fitted. Saving 1st Year: @{{first_year_saving}}</p>
                                        <p>Projected Savings over 20 Years: @{{twenty_year_saving}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="card calculator-optimised-90">
            <div class="card-header">
                Calculator Optimised 90%
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Market Average</td>
                                                    <td>@{{market_average}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Scheme</td>
                                                    <td>@{{scheme}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Gas (Yearly)</td>
                                                    <td>@{{gas}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Deposit</td>
                                                    <td>@{{deposit}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Months</td>
                                                    <td>@{{months}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Electric (Yearly)</td>
                                                    <td>@{{electric}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card array-configuration">
                            <div class="card-header">
                                Array Configuration
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-responsive">
                                            <thead>
                                                <th>Panels #</th>
                                                <th>Power</th>
                                                <th>Total KWp</th>
                                                <th>Pitch</th>
                                                <th>Orientation</th>
                                                <th>Yield KWh</th>
                                                <th>Shading Factor</th>
                                                <th>Total KWH</th>
                                            </thead>
                                            <tbody>
                                                <!--Loop this-->
                                                <tr>
                                                    <td>@{{panels}}</td>
                                                    <td>@{{power}}</td>
                                                    <td>@{{total_kwp}}</td>
                                                    <td>@{{pitch}}</td>
                                                    <td>@{{orientation}}</td>
                                                    <td>@{{yeild_kwh}}</td>
                                                    <td>@{{shading_factor}}</td>
                                                    <td>@{{total_kwh}}</td>
                                                </tr>
                                                <tr>
                                                    <td align="right" colspan="7">System Total</td>
                                                    <td>@{{system_total}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card energy-generation-and-calculation">
                            <div class="card-header">
                                Energy Generation and Calculation
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong>Solar Edge System</strong> - SolarEdge Optimiser system 15% uplift allowed for against basic system</p>
                                        <p><strong>Used Percentage:</strong> @{{used_percentage}}%</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <table class="table table-striped table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Production</td>
                                                    <td>@{{production}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Gov. FIT Rate</td>
                                                    <td>@{{gov_fit_rate}}</td>
                                                </tr>
                                                <tr>
                                                    <td>FIT Tariff</td>
                                                    <td>@{{fit_tariff}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-4">
                                        <table class="table table-striped table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Production</td>
                                                    <td>@{{production}}</td>
                                                </tr>
                                                <tr>
                                                    <td>% Export</td>
                                                    <td>@{{percent_export}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Export Rate</td>
                                                    <td>@{{export_rate}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Export Tariff</td>
                                                    <td>@{{export_tariff}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-4">
                                        <table class="table table-striped table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Production</td>
                                                    <td>@{{production}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Usage</td>
                                                    <td>@{{usage}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Energy Rate</td>
                                                    <td>@{{energy_rate}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Energy Tariff</td>
                                                    <td>@{{energy_tariff}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Total Calculated Output Value: @{{calculated_output_value}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Gas/Oil Saving: @{{gas_oil_saving}}</p>
                                        <p>Current KWH Usage: @{{current_kwh_usage}}</p>
                                    </div>

                                    <div class="col-md-6">
                                        <p>Mains optimiser fitted. Saving 1st Year: @{{first_year_saving}}</p>
                                        <p>Projected Savings over 20 Years: @{{twenty_year_saving}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>

        <div class="card benfit-summary">
            <div class="card-header">
                Benefit Summary
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Overview of Projected Annual SAP Calculations for the Single String Inverter System</h3>
                        <p>An uplift in production figures of 15% has been used for this system, plus your true location against the standard MCS calculation. The Government states all clients should be made aware that projected numbers may vary from home to home as well as location.</p>

                        <table class="table table-striped table-responsive">
                            <tbody>
                                <tr>
                                    <td>Number of panels to be installed</td>
                                    <td>@{{num_panels}}</td>
                                </tr>
                                <tr>
                                    <td>Energy: You are currently paying <span>@{{energy_year_cost}}</span> per year &amp; using @{{energy_year_kw}} KW per energy of electric per year</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>If energy cost was to rise by just 5% per year, over the next 20 years then you will spend a total of: @{{energy_cost_rise_5}} on Energy cost over this period</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>But if energy cost was to rise by 10% per year, over the next 20 years then you will spend a total of: @{{energy_cost_rise_10}} on Energy over this period</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Projected savings over the next 20 year period on your energy cost along with the SolarTherm Optimised system installed is:</td>
                                    <td>@{{projected_savings}}</td>
                                </tr>
                                <tr>
                                    <td>Saving you up to @{{future_bills}} in future energy bills</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>To make your home even more energy efficient we will install a SolarTherm MAINS Optimiser for FREE within our scheme to your incoming electrical supply from the grid, when we fit your solar panels. This will save you even more money over the next 20yrs and beyond. Project extra savings from fitting this is:</td>
                                    <td>@{{projected_extra_savings}}</td>
                                </tr>
                                <tr>
                                    <td>Total Projected Electric Savings</td>
                                    <td>@{{projected_electric_savings}}</td>
                                </tr>
                                <tr>
                                    <td>Cost of your solar system</td>
                                    <td>@{{system_cost}}</td>
                                </tr>
                                <tr>
                                    <td>Total maximum interest payable if scheme run for 10 yrs</td>
                                    <td>@{{max_interest}}</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>@{{total}}</td>
                                </tr>
                                <tr>
                                    <td>Plus/Minus</td>
                                    <td>@{{plus_minus}}</td>
                                </tr>
                                <tr>
                                    <td>Total projected income from FIT payments over 20 yrs</td>
                                    <td>@{{projected_fit}}</td>
                                </tr>
                                <tr>
                                    <td>Projected 20 yr TAX FREE income Net after all solar has been paid for including income from mains optimiser</td>
                                    <td>@{{projected_income_net}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Customer payment upfront</td>
                                    <td>@{{payment_upfront}}</td>
                                </tr>
                                <tr>
                                    <td>Customer fully funded</td>
                                    <td>@{{fully_funded}}</td>
                                </tr>
                                <tr>
                                    <td>1st year customer investment return if paid for system CASH1st year customer investment return if paid for system CASH</td>
                                    <td>@{{projected_income_net}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Loan amount</td>
                                    <td>@{{loan_amount}}</td>
                                </tr>
                                <tr>
                                    <td>1st years repayments</td>
                                    <td>@{{first_years_repayments}}</td>
                                </tr>
                                <tr>
                                    <td>Repayment Per Month</td>
                                    <td>@{{repayment_per_month}}</td>
                                </tr>
                                <tr>
                                    <td>Repayment Per Week</td>
                                    <td>@{{repayment_per_week}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <p>The Government understands it cannot force home owners to have Solar fiited to their homes. But they can encourage home owners to fit them by paying an income for 20 years Guaranteed provided it can be established your homes energy efficiency can be increased to a level D or above by having them fitted.</p>

                        <p>Estimated returns should not be considered a guarantee of a systems performance.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card customer-summary">
            <div class="card-header">
                Customer Summary
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Overview of Projected Annual SAP Calculations for the Single String Inverter System</h3>
                        <p>An uplift in production figures of 15% has been used for this system, plus your true location against the standard MCS calculation. The Government states all clients should be made aware that projected numbers may vary from home to home as well as location.</p>

                        <div class="card">
                            <div class="card-header">
                                Energy Savings and Government Payments
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <p>Electric savings are based on you using 90% of the energy being produced live each day from your new solar system. What you do not use will be exported back to the grid.</p>
                                    <table class="table table-responsive">
                                        <tbody>
                                            <tr>
                                                <td>1st Year Max Savings on Electric based on 90% of the energy being produced/being used</td>
                                                <td>@{{first_year_max_saving}}</td>
                                            </tr>
                                            <tr>
                                                <td>Gas / Oil Savings if applicable as agreed with customer</td>
                                                <td>@{{gas_oil_savings}}</td>
                                            </tr>
                                            <tr>
                                                <td>Mains Voltage Optimiser Saving</td>
                                                <td>@{{mains_voltage_saving}}</td>
                                            </tr>
                                            <tr>
                                                <td align="right">Sub Total</td>
                                                <td>@{{sub_total}}</td>
                                            </tr>
                                            <tr>
                                                <td>Projected amount payable from Government FIT &amp; FBT (Export Tariff) 1st Year</td>
                                                <td>@{{projected_payable}}</td>
                                            </tr>
                                            <tr>
                                                <td align="right">Total projected income 1st year</td>
                                                <td>@{{projected_first_year_income}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                SolarTherm UK Funding Funding Repayments
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <table class="table table-responsive">
                                        <tbody>
                                            <tr>
                                                <td>Solartherm UK Funding 12 payments 1st Year Total Payable</td>
                                                <td>@{{solartherm_funding_payable}}</td>
                                            </tr>
                                            <tr>
                                                <td>Shortfall 1st Year Only</td>
                                                <td>@{{shortfall_first_year}}</td>
                                            </tr>
                                            <tr>
                                                <td>Monthly Direct Debit</td>
                                                <td>@{{monthly_direct_debit}}</td>
                                            </tr>
                                            <tr>
                                                <td>In summary your monthly payment will be made up from savings on current energy cost. The amounts are the monthly average taken from your projected yearly savings.</td>
                                                <td>@{{summary_monthly}}</td>
                                            </tr>
                                            <tr>
                                                <td align="right">Sub Total</td>
                                                <td>@{{sub_total}}</td>
                                            </tr>
                                            <tr>
                                                <td>Monthly ave from FIT &amp; FBT (Export Tariff) (Normally paid quarterly)</td>
                                                <td>@{{monthly_average}}</td>
                                            </tr>
                                            <tr>
                                                <td align="right">Balance to find per month</td>
                                                <td>@{{balance_find_month}}</td>
                                            </tr>
                                            <tr>
                                                <td align="right">Balance to find per week</td>
                                                <td>@{{balance_find_week}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Total Benefit
                            </div>

                            <div class="card-block">
                                <div class="row">
                                    <table class="table table-responsive">
                                        <tbody>
                                            <tr>
                                                <td>Total projected fund over 20 years is based on a yearly 2.5% inflation rise and energy costs rise of 10%.
                                                    The cost of your system plus any interest payable should be deducted from this amount.
                                                    Amount of interest payable will depend on how long you let your fund run.
                                                    The numbers above assumes the maxiumum interest payable.</td>
                                                <td>@{{total_projected_twenty_years}}</td>
                                            </tr>
                                            <tr>
                                                <td>Total payable from FIT and FBT (Export Tariff) if funding run for 10 years</td>
                                                <td>@{{total_paybale_ten_years}}</td>
                                            </tr>
                                            <tr>
                                                <td>Projected net amount after ALL costs (incl interest) if funding allowed to run for max 10 Years</td>
                                                <td>@{{projected_net_ten_years}}</td>
                                            </tr>
                                            <tr>
                                                <td>20 years is: This net amount is guaranteed Tax Free. Voltage Optimiser saving</td>
                                                <td>@{{guaranteed_optimiser_saving}}</td>
                                            </tr>
                                            <tr>
                                                <td>Solar Working for YOU</td>
                                                <td>@{{solar_working_for_you}}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card compliance">
            <div class="card-header">
                Compliance
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <td>Customer Name</td>
                                    <td>@{{first_name}} @{{last_name}}</td>
                                </tr>
                                <tr>
                                    <td>Credit Intermediary</td>
                                    <td>@{{credit_intermediary}}</td>
                                </tr>
                                <tr>
                                    <td>District Accessor</td>
                                    <td>@{{district_assessor}}</td>
                                </tr>
                                <tr>
                                    <td>I confirm I have had a full explanation of the products/goods and the installation being offered, and understand all aspects.</td>
                                    <td>{{ Form::checkbox('confirm_explain_installation') }}</td>
                                </tr>
                                <tr>
                                    <td>I confirm that all the information on the credit application is accurate and I am not aware of any change in circumstances that would affect my ability to repay this loan.</td>
                                    <td>{{ Form::checkbox('confirm_information_accurate') }}</td>
                                </tr>
                                <tr>
                                    <td>I confirm that I will pay the credit by making 120 monthly payments of £143.43 Total amount payable £17311.6	</td>
                                    <td>{{ Form::checkbox('confirm_credit') }}</td>
                                </tr>
                                <tr>
                                    <td>I understand that I must pay the minimum monthly repayment by direct debit but additional capital repayments can be made.</td>
                                    <td>{{ Form::checkbox('confirm_minimum_repayments') }}</td>
                                </tr>
                                <tr>
                                    <td>I can confirm my annual gross income is £35,000.00</td>
                                    <td>{{ Form::checkbox('confirm_gross_income') }}</td>
                                </tr>
                                <tr>
                                    <td>I understand how the loan works and the requirement to make repayments is not affected in any way by the benefits or savings that any installation/product generates.</td>
                                    <td>{{ Form::checkbox('confirm_loan') }}</td>
                                </tr>
                                <tr>
                                    <td>I was given the opportunity to ask questions about the loan and understood all the answers provided.</td>
                                    <td>{{ Form::checkbox('confirm_questions') }}</td>
                                </tr>
                                <tr>
                                    <td>I understand that SolarTherm UK is part of the Silvercrest Energy group and they try to obtain funding for my Solar PV Order. I understand they will advise me who they were able to obtain funding from, and arrange for this funding company to contact me to finalise funds. I understand that should I not to proceed with the funding, I must inform Solar Therm and cancel my order within 14 days of the date below.</td>
                                    <td>{{ Form::checkbox('confirm_funding') }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-6">
                                <p>Customers Signature</p>
                                <p>Date</p>
                            </div>

                            <div class="col-md-6">
                                <p>District Accessor Signature</p>
                                <p>Date</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('custom_styles')

@endsection
@section('custom_script')
    <script>
        var app = new Vue({ 
            el: '#app', 
            data: { 
                date : '',
                first_name : '',
                last_name : '',
                email : '',
                phone : '',
                mobile : '',
                payment_method : '',
                response : '',
                response_notes : '',
                response_date : '',
                assessor : '',

                address : '',
                town : '',
                county : '',
                postcode : '',
                zone : '',

                property_type : '',
                bedrooms : '',
                bathrooms : '',
                electrical_usage : '',
                scaffold_access : '',

                boiler_type : '',
                exposure : '',
                year_built : '',
                no_sides : '',

                washing_machine : '',
                dishwasher : '',
                tumble_drier : '',

                hob : '',
                freezer : '',
                computer : '',
                oven : '',
                tvs : '',
                hot_tub : '',
                fridge : '',
                ponds_tanks : '',

                tile_type : '',
                loft_condition : '',
                inspected : '',
                access : '',
                lining : '',
                electric_spend : '',
                gas_spend : '',
                kw_used : '',
                gas_oil_saving : '',
                energy_provider : '',
                percent_used : '',

                saving_by_heating_water : '',
                boiler_age : '',
                boiler_servicing : '',
                room_stat : '',
                radiator_stat : '',
                convector_rads : '',
                loft_insulation : '',
                insulation_density : '',
                energy_bulbs : '',
                recycle : '',
                double_glazing : '',
                conservatory : '',
                roof_design : '',
                room_division : '',
                curtain_density : '',
                walls : '',

                market_average : '',
                scheme : '',
                gas : '',
                deposit : '',
                months : '',
                electric : '',

                panels : '',
                power : '',
                total_kwp : '',
                pitch : '',
                orientation : '',
                yeild_kwh : '',
                shading_factor : '',
                total_kwh : '',
                system_total : '',

                used_percentage : '',
                production : '',
                gov_fit_rate : '',
                fit_tariff : '',
                percent_export : '',
                export_rate : '',
                export_tariff : '',
                usage : '',
                energy_rate : '',
                energy_tariff : '',
                calculated_output_value : '',
                gas_oil_saving : '',
                current_kwh_usage : '',
                first_year_saving : '',
                twenty_year_saving : '',

                market_average : '',
                scheme : '',
                gas : '',
                deposit : '',
                months : '',
                electric : '',
                panels : '',
                power : '',
                total_kwp : '',
                pitch : '',
                orientation : '',
                yeild_kwh : '',
                shading_factor : '',
                total_kwh : '',
                system_total : '',

                used_percentage : '',
                production : '',
                gov_fit_rate : '',
                fit_tariff : '',
                production : '',
                percent_export : '',
                export_rate : '',
                export_tariff : '',
                production : '',
                usage : '',
                energy_rate : '',
                energy_tariff : '',
                calculated_output_value : '',
                gas_oil_saving : '',
                current_kwh_usage : '',
                first_year_saving : '',
                twenty_year_saving : '',

                num_panels : '',
                energy_year_cost : '',
                energy_year_kw : '',
                energy_cost_rise_5 : '',
                energy_cost_rise_10 : '',
                projected_savings : '',
                future_bills : '',
                projected_extra_savings : '',
                projected_electric_savings : '',
                system_cost : '',
                max_interest : '',
                total : '',
                plus_minus : '',
                projected_fit : '',
                projected_income_net : '',
                payment_upfront : '',
                fully_funded : '',
                projected_income_net : '',
                loan_amount : '',
                first_years_repayments : '',
                repayment_per_month : '',
                repayment_per_week : '',

                first_year_max_saving : '',
                gas_oil_savings : '',
                mains_voltage_saving : '',
                sub_total : '',
                projected_payable : '',
                projected_first_year_income : '',

                solartherm_funding_payable : '',
                shortfall_first_year : '',
                monthly_direct_debit : '',
                summary_monthly : '',
                sub_total : '',
                monthly_average : '',
                balance_find_month : '',
                balance_find_week : '',

                total_projected_twenty_years : '',
                total_paybale_ten_years : '',
                projected_net_ten_years : '',
                guaranteed_optimiser_saving : '',
                solar_working_for_you : '',

                credit_intermediary : '',
                district_assessor : '',
                confirm_explain_installation : '',
                confirm_information_accurate : '',
                confirm_credit : '',
                confirm_minimum_repayments : '',
                confirm_gross_income : '',
                confirm_loan : '',
                confirm_questions : '',
                confirm_funding : '',
                }
            });
    </script>
@endsection